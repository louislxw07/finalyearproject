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
                        <h5> Login </h5>
                    </div>

                    <div class='card-body'>
                        <form method='POST'>
                            <div class='form-group mb-3'>
                                <label for=''> Email </label>
                                <input type="text" required name='email' class='form-control'>
                            </div>

                            <div class='form-group mb-3'>
                                <label for=''> Password </label>
                                <input type="password" required name='password' class='form-control'>
                            </div>

                            <div class='form-group mb-3 text-center'>
                                <button type='submit' name='login_btn' class='btn btn-primary'>Login</button>
                            </div>
                            
                            <div class='form-group mb-3 text-center'>
								<a style="color: #1498D5" href="forgot-password.php">Forgot Password?</a>
							</div>
						
                        </form>

                        <br/>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>
