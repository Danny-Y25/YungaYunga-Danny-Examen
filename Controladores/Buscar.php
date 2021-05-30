<?php
 //incluir conexión a la base de datos
 include "../Config/conexionBD.php";
 $autor = $_GET['autor'];
 
 //echo "Hola " . $cedula;

 
 //$sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
 //$sql2 = "SELECT * FROM telefono WHERE usu_cedula='$cedula'";
 $sql4 = "SELECT * FROM autores a, libros l, capitulos c WHERE a.aut_codigo=c.aut_codigo and l.lib_codigo = c.lib_codigo and a.aut_nombre='$autor'";

 
//cambiar la consulta para puede buscar por ocurrencias de letras
 //$result = $conn->query($sql);
 //$result2 = $conn->query($sql2);
 $result3 = $conn->query($sql4);
 

 echo " <table style='width:100%','color: white'>
 <tr>
 <th>Autor</th>
 <th>Nacionalidad</th>
 <th>Libro</th>
 <th>ISBN</th>
 <th>Num-Páginas</th>
 <th>Capítulo</th>
 <th>Nombre del Capítulo</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 
 
 if ($result3->num_rows > 0) {
 while($row1 = $result3->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row1['aut_nombre'] . "</td>";
 echo " <td>" . $row1['aut_nacionalidad'] . "</td>";
 echo " <td>" . $row1['lib_nombre'] . "</td>";
 echo " <td>" . $row1['lib_isbn'] . "</td>";
 echo " <td>" . $row1['lib_num_paginas'] . "</td>";
 echo " <td>" . $row1['cap_numero'] . "</td>";
 echo " <td>" . $row1['cap_titulo'] . "</td>";
//<a href="tel:+593993862284">(593) 0993862284</a>>
 
 echo "</tr>";
 
 }
 } else {
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>";
 }
 echo "</table>";
 
 
 $conn->close();

?>