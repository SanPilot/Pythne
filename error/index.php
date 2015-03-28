<?php
$id = $_GET['id'];
if($id != 500 && $id != 404 && $id != 403 && $id != 401 && $id != 400) {
	$id = 404;
}
$errors = array(
	500 => array(
		"Server Error",
		"Our servers broke down. Luckily, it's not your fault!"
	),
	404 => array(
		"Not Found",
		"Sorry, there's no treasure here!"
	),
	403 => array(
		"Forbidden",
		"You shall not pass!"
	),
	401 => array(
		"Unauthorized",
		"The username or password you entered don't seem to work!"
	),
	400 => array(
		"Bad Request",
		"What evil place are you trying to visit?"
	),
);
$error = $errors[$id];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo $error[0]; ?>
		</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<style type="text/css">
			body,html {
				margin: 0px;
				height: 90%;
				background-color: #D8191C;
				color: #FFFFFF;
				font-family: Source Sans Pro;
			}
			#error {
				font-size: 70px;
				letter-spacing: 4px;
				font-weight: bold;
			}
			#details {
				font-size: 35px;
				color: #F4F4F4;
			}
			#content {
				margin: auto;
				width: 692px;
			}
			#outer {
				display: table;
				height: 100%;
				width: 100%;
			}
			#middle {
				display: table-cell;
				vertical-align: middle;
			}
			#logo {
				margin-right: 30px;
				float: left;
			}
			#cover {
				position: fixed;
				z-index: 999;
				height: 100%;
				width: 100%;
				background-color: #D8191C;
				opacity: 1;
				transition: opacity 0.8s;
			}
		</style>
		<?php include "../scripts/php/clippings/header.php"; ?>
		<meta name="viewport" content="user-scalable=no, initial-scale=0.4, maximum-scale=0.4, minimum-scale=0.4, width=device-width, height=device-height">
	</head>
	<body>
		<div id="cover"></div>
		<div id="outer">
			<div id="middle">
				<div id="content">
					<div id="logo">
						<a href="/">
							<img src="/static/logos/Pythne%20Logo%20192.png">
						</a>
					</div>
					<div id="error">
						<?php echo $error[0]; ?>
					</div>
					<div id="details">
						<?php echo $error[1]; ?>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			window.onload = function() {
				document.getElementById("cover").style.opacity = 0;
				setTimeout(function() {
					document.getElementById("cover").style.display = "none";
				}, 800);
			}
			window.onbeforeunload = function() {
				document.getElementById("cover").style.display = "block";
				document.getElementById("cover").style.opacity = 1;
			}
		</script>
	</body>
</html>