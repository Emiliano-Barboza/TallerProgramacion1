import api from './api.js';

function getConfirmElements() {
    return document.querySelectorAll(".confirm");
}

function showError(message) {
    alert(message);
}

function removeClient(id) {
    var element = document.getElementById(id);
    if (element){
        element.parentNode.remove(element);
    }
    var confirmations = getConfirmElements();
    if (!confirmations.length) {
        alert("Se confirmaron todos los clientes");
    }
}

function confirmClient(event){
    var data = {
        'usuario_id': event.target.id
    };
    api.post('confirmLicense.php', data)
       .then(function() {
           removeClient(event.target.id);
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