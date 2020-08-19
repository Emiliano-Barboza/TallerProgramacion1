import api from './api.js';

function getConfirmElements() {
    return document.querySelectorAll(".navigate-calendar");
}

function showError(message) {
    alert(message);
}

function navigate(event){
    var month = event.target.attributes['month'].value;
    var year = event.target.attributes['year'].value;
    var url = 'index.php?month=' + month + "&year=" + year;
    console.log(url);
    api.get(url)
       .then(function(reponse) {
            document.open();
            document.write(reponse);
            document.close();
            window.setTimeout(registEvents, 200);
        })
       .catch (showError);
}

function registEvents(){
    var confirmations = getConfirmElements();
    
    for (var i = 0; i < confirmations.length; i++) {
        if (document.addEventListener) {
            confirmations[i].addEventListener("click", navigate);
        } else {
            confirmations[i].attachEvent("onclick", navigate);
        };
    };
}
document.addEventListener("DOMContentLoaded", registEvents);