/* document.getElementById('destinationForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission
  
 var fieldsToCheck=['img','title','description'];
    
  var errors = [];
  var data=[];
    // Loop through each field to check for empty values
   fieldsToCheck.forEach(function(field) {
      var value = document.getElementById(field).value;
  data.push(value);
      if (value.trim() === '') {
        if(field=='img')
        {
        errors.push('Please upload destination image, ');

        }
        else{
            errors.push('Please enter destination ' + field + ', ');

        }
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
 
    xhr.open('POST', '../php/destination.php', true);
  
 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          if (xhr.responseText === 'success') {
            alert("thank u for booking ticket! you are going to be redirected on payment page.");
            window.location.href = '../user/pay.php';
          } else {
            alert("Booking failed. Please try again.");
          
          }

        } 
        else {
    
        alert(xhr.statusText);
        }
      }
    };
  

    xhr.send('data=' + encodeURIComponent(data));
  
 
  }); */
  
  document.getElementById('destinationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
  
    // var fileInput = document.getElementById('img');
    // var file = fileInput.files[0];
    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
  
    if (!title || !description) {
      alert('Please fill in all fields and select a file.');
      return;
    }
  
    var formData = new FormData();
    // formData.append('file', file);
    formData.append('title', title);
    formData.append('description', description);
  
    var xhr = new XMLHttpRequest();
  
    xhr.open('POST', 'desti.php', true);
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
        //   document.getElementById('result').innerHTML = xhr.responseText;
        alert(xhr.responseText);
        } else {
        //   document.getElementById('result').innerHTML = 'Error: ' + xhr.status;
        alert(xhr.statusText);
        }
      }
    };
  
    xhr.send(formData);
  });
  
 