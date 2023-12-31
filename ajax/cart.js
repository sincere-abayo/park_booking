
var xhr = new XMLHttpRequest();
xhr.open('GET', 'php/cart.php', true);

xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            alert(xhr.responseText); // Alerts the session status
         
            //  document.getElementById('cart').innerHTML=xhr.responseText;
         
        } 
        else {
            alert('Error: ' + xhr.status);
        }
    }
};
xhr.send();
