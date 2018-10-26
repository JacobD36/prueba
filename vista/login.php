<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./vista/css/bootstrap.min.css">
    <link rel="stylesheet" href="./vista/css/login_style.css">
    <script type="text/javascript" src="./vista/js/getlogininfo.js"></script>
    <script src="./vista/js/jquery.min.js"></script>
    <script src="./vista/js/bootstrap.min.js"></script>
    <title>Credito Efectivo - Actualizacion de Datos</title>
</head>
<body>
<?php
    require_once("configuracion/database.php");
    require_once("modelo/gestion_model.php");

    $campana = new gestion_model();
    $listado = $campana->get_campanas();
?>
<div class="container">
    <div class="card card-container">
        <!--<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />-->
        <img src="./vista/img/logo_bio.png" class="center-block img-responsive">
        <p id="profile-name" class="profile-name-card"></p>
        <div class="titulo">
            <p><h4>Financiera Oh!</h4></p>
        </div>
        <form class="form-signin">
            <div id="resultado"></div>
            <input type="text" id="username" class="form-control" placeholder="Usuario" required autofocus>
            <input type="password" id="userpass" class="form-control" placeholder="<?=utf8_encode("Contraseña")?>" required>

            <label for="camp_id" class="col-sm-2 control-label"></label>
            <select id="camp_id" class="form-control">
                <?php
                    while($filas=$listado->fetch_assoc()){
                ?>
                        <option value="<?=$filas['camp_id']?>"><?=$filas['camp_desc']?></option>
                <?php
                    }
                ?>
            </select>

            <div><p></p></div>

            <button type="button" onclick="captura_datos();" class="btn btn-primary">Ingresar</button>
        </form>
    </div>
</div>

</body>
</html>