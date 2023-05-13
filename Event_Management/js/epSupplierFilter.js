// check if the user has selected any type of supplier
function setTypes() {
    let type = '&type=';

    // to check if it is the first type. If it is, then we don't need to add a comma before it.
    let first = true;

    var type1 = document.getElementById("Decoration").checked;
    var type2 = document.getElementById("Entertainment").checked;
    var type3 = document.getElementById("Florists").checked;
    var type4 = document.getElementById("FoodBev").checked;
    var type5 = document.getElementById("Lighting").checked;
    var type6 = document.getElementById("Photography").checked;
    var type7 = document.getElementById("Sounds").checked;
    var type8 = document.getElementById("Transport").checked;
    var type9 = document.getElementById("Venue").checked;
    var type10 = document.getElementById("Other").checked;


    if (type1) {
        type += first ? 'deco' : ',deco';
        first = false;
    }
    if (type2) {
        type += first ? 'ent' : ',ent';
        first = false;
    }
    if (type3) {
        type += first ? 'florist' : ',florist';
        first = false;
    }
    if (type4) {
        type += first ? 'foodbev' : ',foodbev';
        first = false;
    }
    if (type5) {
        type += first ? 'light' : ',light';
        first = false;
    }
    if (type6) {
        type += first ? 'photo' : ',photo';
        first = false;
    }
    if (type7) {
        type += first ? 'sound' : ',sound';
        first = false;
    }
    if (type8) {
        type += first ? 'transport' : ',transport';
        first = false;
    }
    if (type9) {
        type += first ? 'venue' : ',venue';
        first = false;
    }
    if (type10) {
        type += first ? 'other' : ',other';
        first = false;
    }

    return type;
}

function showResult(reqID) {
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
    xmlhttp.open("GET", "components/SuppliersItems.php?reqID=" + reqID + "&search=" + str + setTypes(), true);
    xmlhttp.send();
}