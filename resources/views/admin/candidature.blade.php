@extends('admin.layout')
@section('content')
@if (Session::has("success"))
    <div
        class="alert alert-success"
        role="alert"
    >
        <strong>{{Session::get('success')}}</strong> 
    </div>
    
@endif
@if (Session::has("error"))
    <div
        class="alert alert-danger"
        role="alert"
    >
        <strong>{{Session::get('error')}}</strong> 
    </div>
    
@endif
@error('file')
       {{$message}}
@enderror
    
<style>
    table thead tr th {
        font-size: 10px !important;
        width: auto !important;
    }

    .selected {
        background-color: lightblue;
    }
    
    .inputupload {
            border: 0;
            clip: rect(1px, 1px, 1px, 1px);
            height: 1px; 
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
        }
</style>
<div class="d-flex justify-content-evenly mb-5 ">
<a href="{{ route('download.template') }}" class="btn btn-primary">Télécharger Template</a>

<button class="btn btn-success" onclick="exportToExcel()">Export Selected to Excel</button>

<input class="form-control" type="text" id="filterInput" placeholder="Filter donne table">
<form id="uploadForm" action="{{ route('importEtudiants') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file" class="btn btn-success ">
        Import candidature Excel 
        <input type="file" name="file" id="file" class="inputupload"  onchange="submitForm()">
    </label>
</form>
<form id="uploadForm" action="{{ route('delete_etudiant_all') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit">Supprimer Tous etudiant</button>
</form>
</div>
<div class="table-responsive">

    

    <table id="dynamic-table" class="table">
        <thead>
            <tr>
                <th>Select</th>
                <th>CIN <input type="text" id="filterCIN" placeholder="Filter"></th>
                <th>Nom & Prenom <input type="text" id="filterName" placeholder="Filter"></th>
                <th>Date de Naissance <input type="text" id="filterDOB" placeholder="Filter"></th>
                <th>Sexe <input type="text" id="filterSex" placeholder="Filter"></th>
                <th>CM OU CNE <input type="text" id="filterCMCNE" placeholder="Filter"></th>
                <th>Telephone <input type="text" id="filterTelephone" placeholder="Filter"></th> <!-- Corrected typo -->
                <th>Province naissance <input type="text" id="filterProvince" placeholder="Filter"></th>
                <th>Nationnalite <input type="text" id="filterNationalite" placeholder="Filter"></th>
                <th>Pays <input type="text" id="filterPays" placeholder="Filter"></th>
                <th>Adresse <input type="text" id="filterAdresse" placeholder="Filter"></th>
                <th>Code Postal <input type="text" id="filterCodePostal" placeholder="Filter"></th>
                <th>Annee Bac <input type="text" id="filterAnneeBac" placeholder="Filter"></th>
                <th>Serie bac <input type="text" id="filterSerieBac" placeholder="Filter"></th>
                <th>Mention de Bac <input type="text" id="filterMentionBac" placeholder="Filter"></th>
                <th>Type etablissement <input type="text" id="filterTypeEtablissement" placeholder="Filter"></th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
     function submitForm() {
                    document.getElementById('uploadForm').submit();
                }
    document.addEventListener("DOMContentLoaded", function () {
        const etudiantData = <?php echo json_encode($etudiant); ?>;
        const tableBody = document.querySelector("#dynamic-table tbody");
        const filterInput = document.querySelector("#filterInput");
        const filterCIN = document.querySelector("#filterCIN");
        const filterName = document.querySelector("#filterName");
        const filterDOB = document.querySelector("#filterDOB");
        const filterSex = document.querySelector("#filterSex");
        const filterCMCNE = document.querySelector("#filterCMCNE");
        const filterTelephone = document.querySelector("#filterTelephone");
        const filterProvince = document.querySelector("#filterProvince");
        const filterNationalite = document.querySelector("#filterNationalite");
        const filterPays = document.querySelector("#filterPays");
        const filterAdresse = document.querySelector("#filterAdresse");
        const filterCodePostal = document.querySelector("#filterCodePostal");
        const filterAnneeBac = document.querySelector("#filterAnneeBac");
        const filterSerieBac = document.querySelector("#filterSerieBac");
        const filterMentionBac = document.querySelector("#filterMentionBac");
        const filterTypeEtablissement = document.querySelector("#filterTypeEtablissement");

        etudiantData.forEach(item => {
            const row = createRow(item);
            tableBody.appendChild(row);
        });

        filterInput.addEventListener("input", handleFilterInput);
        filterCIN.addEventListener("input", handleFilterInput);
        filterName.addEventListener("input", handleFilterInput);
        filterDOB.addEventListener("input", handleFilterInput);
        filterSex.addEventListener("input", handleFilterInput);
        filterCMCNE.addEventListener("input", handleFilterInput);
        filterTelephone.addEventListener("input", handleFilterInput);
        filterProvince.addEventListener("input", handleFilterInput);
        filterNationalite.addEventListener("input", handleFilterInput);
        filterPays.addEventListener("input", handleFilterInput);
        filterAdresse.addEventListener("input", handleFilterInput);
        filterCodePostal.addEventListener("input", handleFilterInput);
        filterAnneeBac.addEventListener("input", handleFilterInput);
        filterSerieBac.addEventListener("input", handleFilterInput);
        filterMentionBac.addEventListener("input", handleFilterInput);
        filterTypeEtablissement.addEventListener("input", handleFilterInput);

        const filterInputs = document.querySelectorAll('input[type="text"]');
        filterInputs.forEach(input => {
            input.addEventListener("input", handleFilterInput);
        });

        function handleFilterInput() {
            const columnIndex = Array.from(this.parentNode.parentNode.children).indexOf(this.parentNode);
            const filterValue = this.value.toLowerCase();
            const rows = tableBody.querySelectorAll("tr");
            rows.forEach(row => {
                const cellValue = row.querySelectorAll("td")[columnIndex].textContent.toLowerCase();
                if (cellValue.includes(filterValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }

        function createRow(item) {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td><input type="checkbox" onclick="toggleRowSelection(this)"></td>
                <td>${item.cin_et}</td>
                <td>${item.nom} ${item.prenom}</td>
                <td>${item.date_naissance}</td>
                <td>${item.sexe}</td>
                <td>${item.cm_ou_cne}</td>
                <td>${item.telephone}</td>
                <td>${item.province_etablissement}</td>
                <td>${item.nationnalite}</td>
                <td>${item.pays}</td>
                <td>${item.adresse1}</td>
                <td>${item.code_postal}</td>
                <td>${item.a_obtention_bac}</td>
                <td>${item.serie_bac}</td>
                <td>${item.mention_bac}</td>
                <td>${item.type_etablissement}</td>
                <td><a href="etudiant/${item.id}" >Details<a></td>

            `;
            return row;
        }
    });

    function toggleRowSelection(checkbox) {
        const row = checkbox.parentNode.parentNode;
        if (checkbox.checked) {
            row.classList.add("selected");
        } else {
            row.classList.remove("selected");
        }
    }

    function exportToExcel() {
        const selectedRows = document.querySelectorAll("#dynamic-table tbody tr.selected");
        if (selectedRows.length === 0) {
            alert("No rows selected for export!");
            return;
        }

        let excelData = "";

        // Adding headers
        const headers = Array.from(document.querySelectorAll("#dynamic-table thead th")).map(th => decodeURIComponent(th.textContent)); // Decode the header text content
        excelData += headers.join("\t") + "\n";

        // Adding selected rows
        selectedRows.forEach(row => {
            const rowData = [];
            row.querySelectorAll("td").forEach(cell => {
                // Properly encode the text content
                const encodedText = encodeURIComponent(cell.textContent);
                rowData.push(decodeURIComponent(encodedText)); // Decode the text content before adding it
            });
            excelData += rowData.join("\t") + "\n";
        });

        // Create a blob from the data
        const blob = new Blob([excelData], { type: "application/vnd.ms-excel" });

        // Create a link element and trigger the download
        const link = document.createElement("a");
        link.href = window.URL.createObjectURL(blob);
        link.download = "exported_data.xls";
        link.click();
    }
</script>

@endsection
