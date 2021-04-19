var totalPag;
function procesarProductos() {
    if (this.readyState == 4 && this.status == 200) {
        var string = this.responseText;
        console.log('string: ' + string);

        var k = string.indexOf("#");
        console.log('k' + k);

        var paginacion = string.slice(k + 1, string.length);
        totalPag = parseInt(paginacion);
        console.log('pag:' + paginacion);
        

        var stringProductos = string.slice(0, k);

        console.log('string' + stringProductos);
        var arrayliProductos = stringProductos.split("//").filter(Boolean);
        //console.log('arrayliProductos  '+arrayliProductos);

        arrayliProductos.forEach(element => {
            var arrayCadaProducto = element.split('/');
            var tbody = document.getElementById("tbody");
            //console.log('id: '+arrayCadaProducto[0]);
            //console.log('img: '+arrayCadaProducto[1]);
            var tr = document.createElement("tr");
            var td1 = document.createElement("td");
            var img = document.createElement("img");
            img.src = rutaImagen(arrayCadaProducto[1]);
            img.width = 200;
            img.alt = "Imagen Producto";
            td1.appendChild(img);
            var td2 = document.createElement("td");
            td2.innerHTML = arrayCadaProducto[2];
            var td3 = document.createElement("td");
            td3.innerHTML = arrayCadaProducto[3] + "€";
            var td4 = document.createElement("td");
            if (role != "NOSESSION") {
                var editar = document.createElement("button");
                editar.id= "editButton";
                console.log(editar.id);
                editar.value = arrayCadaProducto[0];
                editar.innerHTML = "Editar";
                td4.appendChild(editar);
            } else {
                var anadir = document.createElement("button");
                anadir.id= "anadirButton";
                console.log(anadir.id);
                anadir.value = arrayCadaProducto[0];
                anadir.innerHTML = "añadir";
                td4.appendChild(anadir);

            }
            tbody.appendChild(tr);
            tr.appendChild(td1);
            tr.appendChild(td2);
            tr.appendChild(td3);
            tr.appendChild(td4);
        });
    }
}
function rutaImagen(imgName) {
    var rutaImgTemp = "/php/uploads/" + imgName;
    var rutaImg = rutaImgTemp.split(" ").join("");
    return rutaImg;
}

var role;
function procesarSession() {
    if (this.readyState == 4 && this.status == 200) {
        role = this.responseText;
        console.log('role' + role);
        if (!(role === "NOSESSION" || role === "ADMINSESSION" || role === "SUPERADMINSESSION")) {
            window.location = "../../comun/logout.php";
        }
    }
}
function limpiarTable(){
    document.getElementById("tbody").innerHTML="";
}

function loadEvents() {
    comprobarSession();
    loadProductos();
    document.getElementById("primera").addEventListener("click", () => {
        pagina = 1;
        console.log("pagina"+pagina);
        limpiarTable();
        loadProductos();
    });
    document.getElementById("anterior").addEventListener("click", () => {
        if (pagina === 1) {
            pagina = 1;
        } else {
            pagina--;
        }
        console.log("pagina"+pagina);
        limpiarTable();
        loadProductos();
    });
    document.getElementById("siguiente").addEventListener("click", () => {
        if (pagina === totalPag) {
            pagina = totalPag;
        } else {
            pagina++;
        }
        console.log("pagina"+pagina);
        limpiarTable();
        loadProductos();
    });
    document.getElementById("ultima").addEventListener("click", () => {
        pagina = totalPag;
        console.log("pagina"+pagina);
        limpiarTable();
        loadProductos();
    });
}

function comprobarSession() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarSession;
    xmlhttp.open("GET", "http://localhost/php/comun/comprobarSession.php", true);
    xmlhttp.send();
}
var pagina = 1;
function loadProductos() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarProductos;
    xmlhttp.open("GET","http://localhost/php/Productos/modelo/getProductos.php?pagina="+pagina, true);
    xmlhttp.send();
}
