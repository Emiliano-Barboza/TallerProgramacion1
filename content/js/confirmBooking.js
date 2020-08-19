import api from './api.js';

function getConfirmElements() {
    return document.querySelectorAll(".confirm");
}

function showError(message) {
    alert(message);
}

function confirmClient(event){
    var data = {
        'instructor_id': event.target.id,
        'fecha': event.target.attributes['date'].value,
        'hora': event.target.attributes['hour'].value,
        'usuario_id': event.target.attributes['user-id'].value
    };
    console.log(data);
    api.post('confirmBooking.php', data)
       .then(function() {
           window.location.href = "index.php";
        })
       .catch (showError);
}

function registEvents(){
    var confirmations = getConfirmElements();
    
    for (var i = 0; i < confirmations.length; i++) {
        if (document.addEventListener) {
            confirmations[i].addEventListener("click", confirmClient);
        } else {
            confirmations[i].attachEvent("onclick", confirmClient);
        };
    };
}
document.addEventListener("DOMContentLoaded", registEvents);