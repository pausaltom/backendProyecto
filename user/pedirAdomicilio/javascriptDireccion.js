
function procesarProvincias() {
    var selectorProv = document.getElementById("provincia");

    if (this.readyState == 4 && this.status == 200) {
        var stringProv = this.responseText;
        // console.log('string'+stringProv);

        var arrayliProv = stringProv.split("//", 4);
        // console.log('arrayliProv  '+arrayliProv);

        arrayliProv.forEach(element => {
            var arraycomponentesProv = element.split("/");
            selectorProv.innerHTML += "<option>" + arraycomponentesProv[1] + "</option>" + "\n"
            //    console.log("arrayComponents "+arraycomponentesProv[0]);

        });
    }
}

function procesarMunicipios() {
    var selectorProv = document.getElementById("provincia");
    var id = selectorProv.options.selectedIndex;
    var selectorMun = document.getElementById("municipio");


    if (this.readyState == 4 && this.status == 200) {
        var stringMun = this.responseText;
        //console.log('string' + stringMun);

        var arrayliMun = stringMun.split("//");
        //console.log('arrayliMun  ' + arrayliMun);


        var length = selectorMun.options.length;
        for (i = length - 1; i >= 0; i--) {
            selectorMun.options[i] = null;
        }


        for (let i = 0; i < arrayliMun.length - 1; i++) {

            var arraycomponentesMun = arrayliMun[i].split("/");
            if (id = arraycomponentesMun[2]) {
                //console.log("array Municipios individual " + arraycomponentesMun);
                selectorMun.innerHTML += "<option value="+arraycomponentesMun[0]+">" + arraycomponentesMun[1] + "</option>";
            }
        }
    }
}
function procesarCp() {
    
    var selectorCp = document.getElementById("cp");

    if (this.readyState == 4 && this.status == 200) {
        var stringCP = this.responseText;
        console.log('string' + stringCP);

        var arrayliCP = stringCP.split("//");
        console.log('arrayliCP  ' + arrayliCP);


        var length = selectorCp.options.length;
        for (i = length - 1; i >= 0; i--) {
            selectorCp.options[i] = null;
        }


        for (let i = 0; i < arrayliCP.length - 1; i++) {

            var arraycomponentesCP = arrayliCP[i].split("/");
                console.log("array Municipios individual " + arraycomponentesCP);
                selectorCp.innerHTML += "<option>" + arraycomponentesCP[0] + "</option>";
            
        }
    }
}



function cogerIdSelectorProv() {
    var selectorProv = document.getElementById("provincia");
    var id = selectorProv.options.selectedIndex;
    //console.log("id select " + id);

    return id;
}
function cogerIdSelectorMun() {
    var selectorMun = document.getElementById("municipio");
    var id = selectorMun.options.selectedIndex;
    var idMunicipio= selectorMun.options[selectorMun.selectedIndex].value;
    console.log("text "+idMunicipio);
    return idMunicipio;
}



function loadEvents() {
    loadProvincias();
    document.getElementById("provincia").addEventListener('change', loadMunicipios);
    document.getElementById("municipio").addEventListener('change', loadCp);

}



function loadProvincias() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarProvincias;
    xmlhttp.open("GET", "http://localhost/php/user/pedirAdomicilio/getProvincia.php", true);
    xmlhttp.send();
}
function loadMunicipios() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarMunicipios;
    xmlhttp.open("GET", "http://localhost/php/user/pedirAdomicilio/getMunicipios.php?idProvincia=" + cogerIdSelectorProv(), true);
    xmlhttp.send();
}
function loadCp() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = procesarCp;
    xmlhttp.open("GET", "http://localhost/php/user/pedirAdomicilio/getCP.php?Municipio=" + cogerIdSelectorMun(), true);
    xmlhttp.send();
}