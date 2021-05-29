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
 $libro = isset($_POST["libro"]) ? mb_strtoupper(trim($_POST["libro"]), 'UTF-8') : null;
 $isbn = isset($_POST["isbn"]) ? mb_strtoupper(trim($_POST["isbn"]), 'UTF-8') : null;
 $paginas = isset($_POST["paginas"]) ? mb_strtoupper(trim($_POST["paginas"]), 'UTF-8') : null;
 


$sql = "INSERT INTO libros VALUES (0, '$libro', '$isbn', '$paginas')";


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
  
  
  header("Location: /YungaYunga-Danny-Examen/YungaYunga-Danny-Examen/Vista/Index.html");
  ?>

 </body>
 </html>