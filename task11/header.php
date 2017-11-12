<?php session_start(); ?>
<!DOCTYPE html>
<html lang="uk">
<head>

	<meta charset="utf-8">
	<title>Blog</title>
	
	<!-- подключение cleditor -->
    	<link rel="stylesheet" href="clEditor/jquery.cleditor.css" />
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    	<script src="clEditor/jquery.cleditor.min.js"></script>
    	<script>
    	    $(document).ready(function () { $("#input").cleditor(); });
    	</script>

<!-- стили для модального окна

<style type="text/css">
	.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		display: none;
		pointer-events: none;
	}
	.modalDialog:target {
		display: block;
		pointer-events: auto;
	}

	.modalDialog > div {
		width: 400px;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		border-radius: 10px;
		background: #fff;
		background: -moz-linear-gradient(#fff, #999);
		background: -webkit-linear-gradient(#fff, #999);
		background: -o-linear-gradient(#fff, #999);
	}
	.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

	.close:hover { background: #00d9ff; }

</style> -->

</head>
<Body>
<?php require 'menu.php'; ?>
<?php if (isset($_SESSION['nickname'])) echo "Поточний користувач: <b>".$_SESSION['nickname']."</b>";?>
<br>