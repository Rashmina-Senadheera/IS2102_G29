function setTypes() {
    let type = '&type=';
    let first = true;
    var type1 = document.getElementById("Venue").checked;
    var type2 = document.getElementById("Entertainment").checked;
    var type3 = document.getElementById("Catering").checked;
    var type4 = document.getElementById("Photography").checked;

    if (type1) {
        type += first ? 'Venue' : ',Venue';
        first = false;
    }
    if (type2) {
        type += first ? 'Entertainment' : ',Entertainment';
        first = false;
    }
    if (type3) {
        type += first ? 'foodbev' : ',foodbev';
        first = false;
    }
    if (type4) {
        type += first ? 'pv' : ',pv';
        first = false;
    }

    return type;
}

function showResult() {
    // if (str.length == 0) {
    //     document.getElementById("supplier_items").innerHTML = "";
    //     return;
    // }
    let str = document.getElementById("search").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("supplier_items").innerHTML = this.responseText;
        }
    }

    xmlhttp.open("GET", "components/SuppliersItems.php?search=" + str + setTypes(), true);
    xmlhttp.send();
}