<?php include('header.php'); ?>

<html>

	<head>

	</head>

<body>

	<div class="container"> 
	<div class="row">
	<div class="col-md-12">

		<h2 align="center">TABLA:MATERIAS</h2>
		<a href="<?php echo site_url('login/agregar_materia') ?>"><button type="button" class="btn btn-success">AGREGAR</button></a><br /><br />
		<input id="busqueda_tabla" type="text">
			<table class="table table-hover" align="center" border="1" cellspacing="0" cellpadding="0" width="700" id="tabla_busqueda">
				<thead>
					<th>id</th>
					<th>CARRERA</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th>CARGA HORARIA (hs)</th>
					<th>ACCION</th>
				</thead>

<tbody>
    <?php

    if (count($records) > 0 && $records != false) {
        foreach($records as $record) {
            
            echo "<tr>
                      <td>".$record->id."</td>
                      <td>".$record->carrera."</td>
                      <td>".$record->name."</td>
                      <td>".$record->description."</td>
                      <td>".$record->hours."</td>
                      <td align='center'>
						<a href='".site_url('login/editar_materia')."/$record->id'> 
						 <button type='button' class='btn btn-primary'>EDITAR</button></a> |
						<a href='".site_url('login/borrar_materia')."/$record->id'> 
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

<script>
    $(document).ready(function() {
        $('#busqueda_tabla').off('keyup');
        $('#busqueda_tabla').on('keyup', function() {
           //SE ESTABLECE EL TERMINO DE BUSQUEDA, EL VALOR DE ENTRADA
            var busqueda_tablaTerm = $('#busqueda_tabla').val();
        	//LAS FILAS DE LAS TABLA
            var tr = [];

          //HACE UN CICLO A TRAVES DE TODOS LOS ELEMENTOS "TD"
            $('#tabla_busqueda').find('td').each(function() {
                var value = $(this).html();
             //SI EL VALOR CONTIENE EL TERMINO DE BUSQUEDA, AGREGA ESAS FILAS AL ARRAY
                if (value.toLowerCase().includes(busqueda_tablaTerm.toLowerCase())) {
                    tr.push($(this).closest('tr'));

                }
            });

          //SI busqueda_tabla ESTA VACIO, MUESTRA TODAS LAS FILAS
            if ( busqueda_tablaTerm == '') {
                $('tr').show();
            } else {
             //EN CAMBIO, OCULTA TODAS LAS FILAS EXCEPTO ESAS QUE SE AGREGARON AL ARRAY
                $('tr').not('thead tr').hide();
                tr.forEach(function(el) {
                    el.show();
                });
            }
        });
    });
</script>

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