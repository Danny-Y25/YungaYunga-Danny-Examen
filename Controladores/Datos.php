<?php 
$conexion=mysqli_connect('localhost','root','','biblioteca');
$continente=$_POST['continente'];

	$sql="SELECT *
		from autores 
		where aut_nombre='$continente'";

	$result=mysqli_query($conexion,$sql);

	/*$cadena="<label>Nacionalidad </label><br> 
    <select id='lista2' name='lista2'>";*/
    $cadena="<label>Nacionalidad </label><br>";

	while ($ver=mysqli_fetch_row($result)) {
		//$cadena=$cadena.'<option value='.$ver[0].'>'.utf8_encode($ver[2]).'</option>';
        $cadena=$cadena.'<input type="text"  value='.$ver[2].' disabled >';
	}
    
	echo  $cadena;
	

?>