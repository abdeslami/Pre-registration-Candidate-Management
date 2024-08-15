<?php

namespace App\Http\Controllers\admin;

use App\Exports\EmptyTemplateExport;
use App\Http\Controllers\Controller;
use App\Imports\EtudiantImport;
use App\Models\Etudiant;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Svg\Tag\Rect;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelFormat;



class AdminController extends Controller
{
    public function dashboard()
    {
        $etudiantsCount = Etudiant::count();
        $acceptesCount = Etudiant::where('is_registered', true)->count();
        $homme = Etudiant::where('sexe', "homme")->count();
        $femme = Etudiant::where('sexe', "femme")->count();

        $ages = [];
    
        // Récupérer tous les étudiants
        $etudiants = Etudiant::all();
    
        foreach ($etudiants as $etudiant) {
            // Calculer l'âge de l'étudiant
            if ($etudiant->date_naissance) {
                $date_naissance = new DateTime($etudiant->date_naissance);
                $aujourd_hui = new DateTime();
                $age = $date_naissance->diff($aujourd_hui)->y;  // Calcul de l'âge
                $annee = $age;  // Année de naissance
    
                if (!isset($ages[$annee])) {
                    $ages[$annee] = 0;
                }
                $ages[$annee]++;
            }
        }
    
        $data = [];
        $labels = [];
    
        foreach ($ages as $annee => $count) {
            $labels[] = $annee;
            $data[] = $count;
        }
    
        $chartData = [
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Nombre d\'étudiants',
                    'data' => $data,
                    'backgroundColor' => 'rgba(0,123,255,0.5)',
                    'borderColor' => 'rgba(0,123,255,1)',
                    'borderWidth' => 3
                ]
            ]
        ];
    
        return view("admin.dashboard", compact('etudiantsCount', 'acceptesCount', 'chartData',"homme","femme"));
    }
    
   
    public function importEtudiants(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv', // Allow Excel and CSV file formats
        ]);

        try {
            // Import the uploaded file using EtudiantImport class
            Excel::import(new EtudiantImport(), $request->file('file'));

            // Redirect with success message if import is successful
            return redirect()->route('candidature')->with('success', 'Etudiants imported successfully');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error occurred during import: ' . $e->getMessage());

            // Redirect with error message if import fails
            return redirect()->route('candidature')->with('error', 'An error occurred during import. Please try again.');
        }
    }

    public function downloadTemplate()
{
    return Excel::download(new EmptyTemplateExport, 'template.xlsx');
}
// php artisan make:export EmptyTemplateExport --model=Etudiant
    
    
    public function candidature(){
        $etudiant=Etudiant::all();
        return view("admin.candidature",compact("etudiant"));
        
    }
    public function ajouter_user(){
        $etudiant=Etudiant::all();
        return view("admin.user.ajouter",compact("etudiant"));
        
    }
    public function store_user(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('utilisateur')->with('error', 'Une erreur s\'est produite lors de l\'importation. Veuillez réessayer.');

    }
    public function show($id,Request $request)
    {
        $id=$id;
        $user=User::find($id);
        return view("admin.user.update",compact("id","user"));

        

    }
    public function update_user($id,Request $request)
    {
        $user =User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email_verified_at = now();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('utilisateur')->with('error', 'Une erreur s\'est produite lors de l\'importation. Veuillez réessayer.');

    }
    public function delete_user($id,Request $request)
    {
        User::destroy($id);
        return redirect()->route('utilisateur')->with('error', 'Une erreur s\'est produite lors de l\'importation. Veuillez réessayer.');

    }
    
    
    
    
    
    public function  loginadmin(Request $request)  {
        $request->validate([
            'password'=>['required','string'],
            'name'=>['required','string'],
        ]);
        if (Auth::guard('web')->attempt(['password' => $request->password, 'name' => $request->name])) {

            return redirect()->route('dashboard');
          
        } else {
            return redirect()->back()->withInput(['password' => $request->password])->with('errorResponse', 'These credentials do not match.');
        }  
    }
    public function logoutadmin(){
        Auth::guard("web")->logout();
        return redirect()->route('welcome');


    }
    public function utilisateur(){
        $users=User::all();
        return view("admin.utilisateur",compact("users"));
        
    }
    public function etudiant($id,Request $request)  {

        $etudiant=Etudiant::find($id);
        return view("admin.etudiant.details",compact("etudiant"));
    }
    public function delete_etudiant($id)  {
    
    
        $Etudiant = Etudiant::find($id);
    
            if ($Etudiant->scan_bac) {
                Storage::delete("public/dossier_scan/{$Etudiant->scan_bac}");
            }

            if ($Etudiant->photo) {
                Storage::delete("public/dossier_scan/{$Etudiant->photo}");
            }
            if ($Etudiant->relvi_note) {
                Storage::delete("public/dossier_scan/{$Etudiant->relvi_note}");
            }
        $Etudiant->delete();
        
            
        return redirect()->route('candidature')->with('success', 'Etudiant Supprimer');
        
    
}
public function delete_etudiant_all()
{
    $etudiants = Etudiant::all();

    foreach ($etudiants as $etudiant) {
        if ($etudiant->scan_bac) {
            Storage::delete("public/dossier_scan/{$etudiant->scan_bac}");
        }

        if ($etudiant->photo) {
            Storage::delete("public/dossier_scan/{$etudiant->photo}");
        }

        if ($etudiant->relvi_note) {
            Storage::delete("public/dossier_scan/{$etudiant->relvi_note}");
        }

        $etudiant->delete();
    }

    return redirect()->route('candidature')->with('success', 'Tous les étudiants ont été supprimés');
}


}