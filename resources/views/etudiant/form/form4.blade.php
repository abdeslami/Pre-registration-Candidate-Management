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

    <form id="msform" action="postform4"   enctype="multipart/form-data" method="post">
        @csrf
        <div class="title">
            <h2>Pré-inscription</h2>
            <p>Remplissez le formulaire pour passer le concours écrit</p>
        </div>
        <ul id="progressbar">
            <li class="active">Information</li>  
            <li class="active">Type Diplome</li> 
            <li class="active">Scan</li>
            <li class="active">Finish</li>
        </ul>

        <fieldset>
            <h2 align="center" style="color:#5f6771 " >Vous avez fini de remplir le formulaire.</h2>
            <h2 align="center" style="color:#5f6771 ">Téléchargez le reçu et la fiche d'inscription maintenant.</h2>


            <div class="form-row mt-4 d-flex justify-content-center align-items-center">
            <a href="{{ route('form3') }} " type="button" class="action-button  previous_button">Précédente</a>
              
                <a href="{{ route('recu') }} " type="button" class="action-button  previous_button">Télécharger le reçu</a>

                <a href="{{ route('inscription') }} " type="button" class="action-button  previous_button">Télécharger Fiche inscrition</a>

                </div>
        </fieldset>
    </form>
</section>
<script src="{{ asset('form/form.js') }}"></script>


