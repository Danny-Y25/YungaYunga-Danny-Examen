<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
    
 <?php
 //incluir conexión a la base de datos
 include '../Config/conexionBD.php';
 $autor = isset($_POST["nombreAutor"]) ? mb_strtoupper(trim($_POST["nombreAutor"]), 'UTF-8') : null;
 $isbn = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
 $capitulo = isset($_POST["capitulo"]) ? mb_strtoupper(trim($_POST["capitulo"]), 'UTF-8') : null;
 $titulo = isset($_POST["titulo"]) ? mb_strtoupper(trim($_POST["titulo"]), 'UTF-8') : null;
 $libro = isset($_POST["libro"]) ? mb_strtoupper(trim($_POST["libro"]), 'UTF-8') : null;



$sql1 = "SELECT aut_codigo FROM autores WHERE aut_nombre = '$autor';";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0  ) {
    $_SESSION['isLogged'] = TRUE;   
    while($row1 = $result1->fetch_assoc()) {    
    $id_autor=$row1['aut_codigo'];
    }
}else {
    echo("no hay nada");
  
} 

$sql2 = "SELECT lib_codigo FROM libros WHERE lib_nombre = '$libro';";

$result2 = $conn->query($sql2);

if ($result2->num_rows > 0  ) {
    $_SESSION['isLogged'] = TRUE;   
    while($row2 = $result2->fetch_assoc()) {    
    $id_libro=$row2['lib_codigo'];
    }
}else {
    echo("no hay nada2");
  
} 

 
$sql = "INSERT INTO capitulos VALUES (0, '$capitulo', '$titulo', '$id_libro', '$id_autor');";


  if ($conn->query($sql) === TRUE) {
  //echo "<p>Se ha creado los datos personales correctamemte!!!</p>";


  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con la cedula  ya esta registrada en el sistema </p>";
  }else{
  echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
  }
  }
 
  //cerrar la base de datos
  $conn->close();
  
  
  header("Location: /YungaYunga-Danny-Examen/YungaYunga-Danny-Examen/Vista/AgregarCapitulos2.php?");
  ?>

 </body>
 </html>