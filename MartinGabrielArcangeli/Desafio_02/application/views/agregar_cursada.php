<?php include('header.php'); ?>
<html>

	<head>
		


	</head>

<body>


		<h2 align="center">AGREGAR CURSADA</h2>
		<form method="post" action='<?php echo site_url('login/save_cursadas'); ?>'>
		<table align="center">

		<tr>
			<td>USUARIO:</td>
			<td>
				<select name="txtcarr">
    				<?php foreach($usuarios as $item):?>
    				<option value="<?php echo $item->id;?>"><?php echo $item->username;?></option>
   					 <?php endforeach;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>MATERIA:</td>
			<td>
				<select name="txtmat">
    				<?php foreach($materias as $item):?>
    				<option value="<?php echo $item->id;?>"><?php echo $item->name;?></option>
   					 <?php endforeach;?>
				</select>
			</td>
		</tr>


		<tr>
			<td>NOTA : </td>
			<td>
				<select name="txtdesc"/>
				<option value="1">AUSENTE</option>
				<option value="2">2 (DOS)</option>
				<option value="3">3 (TRES)</option>
				<option value="4">4 (CUATRO)</option>
				<option value="5">5 (CINCO)</option>
				<option value="6">6 (SEIS)</option>
				<option value="7">7 (SITE)</option>
				<option value="8">8 (OCHO)</option>
				<option value="9">9 (NUEVE)</option>
				<option value="10">10 (DIEZ)</option>
			</select>
			
		</tr>

		<tr>
			
			<td>FECHA : </td>
			<td><input type="date" name="txtcarga"/></td>

		</tr>

		<tr>
			
			<td></td>
			<td><button type="submit" value="Save" class='btn btn-primary'/>AGREGAR</button></td>

		</tr>



    		</table>

    		</form>

</body>
</html>