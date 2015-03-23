<?php
	if(isset($_GET['q']) && $_GET['q'] == "") {
		header("Location: /");
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Pythne
		</title>
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<?php include "scripts/php/clippings/header.php"; ?>
		<style type="text/css">
			#wrapper {
				margin: <?php if(isset($_GET['q'])) {echo "2% auto 0px 2%";} else {echo "7% auto 0px 10%";} ?>;
				transition: margin 0.3s;
			}
			#bar {
				height: 41px;
				width: 670px;
				padding: 0px;
				box-shadow: -1px 1px 2px rgba(50, 50, 50, 0.3);
				position: fixed;
				transition: box-shadow 0.3s;
				transition: width 0.1s;
			}
			#bar:hover {
				box-shadow: -1px 1px 2px rgba(50, 50, 50, 0.1);
			}
			body,html {
				overflow-x: hidden;
				height: 100%;
				margin: 0px;
				padding: 0px;
				background-color: #<?php if(isset($_GET['q'])) {echo "F2F2F2";} else {echo "DDD";} ?>;
				transition: background-color 0.3s;
			}
			#searchBar {
				color: #1A1A1A;
				padding-right: 8px;
				padding-left: 8px;
				font-size: 20px;
				font-family: Source Sans Pro;
				height: 39px;
				outline: none;
				border: none;
				width: 550px;
				float: left;
				transition: width 0.1s;
			}
			#logo {
				float: left;
				border: none;
				background-image: url('/static/logos/Pythne%20Logo%2041.png');
				display: inline-block;
				height: 41px;
				width: 41px;
			}
			#go {
				outline: none;
				width: 63px;
				height: 41px;
				border-radius: 0px;
				background-color: #5C93F7;
				border: none;
				background-image: url('/static/ui/GoArrow.png');
				background-position: center center;
				background-repeat: no-repeat;
				background-size: 13px;
				transition: background-color 0.4s;
			}
			#go:hover {
				background-color: #5181D6;
			}
			#go:active {
				transition: background-color 0.2s;
				background-color: #3D62A3;
			}
			#cover {
				position: fixed;
				z-index: 999;
				height: 100%;
				width: 100%;
				background-color: #FFFFFF;
				opacity: 1;
				transition: opacity 1.2s;
			}
			#results {
				margin: 90px 2% 0px 2%;
				font-family: Arial;
			}
			#time {
				color: #575757; 
				font-size: 18px;
				margin-bottom: 10px;
			}
			#resultList {
				font-size: 20px;
				word-wrap: break-word;
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div id="cover"></div>
		<div id="wrapper">
			<div id="bar">
				<form method="get" onsubmit="search(document.getElementById('searchBar').value); return false;">
					<div id="logo"></div><input type="text" id="searchBar" name="q" placeholder="Search..." autocomplete="off" autofocus><input type="submit" id="go" value="">
				</form>
			</div>
		</div>
		<div id="results">
			<div id="time"></div>
			<div id="resultList"></div>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="/scripts/js/main.js" type="text/javascript"></script>
	</body>
</html>