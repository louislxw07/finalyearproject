<?php
include('includes/header.php');
require_once 'authController.php';
?>

<div class='py-5'><br><br><br><br><br>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-7'>

                <div class='card shadow'>
                    <div class='card-header'>
                        <h5> Forgot Password </h5>
                    </div>

                    <div class='card-body'>
                        <form method='POST'>
                            <div class='form-group mb-3'>
                                <label for=''> Email </label>
                                <input type="text" name='email' class='form-control'>
                            </div>

                            <div class='form-group mb-3 text-center'>
                                <button type='submit' name='forgot-password' class='btn btn-primary'>Submit</button>
                            </div>
                        </form>

                        <br/>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php 
include('includes/footer.php');
?>
