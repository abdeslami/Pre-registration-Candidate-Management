

<link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('page_admin_css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/css/intlTelInput.css">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.2/js/intlTelInput.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>

<link rel="stylesheet" href="{{ asset('form/form.css') }}">

<section class="multi_step_form">  
  <a style="float: right;text-decoration:none;" href="{{route('logout.etudiant')}}">Déconnexion</a>
    <form id="msform" action="{{route('postform1')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="title">
            <h2>Pré-inscription</h2>
            <p>Remplissez le formulaire pour passer le concours écrit</p>
        </div>
        <ul id="progressbar">
            <li class="active">Information</li>  
            <li>Type Diplome</li> 
            <li>Scan</li>
            <li>Finish</li>
        </ul>

        <fieldset>
            <h3>Setup your account</h3>
            <h6>Please fill in the following information</h6> 
            <div class="form-row mt-4">
              <div class="col-12 ">
                @if (Auth::guard("etudiant")->user()->photo)
                  
                <img style="width: 10rem;border-radius:50%;height:10rem;" src="{{ asset('storage/dossier_scan/' .Auth::guard("etudiant")->user()->photo) }}"  > 
                <input class=" form-control" value="{{Auth::guard("etudiant")->user()->photo}}" type="file" name="photo" accept="image/*"  />
                @else
                <input class=" form-control" value="{{Auth::guard("etudiant")->user()->photo}}" type="file" name="photo" accept="image/*"  required/>

                @endif

                 
                @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>

                @enderror
                </div>
              </div>
            </div>
            <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Nom :*</label>
                  <input class="form-control" value="{{Auth::guard("etudiant")->user()->nom}}"  name="nom" type="text" placeholder="entre votre nom" required/>
                  @error('nom')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                  <label for="form-label" style="float: left">Prenom :*</label>

                  <input class=" form-control" value="{{Auth::guard("etudiant")->user()->prenom}}"  name="prenom" type="text" placeholder="entre votre prenom" required/>
                  @error('prenom')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
              </div>
              <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: right">:*اسم </label>

                  <input class=" form-control" id="nom-ar"  value="{{Auth::guard("etudiant")->user()->nom_ar}}" name="nom_ar" type="text" placeholder="ادخل اسم الشخصي" required/>
                  @error('nom_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                  <label for="form-label" style="float: right">:* اسم العائلي  </label>

                  <input class=" form-control" " name="prenom_ar"value="{{Auth::guard("etudiant")->user()->prenom_ar}}"  type="text" placeholder="ادخل اسم العائلي" required/>
                  @error('prenom_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
              </div>
              <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left"> Date naissance :*   </label>

                  <input class=" form-control" name="date_naissance" value="{{Auth::guard("etudiant")->user()->date_naissance}}"  type="date" placeholder="Entrez notre date naissance " required/>
                  @error('date_naissance')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
                <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                  <label for="form-label" style="float: left"> Date lieu naissance :*   </label>

                  <input class=" form-control" name="lieu_naissance" value="{{Auth::guard("etudiant")->user()->lieu_naissance}}"  type="text"  placeholder="Entrez notre lieu naissance " required/>
                  @error('lieu_naissance')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>
                
              </div>
              <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left"> *:  العنوان السكن  </label>

                    <input class=" form-control" id="adresse-ar" value="{{Auth::guard("etudiant")->user()->lieu_naissance_ar}}"  name="lieu_naissance_ar" type="text" placeholder="ادخل العنوان السكن الحالي  " required/>
                    @error('lieu_naissance_ar')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                  <label for="form-label" style="float: left"> Province naissance  *:     </label>

                    <select class=" form-control" type="date" value="{{Auth::guard("etudiant")->user()->province_naissance}}"  name="province_naissance"  required>
                      <option value="AGADIR IDA-TANANE">AGADIR IDA-TANANE</option>
    <option value="AIN CHOCK HAY HASSANI">AIN CHOCK HAY HASSANI</option>
    <option value="AIN SEBAA HAY MOHAMMEDI">AIN SEBAA HAY MOHAMMEDI</option>
    <option value="AL FIDA DERB SULTAN">AL FIDA DERB SULTAN</option>
    <option value="AL HAOUZ">AL HAOUZ</option>
    <option value="AL HOCEIMA">AL HOCEIMA</option>
    <option value="ASSA-ZAG">ASSA-ZAG</option>
    <option value="AZILAL">AZILAL</option>
    <option value="BEN MSICK MEDIOUNA">BEN MSICK MEDIOUNA</option>
    <option value="BENI MELLAL">BENI MELLAL</option>
    <option value="BENSLIMANE">BENSLIMANE</option>
    <option value="BERKANE">BERKANE</option>
    <option value="BOUJDOUR">BOUJDOUR</option>
    <option value="BOULEMANE">BOULEMANE</option>
    <option value="Berrechid">Berrechid</option>
    <option value="CASABLANCA ANFA">CASABLANCA ANFA</option>
    <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
    <option value="CHICHAOUA">CHICHAOUA</option>
    <option value="CHTOUKA-AIT-BAHA">CHTOUKA-AIT-BAHA</option>
    <option value="Driouch">Driouch</option>
    <option value="EL JADIDA">EL JADIDA</option>
    <option value="EL MADIEQ">EL MADIEQ</option>
    <option value="EL-HAJEB">EL-HAJEB</option>
    <option value="ERRACHIDIA">ERRACHIDIA</option>
    <option value="ES-SEMARA">ES-SEMARA</option>
    <option value="ESSAOUIRA">ESSAOUIRA</option>
    <option value="ETRANGER">ETRANGER</option>
    <option value="FAHS BNI MAKADA">FAHS BNI MAKADA</option>
    <option value="FES">FES</option>
    <option value="FES-MEDINA">FES-MEDINA</option>
    <option value="FIGUIG">FIGUIG</option>
    <option value="Fquih Ben Salah">Fquih Ben Salah</option>
    <option value="GUELMIM">GUELMIM</option>
    <option value="Guercif">Guercif</option>
    <option value="H-Hassani">H-Hassani</option>
    <option value="IFRANE">IFRANE</option>
    <option value="INZEGANE-AIT-MELLOUL">INZEGANE-AIT-MELLOUL</option>
    <option value="JERADA">JERADA</option>
    <option value="KELAAT  ESSRAGHNA">KELAAT  ESSRAGHNA</option>
    <option value="KENITRA">KENITRA</option>
    <option value="KHEMISSET">KHEMISSET</option>
    <option value="KHENIFRA">KHENIFRA</option>
    <option value="KHOURIBGA">KHOURIBGA</option>
    <option value="LAAYOUNE">LAAYOUNE</option>
    <option value="LARACHE">LARACHE</option>
    <option value="MAROC">MAROC</option>
    <option value="MAROC MILITAIRE">MAROC MILITAIRE</option>
    <option value="MARRAKECH">MARRAKECH</option>
    <option value="MARRAKECH-MENARA">MARRAKECH-MENARA</option>
    <option value="MECHOUAR(CASA)">MECHOUAR(CASA)</option>
    <option value="MEKNES">MEKNES</option>
    <option value="MEKNES-EL-MENZEH">MEKNES-EL-MENZEH</option>
    <option value="MOHAMMADIA">MOHAMMADIA</option>
    <option value="MOULAY RCHID SIDI OTMANE">MOULAY RCHID SIDI OTMANE</option>
    <option value="Midelt" selected="selected">Midelt</option>
    <option value="NADOR">NADOR</option>
    <option value="NOUASSER">NOUASSER</option>
    <option value="OUARZAZATE">OUARZAZATE</option>
    <option value="OUED ED DAHAB">OUED ED DAHAB</option>
    <option value="OUJDA-ANGAD">OUJDA-ANGAD</option>
    <option value="Ouezzane">Ouezzane</option>
    <option value="Ouezzane">Ouezzane</option>
    <option value="RABAT">RABAT</option>
    <option value="S-Ifni">S-Ifni</option>
    <option value="SAFI">SAFI</option>
    <option value="SALA ALJADIDA">SALA ALJADIDA</option>
    <option value="SALE BOUKNADEL">SALE BOUKNADEL</option>
    <option value="SEFROU">SEFROU</option>
    <option value="SETTAT">SETTAT</option>
    <option value="SIDI BERNOUSSI ZENATA">SIDI BERNOUSSI ZENATA</option>
    <option value="SIDI KACEM">SIDI KACEM</option>
    <option value="SIDI YOUSSEF BEN ALI">SIDI YOUSSEF BEN ALI</option>
    <option value="SKHIRATE-TEMARA">SKHIRATE-TEMARA</option>
    <option value="Sidi Bennour">Sidi Bennour</option>
    <option value="Sidi Slimane">Sidi Slimane</option>
    <option value="Sidi Slimane">Sidi Slimane</option>
    <option value="Sidi Yahya">Sidi Yahya</option>
    <option value="TAN-TAN">TAN-TAN</option>
    <option value="TANGER">TANGER</option>
    <option value="TAOUNATE">TAOUNATE</option>
    <option value="TAOURIRT">TAOURIRT</option>
    <option value="TAROUDANT">TAROUDANT</option>
    <option value="TATA">TATA</option>
    <option value="TAZA">TAZA</option>
    <option value="TETOUAN">TETOUAN</option>
    <option value="TIZNIT">TIZNIT</option>
    <option value="Tarfaya">Tarfaya</option>
    <option value="Tinghir">Tinghir</option>
    <option value="Youssoufia">Youssoufia</option>
    <option value="ZAGORA">ZAGORA</option>
    <option value="ZOUAGHA - MOULAY-YACOUB">ZOUAGHA - MOULAY-YACOUB</option>
                    </select>
                     @error('province_naissance')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left"> Sexe  *:     </label><br>

                    <input  type="radio"  value="homme"  value="{{Auth::guard("etudiant")->user()->sexe}}"  name="sexe"   checked/>homme
                    <input  type="radio"  value="femme" value="{{Auth::guard("etudiant")->user()->sexe}}"  name="sexe"   />femme
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Situation  handicap  *:     </label>
                    <br>

                    <input  type="radio"  value="non" value="{{Auth::guard("etudiant")->user()->situation_handicap}}"  name="situation_handicap"  checked  />Non
                    <input  type="radio"  value="oui" value="{{Auth::guard("etudiant")->user()->situation_handicap}}"  name="situation_handicap"  />Oui
                    </div>
                  
                 
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Situation familiale *:  </label>

                    <select class=" form-control" value="{{Auth::guard("etudiant")->user()->situation_familiale}}"  type="text" name="situation_familiale"  required>
                      <option value="DIVORCÉ(E)">DIVORCÉ(E)</option>
                      <option value="VEUF(VE)">VEUF(VE)</option>
                      <option value="MARIÉ(E)">MARIÉ(E)</option>
                      <option value="CÉLIBATAIRE" selected="selected">CÉLIBATAIRE</option>

                    </select>
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Nationnalite :*     </label>

                      <select class=" form-control" value="{{Auth::guard("etudiant")->user()->nationnalite}}"  type="text" name="nationnalite"  required>
                        <option value="AFGHANISTAN">AFGHANISTAN</option>
                        <option value="AFRIQUE DU SUD">AFRIQUE DU SUD</option>
                        <option value="ALBANIE">ALBANIE</option>
                        <option value="ALGERIE">ALGERIE</option>
                        <option value="ALLEMAGNE">ALLEMAGNE</option>
                        <option value="ANDORRE">ANDORRE</option>
                        <option value="ANGOLA">ANGOLA</option>
                        <option value="ANTIGUA ET BARBUDA">ANTIGUA ET BARBUDA</option>
                        <option value="ANTILLES NEERLANDAISES">ANTILLES NEERLANDAISES</option>
                        <option value="ARABIE SAOUDITE">ARABIE SAOUDITE</option>
                        <option value="ARGENTINE">ARGENTINE</option>
                        <option value="ARMENIE">ARMENIE</option>
                        <option value="ARUBA">ARUBA</option>
                        <option value="AUSTRALIE">AUSTRALIE</option>
                        <option value="AUTRES pays">AUTRES pays</option>
                        <option value="AUTRICHE">AUTRICHE</option>
                        <option value="AZERBAIDJAN">AZERBAIDJAN</option>
                        <option value="BAHAMAS">BAHAMAS</option>
                        <option value="BAHREIN">BAHREIN</option>
                        <option value="BANGLADESH">BANGLADESH</option>
                        <option value="BARBADE">BARBADE</option>
                        <option value="BELGIQUE">BELGIQUE</option>
                        <option value="BELIZE">BELIZE</option>
                        <option value="BENIN">BENIN</option>
                        <option value="BERMUDES">BERMUDES</option>
                        <option value="BHOUTAN">BHOUTAN</option>
                        <option value="BIELORUSSIE">BIELORUSSIE</option>
                        <option value="BOLIVIE">BOLIVIE</option>
                        <option value="BOSNIE HERZEGOVINE">BOSNIE HERZEGOVINE</option>
                        <option value="BOTSWANA">BOTSWANA</option>
                        <option value="BRESIL">BRESIL</option>
                        <option value="BRUNEI">BRUNEI</option>
                        <option value="BULGARIE">BULGARIE</option>
                        <option value="BURKINA FASO">BURKINA FASO</option>
                        <option value="BURUNDI">BURUNDI</option>
                        <option value="CAMBODGE">CAMBODGE</option>
                        <option value="CAMEROUN">CAMEROUN</option>
                        <option value="CANADA">CANADA</option>
                        <option value="CAP VERT">CAP VERT</option>
                        <option value="CENTRAFRIQUE">CENTRAFRIQUE</option>
                        <option value="CHAGOS(ARCHIPEL)">CHAGOS(ARCHIPEL)</option>
                        <option value="CHILI">CHILI</option>
                        <option value="CHINE POPULAIRE">CHINE POPULAIRE</option>
                        <option value="CHYPRE">CHYPRE</option>
                        <option value="COLOMBIE">COLOMBIE</option>
                        <option value="COMORES">COMORES</option>
                        <option value="CONGO">CONGO</option>
                        <option value="COREE DU NORD">COREE DU NORD</option>
                        <option value="COREE DU SUD">COREE DU SUD</option>
                        <option value="COSTA RICA">COSTA RICA</option>
                        <option value="COTE D'IVOIRE">COTE D'IVOIRE</option>
                        <option value="CROATIE">CROATIE</option>
                        <option value="CUBA">CUBA</option>
                        <option value="DANEMARK">DANEMARK</option>
                        <option value="DJIBOUTI">DJIBOUTI</option>
                        <option value="DOMINIQUE">DOMINIQUE</option>
                        <option value="EGYPTE">EGYPTE</option>
                        <option value="EL SALVADOR">EL SALVADOR</option>
                        <option value="EMIRATS ARABES UNIS">EMIRATS ARABES UNIS</option>
                        <option value="EQUATEUR">EQUATEUR</option>
                        <option value="ERYTHREE">ERYTHREE</option>
                        <option value="ESPAGNE">ESPAGNE</option>
                        <option value="ESTONIE">ESTONIE</option>
                        <option value="ETATS UNIS">ETATS UNIS</option>
                        <option value="ETHIOPIE">ETHIOPIE</option>
                        <option value="EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I">EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I</option>
                        <option value="EXFRANCE">EXFRANCE</option>
                        <option value="FIDJI">FIDJI</option>
                        <option value="FINLANDE">FINLANDE</option>
                        <option value="FRANCE">FRANCE</option>
                        <option value="GABON">GABON</option>
                        <option value="GAMBIE">GAMBIE</option>
                        <option value="GEORGIE">GEORGIE</option>
                        <option value="GHANA">GHANA</option>
                        <option value="GIBRALTAR">GIBRALTAR</option>
                        <option value="GRANDE BRETAGNE">GRANDE BRETAGNE</option>
                        <option value="GRECE">GRECE</option>
                        <option value="GRENADE ETGRENADINES">GRENADE ETGRENADINES</option>
                        <option value="GUADELOUPE">GUADELOUPE</option>
                        <option value="GUAM">GUAM</option>
                        <option value="GUATEMALA">GUATEMALA</option>
                        <option value="GUINEE">GUINEE</option>
                        <option value="GUINEE BISSAU">GUINEE BISSAU</option>
                        <option value="GUINEE EQUATORIALE">GUINEE EQUATORIALE</option>
                        <option value="GUYANA">GUYANA</option>
                        <option value="GUYANE">GUYANE</option>
                        <option value="HAITI">HAITI</option>
                        <option value="HONDURAS">HONDURAS</option>
                        <option value="HONG KONG">HONG KONG</option>
                        <option value="HONGRIE">HONGRIE</option>
                        <option value="ILE MARSHALL">ILE MARSHALL</option>
                        <option value="ILE MAURICE">ILE MAURICE</option>
                        <option value="ILES CAIMAN">ILES CAIMAN</option>
                        <option value="ILES COOK">ILES COOK</option>
                        <option value="ILES DU PACIFIQUE">ILES DU PACIFIQUE</option>
                        <option value="ILES MALOUINES">ILES MALOUINES</option>
                        <option value="ILES VIERGES (ETATS UNIS)">ILES VIERGES (ETATS UNIS)</option>
                        <option value="ILES VIERGES (ROYAUME UNIS)">ILES VIERGES (ROYAUME UNIS)</option>
                        <option value="INDE">INDE</option>
                        <option value="INDONESIE">INDONESIE</option>
                        <option value="IRAK">IRAK</option>
                        <option value="IRAN">IRAN</option>
                        <option value="IRLANDE">IRLANDE</option>
                        <option value="ISLANDE">ISLANDE</option>
                        <option value="ISRAEL">ISRAEL</option>
                        <option value="ITALIE">ITALIE</option>
                        <option value="JAMAIQUE">JAMAIQUE</option>
                        <option value="JAPON">JAPON</option>
                        <option value="JORDANIE">JORDANIE</option>
                        <option value="KAZAKHSTAN">KAZAKHSTAN</option>
                        <option value="KENYA">KENYA</option>
                        <option value="KIRGHISTAN">KIRGHISTAN</option>
                        <option value="KIRIBATI">KIRIBATI</option>
                        <option value="KOWEIT">KOWEIT</option>
                        <option value="LA REUNION">LA REUNION</option>
                        <option value="LAOS">LAOS</option>
                        <option value="LESOTHO">LESOTHO</option>
                        <option value="LETTONIE">LETTONIE</option>
                        <option value="LIBAN">LIBAN</option>
                        <option value="LIBERIA">LIBERIA</option>
                        <option value="LIBYE">LIBYE</option>
                        <option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                        <option value="LITHUANIE">LITHUANIE</option>
                        <option value="LUXEMBOURG">LUXEMBOURG</option>
                        <option value="MACAO">MACAO</option>
                        <option value="MADAGASCAR">MADAGASCAR</option>
                        <option value="MALAISIE">MALAISIE</option>
                        <option value="MALAWI">MALAWI</option>
                        <option value="MALDIVES">MALDIVES</option>
                        <option value="MALI">MALI</option>
                        <option value="MALTE">MALTE</option>
                        <option value="MAROC" selected="selected">MAROC</option>
                        <option value="MARTINIQUE">MARTINIQUE</option>
                        <option value="MAURITANIE">MAURITANIE</option>
                        <option value="MEXIQUE">MEXIQUE</option>
                        <option value="MICRONESIE">MICRONESIE</option>
                        <option value="MOLDAVIE">MOLDAVIE</option>
                        <option value="MONACO">MONACO</option>
                        <option value="MONGOLIE">MONGOLIE</option>
                        <option value="MOZAMBIQUE">MOZAMBIQUE</option>
                        <option value="MYANMAR">MYANMAR</option>
                        <option value="NAMIBIE">NAMIBIE</option>
                        <option value="NAURU">NAURU</option>
                        <option value="NEPAL">NEPAL</option>
                        <option value="NICARAGUA">NICARAGUA</option>
                        <option value="NIGER">NIGER</option>
                        <option value="NIGERIA">NIGERIA</option>
                        <option value="NIOUE">NIOUE</option>
                        <option value="NORVEGE">NORVEGE</option>
                        <option value="NOUVELLE CALEDONIE">NOUVELLE CALEDONIE</option>
                        <option value="NOUVELLE ZELANDE">NOUVELLE ZELANDE</option>
                        <option value="OMAN">OMAN</option>
                        <option value="OUGANDA">OUGANDA</option>
                        <option value="OUZBEKISTAN">OUZBEKISTAN</option>
                        <option value="PAKISTAN">PAKISTAN</option>
                        <option value="PALESTINE">PALESTINE</option>
                        <option value="PANAMA">PANAMA</option>
                        <option value="PAPOUASIE NOUVELLE GUINEE">PAPOUASIE NOUVELLE GUINEE</option>
                        <option value="PARAGUAY">PARAGUAY</option>
                        <option value="PAY BAS">PAY BAS</option>
                        <option value="PEROU">PEROU</option>
                        <option value="PHILIPPINES">PHILIPPINES</option>
                        <option value="POLOGNE">POLOGNE</option>
                        <option value="POLYNESIE FRANCAISE">POLYNESIE FRANCAISE</option>
                        <option value="PORTO RICO">PORTO RICO</option>
                        <option value="PORTUGAL">PORTUGAL</option>
                        <option value="QATAR">QATAR</option>
                        <option value="REPUBLIQUE DES ILES PALAOS">REPUBLIQUE DES ILES PALAOS</option>
                        <option value="REPUBLIQUE TCHEQUE">REPUBLIQUE TCHEQUE</option>
                        <option value="ROUMANIE">ROUMANIE</option>
                        <option value="RUSSIE">RUSSIE</option>
                        <option value="RWANDA">RWANDA</option>
                        <option value="SAINT DOMINGUE">SAINT DOMINGUE</option>
                        <option value="SAINT KITTS ET NEVIS">SAINT KITTS ET NEVIS</option>
                        <option value="SAINT MARIN">SAINT MARIN</option>
                        <option value="SAINT SIEGE">SAINT SIEGE</option>
                        <option value="SAINT VINCENT">SAINT VINCENT</option>
                        <option value="SAINTE LUCIE">SAINTE LUCIE</option>
                        <option value="SALOMON">SALOMON</option>
                        <option value="SAMOA AMERICAINES">SAMOA AMERICAINES</option>
                        <option value="SAMOA OCCIDENTALES">SAMOA OCCIDENTALES</option>
                        <option value="SAO TOME ET PRINCIPE">SAO TOME ET PRINCIPE</option>
                        <option value="SENEGAL">SENEGAL</option>
                        <option value="SEYCHELLES">SEYCHELLES</option>
                        <option value="SIERRA LEONE">SIERRA LEONE</option>
                        <option value="SINGAPOUR">SINGAPOUR</option>
                        <option value="SLOVAQUIE">SLOVAQUIE</option>
                        <option value="SLOVENIE">SLOVENIE</option>
                        <option value="SOMALIE">SOMALIE</option>
                        <option value="SOUDAN">SOUDAN</option>
                        <option value="SRI LANKA">SRI LANKA</option>
                        <option value="ST CHRISTOPHE NIEVES">ST CHRISTOPHE NIEVES</option>
                        <option value="STE HELENE">STE HELENE</option>
                        <option value="SUEDE">SUEDE</option>
                        <option value="SUISSE">SUISSE</option>
                        <option value="SURINAM">SURINAM</option>
                        <option value="SWAZILAND">SWAZILAND</option>
                        <option value="SYRIE">SYRIE</option>
                        <option value="TADJIKISTAN">TADJIKISTAN</option>
                        <option value="TAIWAN">TAIWAN</option>
                        <option value="TANZANIE">TANZANIE</option>
                        <option value="TCHAD">TCHAD</option>
                        <option value="THAILANDE">THAILANDE</option>
                        <option value="TOGO">TOGO</option>
                        <option value="TONGA OU FRIENDLY">TONGA OU FRIENDLY</option>
                        <option value="TRINITE ET TOBAGO">TRINITE ET TOBAGO</option>
                        <option value="TUNISIE">TUNISIE</option>
                        <option value="TURKMENISTAN">TURKMENISTAN</option>
                        <option value="TURQUIE">TURQUIE</option>
                        <option value="TUVALU">TUVALU</option>
                        <option value="UKRAINE">UKRAINE</option>
                        <option value="URUGUAY">URUGUAY</option>
                        <option value="VANUATU">VANUATU</option>
                        <option value="VATICAN">VATICAN</option>
                        <option value="VENEZUELA">VENEZUELA</option>
                        <option value="VIETNAM">VIETNAM</option>
                        <option value="YEMEN">YEMEN</option>
                        <option value="YOUGOSLAVIE">YOUGOSLAVIE</option>
                        <option value="ZAIRE">ZAIRE</option>
                        <option value="ZAMBIE">ZAMBIE</option>
                        <option value="ZIMBABWE">ZIMBABWE</option>
                      </select>
                    </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Adresse 1 *:  </label>

                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->adresse1}}"  name="adresse1"  type="text" placeholder="Entrez notre Adresse 1" required/>
                    @error('adresse1')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Adresse 2 *:  </label>

                      <input class=" form-control" value="{{Auth::guard("etudiant")->user()->adresse2}}"  name="adresse2"  type="text" placeholder="Entrez notre Adresse 2" />
                  </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Code postal*:  </label>

                    <select class=" form-control" value="{{Auth::guard("etudiant")->user()->code_postal}}"  name="code_postal"  type="text"  required>
                      <option value="10000">10000 - Rabat</option>
<option value="10002">10002 - Rabat chellah</option>
<option value="10003">10003 - Rabat dar el hadith</option>
<option value="10004">10004 - Rabat mechouar</option>
<option value="10005">10005 - Rabat tour hassan</option>
<option value="10006">10006 - Rabat cheques postaux</option>
<option value="10007">10007 - Rabat ennahda</option>
<option value="10008">10008 - Rabat ocean</option>
<option value="10050">10050 - Rabat akkari</option>
<option value="10053">10053 - Rabat yacoub el mansour</option>
<option value="10054">10054 - Rabat hay el khair</option>
<option value="10100">10100 - Rabat madinat al irfane</option>
<option value="10102">10102 - Rabat nations unies</option>
<option value="10103">10103 - Rabat al inbiat</option>
<option value="10104">10104 - Rabat ryad</option>
<option value="10105">10105 - Rabat souissi</option>
<option value="10106">10106 - Rabat agdal</option>
<option value="10150">10150 - Rabat al massira</option>
<option value="11000">11000 - Sale</option>
<option value="11002">11002 - Sale bettana</option>
<option value="11003">11003 - Sale hay essalam</option>
<option value="11004">11004 - Sale kariat oulad moussa</option>
<option value="11005">11005 - Sale medina</option>
<option value="11006">11006 - Sale sidi moussa</option>
<option value="11007">11007 - Sale bab chaafa</option>
<option value="11008">11008 - Sale elayayda</option>
<option value="11022">11022 - Arbaa shoul</option>
<option value="11023">11023 - El arjat</option>
<option value="11050">11050 - Bouknadel</option>
<option value="11100">11100 - Sala al jadida</option>
<option value="12000">12000 - Temara ppl</option>
<option value="12002">12002 - Temara massira</option>
<option value="12022">12022 - Ain atig</option>
<option value="12023">12023 - El harhoura</option>
<option value="12024">12024 - Temara plage</option>
<option value="12025">12025 - Mers el kheir</option>
<option value="12050">12050 - Skhirate</option>
<option value="12072">12072 - Sebbah</option>
<option value="12100">12100 - Ain el aouda</option>
<option value="12122">12122 - Oumazza</option>
<option value="12123">12123 - El menzeh</option>
<option value="12150">12150 - Sidi yahya des zaers</option>
<option value="13000">13000 - Benslimane</option>
<option value="13002">13002 - Benslimane fath</option>
<option value="13003">13003 - Fedalate</option>
<option value="13004">13004 - Sidi moussa ben ali</option>
<option value="13022">13022 - Benabet</option>
<option value="13023">13023 - Bessabes</option>
<option value="13024">13024 - El krassi</option>
<option value="13025">13025 - Tnine oulad ali</option>
<option value="13026">13026 - Ziaida</option>
<option value="13027">13027 - Soualem eltirss</option>
<option value="13050">13050 - Beni yakhlef</option>
<option value="13072">13072 - El mansouria</option>
<option value="13100">13100 - Bouznika</option>
<option value="13160">13160 - Sidi bettache</option>
<option value="13200">13200 - Mellila</option>
<option value="14000">14000 - Kenitra</option>
<option value="14002">14002 - Kenitra al massira</option>
<option value="14003">14003 - Kenitra nouvelle medina</option>
<option value="14004">14004 - Mehdiya</option>
<option value="14005">14005 - Souk tleta el gharb</option>
<option value="14022">14022 - Benmansour</option>
<option value="14023">14023 - El morhrane</option>
<option value="14024">14024 - Haddada el gharb</option>
<option value="14025">14025 - Sidi taibi</option>
<option value="14026">14026 - Ain ariss</option>
<option value="14027">14027 - Mnasra</option>
<option value="14050">14050 - Allal tazi</option>
<option value="14100">14100 - Arbaoua</option>
<option value="14122">14122 - Sidi boubker el haj</option>
<option value="14150">14150 - Lalla mimouna</option>
<option value="14200">14200 - Sidi slimane</option>
<option value="14222">14222 - Dar bel amri</option>
<option value="14223">14223 - Sfafaa</option>
<option value="14224">14224 - Azghar</option>
<option value="14225">14225 - Ouled ben hammadi</option>
<option value="14250">14250 - Sidi yahya du rharb</option>
<option value="14300">14300 - Souk el arbaa du rharb</option>
<option value="14302">14302 - Moulay bouselham</option>
<option value="14322">14322 - Karia ben aouda</option>
<option value="14323">14323 - Sidi mohamed el ahmar</option>
<option value="14324">14324 - Sidi amar el hadi</option>
<option value="14325">14325 - Chouafaa</option>
<option value="15000">15000 - Khemisset</option>
<option value="15002">15002 - Khemisset azhar</option>
<option value="15003">15003 - Khemis ait yaddine</option>
<option value="15004">15004 - Sfassif</option>
<option value="15005">15005 - Sidi allal lemsedder</option>
<option value="15022">15022 - El hammam jbel doum</option>
<option value="15023">15023 - Had ait mimoun</option>
<option value="15024">15024 - Had ait ouribel</option>
<option value="15025">15025 - Souk sebt oued beht</option>
<option value="15026">15026 - El kansera</option>
<option value="15027">15027 - Majmaa tolba</option>
<option value="15028">15028 - Sidi el rhandour</option>
<option value="15050">15050 - Maaziz</option>
<option value="15052">15052 - Sebt ait ikkou</option>
<option value="15072">15072 - Moulay driss arhbal</option>
<option value="15073">15073 - Souk jemaa houderane</option>
<option value="15100">15100 - Oulmes</option>
<option value="15122">15122 - Boukchmir</option>
<option value="15123">15123 - Tarmilet</option>
<option value="15124">15124 - Ait ichou</option>
<option value="15150">15150 - Rommani</option>
<option value="15152">15152 - Ain sbit</option>
<option value="15153">15153 - Had brachoua</option>
<option value="15154">15154 - Zhiliga</option>
<option value="15172">15172 - Had rhoualem</option>
<option value="15173">15173 - Jemaa moulbled</option>
<option value="15174">15174 - Marchouch</option>
<option value="15175">15175 - Khemis nkheila</option>
<option value="15200">15200 - Sidi abderrazak</option>
<option value="15250">15250 - Sidi allal el bahraoui</option>
<option value="15272">15272 - Souk tnine moghrane</option>
<option value="15273">15273 - Sidi boukhalkhal</option>
<option value="15350">15350 - Tiddas</option>
<option value="15400">15400 - Tiflet</option>
<option value="15402">15402 - Tiflet medina</option>
<option value="15422">15422 - Ain johra</option>
<option value="15423">15423 - Khemis sidi yahia</option>
<option value="15424">15424 - Mkam tolba</option>
<option value="15425">15425 - Ait belkacem</option>
<option value="16000">16000 - Sidi kacem</option>
<option value="16002">16002 - Dar gueddari</option>
<option value="16003">16003 - Jorf el melha</option>
<option value="16004">16004 - Sidi bousber</option>
<option value="16005">16005 - Sidi kacem ezaouia</option>
<option value="16022">16022 - Bir taleb</option>
<option value="16023">16023 - Zagota</option>
<option value="16024">16024 - Zirara</option>
<option value="16025">16025 - Msaada</option>
<option value="16026">16026 - Dar laaslouji</option>
<option value="16027">16027 - Sidi ahmed cherif</option>
<option value="16028">16028 - Chbanate</option>
<option value="16050">16050 - Had kourt</option>
<option value="16052">16052 - Ain defali</option>
<option value="16072">16072 - Sidi azzouz</option>
<option value="16100">16100 - Khenichet</option>
<option value="16150">16150 - Mechra bel ksiri</option>
<option value="16172">16172 - Jemaa haouafate</option>
<option value="16173">16173 - Nouirate</option>
<option value="16174">16174 - Sefsaf</option>
<option value="16175">16175 - Sidi al kamel</option>
<option value="16200">16200 - Ouezzane</option>
<option value="16202">16202 - Sidi redouane</option>
<option value="16222">16222 - Ain dorij</option>
<option value="16223">16223 - Sebt rmel</option>
<option value="16224">16224 - Bni quolla</option>
<option value="16225">16225 - Ounnana</option>
<option value="16250">16250 - Teroual</option>
<option value="20000">20000 - Casablanca</option>
<option value="20001">20001 - Casablanca centre de tri</option>
<option value="20002">20002 - Casablanca bandoeng</option>
<option value="20003">20003 - Casablanca bourse</option>
<option value="20004">20004 - Casablanca bousmara</option>
<option value="20005">20005 - Casablanca colis postaux et post</option>
<option value="20006">20006 - Casablanca mers sultan</option>
<option value="20007">20007 - Casablanca ghandi</option>
<option value="20008">20008 - Casablanca complexe mohamed v</option>
<option value="20050">20050 - Casablanca el hank</option>
<option value="20052">20052 - Casablanca ain diab</option>
<option value="20053">20053 - Casablanca bourgogne</option>
<option value="20100">20100 - Casablanca maarif</option>
<option value="20102">20102 - Casablanca derb ghallef</option>
<option value="20103">20103 - Casablanca oasis</option>
<option value="20150">20150 - Casablanca m''calla</option>
<option value="20152">20152 - Casablanca hay al inara</option>
<option value="20153">20153 - Casablanca ain chok</option>
<option value="20180">20180 - Bouskoura</option>
<option value="20190">20190 - Sidi maarouf</option>
<option value="20200">20200 - Casablanca hay hassani</option>
<option value="20202">20202 - Casablanca hay el oulfa</option>
<option value="20203">20203 - Casablanca hay essalam</option>
<option value="20220">20220 - Dar bouazza</option>
<option value="20222">20222 - Benabid</option>
<option value="20230">20230 - Casablanca lissasfa</option>
<option value="20250">20250 - Casablanca ain sebaa</option>
<option value="20252">20252 - Casablanca ain sebaa plage</option>
<option value="20300">20300 - Casablanca gare</option>
<option value="20302">20302 - Casablanca ain borja</option>
<option value="20303">20303 - Casablanca roches noires</option>
<option value="20350">20350 - Casablanca takadoum</option>
<option value="20352">20352 - Casablanca dar lamane</option>
<option value="20400">20400 - Casablanca sidi moumen</option>
<option value="20450">20450 - Casablanca sidi othmane</option>
<option value="20452">20452 - Casablanca cite djemaa</option>
<option value="20453">20453 - Casablanca hay salmia</option>
<option value="20454">20454 - Casablanca hay ifriquia</option>
<option value="20490">20490 - Mediouna</option>
<option value="20500">20500 - Casablanca derb sidna</option>
<option value="20502">20502 - Casablanca 2 mars</option>
<option value="20550">20550 - Casablanca el fida</option>
<option value="20552">20552 - Casablanca hay el farah</option>
<option value="20600">20600 - Casablanca sidi bernoussi</option>
<option value="20602">20602 - Casablanca al qods</option>
<option value="20603">20603 - Casablanca ahl loghlam</option>
<option value="20630">20630 - Ain harrouda</option>
<option value="20640">20640 - Tit mellil</option>
<option value="20672">20672 - Oued hassar</option>
<option value="20700">20700 - Casablanca ksar bhar</option>
<option value="20702">20702 - Casablanca hay el baraka</option>
<option value="20703">20703 - Casablanca hay my rachid</option>
<option value="20704">20704 - Casablanca hay essalama</option>
<option value="20800">20800 - Mohammedia</option>
<option value="20802">20802 - Mohammedia el alia</option>
<option value="20803">20803 - Mohammedia hassania</option>
<option value="20804">20804 - Mohammedia la colline</option>
<option value="20805">20805 - Mohammedia rachidia</option>
<option value="22000">22000 - Azilal</option>
<option value="22002">22002 - Zaouia ahansal</option>
<option value="22022">22022 - Skatt</option>
<option value="22050">22050 - Afourer</option>
<option value="22072">22072 - Ait ouarda</option>
<option value="22100">22100 - Ait attab</option>
<option value="22122">22122 - Taounza</option>
<option value="22150">22150 - Ait m''hammed</option>
<option value="22172">22172 - Igmir</option>
<option value="22200">22200 - Bine el ouidane</option>
<option value="22250">22250 - Bzou</option>
<option value="22272">22272 - Aghbalou zaouia</option>
<option value="22273">22273 - Imddahen</option>
<option value="22274">22274 - Rfala</option>
<option value="22300">22300 - Demnate</option>
<option value="22322">22322 - Ait blal</option>
<option value="22323">22323 - Ait tamlil</option>
<option value="22324">22324 - Anzou</option>
<option value="22325">22325 - Tidili fetouaka</option>
<option value="22326">22326 - Tifni</option>
<option value="22350">22350 - Foum jemaa</option>
<option value="22352">22352 - Tislit</option>
<option value="22372">22372 - Bni hassane</option>
<option value="22373">22373 - Tabia</option>
<option value="22400">22400 - Ouaouizarht</option>
<option value="22450">22450 - Tabannt</option>
<option value="22472">22472 - Abachkou</option>
<option value="22500">22500 - Taguelft</option>
<option value="22522">22522 - Ait tamejout</option>
<option value="22523">22523 - Arbaa ouakabli</option>
<option value="22550">22550 - Tanannt</option>
<option value="22572">22572 - Ait taguella</option>
<option value="22573">22573 - Arbaa ou aoula</option>
<option value="22574">22574 - Bouantar</option>
<option value="22575">22575 - Khemis majden</option>
<option value="22576">22576 - Ouzoud</option>
<option value="22600">22600 - Tilougguite</option>
<option value="22622">22622 - Anergui</option>
<option value="22650">22650 - Bni a''yat</option>
<option value="22700">22700 - Tnine timoulilt</option>
<option value="23000">23000 - Beni mellal</option>
<option value="23002">23002 - Beni mellal ain asserdoune</option>
<option value="23003">23003 - Beni mellal hay mohammadi</option>
<option value="23004">23004 - Beni mellal oulad hamdane</option>
<option value="23005">23005 - Bni oukil</option>
<option value="23006">23006 - Foum oudi</option>
<option value="23022">23022 - Laayayta</option>
<option value="23023">23023 - M''ghila</option>
<option value="23050">23050 - Arhbala</option>
<option value="23072">23072 - Boutfarda</option>
<option value="23073">23073 - Tizi n''isly</option>
<option value="23100">23100 - Dar ould zidouh</option>
<option value="23122">23122 - Had oulad boumoussa</option>
<option value="23150">23150 - El ksiba</option>
<option value="23200">23200 - Fquiih ben salah</option>
<option value="23202">23202 - Fquiih ben salah gare</option>
<option value="23222">23222 - El krifate</option>
<option value="23223">23223 - Hal al marbaa</option>
<option value="23224">23224 - Khemis bni chagdal</option>
<option value="23225">23225 - Oulad hassoun</option>
<option value="23226">23226 - Ouled abdellah</option>
<option value="23250">23250 - Foum el anser</option>
<option value="23272">23272 - Fechtala</option>
<option value="23300">23300 - Had bradia</option>
<option value="23322">23322 - Lahlalma</option>
<option value="23323">23323 - Oulad ali l''oued</option>
<option value="23324">23324 - Oulad driss bradia</option>
<option value="23350">23350 - Kasba tadla ppal</option>
<option value="23352">23352 - Kasba tadla hay boudraa</option>
<option value="23372">23372 - Guettaya</option>
<option value="23373">23373 - Oulad said el oued</option>
<option value="23374">23374 - Ouled youssef</option>
<option value="23375">23375 - Semguet</option>
<option value="23376">23376 - Douar ait ali</option>
<option value="23400">23400 - Khemis oulad ayad</option>
<option value="23450">23450 - Ouled m''barek</option>
<option value="23500">23500 - Ouled yaiche</option>
<option value="23522">23522 - El bazzaza</option>
<option value="23523">23523 - Zouair</option>
<option value="23550">23550 - Sebt oulad nemma</option>
<option value="23572">23572 - El krazza</option>
<option value="23573">23573 - Oulad bourahmoune</option>
<option value="23574">23574 - Sidi aissa</option>
<option value="23575">23575 - Ouled zmam</option>
<option value="23600">23600 - Sidi jaber</option>
<option value="23650">23650 - Taghzirt</option>
<option value="23672">23672 - Feryata</option>
<option value="23673">23673 - Rhorm el alem</option>
<option value="23674">23674 - Tanorha</option>
<option value="23700">23700 - Zaouia ech cheikh</option>
<option value="24000">24000 - El jadida</option>
<option value="24002">24002 - El jadida plateau</option>
<option value="24003">24003 - Moulay abdellah</option>
<option value="24004">24004 - Ouled amrane</option>
<option value="24005">24005 - Sidi bouzid</option>
<option value="24022">24022 - Oulad aissa</option>
<option value="24023">24023 - Oulad hassine</option>
<option value="24024">24024 - Sidi moussa plage</option>
<option value="24025">24025 - Jorf lasfar</option>
<option value="24026">24026 - Kridid</option>
<option value="24027">24027 - Sidi abed</option>
<option value="24050">24050 - Arbaa aounate</option>
<option value="24072">24072 - Khemis ksiba</option>
<option value="24073">24073 - Matrann</option>
<option value="24074">24074 - Tleta boulaouane</option>
<option value="24100">24100 - Azemmour</option>
<option value="24122">24122 - Boucedra</option>
<option value="24123">24123 - Haouzia</option>
<option value="24124">24124 - Mhaioula</option>
<option value="24150">24150 - Bir jdid</option>
<option value="24172">24172 - Arbaa chtouka</option>
<option value="24173">24173 - Oulja des chiadma</option>
<option value="24174">24174 - Sidi rahhal plage</option>
<option value="24175">24175 - Tnine chtouka</option>
<option value="24200">24200 - Khemis des zemamra</option>
<option value="24222">24222 - Laaouissate</option>
<option value="24223">24223 - El hagagcha</option>
<option value="24224">24224 - Lamnakra el haddada</option>
<option value="24225">24225 - Oulad benchaoui</option>
<option value="24226">24226 - Saniat benrkik</option>
<option value="24227">24227 - Zaouiat ben hamdoune</option>
<option value="24250">24250 - Oualidia</option>
<option value="24272">24272 - Oulad rhanem</option>
<option value="24300">24300 - Ouled frej</option>
<option value="24322">24322 - Khemis m''touh</option>
<option value="24323">24323 - Oulad hamdane</option>
<option value="24324">24324 - Oulad sidi ali ben youssef</option>
<option value="24350">24350 - Sidi bennour</option>
<option value="24352">24352 - Sebt beni hlal</option>
<option value="24372">24372 - Mtal</option>
<option value="24373">24373 - El mechrek</option>
<option value="24400">24400 - Sidi smail</option>
<option value="24422">24422 - Sebt sais</option>
<option value="24450">24450 - Tnine gharbia</option>
<option value="25000">25000 - Khouribga</option>
<option value="25002">25002 - Khouribga zellaga</option>
<option value="25003">25003 - Sebt beni yakhlef</option>
<option value="25004">25004 - Khouribga al qods</option>
<option value="25022">25022 - El fokra</option>
<option value="25023">25023 - Ouled abdoun</option>
<option value="25060">25060 - Bejaad</option>
<option value="25062">25062 - Bejaad 11 janvier</option>
<option value="25072">25072 - Boukhrisse</option>
<option value="25073">25073 - Oulad gouaouch</option>
<option value="25100">25100 - Boujniba</option>
<option value="25150">25150 - Boulanouar</option>
<option value="25200">25200 - El gueffaf</option>
<option value="25250">25250 - Had bni batao</option>
<option value="25272">25272 - Tleta beni zranetil</option>
<option value="25300">25300 - Hattane</option>
<option value="25322">25322 - M''fassis</option>
<option value="25323">25323 - Oulad azzouz</option>
<option value="25350">25350 - Oued zem ppal</option>
<option value="25352">25352 - Oued zem al wahda</option>
<option value="25372">25372 - Arbaa maadna</option>
<option value="25373">25373 - Bir mezoui</option>
<option value="25374">25374 - Bni smir</option>
<option value="25375">25375 - Jemaa oulad aissa</option>
<option value="25376">25376 - Kasbat troch</option>
<option value="25377">25377 - Ouled fennane</option>
<option value="25378">25378 - Sebt dechra braksa</option>
<option value="25400">25400 - Ouled boughadi</option>
<option value="25422">25422 - Ait ammar</option>
<option value="25423">25423 - Oulad ftata</option>
<option value="25424">25424 - Tleta gnadiz</option>
<option value="25450">25450 - Tachreft</option>
<option value="25472">25472 - Ain kicher</option>
<option value="25500">25500 - Tleta chougrane</option>
<option value="25522">25522 - Rouached</option>
<option value="26000">26000 - Settat</option>
<option value="26002">26002 - Settat hay elfarah</option>
<option value="26022">26022 - Ain nzarh</option>
<option value="26023">26023 - Had mzoura</option>
<option value="26024">26024 - Sebt oulad friha</option>
<option value="26025">26025 - Moualine el oued</option>
<option value="26026">26026 - Sidi el aidi</option>
<option value="26027">26027 - Tleta oulad seghir</option>
<option value="26050">26050 - Ben ahmed</option>
<option value="26072">26072 - Mgarto</option>
<option value="26073">26073 - Oulad m''hammed</option>
<option value="26074">26074 - Sidi dahbi</option>
<option value="26100">26100 - Berrechid</option>
<option value="26102">26102 - Berrechid hay hassani</option>
<option value="26122">26122 - Riah</option>
<option value="26123">26123 - Souk jemaa sidi el ayachi</option>
<option value="26150">26150 - Bni khloug</option>
<option value="26172">26172 - Dar chaffai</option>
<option value="26173">26173 - Oulad n''jima</option>
<option value="26174">26174 - Sidi ahmed el khadir</option>
<option value="26200">26200 - Deroua oulad zyane</option>
<option value="26250">26250 - El borouj</option>
<option value="26272">26272 - Arbaa oulad bouali</option>
<option value="26273">26273 - Krakra</option>
<option value="26274">26274 - Oulad belkacem</option>
<option value="26275">26275 - Oulad driss</option>
<option value="26276">26276 - Oulad hammou</option>
<option value="26300">26300 - El gara</option>
<option value="26322">26322 - Ahlaf</option>
<option value="26350">26350 - Guisser</option>
<option value="26372">26372 - Rima</option>
<option value="26400">26400 - Had soualem</option>
<option value="26422">26422 - Oulad ziane</option>
<option value="26450">26450 - Oulad abbou</option>
<option value="26472">26472 - Oued bers</option>
<option value="26473">26473 - Rhnimiyne</option>
<option value="26474">26474 - Sidi said maachou</option>
<option value="26500">26500 - Oulad said</option>
<option value="26522">26522 - Khemis gdana</option>
<option value="26550">26550 - Ras el ain</option>
<option value="26572">26572 - Oued naanaa</option>
<option value="26600">26600 - Sidi hajjaj</option>
<option value="26622">26622 - Mrizig</option>
<option value="26623">26623 - Tleta oulad fares</option>
<option value="26650">26650 - Sidi rahhal chaouia</option>
<option value="26672">26672 - Imfout</option>
<option value="26673">26673 - Mechra ben abbou</option>
<option value="26674">26674 - Tleta ain blal</option>
<option value="26675">26675 - Tnine toualet</option>
<option value="26676">26676 - Zemamra chaouia</option>
<option value="26700">26700 - Souk tleta loulad</option>
<option value="26722">26722 - N''khila</option>
<option value="30000">30000 - Fes</option>
<option value="30002">30002 - Fes al adarissa</option>
<option value="30003">30003 - Fes atlas</option>
<option value="30004">30004 - Fes dokkarat</option>
<option value="30005">30005 - Fes jedid</option>
<option value="30006">30006 - Fes sidi brahim</option>
<option value="30007">30007 - Fes zohor</option>
<option value="30022">30022 - Le sais</option>
<option value="30023">30023 - Oulad ettayeb</option>
<option value="30100">30100 - Fes ben debbab</option>
<option value="30102">30102 - Fes ain kadous</option>
<option value="30103">30103 - Fes ben souda</option>
<option value="30104">30104 - Sebaa rouadi</option>
<option value="30105">30105 - Fes soundouss</option>
<option value="30122">30122 - Ain chkef</option>
<option value="30123">30123 - Hamria</option>
<option value="30124">30124 - Laajajra</option>
<option value="30125">30125 - Mikkes</option>
<option value="30127">30127 - Souk sebt oulad mimoun</option>
<option value="30150">30150 - Moulay yacoub</option>
<option value="30152">30152 - Sidi ahmed el bernoussi</option>
<option value="30172">30172 - Sidi daoud</option>
<option value="30200">30200 - Fes batha</option>
<option value="30202">30202 - Fes el karaouyne</option>
<option value="30203">30203 - Fes fekhkharine</option>
<option value="30204">30204 - Fes jnanate</option>
<option value="30205">30205 - Sidi harazem</option>
<option value="30222">30222 - Ain kansara</option>
<option value="31000">31000 - Sefrou</option>
<option value="31002">31002 - Azzaba</option>
<option value="31003">31003 - El adrej</option>
<option value="31004">31004 - Tazouta</option>
<option value="31022">31022 - Aioun sename</option>
<option value="31023">31023 - Arhbalou akorare</option>
<option value="31024">31024 - Sidi youssef b.ahmed senhaja</option>
<option value="31025">31025 - Sidi lahcen el youssi</option>
<option value="31026">31026 - Dar el hamra</option>
<option value="31027">31027 - Tafajight</option>
<option value="31050">31050 - Ain cheggag</option>
<option value="31100">31100 - Bhalil</option>
<option value="31150">31150 - Bir tamtam</option>
<option value="31200">31200 - El menzel</option>
<option value="31202">31202 - Oulad m''koudou</option>
<option value="31222">31222 - Mtarnagha</option>
<option value="31223">31223 - Zaouia bougrine</option>
<option value="31250">31250 - Imouzzer kandar</option>
<option value="31272">31272 - Ait sebaa</option>
<option value="31273">31273 - Zaouia el karmate</option>
<option value="31300">31300 - Ras tabouda</option>
<option value="31350">31350 - Ribat el khair</option>
<option value="31372">31372 - Ighezren</option>
<option value="32000">32000 - Al hoceima</option>
<option value="32002">32002 - Al hoceima sidi abid</option>
<option value="32003">32003 - Ait youssef ou ali</option>
<option value="32004">32004 - Arbaa taourirt</option>
<option value="32006">32006 - Rouadi</option>
<option value="32007">32007 - Senada</option>
<option value="32008">32008 - Torres de alcala</option>
<option value="32022">32022 - Ait kamra</option>
<option value="32023">32023 - Chakrane</option>
<option value="32024">32024 - Izemmouren</option>
<option value="32050">32050 - Bni bouayach</option>
<option value="32072">32072 - Nekkour</option>
<option value="32100">32100 - Bni boufrah</option>
<option value="32122">32122 - Beni gmil mestassa</option>
<option value="32150">32150 - Bni hadifa</option>
<option value="32172">32172 - Bni abdellah</option>
<option value="32200">32200 - Imrabten</option>
<option value="32250">32250 - Imzouren</option>
<option value="32272">32272 - Troukoute</option>
<option value="32300">32300 - Issaguen</option>
<option value="32322">32322 - Ikaouen</option>
<option value="32323">32323 - Ketama</option>
<option value="32324">32324 - Tabarrant</option>
<option value="32325">32325 - Tarhzout</option>
<option value="32326">32326 - Tizi tchen</option>
<option value="32350">32350 - Targuist</option>
<option value="32352">32352 - Bni ammart</option>
<option value="32372">32372 - Ain benabbou</option>
<option value="32373">32373 - Bni bounsar</option>
<option value="32374">32374 - Bni bchir</option>
<option value="32375">32375 - Sidi bouzineb</option>
<option value="33000">33000 - Boulemane</option>
<option value="33002">33002 - Enjil</option>
<option value="33022">33022 - Achlouj</option>
<option value="33023">33023 - Enjil ait lahcen</option>
<option value="33024">33024 - Ifkirne</option>
<option value="33025">33025 - Tafraoute ait ali oulahcen</option>
<option value="33050">33050 - Almis guigou</option>
<option value="33052">33052 - Ait hamza</option>
<option value="33100">33100 - El mers</option>
<option value="33122">33122 - Ait abdellah boukhamouj</option>
<option value="33150">33150 - Imouzzer marmoucha</option>
<option value="33172">33172 - Ait bazza</option>
<option value="33173">33173 - Ait el mane</option>
<option value="33174">33174 - Almis marmoucha</option>
<option value="33175">33175 - Ouaoulzemt</option>
<option value="33176">33176 - Talzemt</option>
<option value="33200">33200 - Ksabi</option>
<option value="33250">33250 - Missour</option>
<option value="33272">33272 - Oulad sghir</option>
<option value="33273">33273 - Ouizeght</option>
<option value="33300">33300 - Outat el haj</option>
<option value="33302">33302 - Ouled ali</option>
<option value="33303">33303 - Tindit</option>
<option value="33322">33322 - Fritissa</option>
<option value="33323">33323 - Tissaf</option>
<option value="33324">33324 - El orjane</option>
<option value="33350">33350 - Skoura seghrouchen</option>
<option value="33372">33372 - Taghroute</option>
<option value="34000">34000 - Taounate</option>
<option value="34003">34003 - Ain mediouna</option>
<option value="34004">34004 - Bni oulid</option>
<option value="34005">34005 - Bni korra</option>
<option value="34006">34006 - Bouhouda</option>
<option value="34007">34007 - Khlalfa</option>
<option value="34008">34008 - Taounate astar</option>
<option value="34009">34009 - Ourtzarh</option>
<option value="34012">34012 - Bouarous</option>
<option value="34013">34013 - Tafrannt</option>
<option value="34014">34014 - Tabouda</option>
<option value="34022">34022 - Bab ouandar</option>
<option value="34023">34023 - El haddada</option>
<option value="34024">34024 - Galaz</option>
<option value="34025">34025 - Mezraoua</option>
<option value="34026">34026 - Rghioua</option>
<option value="34027">34027 - Sidi el mokhfi</option>
<option value="34028">34028 - Timezgana</option>
<option value="34029">34029 - Zrizer</option>
<option value="34030">34030 - Bni selmane</option>
<option value="34031">34031 - Moulay bouchta</option>
<option value="34032">34032 - Quallaline</option>
<option value="34034">34034 - Sgoura</option>
<option value="34050">34050 - Karia ba mohammed</option>
<option value="34072">34072 - Bouchabel</option>
<option value="34073">34073 - Jbabra</option>
<option value="34074">34074 - Loulja</option>
<option value="34075">34075 - Mkannssa</option>
<option value="34076">34076 - Rhouazi</option>
<option value="34077">34077 - Sidi el abed</option>
<option value="34078">34078 - Moulay abdelkrim</option>
<option value="34100">34100 - Rhafsai</option>
<option value="34102">34102 - Retba</option>
<option value="34122">34122 - Ain barda</option>
<option value="34123">34123 - Klaia</option>
<option value="34124">34124 - Oulad salah</option>
<option value="34125">34125 - Tamesnite</option>
<option value="34126">34126 - Lamkmmel</option>
<option value="34127">34127 - Tnine zghariyine</option>
<option value="34128">34128 - Sidi haj m''hamed</option>
<option value="34150">34150 - Tahar souk</option>
<option value="34172">34172 - Beni ounjil tafraoute</option>
<option value="34173">34173 - Tamedit</option>
<option value="34200">34200 - Tissa</option>
<option value="34222">34222 - Ain legdeh</option>
<option value="34223">34223 - El bessabssa</option>
<option value="34224">34224 - Messassa</option>
<option value="34225">34225 - Oued jemaa</option>
<option value="34226">34226 - Outa bouabane</option>
<option value="34227">34227 - Ras el oued</option>
<option value="34228">34228 - Sidi m''hamed ben lahcen</option>
<option value="34250">34250 - Ain aicha</option>
<option value="34272">34272 - Ain maatouf</option>
<option value="34273">34273 - Oulad daoud</option>
<option value="35000">35000 - Taza</option>
<option value="35002">35002 - Arbaa bni ftah</option>
<option value="35003">35003 - Bab el mrouj</option>
<option value="35004">35004 - Bab marzouka</option>
<option value="35005">35005 - Beni lennt</option>
<option value="35006">35006 - Meknassa acharqia</option>
<option value="35007">35007 - Had ouled zbair</option>
<option value="35008">35008 - Haouara ouled rahho</option>
<option value="35009">35009 - Kahf el rhar</option>
<option value="35012">35012 - Merhraoua</option>
<option value="35013">35013 - Sebt bni frassen</option>
<option value="35014">35014 - Taineste</option>
<option value="35015">35015 - Taza haut</option>
<option value="35016">35016 - Taza gare</option>
<option value="35022">35022 - Bab bouidir</option>
<option value="35023">35023 - Bechiyine</option>
<option value="35024">35024 - Beni ali</option>
<option value="35025">35025 - Gueldamane</option>
<option value="35026">35026 - M''soun</option>
<option value="35027">35027 - Oulad chrif</option>
<option value="35028">35028 - Touahar</option>
<option value="35029">35029 - Tnine taifa</option>
<option value="35030">35030 - Tlata traiba</option>
<option value="35031">35031 - Oulad bourima</option>
<option value="35050">35050 - Aknoul</option>
<option value="35052">35052 - Ajdir</option>
<option value="35053">35053 - Boured</option>
<option value="35072">35072 - Jbarna</option>
<option value="35073">35073 - Tighazratine</option>
<option value="35074">35074 - Ain el hamra</option>
<option value="35075">35075 - Inahnahane</option>
<option value="35100">35100 - Guercif</option>
<option value="35102">35102 - Berkine</option>
<option value="35103">35103 - Mahirija</option>
<option value="35104">35104 - Mezguitem</option>
<option value="35105">35105 - Saka</option>
<option value="35122">35122 - Rchida</option>
<option value="35123">35123 - Tighza</option>
<option value="35124">35124 - Assebbab</option>
<option value="35125">35125 - Ras laksar</option>
<option value="35150">35150 - Had msila</option>
<option value="35172">35172 - El gouzat</option>
<option value="35200">35200 - Matmata</option>
<option value="35202">35202 - Bouzemlane</option>
<option value="35222">35222 - Ain boumassay</option>
<option value="35223">35223 - Aoura</option>
<option value="35224">35224 - Oulad ayyad</option>
<option value="35225">35225 - Zaouia sidi abdeljalil</option>
<option value="35250">35250 - Oued amlil</option>
<option value="35272">35272 - Beni mgara</option>
<option value="35273">35273 - Bouchfaa</option>
<option value="35274">35274 - Bouhlou</option>
<option value="35275">35275 - Kaouane</option>
<option value="35300">35300 - Tahala</option>
<option value="35322">35322 - Ain el fendel</option>
<option value="35323">35323 - Ifrane ait assou</option>
<option value="35324">35324 - Sidi ali bennaceur</option>
<option value="35325">35325 - Smiaa</option>
<option value="35350">35350 - Tizi ouzli</option>
<option value="35372">35372 - Sidi ali bourakba</option>
<option value="35400">35400 - Zerarda</option>
<option value="35422">35422 - Kassarat</option>
<option value="35423">35423 - Oued el malah</option>
<option value="35424">35424 - Oued lahmar</option>
<option value="40000">40000 - Marrakech</option>
<option value="40002">40002 - Marrakech amerchich</option>
<option value="40003">40003 - Marrakech bab rhmate</option>
<option value="40004">40004 - Marrakech douar iziki</option>
<option value="40005">40005 - Marrakech hay al massira</option>
<option value="40006">40006 - Marrakech hay hassani</option>
<option value="40007">40007 - Marrakech hay mohammadi</option>
<option value="40008">40008 - Marrakech medina</option>
<option value="40009">40009 - Marrakech sidi youssef ben ali</option>
<option value="40012">40012 - Marrakech diour echchouhada</option>
<option value="40014">40014 - Marrakech sidi abbad</option>
<option value="40015">40015 - Marrakech bab lakhmis</option>
<option value="40016">40016 - Marrakech annakhil</option>
<option value="40022">40022 - Ain itti</option>
<option value="40023">40023 - Chouiter</option>
<option value="40024">40024 - Douar chaouf el ayadi</option>
<option value="40026">40026 - Mrabtine</option>
<option value="40027">40027 - Oued lahjar</option>
<option value="40028">40028 - Oulad belaaguid</option>
<option value="40029">40029 - Oulad dlim</option>
<option value="40030">40030 - Tassoultante</option>
<option value="40031">40031 - Had abdellah rhiat</option>
<option value="40150">40150 - Kettara</option>
<option value="40172">40172 - N''zalat el harmel</option>
<option value="40173">40173 - Had m''nabha</option>
<option value="40200">40200 - Sidi zouine</option>
<option value="40250">40250 - Tnine oudaya</option>
<option value="40272">40272 - Sebt ait imour</option>
<option value="40273">40273 - Oukaimeden</option>
<option value="41000">41000 - Chichaoua</option>
<option value="41022">41022 - M''zoudia</option>
<option value="41023">41023 - Saidate</option>
<option value="41024">41024 - Zaouia nouaseur</option>
<option value="41050">41050 - Imi n''tanoute</option>
<option value="41072">41072 - Asserratou</option>
<option value="41073">41073 - Bouaboute</option>
<option value="41074">41074 - Lalla aziza</option>
<option value="41075">41075 - Taouloukoult</option>
<option value="41076">41076 - Timzgadiouine</option>
<option value="41077">41077 - Ouad lbour</option>
<option value="41078">41078 - Ichamraren</option>
<option value="41100">41100 - Ait hadi</option>
<option value="41150">41150 - Sidi mokhtar</option>
<option value="41200">41200 - Arbaa douirane</option>
<option value="41222">41222 - Boulaouane</option>
<option value="41223">41223 - Guemassa</option>
<option value="41224">41224 - Had mjatt</option>
<option value="41225">41225 - Sebt mzouda</option>
<option value="41226">41226 - Zaouia annahlia</option>
<option value="42050">42050 - Ait ourir</option>
<option value="42072">42072 - Abadou</option>
<option value="42073">42073 - Ait aadel</option>
<option value="42074">42074 - Arbaa tirhedouine</option>
<option value="42075">42075 - Had zerkten</option>
<option value="42076">42076 - Taddart</option>
<option value="42077">42077 - Tazzarte</option>
<option value="42078">42078 - Tidili mesfioua</option>
<option value="42079">42079 - Touama</option>
<option value="42080">42080 - Ait faska</option>
<option value="42081">42081 - Ait sidi daoud</option>
<option value="42100">42100 - Amizmiz</option>
<option value="42102">42102 - Tizguine</option>
<option value="42122">42122 - Azgour</option>
<option value="42123">42123 - Assif el mal</option>
<option value="42150">42150 - Asni</option>
<option value="42172">42172 - Imgdal</option>
<option value="42173">42173 - Ouirgane</option>
<option value="42200">42200 - Lalla takerkouste</option>
<option value="42250">42250 - Rhmate</option>
<option value="42272">42272 - Tamazouzte</option>
<option value="42300">42300 - Tahannaoute</option>
<option value="42312">42312 - Tamesloht</option>
<option value="42350">42350 - Tleta n''yacoub</option>
<option value="42400">42400 - Igoudar</option>
<option value="42450">42450 - Tnine ourika</option>
<option value="42472">42472 - Aghbalou</option>
<option value="43000">43000 - El kelaa des sraghna</option>
<option value="43002">43002 - El kelaa des sraghna el qods</option>
<option value="43003">43003 - El kelaa des sraghna ville</option>
<option value="43022">43022 - El hydana</option>
<option value="43023">43023 - Mayate</option>
<option value="43024">43024 - Oulad yacoub</option>
<option value="43025">43025 - Sebt ounasdass</option>
<option value="43026">43026 - Oulad zarrad</option>
<option value="43050">43050 - El aamria</option>
<option value="43072">43072 - Ain igli</option>
<option value="43073">43073 - Chtaiba</option>
<option value="43074">43074 - Dechra</option>
<option value="43075">43075 - Pont tassaout</option>
<option value="43076">43076 - Oulad aamer</option>
<option value="43077">43077 - Sidi el hattab</option>
<option value="43100">43100 - Attaouia ech cheibiya</option>
<option value="43122">43122 - Bouya omar</option>
<option value="43123">43123 - Dzouz</option>
<option value="43124">43124 - Had fraita</option>
<option value="43125">43125 - Laatamna srarhna</option>
<option value="43150">43150 - Benguerir</option>
<option value="43152">43152 - Benguerir ville</option>
<option value="43153">43153 - Benguerir base militaire</option>
<option value="43154">43154 - Tnine bouchane</option>
<option value="43172">43172 - Jemaa el mabared</option>
<option value="43173">43173 - Sebt brikyine</option>
<option value="43174">43174 - Oulad aamer tizmarine</option>
<option value="43175">43175 - Ait hammou</option>
<option value="43176">43176 - Oulad hassoune hamri</option>
<option value="43200">43200 - Had ras el ain</option>
<option value="43222">43222 - Akerma</option>
<option value="43223">43223 - Jaidate</option>
<option value="43250">43250 - Sahrij</option>
<option value="43272">43272 - Louad lakhdar</option>
<option value="43273">43273 - Ouargui</option>
<option value="43274">43274 - Sidi aissa ben slimane</option>
<option value="43275">43275 - Sidi driss</option>
<option value="43276">43276 - Tleta mzem</option>
<option value="43300">43300 - Sidi bou othmane</option>
<option value="43302">43302 - N''zalat laadem</option>
<option value="43322">43322 - Sidi boubker</option>
<option value="43323">43323 - Tnine mhara</option>
<option value="43350">43350 - Sidi rahhal</option>
<option value="43372">43372 - Zemrane</option>
<option value="43400">43400 - Skhour rehamna</option>
<option value="43422">43422 - Had jaafra</option>
<option value="43423">43423 - Sidi abdellah</option>
<option value="43424">43424 - Sidi ghanem</option>
<option value="43450">43450 - Tamelelt</option>
<option value="43472">43472 - Ejjouala</option>
<option value="43473">43473 - Jbiel</option>
<option value="43474">43474 - Zemrane charquia</option>
<option value="44000">44000 - Essaouira</option>
<option value="44003">44003 - Had draa</option>
<option value="44004">44004 - Zaouit ben hmida</option>
<option value="44005">44005 - Arbaa ida ou gourd</option>
<option value="44050">44050 - Smimou</option>
<option value="44052">44052 - Ait daoud</option>
<option value="44072">44072 - Ida ou azza</option>
<option value="44073">44073 - Sebt meknafa</option>
<option value="44074">44074 - Tafedna</option>
<option value="44075">44075 - Tidzi</option>
<option value="44076">44076 - Tnine imi n''tlit</option>
<option value="44100">44100 - Essaouira gare routiere</option>
<option value="44102">44102 - Taftecht</option>
<option value="44122">44122 - Had mramer</option>
<option value="44123">44123 - Lamzilate</option>
<option value="44124">44124 - Mejji</option>
<option value="44125">44125 - Sidi kaouki</option>
<option value="44126">44126 - Akermoud</option>
<option value="44127">44127 - Khemis takate</option>
<option value="44128">44128 - Ounagha</option>
<option value="44129">44129 - Sidi ishaq</option>
<option value="44150">44150 - Talmeste</option>
<option value="44200">44200 - Tamanar</option>
<option value="44222">44222 - Arbaa ida outrouma</option>
<option value="44223">44223 - Ida ou guelloul</option>
<option value="44224">44224 - Sebt imrhade</option>
<option value="44225">44225 - Timzguida ouftas</option>
<option value="44250">44250 - Tlata hanchane</option>
<option value="44252">44252 - Bizdad</option>
<option value="44272">44272 - Sebt korimate</option>
<option value="44273">44273 - Ain zelten</option>
<option value="44274">44274 - Khemis meskala</option>
<option value="44275">44275 - Tnine idaou zemzem</option>
<option value="45000">45000 - Ouarzazate</option>
<option value="45022">45022 - Ghessate</option>
<option value="45023">45023 - Tabourahte</option>
<option value="45024">45024 - Tiouine</option>
<option value="45050">45050 - Agdz</option>
<option value="45072">45072 - Ait saoun</option>
<option value="45073">45073 - Tamezmoute</option>
<option value="45074">45074 - Tanssift</option>
<option value="45075">45075 - Zaouia kadiria</option>
<option value="45076">45076 - Afra</option>
<option value="45100">45100 - Amerzgane</option>
<option value="45122">45122 - Ait ben haddou</option>
<option value="45123">45123 - Imini</option>
<option value="45124">45124 - Tamdakhte</option>
<option value="45150">45150 - Boumalne dades</option>
<option value="45172">45172 - Ait sedrate jbel</option>
<option value="45173">45173 - Ait youl</option>
<option value="45174">45174 - Ait sedrate jbel el oulia</option>
<option value="45200">45200 - El kelaa mgouna</option>
<option value="45222">45222 - Ait ridi</option>
<option value="45223">45223 - Ait sedrate sahl charkia</option>
<option value="45224">45224 - Taberkhachte</option>
<option value="45250">45250 - Ighrem n''ougdal</option>
<option value="45252">45252 - Telouet</option>
<option value="45272">45272 - Douar sour</option>
<option value="45273">45273 - Anmiter ounilla</option>
<option value="45300">45300 - Ikniouen</option>
<option value="45350">45350 - Khemis dades</option>
<option value="45372">45372 - Zaouit el bir</option>
<option value="45400">45400 - Mhamid</option>
<option value="45422">45422 - Oulad driss el ghouzlane</option>
<option value="45450">45450 - Msemrir</option>
<option value="45472">45472 - Oussikiss ait azza</option>
<option value="45473">45473 - Tilmi</option>
<option value="45500">45500 - Skoura ahl el oust</option>
<option value="45522">45522 - Idelsane</option>
<option value="45523">45523 - Imassine</option>
<option value="45550">45550 - Tagounite</option>
<option value="45572">45572 - El blida</option>
<option value="45573">45573 - Nesrate</option>
<option value="45574">45574 - Zaouit sidi salah</option>
<option value="45600">45600 - Tamegroute</option>
<option value="45622">45622 - Fezouata</option>
<option value="45650">45650 - Tarhzout n''ait atta</option>
<option value="45700">45700 - Tazzarine</option>
<option value="45702">45702 - Nkob</option>
<option value="45722">45722 - Tarhbalt</option>
<option value="45723">45723 - Ait ouallal</option>
<option value="45724">45724 - Taftechna</option>
<option value="45750">45750 - Tazenakhte</option>
<option value="45772">45772 - Anzal</option>
<option value="45773">45773 - Asdif</option>
<option value="45774">45774 - Bouazzer</option>
<option value="45775">45775 - Khouzama</option>
<option value="45800">45800 - Tinerhir</option>
<option value="45822">45822 - Imider</option>
<option value="45823">45823 - Ouaklim</option>
<option value="45824">45824 - Toudgha el oulia</option>
<option value="45825">45825 - Toudgha el soufla</option>
<option value="45850">45850 - Toundoute</option>
<option value="45872">45872 - Imi n''oulaoun</option>
<option value="45900">45900 - Zagora</option>
<option value="45922">45922 - Bni zoli</option>
<option value="45923">45923 - Ternata</option>
<option value="45924">45924 - Tinzouline</option>
<option value="45925">45925 - Benzeroual</option>
<option value="45926">45926 - Bleida</option>
<option value="46000">46000 - Safi</option>
<option value="46002">46002 - Safi azib drai</option>
<option value="46003">46003 - Safi sidi boudhab</option>
<option value="46004">46004 - Safi sidi abdelkrim</option>
<option value="46005">46005 - Safi sidi ouassel</option>
<option value="46006">46006 - Had harrara</option>
<option value="46022">46022 - Arbaa khatta zakarne</option>
<option value="46023">46023 - Beddouza</option>
<option value="46024">46024 - Sidi tiji</option>
<option value="46025">46025 - Souira kedima</option>
<option value="46026">46026 - Dar si aissa</option>
<option value="46027">46027 - Souk eyr</option>
<option value="46028">46028 - Oulad salmane</option>
<option value="46050">46050 - Chemaia</option>
<option value="46052">46052 - Tleta irhoud</option>
<option value="46072">46072 - Atiamim</option>
<option value="46073">46073 - Jdour</option>
<option value="46074">46074 - Lakhoualqa</option>
<option value="46075">46075 - Ras el ain ahmar</option>
<option value="46076">46076 - Sidi chiker</option>
<option value="46077">46077 - Jnane bouih</option>
<option value="46100">46100 - Jemaa sehaim</option>
<option value="46122">46122 - Labkhati</option>
<option value="46123">46123 - Moul bergui</option>
<option value="46124">46124 - Tlet sidi aissa</option>
<option value="46150">46150 - Sebt gzoula</option>
<option value="46172">46172 - Atouabet</option>
<option value="46173">46173 - Khemis n''ga</option>
<option value="46174">46174 - Tnine rhiate</option>
<option value="46175">46175 - Lamrasla</option>
<option value="46200">46200 - Sidi ahmed</option>
<option value="46250">46250 - Tleta sidi bouguedra</option>
<option value="46300">46300 - Youssoufia</option>
<option value="46322">46322 - Esbiaat</option>
<option value="50000">50000 - Meknes</option>
<option value="50002">50002 - Meknes bassatine</option>
<option value="50003">50003 - Meknes beni m''hammed</option>
<option value="50004">50004 - Meknes medina</option>
<option value="50005">50005 - Meknes oujeh arouss</option>
<option value="50006">50006 - Toulal</option>
<option value="50007">50007 - Meknes zitoune</option>
<option value="50008">50008 - Meknes borj moulay omar</option>
<option value="50022">50022 - Ain el orma</option>
<option value="50023">50023 - Ain kerma</option>
<option value="50024">50024 - Ait aissa addi</option>
<option value="50025">50025 - Oued rommane</option>
<option value="50026">50026 - Ait rahhou mjatt</option>
<option value="50027">50027 - Ait yazem</option>
<option value="50028">50028 - Bouderbala</option>
<option value="50029">50029 - Bridia</option>
<option value="50030">50030 - Ras jerri</option>
<option value="50031">50031 - Zoualet</option>
<option value="50050">50050 - Ain jemaa</option>
<option value="50100">50100 - El hadj kaddour</option>
<option value="50122">50122 - Sidi slimane mjatt</option>
<option value="50150">50150 - Tnine m''haya</option>
<option value="50300">50300 - Boufekrane</option>
<option value="50350">50350 - Moulay idriss</option>
<option value="50352">50352 - Nzalate bni ammar</option>
<option value="50372">50372 - Beni ammar</option>
<option value="50373">50373 - Kermat bensalem</option>
<option value="50374">50374 - Moussaoua</option>
<option value="50375">50375 - Mrhassiyne</option>
<option value="50376">50376 - Sidi ali benhamdouche</option>
<option value="50377">50377 - Volubilis</option>
<option value="50378">50378 - Hafrat ben taybi</option>
<option value="51000">51000 - El hajeb</option>
<option value="51050">51050 - Agourai</option>
<option value="51052">51052 - Sebt jahjouh</option>
<option value="51100">51100 - Ain taoujdate</option>
<option value="51122">51122 - Ain taoujdate plateau</option>
<option value="51123">51123 - Bittit</option>
<option value="51124">51124 - Laqsir</option>
<option value="51150">51150 - Sebaa aioun</option>
<option value="51172">51172 - Oued al jadidah</option>
<option value="52000">52000 - Errachidia</option>
<option value="52002">52002 - Asrir oued ferkla</option>
<option value="52003">52003 - Errachidia boutalamine</option>
<option value="52022">52022 - Ait othman</option>
<option value="52023">52023 - Chorfa mdarhra</option>
<option value="52024">52024 - Kheng</option>
<option value="52025">52025 - Meski</option>
<option value="52050">52050 - Aoufous</option>
<option value="52052">52052 - Zrigate</option>
<option value="52072">52072 - Douira</option>
<option value="52073">52073 - Oulad chaker</option>
<option value="52100">52100 - Assoul</option>
<option value="52122">52122 - Ait hani</option>
<option value="52150">52150 - Boudenib</option>
<option value="52172">52172 - Ksar sahli</option>
<option value="52173">52173 - Tazougarte</option>
<option value="52200">52200 - Erfoud</option>
<option value="52202">52202 - Merzouga</option>
<option value="52222">52222 - M''fiss</option>
<option value="52223">52223 - Sifa arab sebbah ziz</option>
<option value="52224">52224 - Taouz</option>
<option value="52225">52225 - Hannabou</option>
<option value="52250">52250 - Goulmima</option>
<option value="52252">52252 - Tilouine</option>
<option value="52272">52272 - Amellago</option>
<option value="52273">52273 - Tamhrach rheris</option>
<option value="52300">52300 - Gourrama</option>
<option value="52350">52350 - Jorf</option>
<option value="52372">52372 - Fazna</option>
<option value="52400" selected="selected">52400 - Rich</option>
<option value="52402">52402 - Guers tiallaline</option>
<option value="52403">52403 - Imilchil</option>
<option value="52422">52422 - Amouguer</option>
<option value="52423">52423 - Mzizil tillechte</option>
<option value="52424">52424 - N''zala ait izdeg</option>
<option value="52425">52425 - Zaouia sidi hamza</option>
<option value="52426">52426 - Agdal imilchil</option>
<option value="52427">52427 - Outerbate</option>
<option value="52428">52428 - Bou azmou</option>
<option value="52429">52429 - Sidi aayad</option>
<option value="52450">52450 - Rissani</option>
<option value="52452">52452 - Alnif</option>
<option value="52453">52453 - Seffalate</option>
<option value="52472">52472 - Bni m''hammed</option>
<option value="52473">52473 - Hssyia</option>
<option value="52474">52474 - M''ssici</option>
<option value="52475">52475 - Sidi ali tafraout</option>
<option value="52476">52476 - Jbiyel</option>
<option value="52477">52477 - Achbarou</option>
<option value="52500">52500 - Tadighoust</option>
<option value="52522">52522 - Timezguite</option>
<option value="52600">52600 - Tinejdad</option>
<option value="52602">52602 - Mellab</option>
<option value="52622">52622 - Arhbalou n''kerdous</option>
<option value="52623">52623 - Touroug</option>
<option value="53000">53000 - Ifrane</option>
<option value="53022">53022 - Ait hamad ribaa</option>
<option value="53023">53023 - Dayat aoua</option>
<option value="53024">53024 - Zaouia ait sidi abdeslam</option>
<option value="53050">53050 - Ain leuh</option>
<option value="53100">53100 - Azrou</option>
<option value="53102">53102 - Sidi addi</option>
<option value="53103">53103 - Souk el had oued ifrane</option>
<option value="53104">53104 - Timahdite</option>
<option value="53105">53105 - Azrou ahadaf</option>
<option value="53122">53122 - Ait yahia ou alla</option>
<option value="53123">53123 - Ben smim</option>
<option value="53124">53124 - Ougmas</option>
<option value="54000">54000 - Khenifra</option>
<option value="54002">54002 - Kaf n''sour</option>
<option value="54003">54003 - Tighessaline</option>
<option value="54004">54004 - Khenifra amalou ighriben</option>
<option value="54022">54022 - El hri</option>
<option value="54023">54023 - Sidi bouabbed</option>
<option value="54050">54050 - Aguelmous</option>
<option value="54100">54100 - Ait ishak</option>
<option value="54102">54102 - Ouaoumana</option>
<option value="54150">54150 - Boumia</option>
<option value="54152">54152 - Aghbalou n''serdane</option>
<option value="54153">54153 - Ain aicha ait saadelli</option>
<option value="54200">54200 - El kbab</option>
<option value="54202">54202 - Sidi yahia ousaad</option>
<option value="54222">54222 - Ait hnini</option>
<option value="54250">54250 - Itzer</option>
<option value="54272">54272 - Ait oufella</option>
<option value="54273">54273 - Tamayouste</option>
<option value="54300">54300 - Kerrouchen</option>
<option value="54350">54350 - Midelt</option>
<option value="54352">54352 - Bouayach</option>
<option value="54372">54372 - Ait oumghar</option>
<option value="54373">54373 - Mibladen</option>
<option value="54374">54374 - Taakit</option>
<option value="54375">54375 - Zaida</option>
<option value="54376">54376 - Taghzoute chorafa</option>
<option value="54400">54400 - Moulay bouazza</option>
<option value="54402">54402 - Souk el had bouhssoussen</option>
<option value="54423">54423 - Souk sebt ait rahou</option>
<option value="54424">54424 - Souk tnine ait boukhayyou</option>
<option value="54425">54425 - Sidi m''hamed ben mbarek</option>
<option value="54450">54450 - Mrirt</option>
<option value="54452">54452 - El hammam</option>
<option value="54472">54472 - Jbel aouam</option>
<option value="54500">54500 - Tounfite</option>
<option value="54522">54522 - Agoudim</option>
<option value="54523">54523 - Sidi yahya ou youssef</option>
<option value="60000">60000 - Oujda</option>
<option value="60002">60002 - Oujda er riad</option>
<option value="60003">60003 - Oujda oued en nachef</option>
<option value="60004">60004 - Oujda takadoum</option>
<option value="60005">60005 - Ain es sfa</option>
<option value="60006">60006 - El bessara</option>
<option value="60007">60007 - Naima</option>
<option value="60008">60008 - Oujda isly</option>
<option value="60009">60009 - Oujda essaada</option>
<option value="60022">60022 - Oued el heimer</option>
<option value="60023">60023 - Oujda aeroport angad</option>
<option value="60024">60024 - Zoudj beghal</option>
<option value="60025">60025 - Mesteferki</option>
<option value="60050">60050 - Ahfir</option>
<option value="60072">60072 - Arhbal</option>
<option value="60100">60100 - Ain beni mathar</option>
<option value="60122">60122 - Merija</option>
<option value="60123">60123 - Ouled ghziyel</option>
<option value="60150">60150 - Ain el guenfouda</option>
<option value="60200">60200 - Ain reggada</option>
<option value="60250">60250 - Aklim</option>
<option value="60300">60300 - Berkane</option>
<option value="60302">60302 - Berkane el ouidadia</option>
<option value="60303">60303 - Madagh</option>
<option value="60322">60322 - Zayest</option>
<option value="60323">60323 - Zegzel</option>
<option value="60324">60324 - Laatamna</option>
<option value="60350">60350 - Beni drar</option>
<option value="60400">60400 - Debdou</option>
<option value="60450">60450 - El aioun</option>
<option value="60472">60472 - Mechra hoummadi</option>
<option value="60473">60473 - Mestigmer</option>
<option value="60474">60474 - Tancherfi</option>
<option value="60500">60500 - Hassi blal</option>
<option value="60550">60550 - Jerada</option>
<option value="60572">60572 - El aouinet</option>
<option value="60573">60573 - Guefait</option>
<option value="60600">60600 - Saidia</option>
<option value="60650">60650 - Sidi bouhouria</option>
<option value="60672">60672 - Rislane</option>
<option value="60700">60700 - Sidi yahya d''oujda</option>
<option value="60750">60750 - Taforhalt</option>
<option value="60800">60800 - Taourirt</option>
<option value="60822">60822 - Sidi lahcen</option>
<option value="60823">60823 - Melg el ouidane</option>
<option value="60850">60850 - Touissite</option>
<option value="60872">60872 - Tiouli</option>
<option value="60900">60900 - Zellidja boubker</option>
<option value="61000">61000 - Figuig</option>
<option value="61050">61050 - Ain chouater</option>
<option value="61100">61100 - Beni tajjite</option>
<option value="61122">61122 - Ait ahmad ou haddou</option>
<option value="61150">61150 - Bouanane</option>
<option value="61200">61200 - Bouarfa</option>
<option value="61222">61222 - Ain echchair</option>
<option value="61223">61223 - Mengoub</option>
<option value="61250">61250 - Talsinnt</option>
<option value="61272">61272 - Anoual bouchaouen</option>
<option value="61273">61273 - Boumerieme</option>
<option value="61300">61300 - Tendrara</option>
<option value="62000">62000 - Nador</option>
<option value="62002">62002 - Nador oulad mimoun</option>
<option value="62022">62022 - Aazanen</option>
<option value="62023">62023 - Bouarg</option>
<option value="62024">62024 - Farkhana</option>
<option value="62025">62025 - Mechra klila</option>
<option value="62026">62026 - Taouima</option>
<option value="62050">62050 - Beni enzar</option>
<option value="62100">62100 - Ben tib</option>
<option value="62122">62122 - Tizirhine</option>
<option value="62123">62123 - Talilit</option>
<option value="62150">62150 - Boudinar</option>
<option value="62200">62200 - Dar kebdani</option>
<option value="62250">62250 - Driouch</option>
<option value="62252">62252 - Ain zorah</option>
<option value="62272">62272 - Oulad boubker</option>
<option value="62300">62300 - Had beni chiker</option>
<option value="62350">62350 - Kariate arkmane</option>
<option value="62400">62400 - Khemis temsamane</option>
<option value="62422">62422 - Ajermounas</option>
<option value="62450">62450 - Mhajer</option>
<option value="62500">62500 - Midar</option>
<option value="62522">62522 - Kaceta</option>
<option value="62523">62523 - Tleta tasleft</option>
<option value="62550">62550 - Monte arui</option>
<option value="62600">62600 - Ras el ma</option>
<option value="62650">62650 - Segangan</option>
<option value="62672">62672 - Beni bouifrour</option>
<option value="62700">62700 - Selouane</option>
<option value="62750">62750 - Tafersite</option>
<option value="62800">62800 - Tiztoutine</option>
<option value="62850">62850 - Tleta jbel</option>
<option value="62872">62872 - Bni sidel louta</option>
<option value="62900">62900 - Zaio</option>
<option value="62902">62902 - Hassi berkane</option>
<option value="62922">62922 - Oulad daoud zkhanine</option>
<option value="70000">70000 - Laayoune</option>
<option value="70002">70002 - Laayoune port</option>
<option value="70003">70003 - Laayoune ville</option>
<option value="70022">70022 - Foum el oued</option>
<option value="70023">70023 - Dcheira tafoudart</option>
<option value="70050">70050 - Tarfaya</option>
<option value="70072">70072 - Daoura</option>
<option value="70073">70073 - Akhfennir</option>
<option value="71000">71000 - Boujdour</option>
<option value="72000">72000 - Es semara</option>
<option value="73000">73000 - Dakhla</option>
<option value="80000">80000 - Agadir</option>
<option value="80002">80002 - Agadir anza</option>
<option value="80003">80003 - Agadir far</option>
<option value="80004">80004 - Agadir quartier industriel</option>
<option value="80005">80005 - Agadir talborjt</option>
<option value="80006">80006 - Agadir hay dakhla</option>
<option value="80007">80007 - Bensergao</option>
<option value="80022">80022 - Taghazoute</option>
<option value="80023">80023 - Tamraght</option>
<option value="80050">80050 - Ait amira</option>
<option value="80100">80100 - Ait baha</option>
<option value="80102">80102 - Taalat</option>
<option value="80122">80122 - Had targa n''touchka</option>
<option value="80123">80123 - Hallate</option>
<option value="80124">80124 - Imi el had tasguedelt</option>
<option value="80125">80125 - Jemaa takouchte</option>
<option value="80126">80126 - Sidi abdallah el bouchouari</option>
<option value="80127">80127 - Sidi bouaz</option>
<option value="80128">80128 - Timzguida ou asrir</option>
<option value="80129">80129 - Khemis ait moussa</option>
<option value="80130">80130 - Ait ouadrim</option>
<option value="80150">80150 - Ait melloul</option>
<option value="80152">80152 - Ait melloul zone industrielle</option>
<option value="80200">80200 - Biougra</option>
<option value="80250">80250 - Had ait belfaa</option>
<option value="80272">80272 - Inchaden</option>
<option value="80273">80273 - Sebt ait milk</option>
<option value="80274">80274 - Sidi bibi</option>
<option value="80300">80300 - Immouzer ida ou tanane</option>
<option value="80302">80302 - Amskroud</option>
<option value="80322">80322 - Aksri</option>
<option value="80323">80323 - Idmine</option>
<option value="80324">80324 - Tiqqi</option>
<option value="80350">80350 - Inezgane</option>
<option value="80352">80352 - Dcheira</option>
<option value="80353">80353 - Inezgane mesdoura</option>
<option value="80354">80354 - Dcheira hay ilham</option>
<option value="80372">80372 - El kolea</option>
<option value="80400">80400 - Khmis ida ou gnidif</option>
<option value="80422">80422 - Aguerd n''tezke</option>
<option value="80423">80423 - Imhilen</option>
<option value="80450">80450 - Massa</option>
<option value="80472">80472 - Sidi r''bat</option>
<option value="80500">80500 - Tamri</option>
<option value="80522">80522 - Sebt assaka</option>
<option value="80550">80550 - Tanalt</option>
<option value="80572">80572 - Tlata ou guenz</option>
<option value="80600">80600 - Temsia</option>
<option value="80622">80622 - Souk el had oulad dahou</option>
<option value="80650">80650 - Tikiouine</option>
<option value="80700">80700 - Tnine hilala</option>
<option value="81000">81000 - Guelmim</option>
<option value="81002">81002 - Assa</option>
<option value="81003">81003 - Fask</option>
<option value="81004">81004 - Guelmim porte du sahara</option>
<option value="81005">81005 - Ksabi ait lahcen</option>
<option value="81006">81006 - Zag</option>
<option value="81022">81022 - Aouinat ait oussa</option>
<option value="81023">81023 - Aouinat tourkoz</option>
<option value="81024">81024 - Abainou</option>
<option value="81025">81025 - Aferket ait yassine</option>
<option value="81026">81026 - Asrir azouafit</option>
<option value="81027">81027 - Labiar</option>
<option value="81028">81028 - Taliouine assaka</option>
<option value="81029">81029 - Tighmert azouafit</option>
<option value="81030">81030 - Labouirat</option>
<option value="81031">81031 - Al mahbass</option>
<option value="81032">81032 - Targa wassay</option>
<option value="81033">81033 - Imi n''fast</option>
<option value="81034">81034 - Rass oumlil</option>
<option value="81050">81050 - Bouizakarne</option>
<option value="81052">81052 - Tagante</option>
<option value="81053">81053 - Timoulay</option>
<option value="81072">81072 - Ait boufoulne</option>
<option value="81100">81100 - Ifrane atlas seghir</option>
<option value="81122">81122 - Amsra</option>
<option value="81123">81123 - Tankert</option>
<option value="81150">81150 - Tarhjijt</option>
<option value="81172">81172 - Tnine adai</option>
<option value="82000">82000 - Tan-tan</option>
<option value="82002">82002 - Tan tan cite administrative</option>
<option value="82003">82003 - El ouatia</option>
<option value="82022">82022 - Abteh</option>
<option value="82023">82023 - Msied</option>
<option value="83000">83000 - Taroudannt</option>
<option value="83022">83022 - Ahmar</option>
<option value="83023">83023 - Had imoulass</option>
<option value="83024">83024 - Mechraa el ain</option>
<option value="83025">83025 - Sebt tafraoute</option>
<option value="83026">83026 - Sidi borja</option>
<option value="83027">83027 - Tazzemourte</option>
<option value="83028">83028 - Tlata ait taleb</option>
<option value="83029">83029 - Zaouiat sidi tahar</option>
<option value="83030">83030 - Had menizla</option>
<option value="83050">83050 - Aoulouz</option>
<option value="83072">83072 - El faid</option>
<option value="83073">83073 - Iouzioua ou neine</option>
<option value="83074">83074 - Tisrasse</option>
<option value="83100">83100 - Argana</option>
<option value="83122">83122 - Khemis bigoudine</option>
<option value="83150">83150 - Askaoun</option>
<option value="83172">83172 - Ahl tifnoute</option>
<option value="83173">83173 - Iguidi</option>
<option value="83174">83174 - Taouyalte</option>
<option value="83175">83175 - Toubkal</option>
<option value="83200">83200 - Freija</option>
<option value="83222">83222 - Ait igas</option>
<option value="83223">83223 - Nouara</option>
<option value="83224">83224 - Tioute</option>
<option value="83250">83250 - Irherm</option>
<option value="83252">83252 - Ait abdellah</option>
<option value="83253">83253 - Sebt tataout</option>
<option value="83272">83272 - Had imaouen</option>
<option value="83273">83273 - Oualkadi</option>
<option value="83274">83274 - Tantamt</option>
<option value="83275">83275 - Tleta nihit</option>
<option value="83276">83276 - Tnine addar</option>
<option value="83277">83277 - Tnine touflaazt</option>
<option value="83278">83278 - Ouzonne</option>
<option value="83300">83300 - Oulad berrehil</option>
<option value="83322">83322 - Dar bahbaz</option>
<option value="83323">83323 - Had igli</option>
<option value="83324">83324 - Khemis arazane</option>
<option value="83325">83325 - Khemis talagjount</option>
<option value="83326">83326 - Tnine ida ou gailal</option>
<option value="83327">83327 - Tnine tigouga</option>
<option value="83328">83328 - Toughmart</option>
<option value="83350">83350 - Oulad teima</option>
<option value="83372">83372 - El koudia</option>
<option value="83374">83374 - Issen</option>
<option value="83375">83375 - Ksiba ahl errmel</option>
<option value="83376">83376 - Sebt kfifate</option>
<option value="83377">83377 - Sidi ahmed ou amar</option>
<option value="83378">83378 - Sidi boumoussa</option>
<option value="83379">83379 - Sidi moussa</option>
<option value="83400">83400 - Sebt el guerdane</option>
<option value="83422">83422 - Arbaa assadss</option>
<option value="83423">83423 - Lakhnafif</option>
<option value="83424">83424 - Lamhadi</option>
<option value="83425">83425 - Tidsi nissendalene</option>
<option value="83450">83450 - Tafinegoult</option>
<option value="83500">83500 - Taliouine</option>
<option value="83522">83522 - Arbaa assais</option>
<option value="83523">83523 - Assaki</option>
<option value="83524">83524 - Irhil nourhou</option>
<option value="83525">83525 - Sidi hsaine</option>
<option value="83526">83526 - Tassousfi</option>
<option value="84000">84000 - Tata</option>
<option value="84022">84022 - Akka ighane</option>
<option value="84023">84023 - Khemis addis</option>
<option value="84024">84024 - Oum el guerdane</option>
<option value="84025">84025 - Tlata tagmout</option>
<option value="84026">84026 - Ibn yacoub</option>
<option value="84050">84050 - Akka</option>
<option value="84052">84052 - Khemis issafen</option>
<option value="84053">84053 - Tissint</option>
<option value="84072">84072 - Ait ouabelli</option>
<option value="84073">84073 - Kasbat sidi abdellah ben m''barek</option>
<option value="84074">84074 - Tizounine</option>
<option value="84075">84075 - Tizaghte</option>
<option value="84100">84100 - Fam el hisn</option>
<option value="84122">84122 - Aguerd tamanart</option>
<option value="84150">84150 - Foum zguid</option>
<option value="84172">84172 - Allougoum</option>
<option value="84173">84173 - Lakhriouia</option>
<option value="84174">84174 - Tlite</option>
<option value="85000">85000 - Tiznit</option>
<option value="85002">85002 - Arbaa sahel</option>
<option value="85003">85003 - Sebt ouijjane</option>
<option value="85004">85004 - Tnine aglou</option>
<option value="85022">85022 - El maader el kebir</option>
<option value="85023">85023 - Had raggada</option>
<option value="85024">85024 - Ighir melloulen</option>
<option value="85025">85025 - Oulad jerrar</option>
<option value="85026">85026 - Laaouina</option>
<option value="85027">85027 - Ighrem oulad jerrar</option>
<option value="85028">85028 - Ouled noummeur</option>
<option value="85029">85029 - Bouzerz</option>
<option value="85030">85030 - El kreima</option>
<option value="85031">85031 - Assaka</option>
<option value="85032">85032 - Aglou plage</option>
<option value="85033">85033 - Toubouzar</option>
<option value="85050">85050 - Ait erkha</option>
<option value="85072">85072 - Sidi abdellah ou belaid</option>
<option value="85100">85100 - Anezi</option>
<option value="85102">85102 - Tirhmi</option>
<option value="85122">85122 - Aday al mezouarte</option>
<option value="85123">85123 - Arbaa ait ahmed</option>
<option value="85124">85124 - Tafraoute el mouloud</option>
<option value="85125">85125 - Tifermite</option>
<option value="85126">85126 - Tlata ida gougmar</option>
<option value="85127">85127 - Zaouia sidi ahmed ou moussa</option>
<option value="85128">85128 - Ait issafzn</option>
<option value="85129">85129 - Jemaa ida oussemlal</option>
<option value="85150">85150 - Arbaa ras mouka</option>
<option value="85172">85172 - Ait brahim ou youssef</option>
<option value="85200">85200 - Ifni</option>
<option value="85202">85202 - Ifni hay lalla meryem</option>
<option value="85203">85203 - Sbouya</option>
<option value="85250">85250 - Jemaa n''tighirte</option>
<option value="85272">85272 - Anfeg</option>
<option value="85273">85273 - Sebt ennabour</option>
<option value="85274">85274 - Ibdar</option>
<option value="85275">85275 - Boutrouch</option>
<option value="85300">85300 - Mesti</option>
<option value="85350">85350 - Mirleft</option>
<option value="85400">85400 - Sebt bounaamane</option>
<option value="85422">85422 - Sidi bouabdelli</option>
<option value="85423">85423 - Tafraoute n''ait daoud</option>
<option value="85450">85450 - Tafraout</option>
<option value="85452">85452 - Had tahala</option>
<option value="85472">85472 - Anameur</option>
<option value="85473">85473 - Had afella irhir</option>
<option value="85474">85474 - Izerbi</option>
<option value="85475">85475 - Oumesnate</option>
<option value="85476">85476 - Tanfit ait oumzil</option>
<option value="85477">85477 - Tleta tassrirt</option>
<option value="85478">85478 - Tnine tarsouate</option>
<option value="85480">85480 - Khemis ait oufka</option>
<option value="85481">85481 - Tizourhane</option>
<option value="85482">85482 - Tleta tidli</option>
<option value="85500">85500 - Tiourhza</option>
<option value="85522">85522 - Arbaa ait abdellah</option>
<option value="85550">85550 - Tleta el akhsass</option>
<option value="85572">85572 - Sidi hsaine ou ali</option>
<option value="85600">85600 - Tnine amellou</option>
<option value="85622">85622 - Tangarfa</option>
<option value="90000">90000 - Tanger</option>
<option value="90002">90002 - Tanger drissia</option>
<option value="90003">90003 - Tanger m''sallah</option>
<option value="90004">90004 - Tanger souani</option>
<option value="90005">90005 - Tanger dradeb</option>
<option value="90006">90006 - Tanger val fleuri</option>
<option value="90007">90007 - Tanger al majd</option>
<option value="90022">90022 - Bahraouyne tanja</option>
<option value="90023">90023 - Bahraine aouama</option>
<option value="90025">90025 - Hajr enhal</option>
<option value="90026">90026 - Ksar seghir</option>
<option value="90027">90027 - Sania el jadida</option>
<option value="90028">90028 - Sebt zeniate</option>
<option value="90050">90050 - Asilah</option>
<option value="90052">90052 - Dar chaoui</option>
<option value="90053">90053 - Melloussa</option>
<option value="90054">90054 - Tnine sidi el yamani</option>
<option value="90072">90072 - Bghaghza</option>
<option value="90100">90100 - Gzenaya</option>
<option value="90300">90300 - Had rharbia</option>
<option value="91000">91000 - Chefchaouen</option>
<option value="91002">91002 - Bab taza</option>
<option value="91003">91003 - Steha</option>
<option value="91022">91022 - Ain beida</option>
<option value="91023">91023 - Asifane</option>
<option value="91024">91024 - Asjen</option>
<option value="91025">91025 - Beni rzen</option>
<option value="91026">91026 - Brikcha</option>
<option value="91027">91027 - Derdara</option>
<option value="91028">91028 - Had rhdir krouch</option>
<option value="91029">91029 - Talembote</option>
<option value="91030">91030 - Tanacob</option>
<option value="91031">91031 - Tlata assifane</option>
<option value="91032">91032 - Derkoul</option>
<option value="91033">91033 - Fifi</option>
<option value="91034">91034 - Beni bouzra</option>
<option value="91035">91035 - Kaa asrass</option>
<option value="91036">91036 - Tassift</option>
<option value="91050">91050 - Bab berret</option>
<option value="91072">91072 - Tamorote</option>
<option value="91073">91073 - Iounane</option>
<option value="91100">91100 - Bni ahmed</option>
<option value="91122">91122 - El malha</option>
<option value="91123">91123 - Bni ahmed gharbia</option>
<option value="91124">91124 - Mansoura</option>
<option value="91150">91150 - Jebha</option>
<option value="91152">91152 - Mokrisset</option>
<option value="91172">91172 - Bni smih</option>
<option value="91173">91173 - Amtar</option>
<option value="91174">91174 - Ouaouzgane</option>
<option value="91200">91200 - Zoumi</option>
<option value="92000">92000 - Larache</option>
<option value="92002">92002 - Sebt bni garfet</option>
<option value="92003">92003 - Larache al ouafa</option>
<option value="92022">92022 - Arbaa ayacha</option>
<option value="92023">92023 - Sidi ali</option>
<option value="92024">92024 - Zaaroura</option>
<option value="92050">92050 - Al aouamra</option>
<option value="92072">92072 - Zouada</option>
<option value="92100">92100 - Khemis sahel</option>
<option value="92150">92150 - Ksar el kebir ppal</option>
<option value="92152">92152 - Ksar el kebir hay essalam</option>
<option value="92172">92172 - Mecherah</option>
<option value="92173">92173 - Souk tolba</option>
<option value="92200">92200 - Tatoufet</option>
<option value="92250">92250 - Tlata rissana</option>
<option value="92272">92272 - Rissana janoubia</option>
<option value="93000">93000 - Tetouan</option>
<option value="93002">93002 - Tetouan m''hanech</option>
<option value="93003">93003 - Tetouan moulay hassan</option>
<option value="93004">93004 - Tetouan sidi talha</option>
<option value="93005">93005 - Tetouan touabel</option>
<option value="93006">93006 - Tetouan zone industrielle</option>
<option value="93007">93007 - Asmaten</option>
<option value="93022">93022 - Azla</option>
<option value="93023">93023 - Beni yder</option>
<option value="93024">93024 - Dar ben saddouk</option>
<option value="93025">93025 - El borch</option>
<option value="93026">93026 - El fendek</option>
<option value="93027">93027 - Zaouia sidi kacem</option>
<option value="93028">93028 - Zoco jemis de anyera</option>
<option value="93029">93029 - Jemaa el oued</option>
<option value="93030">93030 - Moulay abdeslam</option>
<option value="93031">93031 - Hakkama</option>
<option value="93050">93050 - Bni karrich fouki</option>
<option value="93100">93100 - Fnideq</option>
<option value="93122">93122 - Tarhremt</option>
<option value="93150">93150 - Martil</option>
<option value="93200">93200 - M''diq</option>
<option value="93222">93222 - Restinga</option>
<option value="93250">93250 - Oued laou</option>
<option value="99999">99999 - Inconnu</option>
                    </select>
                    @error('code_postal')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">province *:  </label>

                      <select class=" form-control" value="{{Auth::guard("etudiant")->user()->province}}"  name="province"  type="text" placeholder="Entrez notre province " required >
                        <option value="AGADIR IDA-TANANE">AGADIR IDA-TANANE</option>
                        <option value="AIN CHOCK HAY HASSANI">AIN CHOCK HAY HASSANI</option>
                        <option value="AIN SEBAA HAY MOHAMMEDI">AIN SEBAA HAY MOHAMMEDI</option>
                        <option value="AL FIDA DERB SULTAN">AL FIDA DERB SULTAN</option>
                        <option value="AL HAOUZ">AL HAOUZ</option>
                        <option value="AL HOCEIMA">AL HOCEIMA</option>
                        <option value="ASSA-ZAG">ASSA-ZAG</option>
                        <option value="AZILAL">AZILAL</option>
                        <option value="BEN MSICK MEDIOUNA">BEN MSICK MEDIOUNA</option>
                        <option value="BENI MELLAL">BENI MELLAL</option>
                        <option value="BENSLIMANE">BENSLIMANE</option>
                        <option value="BERKANE">BERKANE</option>
                        <option value="BOUJDOUR">BOUJDOUR</option>
                        <option value="BOULEMANE">BOULEMANE</option>
                        <option value="Berrechid">Berrechid</option>
                        <option value="CASABLANCA ANFA">CASABLANCA ANFA</option>
                        <option value="CHEFCHAOUEN">CHEFCHAOUEN</option>
                        <option value="CHICHAOUA">CHICHAOUA</option>
                        <option value="CHTOUKA-AIT-BAHA">CHTOUKA-AIT-BAHA</option>
                        <option value="Driouch">Driouch</option>
                        <option value="EL JADIDA">EL JADIDA</option>
                        <option value="EL MADIEQ">EL MADIEQ</option>
                        <option value="EL-HAJEB">EL-HAJEB</option>
                        <option value="ERRACHIDIA">ERRACHIDIA</option>
                        <option value="ES-SEMARA">ES-SEMARA</option>
                        <option value="ESSAOUIRA">ESSAOUIRA</option>
                        <option value="ETRANGER">ETRANGER</option>
                        <option value="FAHS BNI MAKADA">FAHS BNI MAKADA</option>
                        <option value="FES">FES</option>
                        <option value="FES-MEDINA">FES-MEDINA</option>
                        <option value="FIGUIG">FIGUIG</option>
                        <option value="Fquih Ben Salah">Fquih Ben Salah</option>
                        <option value="GUELMIM">GUELMIM</option>
                        <option value="Guercif">Guercif</option>
                        <option value="H-Hassani">H-Hassani</option>
                        <option value="IFRANE">IFRANE</option>
                        <option value="INZEGANE-AIT-MELLOUL">INZEGANE-AIT-MELLOUL</option>
                        <option value="JERADA">JERADA</option>
                        <option value="KELAAT  ESSRAGHNA">KELAAT  ESSRAGHNA</option>
                        <option value="KENITRA">KENITRA</option>
                        <option value="KHEMISSET">KHEMISSET</option>
                        <option value="KHENIFRA">KHENIFRA</option>
                        <option value="KHOURIBGA">KHOURIBGA</option>
                        <option value="LAAYOUNE">LAAYOUNE</option>
                        <option value="LARACHE">LARACHE</option>
                        <option value="MAROC">MAROC</option>
                        <option value="MAROC MILITAIRE">MAROC MILITAIRE</option>
                        <option value="MARRAKECH">MARRAKECH</option>
                        <option value="MARRAKECH-MENARA">MARRAKECH-MENARA</option>
                        <option value="MECHOUAR(CASA)">MECHOUAR(CASA)</option>
                        <option value="MEKNES">MEKNES</option>
                        <option value="MEKNES-EL-MENZEH">MEKNES-EL-MENZEH</option>
                        <option value="MOHAMMADIA">MOHAMMADIA</option>
                        <option value="MOULAY RCHID SIDI OTMANE">MOULAY RCHID SIDI OTMANE</option>
                        <option value="Midelt" selected="selected">Midelt</option>
                        <option value="NADOR">NADOR</option>
                        <option value="NOUASSER">NOUASSER</option>
                        <option value="OUARZAZATE">OUARZAZATE</option>
                        <option value="OUED ED DAHAB">OUED ED DAHAB</option>
                        <option value="OUJDA-ANGAD">OUJDA-ANGAD</option>
                        <option value="Ouezzane">Ouezzane</option>
                        <option value="Ouezzane">Ouezzane</option>
                        <option value="RABAT">RABAT</option>
                        <option value="S-Ifni">S-Ifni</option>
                        <option value="SAFI">SAFI</option>
                        <option value="SALA ALJADIDA">SALA ALJADIDA</option>
                        <option value="SALE BOUKNADEL">SALE BOUKNADEL</option>
                        <option value="SEFROU">SEFROU</option>
                        <option value="SETTAT">SETTAT</option>
                        <option value="SIDI BERNOUSSI ZENATA">SIDI BERNOUSSI ZENATA</option>
                        <option value="SIDI KACEM">SIDI KACEM</option>
                        <option value="SIDI YOUSSEF BEN ALI">SIDI YOUSSEF BEN ALI</option>
                        <option value="SKHIRATE-TEMARA">SKHIRATE-TEMARA</option>
                        <option value="Sidi Bennour">Sidi Bennour</option>
                        <option value="Sidi Slimane">Sidi Slimane</option>
                        <option value="Sidi Slimane">Sidi Slimane</option>
                        <option value="Sidi Yahya">Sidi Yahya</option>
                        <option value="TAN-TAN">TAN-TAN</option>
                        <option value="TANGER">TANGER</option>
                        <option value="TAOUNATE">TAOUNATE</option>
                        <option value="TAOURIRT">TAOURIRT</option>
                        <option value="TAROUDANT">TAROUDANT</option>
                        <option value="TATA">TATA</option>
                        <option value="TAZA">TAZA</option>
                        <option value="TETOUAN">TETOUAN</option>
                        <option value="TIZNIT">TIZNIT</option>
                        <option value="Tarfaya">Tarfaya</option>
                        <option value="Tinghir">Tinghir</option>
                        <option value="Youssoufia">Youssoufia</option>
                        <option value="ZAGORA">ZAGORA</option>
                        <option value="ZOUAGHA - MOULAY-YACOUB">ZOUAGHA - MOULAY-YACOUB</option></select>
                  </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Email*:  </label>

                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->email}}"  name="email"  type="email" placeholder="Entrez notre  email" required/>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Telephone *:  </label>

                      <input class=" form-control" value="{{Auth::guard("etudiant")->user()->telephone}}"  name="telephone"  type="text" placeholder="Entrez notre Telephone " required/>
                      @error('telephone')
                      <div class="alert alert-danger">{{ $message }}</div>
      
                      @enderror
                    </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-lg-4 col-sm-6">
                    <label for="form-label" style="float: left">CIN*:  </label>

                      <input class=" form-control" value="{{Auth::guard("etudiant")->user()->cin_et}}"  name="cin_et"  type="text" placeholder="Entrez notre cin" required/>
                      @error('cin_et')
                      <div class="alert alert-danger">{{ $message }}</div>
      
                      @enderror
                    </div>
                    <div class="col-lg-4 col-sm-6">
                      <label for="form-label" style="float: left">CM OU CNE*:  </label>
  
                        <input class=" form-control" value="{{Auth::guard("etudiant")->user()->cm_ou_cne}}"  name="cm_ou_cne"  type="text" placeholder="Entrez notre CNE OU CM" required/>
                      </div>
                  <div class="col-lg-4 col-sm-6">
                  <label for="form-label" style="float: left">Pays*:  </label>

                    <select class=" form-control" value="{{Auth::guard("etudiant")->user()->pays}}"  name="pays"  type="text"  required   >  <option value="AFGHANISTAN">AFGHANISTAN</option>
                      <option value="AFRIQUE DU SUD">AFRIQUE DU SUD</option>
                      <option value="ALBANIE">ALBANIE</option>
                      <option value="ALGERIE">ALGERIE</option>
                      <option value="ALLEMAGNE">ALLEMAGNE</option>
                      <option value="ANDORRE">ANDORRE</option>
                      <option value="ANGOLA">ANGOLA</option>
                      <option value="ANTIGUA ET BARBUDA">ANTIGUA ET BARBUDA</option>
                      <option value="ANTILLES NEERLANDAISES">ANTILLES NEERLANDAISES</option>
                      <option value="ARABIE SAOUDITE">ARABIE SAOUDITE</option>
                      <option value="ARGENTINE">ARGENTINE</option>
                      <option value="ARMENIE">ARMENIE</option>
                      <option value="ARUBA">ARUBA</option>
                      <option value="AUSTRALIE">AUSTRALIE</option>
                      <option value="AUTRES pays">AUTRES pays</option>
                      <option value="AUTRICHE">AUTRICHE</option>
                      <option value="AZERBAIDJAN">AZERBAIDJAN</option>
                      <option value="BAHAMAS">BAHAMAS</option>
                      <option value="BAHREIN">BAHREIN</option>
                      <option value="BANGLADESH">BANGLADESH</option>
                      <option value="BARBADE">BARBADE</option>
                      <option value="BELGIQUE">BELGIQUE</option>
                      <option value="BELIZE">BELIZE</option>
                      <option value="BENIN">BENIN</option>
                      <option value="BERMUDES">BERMUDES</option>
                      <option value="BHOUTAN">BHOUTAN</option>
                      <option value="BIELORUSSIE">BIELORUSSIE</option>
                      <option value="BOLIVIE">BOLIVIE</option>
                      <option value="BOSNIE HERZEGOVINE">BOSNIE HERZEGOVINE</option>
                      <option value="BOTSWANA">BOTSWANA</option>
                      <option value="BRESIL">BRESIL</option>
                      <option value="BRUNEI">BRUNEI</option>
                      <option value="BULGARIE">BULGARIE</option>
                      <option value="BURKINA FASO">BURKINA FASO</option>
                      <option value="BURUNDI">BURUNDI</option>
                      <option value="CAMBODGE">CAMBODGE</option>
                      <option value="CAMEROUN">CAMEROUN</option>
                      <option value="CANADA">CANADA</option>
                      <option value="CAP VERT">CAP VERT</option>
                      <option value="CENTRAFRIQUE">CENTRAFRIQUE</option>
                      <option value="CHAGOS(ARCHIPEL)">CHAGOS(ARCHIPEL)</option>
                      <option value="CHILI">CHILI</option>
                      <option value="CHINE POPULAIRE">CHINE POPULAIRE</option>
                      <option value="CHYPRE">CHYPRE</option>
                      <option value="COLOMBIE">COLOMBIE</option>
                      <option value="COMORES">COMORES</option>
                      <option value="CONGO">CONGO</option>
                      <option value="COREE DU NORD">COREE DU NORD</option>
                      <option value="COREE DU SUD">COREE DU SUD</option>
                      <option value="COSTA RICA">COSTA RICA</option>
                      <option value="COTE D'IVOIRE">COTE D'IVOIRE</option>
                      <option value="CROATIE">CROATIE</option>
                      <option value="CUBA">CUBA</option>
                      <option value="DANEMARK">DANEMARK</option>
                      <option value="DJIBOUTI">DJIBOUTI</option>
                      <option value="DOMINIQUE">DOMINIQUE</option>
                      <option value="EGYPTE">EGYPTE</option>
                      <option value="EL SALVADOR">EL SALVADOR</option>
                      <option value="EMIRATS ARABES UNIS">EMIRATS ARABES UNIS</option>
                      <option value="EQUATEUR">EQUATEUR</option>
                      <option value="ERYTHREE">ERYTHREE</option>
                      <option value="ESPAGNE">ESPAGNE</option>
                      <option value="ESTONIE">ESTONIE</option>
                      <option value="ETATS UNIS">ETATS UNIS</option>
                      <option value="ETHIOPIE">ETHIOPIE</option>
                      <option value="EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I">EX REPUBLIQUE YOUGOSLAVE DE MACEDOINE I</option>
                      <option value="EXFRANCE">EXFRANCE</option>
                      <option value="FIDJI">FIDJI</option>
                      <option value="FINLANDE">FINLANDE</option>
                      <option value="FRANCE">FRANCE</option>
                      <option value="GABON">GABON</option>
                      <option value="GAMBIE">GAMBIE</option>
                      <option value="GEORGIE">GEORGIE</option>
                      <option value="GHANA">GHANA</option>
                      <option value="GIBRALTAR">GIBRALTAR</option>
                      <option value="GRANDE BRETAGNE">GRANDE BRETAGNE</option>
                      <option value="GRECE">GRECE</option>
                      <option value="GRENADE ETGRENADINES">GRENADE ETGRENADINES</option>
                      <option value="GUADELOUPE">GUADELOUPE</option>
                      <option value="GUAM">GUAM</option>
                      <option value="GUATEMALA">GUATEMALA</option>
                      <option value="GUINEE">GUINEE</option>
                      <option value="GUINEE BISSAU">GUINEE BISSAU</option>
                      <option value="GUINEE EQUATORIALE">GUINEE EQUATORIALE</option>
                      <option value="GUYANA">GUYANA</option>
                      <option value="GUYANE">GUYANE</option>
                      <option value="HAITI">HAITI</option>
                      <option value="HONDURAS">HONDURAS</option>
                      <option value="HONG KONG">HONG KONG</option>
                      <option value="HONGRIE">HONGRIE</option>
                      <option value="ILE MARSHALL">ILE MARSHALL</option>
                      <option value="ILE MAURICE">ILE MAURICE</option>
                      <option value="ILES CAIMAN">ILES CAIMAN</option>
                      <option value="ILES COOK">ILES COOK</option>
                      <option value="ILES DU PACIFIQUE">ILES DU PACIFIQUE</option>
                      <option value="ILES MALOUINES">ILES MALOUINES</option>
                      <option value="ILES VIERGES (ETATS UNIS)">ILES VIERGES (ETATS UNIS)</option>
                      <option value="ILES VIERGES (ROYAUME UNIS)">ILES VIERGES (ROYAUME UNIS)</option>
                      <option value="INDE">INDE</option>
                      <option value="INDONESIE">INDONESIE</option>
                      <option value="IRAK">IRAK</option>
                      <option value="IRAN">IRAN</option>
                      <option value="IRLANDE">IRLANDE</option>
                      <option value="ISLANDE">ISLANDE</option>
                      <option value="ISRAEL">ISRAEL</option>
                      <option value="ITALIE">ITALIE</option>
                      <option value="JAMAIQUE">JAMAIQUE</option>
                      <option value="JAPON">JAPON</option>
                      <option value="JORDANIE">JORDANIE</option>
                      <option value="KAZAKHSTAN">KAZAKHSTAN</option>
                      <option value="KENYA">KENYA</option>
                      <option value="KIRGHISTAN">KIRGHISTAN</option>
                      <option value="KIRIBATI">KIRIBATI</option>
                      <option value="KOWEIT">KOWEIT</option>
                      <option value="LA REUNION">LA REUNION</option>
                      <option value="LAOS">LAOS</option>
                      <option value="LESOTHO">LESOTHO</option>
                      <option value="LETTONIE">LETTONIE</option>
                      <option value="LIBAN">LIBAN</option>
                      <option value="LIBERIA">LIBERIA</option>
                      <option value="LIBYE">LIBYE</option>
                      <option value="LIECHTENSTEIN">LIECHTENSTEIN</option>
                      <option value="LITHUANIE">LITHUANIE</option>
                      <option value="LUXEMBOURG">LUXEMBOURG</option>
                      <option value="MACAO">MACAO</option>
                      <option value="MADAGASCAR">MADAGASCAR</option>
                      <option value="MALAISIE">MALAISIE</option>
                      <option value="MALAWI">MALAWI</option>
                      <option value="MALDIVES">MALDIVES</option>
                      <option value="MALI">MALI</option>
                      <option value="MALTE">MALTE</option>
                      <option value="MAROC" selected="selected">MAROC</option>
                      <option value="MARTINIQUE">MARTINIQUE</option>
                      <option value="MAURITANIE">MAURITANIE</option>
                      <option value="MEXIQUE">MEXIQUE</option>
                      <option value="MICRONESIE">MICRONESIE</option>
                      <option value="MOLDAVIE">MOLDAVIE</option>
                      <option value="MONACO">MONACO</option>
                      <option value="MONGOLIE">MONGOLIE</option>
                      <option value="MOZAMBIQUE">MOZAMBIQUE</option>
                      <option value="MYANMAR">MYANMAR</option>
                      <option value="NAMIBIE">NAMIBIE</option>
                      <option value="NAURU">NAURU</option>
                      <option value="NEPAL">NEPAL</option>
                      <option value="NICARAGUA">NICARAGUA</option>
                      <option value="NIGER">NIGER</option>
                      <option value="NIGERIA">NIGERIA</option>
                      <option value="NIOUE">NIOUE</option>
                      <option value="NORVEGE">NORVEGE</option>
                      <option value="NOUVELLE CALEDONIE">NOUVELLE CALEDONIE</option>
                      <option value="NOUVELLE ZELANDE">NOUVELLE ZELANDE</option>
                      <option value="OMAN">OMAN</option>
                      <option value="OUGANDA">OUGANDA</option>
                      <option value="OUZBEKISTAN">OUZBEKISTAN</option>
                      <option value="PAKISTAN">PAKISTAN</option>
                      <option value="PALESTINE">PALESTINE</option>
                      <option value="PANAMA">PANAMA</option>
                      <option value="PAPOUASIE NOUVELLE GUINEE">PAPOUASIE NOUVELLE GUINEE</option>
                      <option value="PARAGUAY">PARAGUAY</option>
                      <option value="PAY BAS">PAY BAS</option>
                      <option value="PEROU">PEROU</option>
                      <option value="PHILIPPINES">PHILIPPINES</option>
                      <option value="POLOGNE">POLOGNE</option>
                      <option value="POLYNESIE FRANCAISE">POLYNESIE FRANCAISE</option>
                      <option value="PORTO RICO">PORTO RICO</option>
                      <option value="PORTUGAL">PORTUGAL</option>
                      <option value="QATAR">QATAR</option>
                      <option value="REPUBLIQUE DES ILES PALAOS">REPUBLIQUE DES ILES PALAOS</option>
                      <option value="REPUBLIQUE TCHEQUE">REPUBLIQUE TCHEQUE</option>
                      <option value="ROUMANIE">ROUMANIE</option>
                      <option value="RUSSIE">RUSSIE</option>
                      <option value="RWANDA">RWANDA</option>
                      <option value="SAINT DOMINGUE">SAINT DOMINGUE</option>
                      <option value="SAINT KITTS ET NEVIS">SAINT KITTS ET NEVIS</option>
                      <option value="SAINT MARIN">SAINT MARIN</option>
                      <option value="SAINT SIEGE">SAINT SIEGE</option>
                      <option value="SAINT VINCENT">SAINT VINCENT</option>
                      <option value="SAINTE LUCIE">SAINTE LUCIE</option>
                      <option value="SALOMON">SALOMON</option>
                      <option value="SAMOA AMERICAINES">SAMOA AMERICAINES</option>
                      <option value="SAMOA OCCIDENTALES">SAMOA OCCIDENTALES</option>
                      <option value="SAO TOME ET PRINCIPE">SAO TOME ET PRINCIPE</option>
                      <option value="SENEGAL">SENEGAL</option>
                      <option value="SEYCHELLES">SEYCHELLES</option>
                      <option value="SIERRA LEONE">SIERRA LEONE</option>
                      <option value="SINGAPOUR">SINGAPOUR</option>
                      <option value="SLOVAQUIE">SLOVAQUIE</option>
                      <option value="SLOVENIE">SLOVENIE</option>
                      <option value="SOMALIE">SOMALIE</option>
                      <option value="SOUDAN">SOUDAN</option>
                      <option value="SRI LANKA">SRI LANKA</option>
                      <option value="ST CHRISTOPHE NIEVES">ST CHRISTOPHE NIEVES</option>
                      <option value="STE HELENE">STE HELENE</option>
                      <option value="SUEDE">SUEDE</option>
                      <option value="SUISSE">SUISSE</option>
                      <option value="SURINAM">SURINAM</option>
                      <option value="SWAZILAND">SWAZILAND</option>
                      <option value="SYRIE">SYRIE</option>
                      <option value="TADJIKISTAN">TADJIKISTAN</option>
                      <option value="TAIWAN">TAIWAN</option>
                      <option value="TANZANIE">TANZANIE</option>
                      <option value="TCHAD">TCHAD</option>
                      <option value="THAILANDE">THAILANDE</option>
                      <option value="TOGO">TOGO</option>
                      <option value="TONGA OU FRIENDLY">TONGA OU FRIENDLY</option>
                      <option value="TRINITE ET TOBAGO">TRINITE ET TOBAGO</option>
                      <option value="TUNISIE">TUNISIE</option>
                      <option value="TURKMENISTAN">TURKMENISTAN</option>
                      <option value="TURQUIE">TURQUIE</option>
                      <option value="TUVALU">TUVALU</option>
                      <option value="UKRAINE">UKRAINE</option>
                      <option value="URUGUAY">URUGUAY</option>
                      <option value="VANUATU">VANUATU</option>
                      <option value="VATICAN">VATICAN</option>
                      <option value="VENEZUELA">VENEZUELA</option>
                      <option value="VIETNAM">VIETNAM</option>
                      <option value="YEMEN">YEMEN</option>
                      <option value="YOUGOSLAVIE">YOUGOSLAVIE</option>
                      <option value="ZAIRE">ZAIRE</option>
                      <option value="ZAMBIE">ZAMBIE</option>
                      <option value="ZIMBABWE">ZIMBABWE</option></select>
                  </div>

                  
                  
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Profission de Pere*:  </label>

                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->profession_pere}}"  type="text" name="profession_pere"  placeholder="Entrez notre Profission de Pere" required/>
                    @error('profession_pere')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Profission de Mere *:  </label>

                      <input class=" form-control" value="{{Auth::guard("etudiant")->user()->profession_mere}}"  type="text" name="profession_mere"  placeholder="Entrez notre Profission de Mere " required/>
                      @error('profession_mere')
                      <div class="alert alert-danger">{{ $message }}</div>
      
                      @enderror
                    </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Telephone de Pere*:  </label>

                  
                  <input class=" form-control" value="{{Auth::guard("etudiant")->user()->telephone_pere}}"  type="text" name="telephone_pere"  placeholder="Entrez notre Telephone de Pere" required/>
                  @error('telephone_pere')
                  <div class="alert alert-danger">{{ $message }}</div>
  
                  @enderror
                </div>

                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Telephone de Mere *:  </label>

                      <input class=" form-control" value="{{Auth::guard("etudiant")->user()->telephone_mere}}"  type="text"  name="telephone_mere"  placeholder="Entrez notre Telephone de Mere " required/>
                      @error('telephone_mere')
                      <div class="alert alert-danger">{{ $message }}</div>
      
                      @enderror
                    </div>
                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                  <label for="form-label" style="float: left">Cin de Pere*:  </label>

                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->cin_pere}}"  type="text" name="cin_pere"   placeholder="Entrez notre Cin de Pere" required/>
                    @error('cin_pere')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                    <label for="form-label" style="float: left">Cin de Mere *:  </label>

                     
                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->cin_mere}}"  type="text" name="cin_mere" placeholder="Entrez notre Cin de Mere " required/>
                    @error('cin_mere')
                    <div class="alert alert-danger">{{ $message }}</div>
    
                    @enderror
                  </div>

                  
                </div>
                <div class="form-row mt-4">
                  <div class="col-12 col-sm-6">
                      <label for="form-label" style="float: left">Pere vivre*:</label>
                      <br>
                      <input type="radio" value="non" name="vivre_pere" required {{ Auth::guard('etudiant')->user()->vivre_pere === 'non' ? 'checked' : '' }}> Non
                      <input type="radio" value="oui" name="vivre_pere" required {{ Auth::guard('etudiant')->user()->vivre_pere === 'oui' ? 'checked' : '' }}> Oui
                  </div>
                  <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                      <label for="form-label" style="float: left">Mere vivre*:</label>
                      <br>
                      <input type="radio" value="non" name="vivre_mere" required {{ Auth::guard('etudiant')->user()->vivre_mere === 'non' ? 'checked' : '' }}> Non
                      <input type="radio" value="oui" name="vivre_mere" required {{ Auth::guard('etudiant')->user()->vivre_mere === 'oui' ? 'checked' : '' }}> Oui
                  </div>
              </div>
              
                
            <button type="submit" class="action-button">Suivante</button>  
        </fieldset>
    </form>
</section>
<script src="{{ asset('form/form.js') }}"></script>
