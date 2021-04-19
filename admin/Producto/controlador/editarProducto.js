





















var role;
function procesarSession() {
    if (this.readyState == 4 && this.status == 200) {
        role = this.responseText;
        console.log('role' + role);
        if (!(role === "ADMINSESSION" || role === "SUPERADMINSESSION")) {
            window.location = "../../../comun/logout.php";
        }
    }
}
function loadEvents() {
    comprobarSession();
}
function comprobarSession() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarSession;
    xmlhttp.open("GET", "http://localhost/php/comun/comprobarSession.php", true);
    xmlhttp.send();
}