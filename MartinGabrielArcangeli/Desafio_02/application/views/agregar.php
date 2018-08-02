<?php include('header.php'); ?>
<html>

	<head>
		


	</head>

<body>




		<h2 align="center">CREAR USUARIO</h2>
		<form method="post" action='<?php echo site_url('login/save'); ?>'>
		<table align="center">
		<tr>
			<fieldset class="form-group">
			<label for="usuario"><td>USUARIO : </td></label>
			<td><input type="text" class="form-control" name="txtcarr" required minlength="5"/></td>
			</fieldset>
		</tr>

		<tr>
			<fieldset class="form-group">
			<label for="nombre"><td>NOMBRE : </td></label>
			<td><input type="text" class="form-control" name="txtmat" required id="form-description" maxlength="20" /><span class="error-form" id="error-description"></span></td>
			</fieldset>
		</tr>

		<tr>
			<fieldset class="form-group">
			<label for="apellido"><td>APELLIDO : </td></label>
			<td><input type="text" class="form-control" name="txtdesc" id="form-description2" maxlength="20"/><span class="error-form" id="error-description2"></span></td>
			</fieldset>
		</tr>

		<tr>
			<fieldset class="form-group">
			<label for="contraseña"><td>CONTRASEÑA : </td></label>
			<td><input type="text" class="form-control" name="txtcarga" required minlength="5"/></td>
			</fieldset>
		</tr>
		<tr>
			<td>TIPO:</td>
			<td>
			<select name='txtipo'/>
				<option value="1">1 (UNO)</option>
				<option value="0">0 (CERO)</option>
			</select>
			</td>
		</tr>

			<tr>
			<td>ESTADO:</td>
			<td>
			<select name='txtestatus'/>
				<option value="1">1 (UNO)</option>
				<option value="0">0 (CERO)</option>
			</select>
			</td>
		</tr>

		<tr>
			
			<td>FECHA : </td>
			<td><input type="date" name="txtcarga2"/></td>

		</tr>

		<tr>
			<td></td>
			<td><button type="submit" value="Save" class='btn btn-primary'/>AGREGAR</button></td>
		</tr>


		</table>

		</form>



</body>
</html>

<script>
/*ESTA FUNCION SE ENCARGA DE VALIDAR EL CAMPO "NOMBRE" CUANDO INTENTO ESCRIBIR NUMEROS*/
$("#form-description").on("keyup", function() {
                var text = $(this).val();
        var a = 20 - text.length;
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

<script>
/*ESTA FUNCION SE ENCARGA DE VALIDAR EL CAMPO "APELLIDO" CUANDO INTENTO ESCRIBIR NUMEROS*/
$("#form-description2").on("keyup", function() {
                var text = $(this).val();
        var a = 20 - text.length;
        var lettersonly = /^[a-zA-Z]+$/;
        if(!/^[a-zA-Z\s]*$/.test(text)){
            $(this).parent().css("border","1px solid red");
            $(':input[type="submit"]').prop('disabled', true);
        }else{
            $(this).parent().css("border","none");
            $(':input[type="submit"]').prop('disabled', false);
        }
        $("#error-description2").text(a), a < 10 && $("#charcount").css({
            color: "red"
        })
    });

</script>