<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\etudiant\EtudiantController;
use App\Http\Controllers\LOGINE;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");


Route::post("/etudiant",[EtudiantController::class,"storeEtudiant"])->name("etudiant");
// Creé route etudiant 
Route::middleware('Logoutetudiant')->group(function () {
Route::get("/form1",[EtudiantController::class,"form1"])->name("form1");
Route::get("/form2",[EtudiantController::class,"form2"])->name("form2");
Route::get("/form3",[EtudiantController::class,"form3"])->name("form3");
Route::get("/form4",[EtudiantController::class,"form4"])->name("form4");
});
/***Submit Formulaire etudiant */


Route::post("/postform1",[EtudiantController::class,"postform1"])->name("postform1");
Route::post("/postform2",[EtudiantController::class,"postform2"])->name("postform2");
Route::post("/postform3",[EtudiantController::class,"postform3"])->name("postform3");
Route::post("/postform4",[EtudiantController::class,"postform4"])->name("postform4");


///create system Authentification Manual
Route::post("/login1",[LOGINE::class,"login1"])->name("login1");
Route::post("/login2",[LOGINE::class,"login2"])->name("login2");
//log out etudiant
Route::get('/logout/etudiant', [LOGINE::class, 'logout_etudiant'])->name('logout.etudiant');
Route::post("/createe",[LOGINE::class,"createe"])->name("createe");
//create pdf etudiant 
Route::get("/display-pdf-recu",[EtudiantController::class,"pdf_recu"])->name("recu");
Route::get("/display-pdf-inscription",[EtudiantController::class,"pdf_inscription"])->name("inscription");


//route admin
Route::middleware('Logoutadmin')->group(function () {

Route::get("/dashboard/admin",[AdminController::class,"dashboard"])->name("dashboard");
Route::get("/dashboard/admin/list_candidature",[AdminController::class,"candidature"])->name("candidature");
Route::get("/dashboard/admin/compte_utilisateur",[AdminController::class,"utilisateur"])->name("utilisateur");
Route::get("/dashboard/admin/compte_utilisateur/ajouter_user",[AdminController::class,"ajouter_user"])->name("ajouter_user");
Route::get("/dashboard/admin/compte_utilisateur/show/{id}",[AdminController::class,"show"])->name("showuser");

Route::post("/dashboard/admin/compte_utilisateur/store_user",[AdminController::class,"store_user"])->name("store_user");
Route::patch("/dashboard/admin/compte_utilisateur/update_user/{id}",[AdminController::class,"update_user"])->name("update_user");
Route::delete("/dashboard/admin/compte_utilisateur/delete_user/{id}",[AdminController::class,"delete_user"])->name("delete_user");
Route::delete("/dashboard/admin/compte_utilisateur/delete_etudiant/{id}",[AdminController::class,"delete_etudiant"])->name("delete_etudiant");
Route::delete("/dashboard/admin/compte_utilisateur/delete_etudiant_all",[AdminController::class,"delete_etudiant_all"])->name("delete_etudiant_all");

Route::get("/dashboard/admin/etudiant/{id}",[AdminController::class,"etudiant"])->name("etudiant");





Route::get('download-template', [AdminController::class,"downloadTemplate"])->name('download.template');


});


///login admin

Route::post("/loginadmin",[AdminController::class,"loginadmin"])->name("loginadmin");



//log out admin

Route::post("/logoutadmin",[AdminController::class,"logoutadmin"])->name("logoutadmin");


//import candidature
Route::post("/importEtudiants",[AdminController::class,"importEtudiants"])->name('importEtudiants');