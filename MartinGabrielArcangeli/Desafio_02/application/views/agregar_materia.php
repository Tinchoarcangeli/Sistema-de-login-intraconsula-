<?php include('header.php'); ?>

<html>

	<head>
		


	</head>

<body>


		<h2 align="center">AGREGAR MATERIA</h2>
		<form method="post" action='<?php echo site_url('login/save_materias'); ?>'>
		<table align="center">

		<tr>
			<td>CARRERA:</td>
			<td>
				<select name="txtcarr">
    				<?php foreach($carreras as $item):?>
    				<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
   					 <?php endforeach;?>
				</select>
			</td>
		</tr>
		<tr>
			<fieldset class="form-group">
			<td>MATERIA : </td>
			<td><input type="text" name="txtmat" class="form-control" maxlength="50" required/></td>
			</fieldset>
		</tr>
		<tr>
			<fieldset class="form-group">
			<td>DESCRIPCION : </td>
			<td><textarea name="txtdesc" class="form-control" maxlength="255" id="form-description"></textarea><span class="error-form" id="error-description"></span></td>
			</fieldset>
		</tr>
		<tr>
		
			<td>CARGA HORARIA : </td>
			<td>
			<select name="txtcarga"/>
				<option value="2">2 (DOS)</option>
				<option value="4">4 (CUATRO)</option>
				<option value="6">6 (SEIS)</option>
				<option value="8">8 (OCHO)</option>
				<option value="10">10 (DIEZ)</option>
			</select>
			</td>
		
		</tr>
		<tr>
			
			<td></td>
			<td><button type="submit" value="save" class='btn btn-primary'/>AGREGAR</button></td>

		</tr>

    		</table>

    		</form>


</body>
</html>

<script>
/*ESTA FUNCION SE ENCARGA DE VALIDAR EL CAMPO "DESCRIPCION" CUANDO INTENTO ESCRIBIR NUMEROS*/
$("#form-description").on("keyup", function() {
                var text = $(this).val();
        var a = 255 - text.length;
        var lettersonly = /^[a-zA-Z]+$/;
        if(!/^[a-zA-Z\s]*$/.test(text)){
            $(this).parent().css("border","1px solid red");
            $(':input[type="submit"]').prop('disabled', true);
        }else{
            $(this).parent().css("border","none");
            $(':input[type="submit"]').prop('disabled', false);
        }
        $("#error-description").text(a), a < 10 && $("#charcount").css({
            color: "red"
        })
    });

</script>
