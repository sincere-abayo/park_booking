document.getElementById('destinationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
  
    var fileInput = document.getElementById('img');
    var file = fileInput.files[0];
    var title = document.getElementById('title').value;
    var description = document.getElementById('description').value;
  
    if (!file || !title || !description) {
      alert('Please fill in all fields and select a file.');
      return;
    }
  
    var formData = new FormData();
    // formData.append('file', file);
    formData.append('title', title);
    formData.append('description', description);
  
    var xhr = new XMLHttpRequest();
  
    xhr.open('POST', './desti.php', true);
  
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        if (xhr.status == 200) {
          document.getElementById('result').innerHTML = xhr.responseText;
        } else {
          document.getElementById('result').innerHTML = 'Error: ' + xhr.status;
        }
      }
    };
  
    xhr.send(formData);
  });
  