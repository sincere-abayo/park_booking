<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Your Page Title</title>
</head>
<body>
<!-- Add this button wherever you want to trigger the modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#resetModal">
    Open Reset Password Modal
</button>
<!-- The modal -->
<div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetModalLabel">Reset password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Your existing form content goes here -->
                <form method="post">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="fullname">Email</label>
                            <input type="email" name="requestEmail" class="form-control">
                        </div>
                    </div>
                    <?php
                    if (isset($_POST["requestReset"])) {
                        $email = $_POST["requestEmail"];
                        $query=$conn->query("SELECT * FROM user where u_email='$email'");
                        if (mysqli_num_rows($query)== 1) {
                    

                    ?>
                    <div id="password">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="fullname"> New &mdash; Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="fullname">Confirm &mdash; Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                            <input type="submit" name="resetPassword" class="btn btn-danger btn-block" value="Request-reset">
                           
                        </div>
                    </div>
                    <?php

}
}

?>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" name="requestReset" class="btn btn-danger btn-block" value="Request-reset">
                            <input type="submit" onclick="login()" class="btn btn-primary btn-block" value="login">
                           
                        </div>
                    
                        
                    </div>
                    </form>
            </div>
            <!-- You can add a footer section if needed -->
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
           
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>