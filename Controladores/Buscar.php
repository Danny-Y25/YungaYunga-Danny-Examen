<?php
 //incluir conexión a la base de datos
 include "../../Config/conexionBD.php";
 $cedula = $_GET['cedula'];
 
 //echo "Hola " . $cedula;

 
 //$sql = "SELECT * FROM usuario WHERE usu_eliminado = 'N' and usu_cedula='$cedula'";
 //$sql2 = "SELECT * FROM telefono WHERE usu_cedula='$cedula'";
 $sql4 = "SELECT * FROM usuario u, telefono t WHERE u.usu_cedula=t.usu_cedula and u.usu_eliminado = 'N' and u.usu_cedula='$cedula'";

 
//cambiar la consulta para puede buscar por ocurrencias de letras
 //$result = $conn->query($sql);
 //$result2 = $conn->query($sql2);
 $result3 = $conn->query($sql4);
 

 echo " <table style='width:100%','color: white'>
 <tr>
 <th>Cedula</th>
 <th>Correo</th>
 <th>Nombres</th>
 <th>Apellidos</th>
 <th>Telefono</th>
 <th>Tipo</th>
 <th>Operadora</th>
 <th></th>
 <th></th>
 <th></th>
 </tr>";
 
 
 if ($result3->num_rows > 0) {
 while($row1 = $result3->fetch_assoc()) {

 echo "<tr>";
 echo " <td>" . $row1['usu_cedula'] . "</td>";
 //echo " <td>" . $row1['usu_correo'] . "</td>";
 $correo1= $row1['usu_correo'];
 echo " <td> <a href='mailto:" . $row1['usu_correo'] . "'>" . $row1['usu_correo'] . "</a> </td>";
 echo " <td>" . $row1['usu_nombres'] . "</td>";
 echo " <td>" . $row1['usu_apellidos'] . "</td>";
 echo " <td> <a href='tel:+593" . $row1['tel_numero'] . "'>" . $row1['tel_numero'] . "</a> </td>"; 
 //echo " <td>" . $row1['tel_numero'] . "</td>";
 echo " <td>" . $row1['tel_tipo'] . "</td>";
 echo " <td>" . $row1['tel_operadora'] . "</td>";
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