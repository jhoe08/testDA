<?php 
	require_once('includes/const.php');
	require_once('includes/database.php'); 

	session_start();

	global $username;

	$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Walang Kayo';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sample</title>
	<link href="/assets/cdn/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link href="/assets/cdn/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="/assets/css/index.css" rel="stylesheet">
  <script src="/assets/js/header.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
</head>
<body>
