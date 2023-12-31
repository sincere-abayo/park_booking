document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission
  
 var fieldsToCheck=['email','password'];
    
  var errors = [];
  var data=[];
    // Loop through each field to check for empty values
    fieldsToCheck.forEach(function(field) {
      var value = document.getElementById(field).value;
  data.push(value);
      if (value.trim() === '') {
        errors.push('Please enter your ' + field + '. ');
      }
    });
  
    // If there are errors, display them and prevent further execution
    if (errors.length > 0) {
      var errorMessage = errors.join('\n');
      alert(errorMessage);
    //   document.getElementById('result').innerHTML = "<i class='btn btn-primary' style='color:darkred'>" + errorMessage +"</i>";
      return;
    } 



    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
 
    xhr.open('POST', 'phpa/login.php', true);
  
 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
     
        // alert(xhr.responseText);
        window.location.href = 'admin/';

        }
        if (xhr.status == 401)  {
    
        alert(xhr.responseText);
        }
      }
    };
  

    xhr.send('data=' + encodeURIComponent(data));
 
  });
  
 