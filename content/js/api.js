
function get(url) {
    return new Promise(function(resolve, reject) {
        var request = new XMLHttpRequest();
        request.addEventListener( "load", function(event) {
            if(event.currentTarget.status == 200) {
                resolve(event.currentTarget.responseText);
            } else {
                reject(event.currentTarget.statusText);
            }
          });

        request.addEventListener( "error", function( event ) {
            reject(event);
        });

        request.open( "GET", url);
        
        request.send();
    });
}

function post(url, data) {
    return new Promise(function(resolve, reject) {
        var request = new XMLHttpRequest();
        request.addEventListener( "load", function(event) {
            if(event.currentTarget.status == 200) {
                resolve(event.currentTarget.responseText);
            } else {
                reject(event.currentTarget.statusText);
            }
          });

        request.addEventListener( "error", function( event ) {
            reject(event);
        });

        request.open( "POST", url);
        
        request.setRequestHeader('Content-type', 'application/json');
        
        request.send( JSON.stringify(data) );
    });
}
export default {
    get: get,
    post: post
};