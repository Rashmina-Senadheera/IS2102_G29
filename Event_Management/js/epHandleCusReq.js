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

closeModal = () => {
    document.getElementById("modal_request_id").value = "";
    document.getElementById("modal_customer_id").value = "";
    modal.style.display = "none";
}
// Decline request
declineRequest = (requestID, customerID) => {
    document.getElementById("modal_request_id").value = requestID;
    document.getElementById("modal_customer_id").value = customerID;
    modal.style.display = "block";
}