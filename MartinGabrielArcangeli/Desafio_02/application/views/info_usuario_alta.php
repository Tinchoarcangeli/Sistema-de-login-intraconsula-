<?php include('header.php'); ?>

<html>
<head>

</head>
<body>

	<div class="container"> 
	<div class="row">
	<div class="col-md-12">

		<h2 align="center">TABLA:USUARIOS</h2>

			<a href="<?php echo site_url('login/agregar') ?>"><button type="button" class="btn btn-success">AGREGAR</button></a><br /><br />
			<table class="table table-hover" align="center" border="1" cellspacing="0" cellpadding="0" width="700" id="tabla_busqueda">
				<thead>
					<th>id</th>
					<th>USUARIO</th>
					<th>NOMBRE</th>
					<th>APELLIDO</th>
					<th>TIPO</th>
					<th>ESTADO</th>
					<th>FECHA</th>
					<th>ACCION</th>
				</thead>


<tbody>

<?php

    if (count($records) > 0 && $records != false)
     { 

        foreach($records as $record) {
        echo "<tr> 
    <td>".$record['id']."</td> 
    <td>".$record['username']."</td> 
    <td>".$record['name']."</td> 
    <td>".$record['lastname']."</td> 
    <td>".$record['type']."</td> 
    <td>".$record['status']."</td> 
    <td>".$record['date']."</td> 
	 <td align='center'>
 		<a href='".site_url('login/editar')."/$record[id]'> 
		 <button type='button' class='btn btn-primary'>EDITAR</button></a> |
		<a href='".site_url('login/borrar')."/$record[id]'> 
		 <button type='button' class='btn btn-danger'>BORRAR</button></a>


    </tr>"; 

    }
    }

  
?>
 
</tbody>


    </table>
 
		</div>
		</div>
		</div>

</body>
</html>

<script>/*ESTA FUNCION ME VA A PERMITIR MOSTRAR UN MENSAJE DE ALERTA ANTES DE ELIMINAR UNA FILA DE LA TABLA*/
	
$('.btn-danger').on("click", function(e){
  e.preventDefault();
  if(confirm("Se eliminaran los datos, desea continuar?")){
    window.location = $(this).parent().attr("href");
  }
  else{
    return false;
  }
});


</script>