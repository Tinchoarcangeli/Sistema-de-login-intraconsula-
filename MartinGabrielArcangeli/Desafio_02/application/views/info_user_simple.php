<?php include('header_usuario.php'); ?>


<html>

<head>

</head>

<body>

	<div class="container"> 
	<div class="row">
	<div class="col-md-12">
	<h2 align="center">DATOS PERSONALES</h2>


	<div id="body">
	
			<table class="table table-hover" align="center" border="1" cellspacing="0" cellpadding="0" width="700">
				<thead>
					<th>id</th>
					<th>USUARIO</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>FECHA</th>
				</thead>


<tbody>
<?php

		if ($records) { 
			echo "<tr>
			 <td>".$records['id']."</td> 
			 <td>".$records['username']."</td> 
			 <td>".$records['name']."</td> 
			 <td>".$records['lastname']."</td>
			  <td>".$records['date']."</td> 

			  </tr>"; 
			}
?>
 
</tbody>
</table>

		</div>
		</div>
		</div>

</body>
</html>