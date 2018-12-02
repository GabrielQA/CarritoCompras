

<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/estiloRegistro.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css " rel="stylesheet">
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   
</head>
<!--Aqui esta la estructura del registro -->
<body>

	<form action="" method="POST">
		<div class="content w3-animate-zoom">
			<div class="container">
			</div>
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Entrar</h3>
					</div>
					<div class="card-body">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="username" id="username" class="form-control" placeholder="Username">
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
							</div>
							<button class="btn btn-primary" name="Login" >Entrar</button>
							<div class="form-group">
							</div>
							<div class="row align-items remember">
							</div>
							<div class="d-flex justify-content-center links">
								No estas registrado?<a id="iniciarsesion" name="iniciarsesion" href="">Registrarse</a>
							</div>
						</form>
		
				<!--Aqui se tira los avisos mostrados -->
				<?php if(isset($_SESSION['success'])) { ?>
		<div class="alert alert-success"><?php echo $_SESSION['success']; ?></div>
		<?php }?>
		<?php echo validation_errors('<div id="alert" class="alert alert-danger">', '</div>'); ?>
		</div>

				</div>
			</div>
		</div>
	</div>
</body>

</html>
<style type="text/css">
/* Made with love by Mutiullah Samim*/

@import url('https://fonts.googleapis.com/css?family=Numans');

html,body{
background-image: url('https://images3.alphacoders.com/254/25425.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}
#alert{
	width: 300px;
	margin-left: 605px;
	margin-right: 400px;
	align-content: down;

}
.container{
height: 80%;
align-content: center;
}

.card{
height:310px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}

.social_icon span{
font-size: 60px;
margin-left: 10px;
color: rgb(209, 73, 20);
}

.social_icon span:hover{
color: white;
cursor: pointer;
}

.card-header h3{
color: white;
}

.social_icon{
position: absolute;
right: 20px;
top: -45px;
}

.input-group-prepend span{
width: 50px;
background-color:rgb(209, 79, 18);

color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}

.remember{
color: white;
}

.remember input
{
width: 20px;
height: 20px;
margin-left: 15px;
margin-right: 5px;
}

.login_btn{
color: black;
background-color: rgb(16, 117, 212);
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 8px;
}

</style>
