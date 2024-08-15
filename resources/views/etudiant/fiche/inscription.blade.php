<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML to PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box
        }
        table tr td{
            font-weight: bold;
        }
        table {
            width: 100%;
        }
        table tr td {
            font-size: 14px;
        }
       
    </style>
</head>
<body>
    <div id="content">
        <!-- Your HTML content to convert to PDF -->
        <div style="border-bottom: 1px solid rgb(111, 95, 95);margin-top:4px;" class="header">
            <img src="images/header.jpeg" alt="logo" height="70px" width="100%">
        </div>
        <div style="display: flex;justify-content:space-between;border-bottom: 1px solid rgb(111, 95, 95);" class="header">
            <div>
                <img style="width: 10rem;height:5.3rem;" src="{{ asset('storage/dossier_scan/' .Auth::guard("etudiant")->user()->photo) }}"  > 
                <p>Numéro d'inscription : R0000{{Auth::guard("etudiant")->user()->id}} </p>
            </div>
            
            <h4 style=" "> PRÉ-INSCRIPTION : 2024/2025 ENSAO <br> Ecole Nationale des Sciences Appliquées - Oujda</h4>
        </div>
        <div class="body" >
            <div class="diplome-activite">
                <table border="1">
                    <tr style="background-color:  rgb(111, 95, 95);color:white;">
                        <th colspan="2">Informations générales</th>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">CODE NATIONAL ÉTUDIANT :</td>
                        <td>{{ Auth::guard("etudiant")->user()->cm_ou_cne }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">NOM & PRÉNOM :</td>
                        <td>{{ Auth::guard("etudiant")->user()->nom }} {{ Auth::guard("etudiant")->user()->prenom }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">NOM & PRÉNOM (Arabe):</td> 
                        <td>{{ Auth::guard("etudiant")->user()->nom_ar }} {{ Auth::guard("etudiant")->user()->prenom_ar }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Genre</td> 
                        <td>{{ Auth::guard("etudiant")->user()->nom_ar }} {{ Auth::guard("etudiant")->user()->genre }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">DATE DE NAISSANCE :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->date_naissance }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">CIN :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->cin_et }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Email :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->email }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Téléphone :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->telephone }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">SÉRIE DU BAC :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->serie_bac }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">ADRESSE (Arabe):</td> 
                        <td>{{ Auth::guard("etudiant")->user()->lieu_naissance_ar }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">ADRESSE 1:</td> 
                        <td>{{ Auth::guard("etudiant")->user()->adresse1 }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">ADRESSE 2:</td> 
                        <td>{{ Auth::guard("etudiant")->user()->adresse2 }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Situation familiale :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->situation_familiale }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Situation de handicap :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->situation_handicap }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Lieu de NAISSANCE (Arabe) :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->lieu_naissance_ar }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Lieu de NAISSANCE  :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->lieu_naissance }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Province :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->province_naissance }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Nationalité  :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->nationnalite }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">PAYS :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->pays }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">N° TELEPHONE :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->telephone }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">CIN du père :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->cin_pere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">CIN de la mère :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->cin_mere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Téléphone du père :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->telephone_pere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Téléphone de la mère :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->telephone_mere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Profession du père :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->profession_pere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Profession de la mère :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->profession_mere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Vivre du père :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->vivre_pere }}</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Vivre de la mère :</td> 
                        <td>{{ Auth::guard("etudiant")->user()->vivre_mere }}</td>
                    </tr>
                </table>
            </div>
            <div class="ac">
            <table border="1">
                <tr style="background-color:  rgb(111, 95, 95);color:white;">
                    <th colspan="2">Diplômes</th>
                </tr>
                <tr>
                    <td>Année d'obtention du baccalauréat :</td>
                    <td>{{ Auth::guard("etudiant")->user()->a_obtention_bac }}</td>
                </tr>
                <tr>
                    <td>Série du baccalauréat :</td>
                    <td>{{ Auth::guard("etudiant")->user()->serie_bac }}</td>
                </tr>
                <tr>
                    <td>Moyenne générale du baccalauréat :</td>
                    <td>{{ Auth::guard("etudiant")->user()->mention_bac }}</td>
                </tr>
                <tr>
                    <td>Type d'établissement :</td>
                    <td>{{ Auth::guard("etudiant")->user()->type_etablissement }}</td>
                </tr>
                <tr>
                    <td>Dans l'enseignement supérieur :</td>
                    <td>{{ Auth::guard("etudiant")->user()->enseignement_superieur }}</td>
                </tr>
                <tr>
                    <td>Province de l'établissement :</td>
                    <td>{{ Auth::guard("etudiant")->user()->province_etablissement }}</td>
                </tr>
                <tr>
                    <td>Dans l'université Mohamed 1er Oujda :</td>
                    <td>{{ Auth::guard("etudiant")->user()->universite_nom }}</td>
                </tr>
            </table>
            {{-- <table border="1">
                <tr style="background-color: rgb(111, 95, 95); color: white;">
                    <th colspan="2">Activités sportives et culturelles</th>
                </tr>
                <tr>
                    <td>Sports individuels :</td>
                    <td>
                            @foreach(json_decode(Auth::guard("etudiant")->user()->sport_individuels) as $sport)
                                <li>{{ $sport }}</li>
                            @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Sports collectifs :</td>
                    <td>
                            @foreach(json_decode(Auth::guard("etudiant")->user()->sports_collectifs) as $sport)
                                <li>{{ $sport }}</li>
                            @endforeach
                    </td>
                </tr>
            </table> --}}
            
            </div>
            <br>
            <p align="center" style="border-top: 1px solid  black;font-size:14px;">0536505471/0536505470 : الهاتف ,  B.P المدرسة الوطنية للعلوم التطبيقية - وجدة مجمع جامعة وجدة 699</p >
        </div>
 
    </div>
</body>
</html>
<script>
    // Function to convert HTML to PDF and automatically download
    function convertToPDF() {
        var element = document.getElementById('content');
        var date = new Date().toLocaleDateString('en-US');
        var opt = {
            margin:       0.5,
            filename:     'document.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };
        html2pdf().from(element).set(opt).save().then(() => {
            window.location.href = '/form4';
        });
    }

    // Automatically trigger PDF conversion and download
    convertToPDF()

    function updateDateTime() {
        var now = new Date();
        
        // Format date (DD/MM/YYYY)
        var date = now.getDate().toString().padStart(2, '0') + '/' + 
                   (now.getMonth() + 1).toString().padStart(2, '0') + '/' + 
                   now.getFullYear();

        // Format time (HH:MM:SS)
        var time = now.getHours().toString().padStart(2, '0') + ':' + 
                   now.getMinutes().toString().padStart(2, '0') + ':' + 
                   now.getSeconds().toString().padStart(2, '0');

        // Update date and time in the HTML
        document.getElementById('current-date').textContent = date;
        document.getElementById('current-time').textContent = time;
    }

    // Update the date and time initially
    updateDateTime();

    // Update the date and time every second
    setInterval(updateDateTime, 1000);
</script>
