<?php
    require_once("../configuracion/database.php");
    require_once("../modelo/usuario_model.php");
    session_start();
    $usuario = new usuario_model();
    $username = strtolower($_POST['username']);
    $userpass = $_POST['userpass'];
    $camp_id = $_POST['camp_id'];
    if($username!='' or $userpass!='') {
        $idperfil = $usuario->valida_acceso($username, $userpass);
        if ($idperfil != '') {
            if ($idperfil['campana']=='0') {
                if($idperfil['codusuario']=='pgalvez' or $idperfil['codusuario']=='cchavez') {
                    if($idperfil['codusuario']=='pgalvez') {
                        if($camp_id=='1') {
                            $_SESSION['usuario'] = $username;
                            $_SESSION['perfil'] = $idperfil['idperfil'];
                            $_SESSION['campana'] = $camp_id;
                            ?>
                            <script type="text/javascript">
                                location.assign("../cefectivo/inicio.php");
                            </script>
                            <?php
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo utf8_encode("×") ?></a>
                                <?php echo utf8_encode("Error: Campaña no asignada al usuario..."); ?>
                            </div>
                        <?php
                        }
                    }
                    if($idperfil['codusuario']=='cchavez') {
                        if($camp_id=='2') {
                            $_SESSION['usuario'] = $username;
                            $_SESSION['perfil'] = $idperfil['idperfil'];
                            $_SESSION['campana'] = $camp_id;
                            ?>
                            <script type="text/javascript">
                                location.assign("../cefectivo/inicio.php");
                            </script>
                            <?php
                        } else {
                        ?>
                            <div class="alert alert-danger alert-dismissable">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo utf8_encode("×") ?></a>
                                <?php echo utf8_encode("Error: Campaña no asignada al usuario..."); ?>
                            </div>
                        <?php
                        }
                    }
                } else {
                    $_SESSION['usuario'] = $username;
                    $_SESSION['perfil'] = $idperfil['idperfil'];
                    $_SESSION['campana'] = $camp_id;
                    ?>
                    <script type="text/javascript">
                        location.assign("../cefectivo/inicio.php");
                    </script>
                    <?php
                }
            } else {
                if ($idperfil['campana']==$camp_id) {
                    $_SESSION['usuario'] = $username;
                    $_SESSION['perfil'] = $idperfil['idperfil'];
                    $_SESSION['campana'] = $camp_id;
                ?>
                    <script type="text/javascript">
                        location.assign("../cefectivo/inicio.php");
                    </script>
                <?php
                } else {
                    if($idperfil['idperfil']=='5') {
                        $_SESSION['usuario'] = $username;
                        $_SESSION['perfil'] = $idperfil['idperfil'];
                        $_SESSION['campana'] = $camp_id;
                        ?>
                        <script type="text/javascript">
                            location.assign("../cefectivo/inicio.php");
                        </script>
                        <?php
                    } else {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo utf8_encode("×") ?></a>
                            <?php echo utf8_encode("Error: Campaña no asignada al usuario..."); ?>
                        </div>
                    <?php
                    }
                }
            }
        } else {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo utf8_encode("×") ?></a>
                <?php echo utf8_encode("Usuario y/o contraseña incorrectos"); ?>
            </div>
            <script type="text/javascript">
                $(":text").each(function () {
                    $($(this)).val('');
                });
                $(":password").each(function () {
                    $($(this)).val('');
                });
            </script>
            <?php
            $_SESSION = array();
        }
    } else {
        ?>
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><?php echo utf8_encode("×") ?></a>
            <?php echo utf8_encode("Por favor, ingrese la información solicitada"); ?>
        </div>
        <?php
    }
?>