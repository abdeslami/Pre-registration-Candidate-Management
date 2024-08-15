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

    <form id="msform" action="postform2"  enctype="multipart/form-data" method="post">
        @csrf
        <div class="title">
            <h2>Pré-inscription</h2>
            <p>Remplissez le formulaire pour passer le concours écrit</p>
        </div>
        <ul id="progressbar">
            <li class="active">Information</li>  
            <li class="active">Type Diplome</li> 
            <li>Scan</li>
            <li>Finish</li>
        </ul>

        <fieldset>
            <h3>Diploma Information</h3>
            <h6>Please provide your diploma details</h6> 
            <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
                <label for="form-label">Scan bas (PDF) * :  </label>

                  @if (Auth::guard("etudiant")->user()->scan_bac)
                  <input class=" form-control" value="{{Auth::guard("etudiant")->user()->scan_bac}}" type="file" name="scan_bac" accept=".pdf"  >

                  
                  <a href="{{ asset('storage/dossier_scan/' .Auth::guard("etudiant")->user()->scan_bac) }}" target="_blank"> voir document </a>  
                  @else
                  <input class=" form-control" value="{{Auth::guard("etudiant")->user()->scan_bac}}" type="file" name="scan_bac" accept=".pdf"  required>

                  @endif
                </div>
                <div class="col-12 col-sm-6">
                  <label for="form-label">Scan Relvi note (PDF) *:  </label>

                    @if (Auth::guard("etudiant")->user()->relvi_note)
                    
                    <input class=" form-control" value="{{Auth::guard("etudiant")->user()->relvi_note}}" type="file"  name="relvi_note" accept=".pdf"  >
                    <a href="{{ asset('storage/dossier_scan/' .Auth::guard("etudiant")->user()->relvi_note) }}" target="_blank"> voir document </a>

                    @else
                  <input class=" form-control" value="{{Auth::guard("etudiant")->user()->relvi_note}}" type="file" name="relvi_note" accept=".pdf"  required>
                        
                    @endif
                  </div>
                
              </div>
            
            <div class="form-row mt-4">
              <div class="col-12 col-sm-6">
                
                <label for="form-label">Mention bac *:  </label>

                <select class=" form-control" value="{{Auth::guard("etudiant")->user()->mention_bac}}" type="text" name="mention_bac"  required>
                  <option value="Assez bien">Assez bien</option>
<option value="Autre">Autre</option>
<option value="Bien" selected="selected">Bien</option>
<option value="Honorable">Honorable</option>
<option value="Passable">Passable</option>
<option value="Très bien">Très bien</option>

                </select>
              </div>
              <div class="col-12 col-sm-6">
                
                <label for="form-label">Dans l'université Mohamed 1er Oujda*:  </label>

                  <select class=" form-control" value="{{Auth::guard("etudiant")->user()->universite_nom}}" name="universite_nom"  type="text" placeholder="Entrez notre nom universitaire " required>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023" selected="selected">2023</option>
                    <option value="2024" selected="selected">2024</option>
                    <option value="2025" selected="selected">2025</option>
                    <option value="2026" selected="selected">2026</option>
                  </select>
              </div>
            </div>
            <div class="form-row mt-4">

              <div class="col-12 col-sm-6">
                
                <label for="form-label">Anneé l'obtention de bace *:  </label>

                  <select class=" form-control" value="{{Auth::guard("etudiant")->user()->a_obtention_bac}}" name="a_obtention_bac"  type="text"  required>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023" selected="selected">2023</option>
                    <option value="2024" selected="selected">2024</option>
                    <option value="2025" selected="selected">2025</option>
                    <option value="2026" selected="selected">2026</option>

                  </select>
              </div>
              <div class="col-12 col-sm-6">
                
                <label for="form-label">Dans l'enseignement supérieur *:  </label>

                <select class=" form-control" value="{{Auth::guard("etudiant")->user()->enseignement_superieur}}" name="enseignement_superieur" type="text" placeholder="Entrez notre Mention de bac  " required>
                  <option value="2003">2003</option>
                  <option value="2004">2004</option>
                  <option value="2005">2005</option>
                  <option value="2006">2006</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023" selected="selected">2023</option>
                  <option value="2024" selected="selected">2024</option>
                  <option value="2025" selected="selected">2025</option>
                  <option value="2026" selected="selected">2026</option>
                </select>
              </div>

            </div>
            <div class="form-row mt-4">
              <div class="col-12 col-sm-6">
                
                <label for="form-label">Serie bac *:  </label>

                <select class=" form-control" value="{{Auth::guard("etudiant")->user()->serie_bac}}" name="serie_bac"  type="text" required>
                  <option value="Agriculture">Agriculture</option>
<option value="Architecture">Architecture</option>
<option value="Arts Plastiques">Arts Plastiques</option>
<option value="Arts et Industrie Graphique">Arts et Industrie Graphique</option>
<option value="Autres">Autres</option>
<option value="Bac A">Bac A</option>
<option value="Bac C">Bac C</option>
<option value="Bac D">Bac D</option>
<option value="Bac E">Bac E</option>
<option value="Bac Etranger">Bac Etranger</option>
<option value="Bac F">Bac F</option>
<option value="Bac G">Bac G</option>
<option value="Bac Mission">Bac Mission</option>
<option value="Bac S">Bac S</option>
<option value="Bac Technique">Bac Technique</option>
<option value="Batiment et traveaux publics">Batiment et traveaux publics</option>
<option value="Chariaâ Originelle">Chariaâ Originelle</option>
<option value="Chimie">Chimie</option>
<option value="Chimie Industrielle">Chimie Industrielle</option>
<option value="Comptabilité">Comptabilité</option>
<option value="Construction Mécanique">Construction Mécanique</option>
<option value="Economie nouvelle">Economie nouvelle</option>
<option value="Education physique">Education physique</option>
<option value="FILIERE LANGUE ARABE">FILIERE LANGUE ARABE</option>
<option value="FILIERE LETTRES">FILIERE LETTRES</option>
<option value="FILIERE PHYSIQUE CHIMIE" selected="selected">FILIERE PHYSIQUE CHIMIE</option>
<option value="FILIERE SC. AGRONOMIQUES">FILIERE SC. AGRONOMIQUES</option>
<option value="FILIERE SC. ECONOMIQUES">FILIERE SC. ECONOMIQUES</option>
<option value="FILIERE SC. ET TECHNO. ELECTRIQUE">FILIERE SC. ET TECHNO. ELECTRIQUE</option>
<option value="FILIERE SC. ET TECHNO. MECANIQUE">FILIERE SC. ET TECHNO. MECANIQUE</option>
<option value="FILIERE SC. GESTION COMPTABLE">FILIERE SC. GESTION COMPTABLE</option>
<option value="FILIERE SC. LA VIE ET LA TERRE">FILIERE SC. LA VIE ET LA TERRE</option>
<option value="FILIERE SC. MATHEMATIQUES -B-">FILIERE SC. MATHEMATIQUES -B-</option>
<option value="FILIERE SC.MATHEMATIQUES -A-">FILIERE SC.MATHEMATIQUES -A-</option>
<option value="FILIERE SCIENCES CHARIA">FILIERE SCIENCES CHARIA</option>
<option value="FILIERE SCIENCES HUMAINES">FILIERE SCIENCES HUMAINES</option>
<option value="Génie Chimique">Génie Chimique</option>
<option value="Génie Civil">Génie Civil</option>
<option value="Génie Industriel">Génie Industriel</option>
<option value="Génie Mécanique">Génie Mécanique</option>
<option value="Informatique">Informatique</option>
<option value="Lettres Modernes">Lettres Modernes</option>
<option value="Lettres Modernes Arabisées">Lettres Modernes Arabisées</option>
<option value="Lettres Modernes Bilingues">Lettres Modernes Bilingues</option>
<option value="Lettres Modernes Spécialité  Anglais">Lettres Modernes Spécialité  Anglais</option>
<option value="Lettres Modernes Spécialité Allemande">Lettres Modernes Spécialité Allemande</option>
<option value="Lettres Modernes Spécialité Espagnole">Lettres Modernes Spécialité Espagnole</option>
<option value="Lettres Modernes Spécialité Français">Lettres Modernes Spécialité Français</option>
<option value="Lettres Originelles">Lettres Originelles</option>
<option value="Lettres Originelles Arabisées">Lettres Originelles Arabisées</option>
<option value="Lettres Spécialité Langue">Lettres Spécialité Langue</option>
<option value="Lettres et Sciences Humaines">Lettres et Sciences Humaines</option>
<option value="Mathématiques-Techniques">Mathématiques-Techniques</option>
<option value="Micro-Mécanique">Micro-Mécanique</option>
<option value="Mécanique Auto">Mécanique Auto</option>
<option value="Mécanique ingénierie">Mécanique ingénierie</option>
<option value="SERIE ARTS APPLIQUES">SERIE ARTS APPLIQUES</option>
<option value="SERIE BAC ATIQ">SERIE BAC ATIQ</option>
<option value="Sans Bac">Sans Bac</option>
<option value="Science Economie et Gestion">Science Economie et Gestion</option>
<option value="Sciences">Sciences</option>
<option value="Sciences Agronomiques">Sciences Agronomiques</option>
<option value="Sciences Economiques">Sciences Economiques</option>
<option value="Sciences Expérimentales">Sciences Expérimentales</option>
<option value="Sciences Mathématiques">Sciences Mathématiques</option>
<option value="Sciences Techniques">Sciences Techniques</option>
<option value="Sciences de la Nature">Sciences de la Nature</option>
<option value="Secrétariat">Secrétariat</option>
<option value="Section Anglaise">Section Anglaise</option>
<option value="Section Espagnole">Section Espagnole</option>
<option value="Série de Bac Non Spécifiée">Série de Bac Non Spécifiée</option>
<option value="Techniques">Techniques</option>
<option value="Techniques Commerciales">Techniques Commerciales</option>
<option value="Techniques Industrielles">Techniques Industrielles</option>
<option value="Techniques Organisation Administrative">Techniques Organisation Administrative</option>
<option value="Techniques Organisation Comptable">Techniques Organisation Comptable</option>
<option value="Techniques Quantitatives de Gestion">Techniques Quantitatives de Gestion</option>
<option value="Techniques de Gestion Administrative">Techniques de Gestion Administrative</option>
<option value="Techniques de Gestion Comptable">Techniques de Gestion Comptable</option>

                </select>
              </div>
              <div class="col-12 col-sm-6">
                <label for="form-label">Type etablessement *:  </label>

                <select class=" form-control"  value="{{Auth::guard("etudiant")->user()->type_etablissement}}" name="type_etablissement" type="text"  required>
                  <option value="LYCEE ETRANGER">LYCEE ETRANGER</option>
<option value="LYCEE LIBRE">LYCEE LIBRE</option>
<option value="LYCEE PRIVEE">LYCEE PRIVEE</option>
<option value="LYCEE PUBLIC" selected="selected">LYCEE PUBLIC</option>
<option value="LYCEE MISSION">LYCEE MISSION</option>

                </select>
              </div>
              
            </div>
            <div class="form-row mt-4">
              <div class="col-12 col-sm-6">
                <label class="fieldlabels">Province d'établissement: <span class="necessary-field">*</span></label>
                <select class="form-control" name="province_etablissement" required="true">
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
                  <option value="KELAAT ESSRAGHNA">KELAAT ESSRAGHNA</option>
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
              </div>
          <div class="col-12 col-sm-6">

          </div>
              </div>
            <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
            <a href="{{ route('form1') }} " type="button" class="action-button  previous_button">Précédente</a>
                </div>
            <div class="col-12 col-sm-6">

            <button type="submit" class=" action-button">Suivante</button> 
            </div>
                </div>
        </fieldset>
    </form>
</section>
<script src="{{ asset('form/form.js') }}"></script>


