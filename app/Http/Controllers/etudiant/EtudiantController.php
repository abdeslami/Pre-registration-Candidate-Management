<?php

namespace App\Http\Controllers\etudiant;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EtudiantController extends Controller
{
    public function form1(){
        return view("etudiant.form.form1");
    }
    public function form2(){
        return view("etudiant.form.form2");
    }
    public function form3(){
        return view("etudiant.form.form3");
    }
    public function form4(){
        return view("etudiant.form.form4");
    }
    public function pdf_recu(){
        return view("etudiant.fiche.recu");
    }
    public function pdf_inscription(){
        return view("etudiant.fiche.inscription");
    }

//create funtion post
public function postform1(Request $request){
    $request->validate([
        "nom" => "required",
        "prenom" => "required",
        "nom_ar" => "required",
        "prenom_ar" => "required",
        "date_naissance" => "required",
        "lieu_naissance" => "required",
        "lieu_naissance_ar" => "required",
        "province_naissance" => "required",
        "sexe" => "required",
        "situation_handicap" => "required",
        "situation_familiale" => "required",
        "nationnalite" => "required",
        "adresse1" => "required",
        "code_postal" => "required",
        "province" => "required",
        "email" => "required",
        "telephone" => "required",
        "cin_et" => "required",
        "cm_ou_cne" => "required",
        "pays" => "required",
        "profession_pere" => "required",
        "profession_mere" => "required",
        "telephone_pere" => "required",
        "telephone_mere" => "required",
        "cin_pere" => "required",
        "cin_mere" => "required",

    ]);
    $id_etudiant=Auth::guard("etudiant")->user()->id;
    
    $etudiant=Etudiant::where("id",$id_etudiant)->first();
    $etudiant->password=Hash::make($request->cm_ou_cne);
    $etudiant->province_naissance=$request->province_naissance;
    $etudiant->is_registered=true;
    
    $attributes = $request->all();
  if($request->photo){
    if ($etudiant->photo) {
        Storage::delete("public/dossier_scan/{$etudiant->photo}");
    }
  }

    $dossier_scan = 'public/dossier_scan';
    
 
        if ($request->hasFile("photo")) {
            $originalName = $request->file("photo")->getClientOriginalName();
            $extension = $request->file("photo")->getClientOriginalExtension();
            $hashedName = hash('sha256',  $originalName . time() + rand(1,10000)) . '.' . $extension;
    
            
    
            $path = $request->file("photo")->storeAs($dossier_scan, $hashedName);
    
            $attributes["photo"] = $hashedName;
        }
    
    if($etudiant){
        $etudiant->update($attributes);

    }
    
    
     return redirect()->route("form2");

}
public function postform2(Request $request){
    $request->validate([
        "mention_bac" => "required",
  "universite_nom" => "required",
  "a_obtention_bac" => "required",
  "serie_bac" => "required",
  "type_etablissement" => "required",
  "enseignement_superieur" => "required",

    ]);
    $etudiant_id = Auth::guard("etudiant")->user()->id;;
    $etudiantExist = Etudiant::where("id",$etudiant_id)->first(); 
    if($request->relvi_note) {
        if ($etudiantExist->relvi_note) {
            Storage::delete("public/dossier_scan/{$etudiantExist->relvi_note}");
        }
    }
    if($request->scan_bac){
    if ($etudiantExist->scan_bac) {
        Storage::delete("public/dossier_scan/{$etudiantExist->scan_bac}");
    }}
    $attributes = $request->all();

    $dossier_scan = 'public/dossier_scan';
    $filesToStore = ['relvi_note', 'scan_bac'];
    
 
    foreach ($filesToStore as $file) {
        if ($request->hasFile($file)) {
            $originalName = $request->file($file)->getClientOriginalName();
            $extension = $request->file($file)->getClientOriginalExtension();
            $hashedName = hash('sha256',  $originalName . time() + rand(1,10000)) . '.' . $extension;
    
            
    
            $path = $request->file($file)->storeAs($dossier_scan, $hashedName);
    
            $attributes[$file] = $hashedName;
        }
    }
    if($etudiantExist){
        $etudiantExist->update($attributes);

    }
    
    return redirect()->route("form3");

}
public function postform3(Request $request){
    $id_etudiant=Auth::guard("etudiant")->user()->id;
    $etudiant=Etudiant::where("id",$id_etudiant)->first();
    if($etudiant){
        $etudiant->update($request->except("_token"));

    }
    return redirect()->route("form4");

}
public function postform4(Request $request){
    dd($request->all());
    return redirect()->route("form1");

}

    public function storeEtudiant(Request $request){
        return redirect()->route("form");

    }
}