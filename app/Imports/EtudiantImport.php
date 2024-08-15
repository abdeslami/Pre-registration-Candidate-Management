<?php

namespace App\Imports;

use App\Models\Etudiant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class EtudiantImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Convert Excel numeric date value to PHP DateTime object
        $dateNaissance = Date::excelToDateTimeObject($row['date_naissance']);

        // Create new Etudiant instance
        $etudiant = new Etudiant([
            'cm_ou_cne' => $row['cm_ou_cne'],
            'date_naissance' => $dateNaissance,
            
        ]);
        $etudiant->password=Hash::make($row['cm_ou_cne']);
        $etudiant->save();

        return $etudiant;
    }
}



// namespace App\Imports;

// use App\Models\Etudiant;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Log;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class EtudiantImport implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {
        
//             Log::info('Row data:', $row);
//         dd($row);
//             return new Etudiant([
//                 'cm_ou_cne' => $row['cm_ou_cne'],
//                 'date_naissance' => $row['date_naissance'],
//                 'password' => Hash::make($row['cm_ou_cne']),
//             ]);
        
//     }
    
    // public function model(array $row)
    // {
        // $data = explode(';', $row[0]);
        // $cm_ou_cne = $data[0];
        // $date_naissance = $data[1];

        // $etudiant = new Etudiant();
        // $etudiant->cm_ou_cne = $cm_ou_cne;
        // $etudiant->date_naissance = $date_naissance;
        // $etudiant->password = Hash::make($cm_ou_cne);
        // $etudiant->save();
    //         $etudiant=new Etudiant();
    //    $etudiant->password= Hash::make($row["cm_ou_cne"]);
    //    $etudiant->date_naissance=$row['date_naissance'];
    //    $etudiant->cm_ou_cne=$row["cm_ou_cne"];

    //   $etudiant->save();

    // }
