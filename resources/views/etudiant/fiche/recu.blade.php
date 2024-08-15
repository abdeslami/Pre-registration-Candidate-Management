<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTML to PDF</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            margin-inline: 5rem;
            padding: 1rem;
        }

        table {
            margin-left: 7rem;
        }

      

        table td+td {
            width: 40%;
        }
    </style>
</head>
<body>
    <div id="content">
        <!-- Your HTML content to be converted to PDF -->
        <div class="header">
            <img src="images/header.jpeg" alt="logo" height="100px" width="100%">
        </div>
        <div class="header">
            <h4 style="border-bottom: 1px solid rgb(111, 95, 95);text-align:center; padding-top:1rem; height:2rem; ">FICHE DE PRE-INSCRIPTION : 2024/2025 ENSAO - Ecole Nationale des Sciences Appliquées - Oujda</h4>
        </div>
        <div class="body">
            <table>
                <tr>
                    <td>CODE NATIONAL ETUDIANT :</td>
                    <td>{{ Auth::guard("etudiant")->user()->cm_ou_cne }}</td>
                </tr>
                <tr>
                    <td>NOM :</td>
                    <td>{{ Auth::guard("etudiant")->user()->nom }}</td>
                </tr>
                <tr>
                    <td>PRENOM :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->prenom }}</td>
                </tr>
                <tr>
                    <td>DATE DE NAISSANCE :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->date_naissance }}</td>
                </tr>
                <tr>
                    <td>CIN :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->cin_et }}</td>
                </tr>
                <tr>
                    <td>ANNEE D'OBTENTION DU BAC :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->a_obtention_bac }}</td>
                </tr>
                <tr>
                    <td>SERIE DU BAC :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->serie_bac }}</td>
                </tr>
                <tr>
                    <td>ADRESSE:</td> 
                    <td>{{ Auth::guard("etudiant")->user()->adresse1 }}</td>
                </tr>
                <tr>
                    <td>PAYS :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->pays }}</td>
                </tr>
                <tr>
                    <td>N° TELEPHONE :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->telephone }}</td>
                </tr>
                <tr>
                    <td>Profession du père :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->profession_pere }}</td>
                </tr>
                <tr>
                    <td>Profession de la mère :</td> 
                    <td>{{ Auth::guard("etudiant")->user()->profession_mere }}</td>
                </tr>
            </table>
        </div>
        <footer>
            <h4>Les filières choisies :</h4>
            <h4 align="center">Sciences et Techniques Pour l'Ingénieur</h4>
            <p align="center" id="datetime">Oujda, <span id="current-date"></span> <span id="current-time"></span></p>
            <h4 style="border-top: 2px solid rgb(111, 95, 95);text-align:center;"><img src="images/footer.jpeg" alt="logo" height="100px" width="100%"></h4>
        </footer>
    </div>
    

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
</body>
</html>
