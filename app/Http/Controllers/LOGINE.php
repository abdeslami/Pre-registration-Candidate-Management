<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;


class LOGINE extends Controller
{
    public function login1(Request $request)
    {
        $request->validate([
            'password'=>['required','string'],
            'date_naissance'=>['required','string'],
        ]);
        if (Auth::guard('etudiant')->attempt(['password' => $request->password, 'date_naissance' => $request->date_naissance])) {

          if(Auth::guard('etudiant')->user()->is_registered!=true){
            return redirect()->route('form1');
          }else{
            return redirect()->route('welcome')->with("error","vous avez déja un compte faire maitenent connexion ");
          }
        } else {
            return redirect()->back()->withInput(['cm_ou_cne' => $request->cm_ou_cne])->with('errorResponse', 'These credentials do not match.');
        }
    }
    public function login2(Request $request)
    {
        $request->validate([
            'password'=>['required','string'],
            'date_naissance'=>['required','string'],
        ]);
        if (Auth::guard('etudiant')->attempt(['password' => $request->password, 'date_naissance' => $request->date_naissance])) {

            return redirect()->route('form1');
          
        } else {
            return redirect()->back()->withInput(['cm_ou_cne' => $request->cm_ou_cne])->with('errorResponse', 'These credentials do not match.');
        }
    }
    public function logout_etudiant(){
        Auth::guard('etudiant')->logout();
        return redirect()->route('welcome');
    }
   
}
