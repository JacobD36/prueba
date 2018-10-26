<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./vista/css/bootstrap.min.css">
    <script type="text/javascript" src="./vista/js/buscacliente.js"></script>
    <script type="text/javascript" src="./vista/js/buscaclienteamp.js"></script>
    <script src="./vista/js/jquery.min.js"></script>
    <script src="./vista/js/bootstrap.min.js"></script>
    <title><?=utf8_encode('Crédito Efectivo')?></title>
    <style type="text/css">
        #id_img_fondo{
            width: 100%;
            height: 100%;
            top:0;
            left:0;
            position:fixed;
            z-index: -1;
        }
        .opacity {
            background-color: rgba(255, 255, 255, 0.8);
        }
        nav.navbar {
            background-color: #1b6d85;
        }
        nav.navbar ul.nav li {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        .nav.navbar-nav.navbar-right li a {
            color: white;
        }
        .nav.navbar-nav.navbar-right li a:hover {
            background-color: #31708f;
        }
        .nav.navbar-nav li a {
            color: white;
        }
        .nav.navbar-nav li a:hover {
            background-color: #31708f;
        }
        .dropdown-menu li a {
            color:black;
        }
    </style>
</head>
<body>
<img src="./vista/img/logo_bio2.jpg" id="id_img_fondo" class="center-block img-responsive"/>
<?php
    session_start();
    if ($_SESSION['usuario'] == ''){
        header ('Location: index.php');
}
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <?php if($_SESSION['perfil']!='3' or $_SESSION['perfil']!='4') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <a class="navbar-brand" href="./inicio.php"><?=utf8_encode('Crédito Efectivo');?></a>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <a class="navbar-brand" href="./inicio.php"><?=utf8_encode('Ampliación');?></a>
                <?php } ?>
            <?php } else { ?>
                <?php if($_SESSION['campana']=='1') {?>
                    <a class="navbar-brand" href="#"><?=utf8_encode('Crédito Efectivo');?></a>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <a class="navbar-brand" href="#"><?=utf8_encode('Ampliación');?></a>
                <?php } ?>
            <?php } ?>
        </div>
        <ul class="nav navbar-nav">
            <?php if($_SESSION['perfil']=='1' or $_SESSION['perfil']=='4' or $_SESSION['perfil']=='3') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <li><a href="#" onclick="$('#busqueda').load('./vista/reporte_base.php');$('#informacion').load('./vista/white_page.php');"><?=utf8_encode("Reporte General")?></a></li>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="$('#busqueda').load('./vista/reporte_base_amp.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Reporte General")?></a></li>
                            <li><a href="#" onclick="$('#busqueda').load('./vista/reporte_base_amp_2.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Reporte Ampliación")?></a></li>
                        </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if($_SESSION['perfil']=='1' or $_SESSION['perfil']=='2' or $_SESSION['perfil']=='5') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <li><a href="#" onclick="$('#busqueda').load('./vista/liberar_reg.php');$('#informacion').load('./vista/white_page.php');"><?=utf8_encode("Liberar Registro")?></a></li>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <li><a href="#" onclick="$('#busqueda').load('./vista/liberar_reg_amp.php');$('#informacion').load('./vista/white_page.php');"><?=utf8_encode("Liberar Registro")?></a></li>
                <?php } ?>
            <?php } ?>
            <?php if($_SESSION['perfil']=='3' or $_SESSION['perfil']=='1') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <li><a href="#"><?=utf8_encode("Consultas")?></a></li>
                    <!--<li><a href="#" onclick="$('#busqueda').load('./vista/consultar_reg.php');"><?=utf8_encode("Consultas")?></a></li>-->
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <li><a href="#"><?=utf8_encode("Consultas")?></a></li>
                <?php } ?>
            <?php } ?>
            <?php if($_SESSION['perfil']=='1' or $_SESSION['perfil']=='4' or $_SESSION['perfil']=='3') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=utf8_encode("Resúmen")?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="$('#busqueda').load('./vista/resumen_gestion.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Gestión")?></a></li>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=utf8_encode("Resúmen")?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="$('#busqueda').load('./vista/resumen_gestion_amp.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Gestión")?></a></li>
                        </ul>
                    </li>
                <?php } ?>
            <?php } ?>
            <?php if($_SESSION['campana']=='1') {
                        if($_SESSION['perfil']!='2') {
					        if($_SESSION['perfil']!='5') {
                            ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=utf8_encode("Dashboard")?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" onclick="$('#busqueda').load('./vista/dashboard_bi.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Dashboard")?></a></li>
									<?php if($_SESSION['usuario']!='mbambaren') {?>
										<li><a href="#" onclick="$('#busqueda').load('./vista/dashboard_tiempos.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Tiempos - Financiera Uno")?></a></li>
									<?php }?>
                                </ul>
                            </li>
                            <?php
					        }
                        }
                    }?>
            <?php if($_SESSION['campana']=='2') {
                if($_SESSION['perfil']!='2') {
                    if($_SESSION['perfil']!='5') {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?= utf8_encode("Dashboard") ?>
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" onclick="$('#busqueda').load('./vista/dashboard_bi_amp.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?= utf8_encode("Dashboard") ?></a></li>
                                <?php if ($_SESSION['perfil'] != '4') { ?>
                                    <li><a href="#" onclick="$('#busqueda').load('./vista/dashboard_tiempos_amp.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?= utf8_encode("Tiempos - Ampliaciones") ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <?php
                    }
                }
            }?>
            <?php if($_SESSION['perfil']=='1') {?>
                <?php if($_SESSION['campana']=='1') {?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=utf8_encode("Mantenimiento")?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="#" onclick="$('#busqueda').load('./vista/est_def_lista.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Clientes con Gestión Previa")?></a></li>-->
                            <li><a href="#" onclick="$('#busqueda').load('./vista/busca_def.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Clientes con Gestión Previa")?></a></li>
                            <?php if($_SESSION['perfil']=='1') {?>
                                <?php if($_SESSION['campana']=='1') {?>
                                    <li><a href="#" onclick="$('#busqueda').load('./vista/cargar_base.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Carga de Información de Gestión - Marcador")?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php if($_SESSION['campana']=='2') {?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?=utf8_encode("Mantenimiento")?><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="#" onclick="$('#busqueda').load('./vista/est_def_amp_lista.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Clientes con Gestión Previa")?></a></li>-->
                            <li><a href="#" onclick="$('#busqueda').load('./vista/busca_def.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Clientes con Gestión Previa")?></a></li>
                            <?php if($_SESSION['perfil']=='1') {?>
                                <?php if($_SESSION['campana']=='2') {?>
                                    <li><a href="#" onclick="$('#busqueda').load('./vista/cargar_base_amp.php');$('#informacion').load('./vista/white_page.php');" style="color:black;"><?=utf8_encode("Carga de Información de Gestión - Marcador")?></a></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="./controlador/logout.php"><span class="glyphicon glyphicon-log-in"></span>Salir</a></li>
        </ul>
    </div>
</nav>

<?php if($_SESSION['perfil']!='4' and $_SESSION['perfil']!='3') {?>
    <section>
        <div class="container" id="busqueda" style="padding-top: 80px;width:94%;">
            <div class="panel panel-primary opacity">
                <div class="panel-heading">
                    <?=utf8_encode('Búsquedas')?>
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        <p class="help-block"><?=utf8_encode('Ingrese, por favor, el número de DNI de la persona:')?></p>
                        <div class="form-group">
                            <label for="buscar_dni" class="col-sm-2 control-label">DNI</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="buscar_dni" required autofocus>
                            </div>
                            <div class="col-sm-4">
                                <?php if($_SESSION['campana']=='1') {?>
                                    <button type="button" class="btn btn-primary" id="buscar" onclick="$('#informacion').load('./vista/procesando.php'); buscar_cliente();">Buscar</button>
                                <?php } ?>
                                <?php if($_SESSION['campana']=='2') {?>
                                    <button type="button" class="btn btn-primary" id="buscar" onclick="$('#informacion').load('./vista/procesando.php'); buscar_cliente_amp();">Buscar</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="informacion" style="width:94%;">
        <div class="container" id="chartContainer"></div>
        </div>
    </section>
<?php } else { ?>
    <section>
        <div class="container" id="busqueda" style="padding-top: 80px;width:94%;">
        </div>

        <div class="container" id="informacion" style="width:94%;">
        </div>

        <div class="container" id="chartContainer"></div>
    </section>
<?php }?>
</body>
</html>
