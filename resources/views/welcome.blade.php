<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, 
						initial-scale=1.0">
	<title>GeeksforGeeks</title>
	<link rel="stylesheet"
		href="css/acceuil/style.css">
</head>

<body>
		
	<header>
		<img  width="450rem" src="logo.png" alt="">
		 <h3 class="text-center" style="color:#a16d54;" >Pré-inscription</h3>
		<h4 class="text-center">en ligne des candidats au titre de l'année universitaire <center>2023-2024</center>
			</h4>
			<div  style="width:70%;text-align:center;margin: auto;">
				<p>Pour compléter votre inscription, veuillez imprimer le formulaire d'inscription et le reçu que vous trouverez dans la dernière étape de la pré-inscription, puis présentez-vous aux guichets du service des inscriptions de votre établissement.</p>
				<form action="{{route('loginadmin')}}" method="post"> 
					@csrf
					 <label for="">Name</label>
				<input type="text"
					class="password ele"
					placeholder="name" maxlength="10" name="name">
				
					<label for="">Date de Naissance :</label>
				<input type="test"
				size="30"  placeholder="password"
					class="email ele" name="password"
					>
					
					<div style="margin:20px 72px ;">
						
					<button type="submit" class="clkbtn">Connexion</button>
						   </div>
				</form>	
	</header>

	<!-- container div -->
	@if (Session::has("error"))
		<div
			class="alert alert-warning"
			role="alert"
		>
			<strong> {{Session::get('error')}} </strong> 
		</div>
		
		
	@endif
	<div class="container">

		<!-- upper button section to select
			the login or signup form -->
		<div class="slider">
			
		</div>
		<div class="btn">
			<button class="login">Connexion aux compte</button>
			<button class="signup">Crée un compte</button>

		</div>

		<!-- Form section that contains the
			login and the signup form -->
		<div class="form-section">

			<!-- login form -->
			<div class="login-box">
                <form action="{{route('login2')}}" method="POST">
					@csrf
					
					<label for="">CNE ou Code massar</label>
				<input type="text"
					class="password ele"
					placeholder="CNE ou Code massar" maxlength="10" name="password">
                    <label for="">Date de Naissance :</label>
				<input type="date"
					class="email ele"
					size="30"  placeholder="Date de naissance" name="date_naissance"
					>
                   <div style="margin:20px 72px ;">
					
				<button  class="clkbtn" type="submit">Connexion</button>
				   </div>
            </form>
			</div>

			<!-- signup form -->
			<div class="signup-box">
                  
                <form action="{{route('login1')}}" method="post"> 
					@csrf
					 <label for="">CNE ou Code massar</label>
				<input type="text"
					class="password ele"
					placeholder="CNE ou Code massar" maxlength="10" name="password">
				
                    <label for="">Date de Naissance :</label>
				<input type="date"
				size="30"  placeholder="Date de naissance"
					class="email ele" name="date_naissance"
					>
					
					<div style="margin:20px 72px ;">
						
					<button type="submit" class="clkbtn">créé un compte</button>
						   </div>
            </form>
			</div>
			<div class="signup-box">
             
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 border-bottom  d-flex align-items-center justify-content-center w-100 mt-4 text-danger">
				En cas de problème, veuillez nous contacter par e-mail: <a href="mailto:reclamation_ensao@ump.ac.ma">reclamation_ensao@ump.ac.ma</a>
		
		
			</div> 
	</div>
	<script src="css/acceuil/script.js"></script>
</body>
</html>
     
