@extends('../admin.layout')

@section("css/js links")

    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('storage/dossier_scan/' .'page_admin_css/style.css') }}">
    
        <link rel="stylesheet" href="https://unpkg.com/ag-grid/dist/styles/ag-grid.css">
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/ag-grid-community@31.1.1/styles/ag-theme-quartz.css" />
        
        <!-- Load ag-Grid scripts -->
        <script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.noStyle.js"></script>
        <!-- Load Excel export module -->
        <script src="https://cdn.jsdelivr.net/npm/ag-grid-enterprise/dist/ag-grid-enterprise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
@section("content")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
            <div class="card border-0 shadow">
                @if($etudiant->photo)
                <img src="{{ asset('storage/dossier_scan/' .$etudiant->photo) }}" alt="...">
                @else
                <img src="{{ asset('page_admin_image/aucunprofile.PNG') }}" alt="aucun photo personelle">


                @endif
                <div class="card-body p-1-9 p-xl-5">
                    <div class="mb-4">
                        <h3 class="h4 mb-0">{{$etudiant->nom}} {{$etudiant->prenom}}</h3>
                        <span class="text-primary">{{$etudiant->date_naissance}}</span>
                    </div>
                    <ul class="list-unstyled mb-4">
                        <li class="mb-3"><a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i>{{$etudiant->email}}</a></li>
                        <li class="mb-3"><a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>{{$etudiant->telephone}}</a></li>
                        <li><a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>{{$etudiant->province}} {{$etudiant->adresse1}}</a></li>
                    </ul>
                    <form id="delete-form-{{ $etudiant->id }}" action="{{ route('delete_etudiant', ['id' => $etudiant->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this etudiant?');">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="ps-lg-1-6 ps-xl-5">
                <div class="body" >
                    <div class="diplome-activite">
                        <table class="table">
                            <tr style="background-color:  rgb(111, 95, 95);color:white;">
                                <th colspan="2">Informations générales</th>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">CODE NATIONAL ÉTUDIANT :</td>
                                <td>{{ $etudiant->cm_ou_cne }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NOM & PRÉNOM :</td>
                                <td>{{ $etudiant->nom }} {{ $etudiant->prenom }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">NOM & PRÉNOM (Arabe):</td> 
                                <td>{{ $etudiant->nom_ar }} {{ $etudiant->prenom_ar }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Genre</td> 
                                <td>{{ $etudiant->nom_ar }} {{ $etudiant->genre }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">DATE DE NAISSANCE :</td> 
                                <td>{{ $etudiant->date_naissance }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">CIN :</td> 
                                <td>{{ $etudiant->cin_et }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Email :</td> 
                                <td>{{ $etudiant->email }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Téléphone :</td> 
                                <td>{{ $etudiant->telephone }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">SÉRIE DU BAC :</td> 
                                <td>{{ $etudiant->serie_bac }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">ADRESSE (Arabe):</td> 
                                <td>{{ $etudiant->lieu_naissance_ar }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">ADRESSE 1:</td> 
                                <td>{{ $etudiant->adresse1 }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">ADRESSE 2:</td> 
                                <td>{{ $etudiant->adresse2 }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Situation familiale :</td> 
                                <td>{{ $etudiant->situation_familiale }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Situation de handicap :</td> 
                                <td>{{ $etudiant->situation_handicap }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Lieu de NAISSANCE (Arabe) :</td> 
                                <td>{{ $etudiant->lieu_naissance_ar }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Lieu de NAISSANCE  :</td> 
                                <td>{{ $etudiant->lieu_naissance }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Province :</td> 
                                <td>{{ $etudiant->province_naissance }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Nationalité  :</td> 
                                <td>{{ $etudiant->nationnalite }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">PAYS :</td> 
                                <td>{{ $etudiant->pays }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">N° TELEPHONE :</td> 
                                <td>{{ $etudiant->telephone }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">CIN du père :</td> 
                                <td>{{ $etudiant->cin_pere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">CIN de la mère :</td> 
                                <td>{{ $etudiant->cin_mere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Téléphone du père :</td> 
                                <td>{{ $etudiant->telephone_pere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Téléphone de la mère :</td> 
                                <td>{{ $etudiant->telephone_mere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Profession du père :</td> 
                                <td>{{ $etudiant->profession_pere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Profession de la mère :</td> 
                                <td>{{ $etudiant->profession_mere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Vivre du père :</td> 
                                <td>{{ $etudiant->vivre_pere }}</td>
                            </tr>
                            <tr>
                                <td style="font-weight:bold;">Vivre de la mère :</td> 
                                <td>{{ $etudiant->vivre_mere }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="ac">
                    <table class="table">
                        <tr style="background-color:  rgb(111, 95, 95);color:white;">
                            <th colspan="2">Diplômes</th>
                        </tr>
                        <tr>
                            <td>Année d'obtention du baccalauréat :</td>
                            <td>{{ $etudiant->a_obtention_bac }}</td>
                        </tr>
                        <tr>
                            <td>Série du baccalauréat :</td>
                            <td>{{ $etudiant->serie_bac }}</td>
                        </tr>
                        <tr>
                            <td>Moyenne générale du baccalauréat :</td>
                            <td>{{ $etudiant->mention_bac }}</td>
                        </tr>
                        <tr>
                            <td>Type d'établissement :</td>
                            <td>{{ $etudiant->type_etablissement }}</td>
                        </tr>
                        <tr>
                            <td>Dans l'enseignement supérieur :</td>
                            <td>{{ $etudiant->enseignement_superieur }}</td>
                        </tr>
                        <tr>
                            <td>Province de l'établissement :</td>
                            <td>{{ $etudiant->province_etablissement }}</td>
                        </tr>
                        <tr>
                            <td>Dans l'université Mohamed 1er Oujda :</td>
                            <td>{{ $etudiant->universite_nom }}</td>
                        </tr>
                        <tr class="">
                            <td scope="row">Photo Personnel</td>
                            <td>
                                @if ($etudiant->photo!=null)
                                    <a href="{{ asset('storage/dossier_scan/' .$etudiant->photo) }}" target="_blank">Ouvrir le PDF</a>
                                @else
                                    Aucun document trouvé
                                @endif
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">Document Bac</td>
                            <td>
                                @if ($etudiant->scan_bac!=null)
                                    <a href="{{ asset('storage/dossier_scan/' .$etudiant->scan_bac) }}" target="_blank">Ouvrir le PDF</a>
                                @else
                                    Aucun document trouvé
                                @endif
                            </td>
                        </tr>
                        <tr class="">
                            <td scope="row">Document Relvi note</td>
                            <td>
                                @if ($etudiant->relvi_note!=null)
                                    <a href="{{ asset('storage/dossier_scan/' .$etudiant->relvi_note) }}" target="_blank">Ouvrir le PDF</a>
                                @else
                                    Aucun document trouvé
                                @endif
                            </td>
                        </tr>
                        


                    </table>
                    <table class="table">
                        <tr style="background-color: rgb(111, 95, 95); color: white;">
                            <th colspan="2">Activités sportives et culturelles</th>
                        </tr>
                        <tr>
                            <td>Sports individuels :</td>
                            @if ($etudiant->sport_individuels!=null)
                            <td>
                                @foreach(json_decode($etudiant->sport_individuels) as $sport)
                                    <li>{{ $sport }}</li>
                                @endforeach
                        </td>
                            @else
                            <td>aucun</td>
                                
                            @endif
                           
                        </tr>
                        <tr>
                            <td>Sports collectifs :</td>
                            @if ($etudiant->sports_collectifs!=null)
                            <td>
                                @foreach(json_decode($etudiant->sports_collectifs) as $sport)
                                    <li>{{ $sport }}</li>
                                @endforeach
                        </td>
                            @else
                            <td>aucun</td>
                                
                            @endif
                           
                        </tr>
                       
                      <tr>
                              <td >Arts Plastiques</td>

                              <td  >{{$etudiant->culturelles_arts_plastiques}}</td>

                            </tr>

                            <tr>
                                <td >Théâtre</td>
  
                                <td  >{{$etudiant->culturelles_theatre}}</td>
  
                              </tr>
                              <tr>
                                <td >Audiovisuel</td>
  
                                <td  >{{$etudiant->culturelles_audiovisuel}}</td>
  
                              </tr>
                              <tr>
                                <td >Échecs</td>
  
                                <td  >{{$etudiant->culturelles_echecs}}</td>
  
                              </tr>
                              <tr>
                                <td >Écriture</td>
  
                                <td  >{{$etudiant->culturelles_ecriture}}</td>
  
                              </tr>
                  
                    </table>
            
              </div>
              
    </div>
</div>

   
@endsection
