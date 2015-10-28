<script src="../../../static/javascript/jquery-1.11.3.min.js"></script>

		<link rel="stylesheet" href="../../../static/css/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../../static/css/bootstrap/css/bootstrap-theme.min.css">
<table class='table'>
	<caption>Tabla de los usuarios registrados</caption>
	<thead>
		<tr>
			<th>Imagen</th>
		    <th>Nombre</th>
		    <th>Apellido Paterno</th>
		    <th>Apellido Materno</th>

		</tr>
	</thead>
	<tbody>

<?php
	include '../model/DatabaseConector.php';
	$conector=new DatabaseConector("pruebas","admin","renault","localhost","5432");
	$conexion=$conector->openConexion();
	$query="SELECT * FROM tecnicos";
	$resultado=$conector->executeQueryDefine($query,$conexion);
	if(!$resultado){
		echo "ocurrio un error al consultar la base de datos";
		exit;
	}else{
		$filas = pg_fetch_all($resultado);
		$conector->closeConexionDef($conexion);
		$sizeElement=sizeof($filas);
		for($i=0;$i<$sizeElement;$i++){
			echo "<tr> <td >";
			//echo getcwd()."../../../media/userImage/".$filas[$i]['imagen_perfil'];
			$nombreImagen=trim($filas[$i]['imagen_perfil']);
			$ubicacion=$_SERVER['DOCUMENT_ROOT']."/renault/media/userImage/".$filas[$i]['imagen_perfil'];
			$ubicacion=trim($ubicacion);
			
			//echo "".strcmp($ubicacion, $ubi);
			if($filas[$i]['imagen_perfil']){
				if(file_exists($ubicacion)){
					echo "<image src='../../../media/userImage/".$nombreImagen."' class='img-thumbnail' width='100' height='100' >";
				}else{
					echo "<image src=../../../static/images/admin/tecnico.png".
					" class='img-thumbnail' width='100' height='100' >";
				}
				
			}else{
				echo "<image src=../../../static/images/admin/tecnico.png".
					" class='img-thumbnail' width='100' height='100' >";
			}
			
			echo "</td>".
				"<td>".$filas[$i]['nombre']."</td>".
				"<td>".$filas[$i]['a_paterno']."</td>".
				"<td>".$filas[$i]['a_materno']."</td>".
				"<td><button type='button' class='btn btn-warning'>Modificar</button>".
				"<button type='button' class='btn btn-danger'>Eliminar</button></td>".
			"</tr>";
		}
		
	//print_r($arr);
	}
	
?>
		
	</tbody>
</table>

