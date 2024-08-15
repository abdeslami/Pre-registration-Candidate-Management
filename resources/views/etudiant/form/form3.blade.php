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

    <form id="msform" action="postform3"   enctype="multipart/form-data" method="post">
        @csrf
        <div class="title">
            <h2>Pré-inscription</h2>
            <p>Remplissez le formulaire pour passer le concours écrit</p>
        </div>
        <ul id="progressbar">
            <li class="active">Information</li>  
            <li class="active">Type Diplome</li> 
            <li class="active">Scan</li>
            <li>Finish</li>
        </ul>

        <fieldset>
            <h3>Diploma Information</h3>
            <h6>Please provide your diploma details</h6> 
                            
                <div class="row">
                    <div class="col-6">
                            <div class="form-check">
                                 Sports individuels (الرياضات الفردية)
                            </div>
                    </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-3">
                                <input  type="checkbox"  name="sport_individuels[]" "  value="Judo" />
                                <label>Judo (الجودو)</label>
                        </div>
                        <div class="col-3">
                                <input  type="checkbox" name="sport_individuels[]" "   value="Cross" />
                                <label>Cross (العدو الريفي)</label>
                        </div>
                        <div class="col-3">
                                <input checked="checked"  name="sport_individuels[]" "   type="checkbox" value="Athlétisme" />
                                <label>Athlétisme (العاب القوى)</label>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-check">
                            Sports collectifs (الرياضات الجماعية)
                        </div>
                    </div>
                    <div class="col-6">
                         <div class="row">
                            <div class="col-3">
                                <input type="checkbox" name="sports_collectifs[]"   value="Football" />
                                <label>
                                Football (كرة القدم)
                                </label>
                            </div>
                            <div class="col-3">
                                <input type="checkbox"  name="sports_collectifs[]"   value="Mini foot" />
                                <label>
                                Mini foot (كرة القدم المصغرة)
                                </label>
                            </div>
                            <div class="col-3">
                            <input type="checkbox" name="sports_collectifs[]"   value="Hand ball" />
                                <label>
                                Hand ball (كرة اليد)
                                </label>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-3">
                            <input checked="checked" type="checkbox" name="sports_collectifs[]"  value="Basket ball" />
                            <label>
                            Basket ball (كرة السلة)
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="checkbox"  name="sports_collectifs[]"   value="Volley ball" />
                            <label>
                            Volley ball (الكرة الطائرة)
                            </label>
                        </div>
                        <div class="col-3">
                            <input type="checkbox" name="sports_collectifs[]"   value="Rugby" />
                            <label>
                            Rugby (الريكبي)
                            </label>
                        </div>
                </div>
                </div>
            </div>
            <div class="form-row mt-4">
                    <div class="col-12 col-sm-6">
                        <input class="form-check-input" type="checkbox" id="arts_plastiques" name="culturelles_arts_plastiques" value="Arts Plastiques">
                        <label class="form-check-label" for="arts_plastiques">Arts Plastiques</label>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <input class="form-check-input" type="checkbox" id="theatre" name="culturelles_theatre" value="Théâtre">
                        <label class="form-check-label" for="theatre">Théâtre</label>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <input class="form-check-input" type="checkbox" id="audiovisuel" name="culturelles_audiovisuel" value="Audiovisuel">
                        <label class="form-check-label" for="audiovisuel">Audiovisuel</label>
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <input class="form-check-input" type="checkbox" id="echecs" name="culturelles_echecs" value="Échecs">
                        <label class="form-check-label" for="echecs">Échecs</label>
                    </div>
                    
                    <div class="col-12 col-sm-6"> 
                        <input class="form-check-input" type="checkbox" id="ecriture" name="culturelles_ecriture" value="Écriture">
                    
                           <label class="form-check-label" for="ecriture">Écriture</label>
                    </div>
                </div>
         
            

            <div class="form-row mt-4">
                <div class="col-12 col-sm-6">
            <a href="{{ route('form2') }} " type="button" class="action-button  previous_button">Précédente</a>
                </div>
            <div class="col-12 col-sm-6">

            <button type="submit" class=" action-button">Suivante</button> 
            </div>
                </div>
        </fieldset>
    </form>
</section>
<script src="{{ asset('form/form.js') }}"></script>


