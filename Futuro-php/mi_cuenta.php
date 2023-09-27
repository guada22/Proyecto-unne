<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <link rel="stylesheet" href="css/mi_cuenta.css">
</head>
<body background="img/depositphotos_536271542-stock-video-dark-green-hex-grid-background.jpg">
    
    <header>
        <h1>Efecto 4T</h1>
        <h3>Portal exclusivo Desarrollador </h3>      
    </header>

    <nav class="menu"> 
        <ul>
            <li>
                <a href="inicio.php">Inicio</a> 
            </li>
            <li>
            <a href="Repuestos.php">Repuestos</a> 
            </li>
            <li>
                <a href="locales.php">Locales</a>
                
            </li>
            
            <li>
                <?php
                    session_start();
                    error_reporting(0);
                    $varsession = $_SESSION ['username'];

                    if ($varsession == null ){
                        echo "<a href='login.html'> Inicia Sesion </a>";
                    }else{
                        echo "<strong> Bienvenido $varsession </strong>  ";
                        
                        echo "<li> <a href='logica/salir.php'> Cerrar Sesion </a> </li>";

                        echo "<li> <a href='mi_cuenta.php'> Mi cuenta </a> </li>";
                        
                    }
                ?>
            </li>

            
        </ul>
    </nav>
    
    <div class="FullBox">

        <div class="crud">

            <div class="select-info-user">
                
                <table > 
                    <h2>Datos <br> Personales</h2>
                    
                    <?php

                            include "logica/conexion.php";
                            
                            $sql =("SELECT * from bd_cuentas where usuario = '$varsession' ");
                            
                            $res_sql=mysqli_query($conexion,$sql);

                            while ($mostrar=mysqli_fetch_array($res_sql)){
                                                        
                    ?><tr>
                    <tr>
                        <td>Nombre</td>
                        <td><?php  echo $mostrar['nombre']; ?> </td>
                    </tr>
                    <tr>
                    <td>Apellido</td>
                        <td><?php  echo $mostrar['apellido']; ?> </td>
                    </tr>
                    <tr>
                    <td>Email</td>
                        <td><?php  echo $mostrar['email']; ?> </td>
                    </tr>
                    <tr>
                    <td>Usuario</td>
                        <td><?php  echo $mostrar['usuario']; ?> </td>
                    </tr>
                    <tr>
                    <td>Clave</td>
                        <td> --- </td>
                    </tr>
                    <tr>
                    <td>Telefono</td>
                        <td><?php  echo $mostrar['telefono']; ?> </td>
                    </tr>
                    <tr>
                        <?php  if ($mostrar['administrador']==1){
                    echo ' <td>Adminitrador</td>';
                    echo ' <td> SI </td>';
                        }?>
                    </tr>

                    <?php   
                    }
                    ?>
                </table>


            </div>

            <div class="update-info-user">
                <table > 
                    <h2>Actualizar <br> Datos</h2>
                    
                    <?php
                        echo '<form name="update-user" action="logica/update_info_user.php" method="post" autocomplete="off">';
            
                        echo '<input type="hidden" name="id" value="'.$Id.'"/>';
                        echo '
                            
                            <tr>
                                <td>Nombre</td>
                                <td><input type="text" name="nombre" value="'.$nombre.'"/></td>
                            </tr>

                            <tr>
                                <td>Apellido</td>
                                <td><input type="text" name="apellido" value="'.$apellido.'"/></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><input type="text" name="email" value="'.$email.'"/></td>
                            </tr>

                            <tr>
                                <td>Usuario</td>
                                <td><input type="text" name="usuario" value="'.$usuario.'"/> </td>
                            </tr>

                            <tr>
                                <td>Clave</td>
                                <td><input type="password" name="clave" value="'.$clave.'"/></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td align="right"><input type="submit"  value="Save" /></td>
                            </tr>
                            
                            ';
                            
                        echo '</form>';
                        
                    ?>
                </table>

            </div>

            <div class="Delete-info-user">
                <h2>Eliminar <br> Cuenta</h2>
                <table>
                    <tr>
                        <form name="eliminar" action="logica/delete_user.php" method="POST">
                        <td align="center" ><input type="submit"  value="ELIMINAR" /></td>
                        </form>
                    </tr>
                </table>
                

            </div>

        </div>

    </div>
</body>
</html>