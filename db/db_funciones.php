    <?php

    include 'conexion.php';

    function registrar($rut, $pass, $nombre, $apellido, $telefono, $email, $fech_naci, $monto_disp, $peso, $altura)
    {
        $conn = conectar();
        // $pass = crypt($pass, "bloqueo");
        //$correo_usuario = obtener_email($rut);
        $rut_usuario = obtener_rut($rut);


        $sql = "insert into usuario (RUT_USUARIO, NOMBRE_USUARIO, rol_ID, APELLIDO_USUARIO, MONTO_DISPONIBLE, FECHA_NACIMIENTO, PESO, ALTURA, PASS, TELEFONO, EMAIL)"
                . "values ('" . $rut . "','" . $nombre . "', 2 ,'" . $apellido . "'," . $monto_disp . ",'".$fech_naci."',".$peso.",".$altura.",'".$pass."',".$telefono.",'".$email."')";

        if ($conn->query($sql) === false) {
            if (($rut_usuario === $rut)) {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'El rut ya se encuentra registrado ';
                echo '</p>';
                echo '</div>';
            } else {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'Error al registrarse ' . $conn->error;
                echo '</p>';
                echo '</div>';
            }
        } else {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-info">';
            echo 'El registro de ' . $rut . ' se ha completado satisfactoriamente';
            echo '</p>';
            echo '</div>';
        }
        $conn->close();
    }

    function update($rut, $pass)
    {
        $conn = conectar();


        $sql = "update usuario set PASS = '".$pass."' where RUT_USUARIO = '".$rut."'";

        if ($conn->query($sql) === false) {
                echo '<div class="container d-flex justify-content-center card-body">';
                echo '<p class="alert alert-danger">';
                echo 'Error al registrarse ' . $conn->error;
                echo '</p>';
                echo '</div>';
        } else {
            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<p class="alert alert-info">';
            echo 'Se actualizo la contraseña';
            echo '</p>';
            echo '</div>';

            echo '<div class=" container d-flex justify-content-center card-body">';
            echo '<a class="w3-panel w3-border-left w3-border-blue" href="login.php">Login</a>';
            echo '</div>';
        }
        $conn->close();
    }

    function obtener_email($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $email = $fila["EMAIL"];
                return $email;
            }
        } else {
            return false;
        }
    }


    function recuperarpass($rut, $email)
    {

        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."' and EMAIL = '".$email."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }





    function obtener_rut($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }

    function obtener_rol($RUT_USUARIO)
    {

        $conn = conectar();
        $sql="select rol_ID from USUARIO where RUT_USUARIO = '".$RUT_USUARIO."'";
       
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rol = $fila["rol_ID"];
                return $rol;
            }
        } else {
            return false;
        }
    }

    function obtener_nombre($rut)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut."'" ;
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $name = $fila["NOMBRE_USUARIO"];
                return $name;
            }
        } else {
            return false;
        }
    }

    function iniciar_sesion($rut, $pass)
    {
        $conn = conectar();
        $sql = "select * from usuario where RUT_USUARIO = '" . $rut . "'"
                . "and PASS = '" . $pass . "'";
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $rut = $fila["RUT_USUARIO"];
                return $rut;
            }
        } else {
            return false;
        }
    }

    function recuperarDatos(){
        $conn = conectar();
        $sql = "select * from menu";
        $result = $conn->query($sql);

        $cont = count($result);

        

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $menu[] = $fila;
                
                
                
                
            }
            return $menu;
        } else {
            return false;
        }

    }

    function contadorMenu(){
        $conn = conectar();
        $sql = "select * from menu";
        $result = $conn->query($sql);

        #...$cont = count($result);

        $conn->close();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $cont = count($fila);
                
                    return $cont;
                                
                
            }
        } else {
            return false;
        }

    }
