function captura_datos() {
    var usuario = document.getElementById("username").value;
    var pass = document.getElementById("userpass").value;
    var camp = document.getElementById("camp_id").value;

    var url1 = "controlador/login_getlogininfo.php";

    $.ajax({
        type: "post",
        url: url1,
        data: {
            username: usuario,
            userpass: pass,
            camp_id: camp
        },
        success: function (datos) {
            $("#resultado").html(datos);
        }
    })
}