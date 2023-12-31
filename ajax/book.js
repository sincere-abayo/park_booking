document.getElementById('bookForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission
  
 var fieldsToCheck=['name','nationality','country','identity','email','phone','date','time'];
    
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
      // Check if the date is in the past
      const date= document.getElementById('date').value;
      var enteredDate = new Date(date);
      var currentDate = new Date();
      
      if (enteredDate < currentDate) {
          errors.push('Please select a date in the present or future.');
          return;
      }
  
    // If there are errors, display them and prevent further execution
    if (errors.length > 0) {
      var errorMessage = errors.join('\n');
      alert(errorMessage);
    //   document.getElementById('result').innerHTML = "<i class='btn btn-primary' style='color:darkred'>" + errorMessage +"</i>";
      return;
    } 



    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
 
    xhr.open('POST', '../php/book.php', true);
  
 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          if (xhr.responseText === 'success') {
            alert("thank u for booking you are going to be redirected on payment page.");
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
 
  });
  
 