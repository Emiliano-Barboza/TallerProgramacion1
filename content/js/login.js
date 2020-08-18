function load() { 
  function sendData() {
    const AJAX = new XMLHttpRequest(); // AJAX handler
    const FD = new FormData( form ); // Bind to-send data to form element

    AJAX.addEventListener( "load", function(event) {
        document.getElementById("ajax_changes").innerHTML = event.target.responseText;
      } ); // Change HTML on successful response

    AJAX.addEventListener( "error", function( event ) {
        document.getElementById("ajax_changes").innerHTML =  'Oops! Something went wrong.';
      } );

    AJAX.open( "POST", "ajax_responder.php" ); // Send data, ajax_responder.php can be any file or URL

    AJAX.send( FD ); // Data sent is from the form
  } // sendData() function  
    
  var form = document.getElementById("login"); // Access <form id="ajaxForm">, id="ajaxForm" can be anything
  form.addEventListener("submit", function ( event ) { // Takeover <input type="submit">
    event.preventDefault();
    sendData();
  });
} 

document.addEventListener("DOMContentLoaded", load);


/*

window.addEventListener( "load", function () {
    function sendData() {
      const AJAX = new XMLHttpRequest(); // AJAX handler
      const FD = new FormData( form ); // Bind to-send data to form element

      AJAX.addEventListener( "load", function(event) {
        document.getElementById("ajax_changes").innerHTML = event.target.responseText;
      } ); // Change HTML on successful response

      AJAX.addEventListener( "error", function( event ) {
        document.getElementById("ajax_changes").innerHTML =  'Oops! Something went wrong.';
      } );

      AJAX.open( "POST", "ajax_responder.php" ); // Send data, ajax_responder.php can be any file or URL

      AJAX.send( FD ); // Data sent is from the form

      AJAX.addEventListener( "load", function(event) {
        document.getElementById("ajax_changes").innerHTML =
          event.target.responseText;
          // Bind a new eventListener everytime the <form> is changed:
          form = document.getElementById( "ajaxForm" ); // Access <form id="ajaxForm">, id="ajaxForm" can be anything
          form.addEventListener( "submit", function ( event ) { // Takeover <input type="submit">
            event.preventDefault();
            sendData();
          } ); // End new event listener
      } );
    } // sendData() function

    var form = document.getElementById( "ajaxForm" ); // Access <form id="ajaxForm">, id="ajaxForm" can be anything
    form.addEventListener( "submit", function ( event ) { // Takeover <input type="submit">
      event.preventDefault();
      sendData();
    } );

  } );
 * */