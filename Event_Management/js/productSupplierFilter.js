// check if the user has selected any type of supplier
function setTypes() {
    let type = '&type=';

    // to check if it is the first type. If it is, then we don't need to add a comma before it.
    let first = true;

    var type1 = document.getElementById("Venue").checked;
    var type2 = document.getElementById("Entertainment").checked;
    var type3 = document.getElementById("Catering").checked;
    var type4 = document.getElementById("Photography").checked;
    var type5 = document.getElementById("Transport").checked;
    var type6 = document.getElementById("Beverages").checked;
    var type7 = document.getElementById("Florists").checked;
    var type8 = document.getElementById("Decoration").checked;
    var type9 = document.getElementById("Lighting").checked;
    var type10 = document.getElementById("AudioVideo").checked;


    if (type1) {
        type += first ? 'Venue' : ',Venue';
        first = false;
    }
    if (type2) {
        type += first ? 'ent' : ',ent';
        first = false;
    }
    if (type3) {
        type += first ? 'foodbev' : ',foodbev';
        first = false;
    }
    if (type4) {
        type += first ? 'photo' : ',photo';
        first = false;
    }
    if (type5) {
        type += first ? 'Transport' : ',Transport';
        first = false;
    }
    if (type6) {
        type += first ? 'foodbev' : ',foodbev';
        first = false;
    }
    if (type7) {
        type += first ? 'Florist' : ',Florist';
        first = false;
    }
    if (type8) {
        type += first ? 'Deco' : ',Deco';
        first = false;
    }
    if (type9) {
        type += first ? 'Lighting' : ',Lighting';
        first = false;
    }
    if (type10) {
        type += first ? 'ent' : ',ent';
        first = false;
    }

    return type;
}

function setBudget() {
     let budget = "&budget=";
     var min = document.getElementById("min").checked;
     var max = document.getElementById("max").checked;
     if (min) {
       budget += "ASC";
     }
     if (max) {
       budget += "DESC";
     }
     return budget;
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

    // filter by type and search
    xmlhttp.open("GET", "components/SuppliersItems.php?&search=" + str + setTypes() + setBudget(), true);
    xmlhttp.send();
}