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
                        <h5> Enter Your New Password </h5>
                    </div>

                    <div class='card-body'>
                        <form method='POST' onsubmit='return validate_form();'>
                            <div class='form-group mb-3'>
                                <label for=''> Password </label>
                                <div class="input-group">
                                    <input type="password" name='password' id='password' required class='form-control' aria-describedby='passwordVisibility' pattern='.*[A-Z].*' title='Please enter at least one upper case letter!'>
                                    <div class="input-group-append">
                                        <button type="button" id='showPassword' class="btn btn-secondary" onclick="togglePasswordVisibility()">Show</button>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group mb-3'>
                                <label for=''>Confirm Password </label>
                                <input type="password" name='confirm_password' id='confirm-password' required class='form-control' aria-describedby='passwordVisibility'>
                                <div id="errorConfirmPassword" style="color: red;"></div>
                            </div>

                            <script>
                                function togglePasswordVisibility() {
                                    var passwordInput = document.getElementById('password');
                                    var seePasswordButton = document.getElementById('showPassword');

                                    if (passwordInput.type === 'password') {
                                        passwordInput.type = 'text';
                                        seePasswordButton.textContent = 'Hide';
                                    } else {
                                        passwordInput.type = 'password';
                                        seePasswordButton.textContent = 'Show';
                                    }
                                }

                                function validate_form() {
                                    var createpass = document.getElementById("password").value;
                                    var confirmpass = document.getElementById("confirm-password").value;

                                    if (createpass != confirmpass) {

                                        alert("The two passwords does not match!");
                                        document.getElementById("password").focus();
                                        return false;
                                    }
                                    return true;
                                }

                                document.getElementById('confirm-password').addEventListener('input', function (){
                                    var confirmPassword = this.value;
                                    var password = document.getElementById('password').value;
                                    var errorConfirmPassword = document.getElementById('errorConfirmPassword');

                                    if (confirmPassword !== password){
                                        errorConfirmPassword.innerText = 'Passwords do not match.';
                                    } else {
                                        errorConfirmPassword.innerText = '';
                                    }
                                });
                            </script>

                            <div class='form-group mb-3 text-center'>
                                <button type='submit' name='reset-password' class='btn btn-primary'>Submit</button>
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
