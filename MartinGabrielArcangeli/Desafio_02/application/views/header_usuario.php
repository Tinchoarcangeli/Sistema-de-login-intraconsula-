<html>
<head>
	<meta charset="utf-8">
	<title>Bienvenido usuario</title>
	<link rel="stylesheet" href="<?php echo base_url('../resources/css/bootstrap.min.css'); ?>"/>
	
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" href="<?php echo site_url('login/pagina_principal_usuario') ?>" >INICIO</a>
      <a class="navbar-brand" href="<?php echo site_url('login/historial') ?>">HISTORIAL</a>
      <a class="navbar-brand" href="<?php echo site_url('login/info_user_simple') ?>">DATOS PERSONALES</a>
      <br><a class="navbar-brand" href="<?php echo site_url('login/logout') ?>">LOGOUT</a></br>

    </div>
  </div>
</nav>