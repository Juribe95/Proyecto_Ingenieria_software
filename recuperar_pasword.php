<?php include 'util/helpers.php';?>
<?php
if (isset($_POST['submit'])) {
    $rut = $_POST['rut'];
    $email = $_POST['email'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/Bootstrap.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="w3/w3.css">


        
        <style>
            html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif;}
            .w3-sidebar {
            z-index: 3;
            width: 250px;
            top: 45px;
            bottom: 0;
            height: inherit;
            }
            html,body{
            background-image: url('img/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100%;
            font-family: 'Numans', sans-serif;
            }
        </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Recuperar Contraseña</h3>
                <div class="d-flex justify-content-end social_icon">
                    <!-- <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span> -->
                </div>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="rut" id="rut" placeholder="Rut">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Correo Electronico">

                    </div>
                    
                    <div class="row align-items-center remember">  
                    </div>

                    <br>
                    <div class="form-group">
                        <!-- <input type="submit" value="Login" class="btn float-right login_btn"> -->
                        <button class="btn btn-primary btn-block" type="submit">Recuperar Contraseña</button>
                        
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $rut = $_POST["rut"];
                    $email =$_POST['email'];

                    $rt = recuperarpass($rut, $email);
                    if ($rt == false) {
                        echo '<p class="alert alert-danger">';
                        echo 'La combinacion de Rut y Email no Coinciden ';
                        echo '</p>';
                    } elseif ($rt == true) {
                        $_SESSION['rut']=$rut;
                        
                        redirigir("cambiarPass.php");
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>




</body>
</html>