<?php

if (isset($_POST['enter_site'])) {
	if ($_POST['site_working'] == 'maxfizz') {
		$val = $_POST['site_working'];
		setcookie("site_working", $val, time() + 6);
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
}
if (!isset($_COOKIE['site_working'])) {
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Website Under Maintenance</title>
		<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
		<style>
			html,
			body {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}

			body {
				height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
				text-align: center;
			}

			h1 {
				font-size: 2.6em;
				font-family: 'Bungee Spice', sans-serif;
				font-weight: 900;
				color: #1972dd !important;
			}

			.btn_third {
				background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5 51%, #00d2ff 100%);
				margin: 10px;
				padding: 15px 45px;
				text-align: center;
				text-transform: uppercase;
				transition: 0.5s;
				background-size: 200% auto;
				color: white;
				box-shadow: 0 0 20px #eee;
				border: none;
				font-weight: 900;
				text-align: center;
				position: relative;
				z-index: 15;
				letter-spacing: 2px;
			}

			.btn_third:hover {
				background-position: right center;
				/* change the direction of the change here */
				color: #fff;
				text-decoration: none;
			}

			.content img {
				width: 20%;
			}

			.container {
				background-color: #fff;
				width: 70%;
				margin: 0 auto;
				padding: 3em 1em 1em;
				position: relative;
				border: 1px solid #ddd;
				box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.25);
			}

			.container {
				background-color: #ddc;
				border: solid 5vmin #eee;
				border-bottom-color: #fff;
				border-left-color: #eee;
				border-radius: 2px;
				border-right-color: #eee;
				border-top-color: #ddd;
				box-shadow: 0 0 5px 0 rgba(0, 0, 0, .25) inset, 0 5px 10px 5px rgba(0, 0, 0, .25);
				box-sizing: border-box;
				display: inline-block;
				margin: 10vh 10vw;
				padding: 8vmin;
				position: relative;
				
			}

			.container:before {
				border-radius: 2px;
				bottom: -2vmin;
				box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .25) inset;
				content: "";
				left: -2vmin;
				position: absolute;
				right: -2vmin;
				top: -2vmin;
			}

			.container:after {
				border-radius: 2px;
				bottom: -2.5vmin;
				box-shadow: 0 2px 5px 0 rgba(0, 0, 0, .25);
				content: "";
				left: -2.5vmin;
				position: absolute;
				right: -2.5vmin;
				top: -2.5vmin;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="content">
				<img src="https://sonu.gomyholidays.com/wp-content/uploads/2023/10/under_construction.gif" width="100%" alt="">
				<h1>Under Maintenance</h1>
				<form action="" method="POST">
					<input type="hidden" name="site_working" placeholder="Enter Token" value="maxfizz" />
					<input type="submit" class="btn_third" name="enter_site" value="Visit Website" />
				</form>
			</div>
		</div>
	</body>

	</html>
<?php die;
}
?>