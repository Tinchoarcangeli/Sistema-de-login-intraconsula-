<?php include('header_usuario.php'); ?>

<html>
        <head>

        </head>
<body>

  <div class="container"> 
  <div class="row">
  <div class="col-md-12">
  <h2 align="center">HISTORIAL</h2>


	<div id="body">
	
			<table class="table table-hover" align="center" border="1" cellspacing="0" cellpadding="0" width="700">
				<thead>
					<th>id</th>
					<th>USUARIO</th>
					<th>MATERIA</th>
					<th>NOTA</th>
					<th>FECHA</th>
				</thead>


<tbody>
<?php

if (count($records) > 0 && $records != false) {
    $id = 1;
    foreach($records as $record) {

        echo "<tr>
                  <td>".$id."</td>
                  <td>".$record['user']."</td>
                  <td>".$record['subject']."</td>
                  <td>".$record['grade']."</td>
                  <td>".$record['date']."</td>
              </tr>";
       $id++;
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