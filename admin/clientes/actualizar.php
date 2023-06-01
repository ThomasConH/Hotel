<?php 
require '../../includes/funciones.php';
$bd = conectar_db();
$errores =  [];
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $codigo = $_POST['codigo'];
        $new_id= $_POST['id'];
        if(!$codigo){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(empty($errores)){
            $sql = "UPDATE clientes SET id='$new_id' WHERE codigo = '$codigo'" ;
            echo $sql;
            $resultado = mysqli_query($bd, $sql);
            if($resultado){
                header('location: ../../index.php');
            }
            }
            else{
                foreach($errores as $error){
                    echo '<br>' . $error;
                }
            }
        }      
?>
<div>
    <p>Actualizar datos cliente</p> <br>
    <p>Digite Nuevo ID de cliente</p>
    <form class="formulario1" method="POST" action="actualizar.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id">No. de codigo</label><br>
            <input type="text" id="codigo" name="codigo"><br>
            <label for="correo">Nuevo ID de cliente:</label><br>
            <input type="text" id="id" name="id" ><br>
            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
    </form>
</div>