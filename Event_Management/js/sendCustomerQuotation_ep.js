function setFoodBevCost(qid, pid, name, cost) {
    document.getElementById('foodBevqId').value = qid;
    document.getElementById('foodBevId').value = pid;
    document.getElementById('foodBevCost').value = cost;
    document.getElementById('foodBevName').value = name;
    calcTotalCost();
}

function setVenueCost(qid, pid, name, cost) {
    document.getElementById('venueqId').value = qid;
    document.getElementById('venueId').value = pid;
    document.getElementById('venueCost').value = cost;
    document.getElementById('venueName').value = name;
    calcTotalCost();
}

function setPVCost(qid, pid, name, cost) {
    document.getElementById('pvqId').value = qid;
    document.getElementById('pvId').value = pid;
    document.getElementById('pvCost').value = cost;
    document.getElementById('pvName').value = name;
    calcTotalCost();
}

function setSCost(qid, pid, name, cost) {
    document.getElementById('sqId').value = qid;
    document.getElementById('sId').value = pid;
    document.getElementById('sCost').value = cost;
    document.getElementById('sName').value = name;
    calcTotalCost();
}

function setLCost(qid, pid, name, cost) {
    document.getElementById('lqId').value = qid;
    document.getElementById('lId').value = pid;
    document.getElementById('lCost').value = cost;
    document.getElementById('lName').value = name;
    calcTotalCost();
}

function calcTotalCost() {
    var foodBevCost = document.getElementById('foodBevCost');
    var venueCost = document.getElementById('venueCost');
    var pvCost = document.getElementById('pvCost');
    var sCost = document.getElementById('sCost');
    var lCost = document.getElementById('lCost');
    var epCost = document.getElementById('epCost');

    var foodBevCost_f, venueCost_f, pvCost_f, sCost_f, lCost_f, epCost_f;

    foodBevCost ? foodBevCost_f = parseFloat(foodBevCost.value) : foodBevCost_f = 0;
    venueCost ? venueCost_f = parseFloat(venueCost.value) : venueCost_f = 0;
    pvCost ? pvCost_f = parseFloat(pvCost.value) : pvCost_f = 0;
    sCost ? sCost_f = parseFloat(sCost.value) : sCost_f = 0;
    lCost ? lCost_f = parseFloat(lCost.value) : lCost_f = 0;
    epCost ? epCost_f = parseFloat(epCost.value) : epCost_f = 0;

    var totalCost = 0;
    !isNaN(foodBevCost_f) ? totalCost += foodBevCost_f : totalCost += 0;
    !isNaN(venueCost_f) ? totalCost += venueCost_f : totalCost += 0;
    !isNaN(pvCost_f) ? totalCost += pvCost_f : totalCost += 0;
    !isNaN(sCost_f) ? totalCost += sCost_f : totalCost += 0;
    !isNaN(lCost_f) ? totalCost += lCost_f : totalCost += 0;
    !isNaN(epCost_f) ? totalCost += epCost_f : totalCost += 0;

    // set 2 decimal places & add , to separate thousands
    totalCost = totalCost.toFixed(2);
    totalCost = totalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    // add Rs. to the total cost
    totalCost = "Rs. " + totalCost;

    document.getElementById('totalCost').value = totalCost;
}
