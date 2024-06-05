<?php 
	require_once('includes/const.php');
	require_once('includes/database.php');
	require_once('includes/misc.php'); 

	session_set_cookie_params(0);
	session_start();

	global $username, $noofrecords;

	$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'User not found!';
	$userprofile = isset($_SESSION['username']) ? 'avatar1.png' : 'logo.png';
	$usercreated = isset($_SESSION['usercreated']) ? $_SESSION['usercreated'] : 'June 23, 1898'; 
	$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
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
  <link rel="stylesheet" href="/assets/css/pagination.css">
  <link href="/assets/css/footer-navigation.css" rel="stylesheet">
  <script src="/assets/js/header.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
  <script src="https://unpkg.com/imask"></script>
  
  <link rel="stylesheet" href="/assets/css/users.css">
</head>
<body>


