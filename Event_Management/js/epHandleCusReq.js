// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Request view
requestView = (requestID) => {
    window.location = "Request-view.php?reqID=" + requestID
}

// Set error message
setErrorMessage = (current, message) => {
    if (current == "") {
        return "Warning: <br>" + message + "<br>";
    } else {
        return current + message + "<br>";
    }
}

sendCustomerQuotation = () => {
    var formErrors = document.getElementById("formErrors");
    var error = "";

    var epCost = document.getElementById("epCost").value;
    if (epCost == "" || epCost <= 0 || isNaN(epCost)) {
        error = setErrorMessage(error, "Event Planner's cost is empty!");
    }

    if (document.getElementById("foodBevCost") || document.getElementById("foodBevName")) {
        let foodBevCost = document.getElementById("foodBevCost").value;
        let foodBevName = document.getElementById("foodBevName").value;

        if (foodBevCost == "" || foodBevCost <= 0 || isNaN(foodBevCost) || foodBevName == "") {
            error = setErrorMessage(error, "Food & Beverages is empty!");
        }
    }
    if (document.getElementById("venueCost") || document.getElementById("venueName")) {
        let venueCost = document.getElementById("venueCost").value;
        let venueName = document.getElementById("venueName").value;

        if (venueCost == "" || venueCost <= 0 || isNaN(venueCost) || venueName == "") {
            error = setErrorMessage(error, "Venue is empty!");
        }
    }
    if (document.getElementById("pvCost") || document.getElementById("pvName")) {
        let pvCost = document.getElementById("pvCost").value;
        let pvName = document.getElementById("pvName").value;

        if (pvCost == "" || pvCost <= 0 || isNaN(pvCost) || pvName == "") {
            error = setErrorMessage(error, "Photography & Videography is empty!");
        }
    }
    if (document.getElementById("slCost") || document.getElementById("slName")) {
        let slCost = document.getElementById("slCost").value;
        let slName = document.getElementById("slName").value;

        if (slCost == "" || slCost <= 0 || isNaN(slCost) || slName == "") {
            error = setErrorMessage(error, "Sound & Lighting is empty!");
        }
    }

    formErrors.innerHTML = error;
    modal.style.display = "block";
}

sendCustomerQuotationConfirm = () => {
    document.getElementById("sendCustomerQuotation").submit();
}

closeModal = () => {
    document.getElementById("modal_request_id").value = "";
    document.getElementById("modal_customer_id").value = "";
    modal.style.display = "none";
}

closeModal2 = () => {
    modal.style.display = "none";
}

// Decline request
declineRequest = (requestID, customerID) => {
    document.getElementById("modal_request_id").value = requestID;
    document.getElementById("modal_customer_id").value = customerID;
    modal.style.display = "block";
}