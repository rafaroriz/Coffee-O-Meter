<?php
include('user.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Coffee-O-Meter</title>
		<meta charset="utf-8">
		<link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
		<link href="css/coffeeometer.css" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/a87208e9ea.js" crossorigin="anonymous"></script>
	</head>
	<body style="background-color: #fafafa">
		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
			<span class="navbar-brand" href="list-consumption.php">
				<i class="fas fa-mug-hot fa-2x" style="color:#ccc"></i>
			</span>

			<div class="collapse navbar-collapse" id="navbar-text">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="list-consumption.php">Meu Consumo</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="list-coffee.php">Lista de Cafés</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-coffee-form.php">Adiciona Café</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="list-type.php">Lista Tipos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add-type-form.php">Adiciona Tipo</a>
					</li>
				</ul>
				<span class="navbar-text">
					Usuário Logado: <?php echo $_SESSION["USER"]["EMAIL"] ?>
				</span>
				<span class="navbar-text">
					<a class="nav-link text-light fas fa-sign-out-alt" href="logout.php"> | Sair</a>
				</span>
			</div>
		</nav>
		<div class="container">
			<div class="main">

<?php
include 'validate-user-access.php';
?>