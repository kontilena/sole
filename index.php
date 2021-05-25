<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sole</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/sole-logo.png" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="script.js"></script>
</head>
<body>
	<header class="header">
		<!--Меню-->
	<section class="menu">
		<img src="img/sole-logo.svg" class="logo">
		<a href="#" class="menu-button">MENU</a>
		<a href="#" class="login-button">LOGIN</a>
	</section>
		<!--Авторизация-->
	<section class="form">
			<form action="" method="POST">
				<p>USERNAME</p>
				<input type="text" name="username" required>
				<p>PASSWORD</p>
				<input type="password" name="password" required>

				<?php 
				$connection = new PDO("mysql:host=localhost; dbname=sole", 'root', '');

				if ($_SERVER['REQUEST_METHOD'] == 'POST') {

					$user = $_POST['username'];
					$password = $_POST['password'];

					$user_existing = $connection->prepare('SELECT count(*) FROM `users` where `users`.`username` = ?');
					$user_existing->execute([$user]);
					$user_existing = $user_existing->fetchColumn();
			
					if ($user_existing[0] > 0) {
    					echo "<p>Пользователь с данным именем уже существует! Пожалуйста, выберите другое имя.</p>";
    					} else {
						$query = $connection->prepare("INSERT INTO `users` (`username`, `password`)
               				VALUES (:username, :password);");
        				$query->execute(['username'=>$user, 'password'=>$password]);
			
        				header ('Location: /');}	}
?>
    				</p> 
				<button name="signIn">SIGN IN</button>
			</form>
	</section>
	</header>
	<!--Карточки-->
	<section class="cards">
		<div id="card-1">
			<img src="img/sole-air-ii.png">
			<div>
				<p class="snicker">SOLE AIR II</p>
				<p class="price">$35</p>
				<button></button>
			</div>
		</div>
		<div id="card-2">
			<img src="img/tidal-x.png">
			<div>
				<p class="snicker">TIDAL X</p>
				<p class="price">$40</p>
				<button></button>
			</div>
		</div>
		<div id="card-3">
			<img src="img/dark-sole-original.png">
			<div>
				<p class="snicker">DARK SOLE ORIGINAL</p>
				<p class="price">$60</p>
				<button></button>
			</div>
		</div>
	</section>
	<!--Подвал-->
	<footer>
		<section class="footer">
		<img src="img/sole-logo.svg">
		<a href="#" class="contacts">Contact Us</a>
		</section>
	</footer>
</body>
</html>