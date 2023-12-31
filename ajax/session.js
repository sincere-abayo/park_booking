

var xhr = new XMLHttpRequest();
xhr.open('GET', '../php/session.php', true);
xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 401) {
            alert(xhr.responseText); // Alerts the session status
            //  window.location.href='../login.html'; 
             
         
        } 
        else {
            alert(xhr.responseText); // Alerts the session status

        }
    }
};
xhr.send();
