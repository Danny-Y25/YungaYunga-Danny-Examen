<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
   
   
    <title> Menu</title>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
    
    <link rel="stylesheet" type="text/css" href="../CSS/reglas.css"/>
    
    <link rel="stylesheet" type="text/css" href="../CSS/2-columnas.css"/>

    <link rel="stylesheet" type="text/css" href="../CSS/Registrar.css"/>
    
</head>

<body style="background-image: url('../Imagenes/fondo5.jpg');" >
<header></header>
    <header border="10px">
        
        
        
    </header>
    <section>
        <article>
            <div ng-show class="wapp"></div>
    
            <form  id="formulario01"  method="POST" action="../Controladores/RegistrarCapitulos2.php" onsubmit="return validarCamposObligatorios()">

                <!-- Grupo: codigo -->
                <div class="formulario__grupo" id="grupo__cedula">
                    <label style="color: black" for="cedula" class="formulario__label">Nombre del Libro</label>
                    <div >
                    <?php
                     //$isbn = $_GET['isbn'];
                    include "../Config/conexionBD.php";
                    $sql = "SELECT lib_nombre FROM libros";
                    //echo $sql;
                    echo '<select style="text-align-last:center;" name="libro" id="libro">';
                    echo '<option value=""> SELECCIONAR </option>';
                    //cambiar la consulta para puede buscar por ocurrencias de letras
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {              
                            echo '<option value="'.$row['lib_nombre'].'">'.$row['lib_nombre'].'</option>';
                        }    
                    }
                    echo'</select>';
                    
                    
                    ?>
                    </div>
                    <span id="mensajeCedula" class="error"></span>
                    
                </div>
                <br>

                <!-- Grupo: codigo -->
                <div class="formulario__grupo" id="grupo__cedula">
                    <label style="color: black" for="cedula" class="formulario__label">Numéro del Capítulo</label>
                    <div class="formulario__grupo-input">
                        <input type="text"  name="capitulo" id="capitulo" placeholder=""
                        onkeyup="return validarCedula(this)"/>
                    </div>
                    <span id="mensajeCedula" class="error"></span>
                    
                </div>
                <br>
    
                <!-- Grupo: Nombres -->
                <div class="formulario__grupo" id="grupo__nombre">
                    <label style="color: black" for="nombres" class="formulario__label">Título del Capítulo</label>
                    <div class="formulario__grupo-input">
                        <input type="text"  name="titulo" id="titulo" placeholder=""
                        onkeyup="return validarLetras(this)"/>
                        
                    </div>
                    <span id="mensajeNombres" class="error"></span>
                    <br>
                </div>
                <label style="color: black" for="nombres" class="formulario__label">Selecione el Autor</label>
                <br>
                
                    <?php
                     //$isbn = $_GET['isbn'];
                    include "../Config/conexionBD.php";
                    $sql = "SELECT aut_nombre FROM autores";
                    //echo $sql;
                    echo '<select name="nombreAutor" id="nombreAutor">';
                    echo '<option value=""> SELECCIONAR </option>';
                    //cambiar la consulta para puede buscar por ocurrencias de letras
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {              
                            echo '<option value="'.$row['aut_nombre'].'">'.$row['aut_nombre'].'</option>';
                        }    
                    }
                    echo'</select>';
                    
                    
                    ?>
                
                <div>
                    
                 <br>       
                <div id="nacion"> </div>

                <input type="hidden" id="isbn" name="isbn" value="<?php echo $isbn ?>" />


                <br>
                <br>
                <input type="submit" id="crear" name="crear" value="Aceptar" />
                <input  type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                <input  type="button" onclick="location.href='Index.html'" id="regresar" name="regresar" value="Regresar" />
                
    
            </form>
           
            
            
           

           
            

                  
            
        </article>
        
    </section>
   
    
    <footer>
        <table>
            <tr>
                <td>
                    <p>Danny Yunga</p>
                    <p>Universidad Politécnica Salesiana</p>
                    &copy; Todos los Derechos Resrvados <br/>
                </td>
                <td>
                   <p>Email: <a href="mailto:dannyy25000@gmail.com">dannyy25000@gmail.com</a></p>
                    <p>Call: <a href="tel:+593939889081">(593) 0939889081</a></p>
                    
                    
                    

                </td>
                
            </tr>
        </table>
        
    </footer>
    

</body>

</html>
<script type="text/javascript">
	$(document).ready(function(){
		//$('#lista1').val(1);
		recargarLista();

		$('#nombreAutor').change(function(){
			recargarLista();
		});
	})
</script>
<script type="text/javascript">
	function recargarLista(){
		$.ajax({
			type:"POST",
			url:"../Controladores/Datos.php",
			data:"continente=" + $('#nombreAutor').val(),
			success:function(r){
				$('#nacion').html(r);
			}
		});
	}
</script>
