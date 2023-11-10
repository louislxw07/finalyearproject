<?php
include('includes/header.php');
require_once 'authController.php';
?>

<div class='py-5'> <br><br><br>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-7'>
            <div class='card shadow'>
                        <div class='card-header'>
                        <h5>PLEASE FILL UP ALL THE FORMS BELOW TO COMPLETE THE REGISTRATION PROCESS.</h5>
                    </div>

                    <div class='card-body'>
                        <form method="POST" onsubmit="return validateForm()">
                            <div class='form-group mb-3'>
                                <label for=''> Name </label>
                                <input type="text" value="<?php echo $name; ?>" name='name' required class='form-control' id='name'>
                                <div id="errorName" style="color: red;"></div>
                            </div>
                            <script>
                                document.getElementById('name').addEventListener('input', function (){
                                    var inputName = this.value;
                                    var errorName = document.getElementById('errorName');
                                    var regex = /[0-9]/;

                                    if (regex.test(inputName)){
                                        errorName.innerText = 'Name cannot contain numbers. Please retype again.';
                                    } else {
                                        errorName.innerText = '';
                                    }
                                });

                            </script>

                            <div class='form-group mb-3'>
                                <label for='gender'> Gender </label>
                                <select name='gender' value="<?php echo $gender; ?>" required id='gender' class='form-control'>
                                    <option value='Male'> Male </option>
                                    <option value='Female'> Female </option>
                                </select>
                            </div>
        
                            <div class='form-group mb-3'>
                                <label for='dob'> Date of Birth </label>
                                <input type="date" value="<?php echo $dateofbirth; ?>" required name='dateofbirth' class='form-control'>
                            </div>

                            <div class='form-group mb-3'>
                                <label for=''> Email </label>
                                <input type="text"  value="<?php echo $email; ?>" required name='email' class='form-control'>
                            </div>

                            <div class='form-group mb-3'>
                                <label for='password'> Password </label>
                                <div class="input-group">
                                    <input type="password" name='password' id='password' required value="<?php echo $password; ?>" class='form-control' aria-describedby='passwordVisibility' pattern='.*[A-Z].*' title="Please enter at least one upper case letter!">
                                    <div class="input-group-append">
                                        <button type="button" id='showPassword' class="btn btn-secondary" onclick="togglePasswordVisibility()">Show</button>
                                    </div>
                                </div>
                            </div>

                            <div class='form-group mb-3'>
                                <label for='confirm-password'> Confirm Password </label>
                                <input type="password" name='confirm_password' required value="<?php echo $confirm_password; ?>" id='confirm-password' class='form-control'>
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

                                function validateForm() {
                                    var createpass = document.getElementById("password").value;
                                    var confirmpass = document.getElementById("confirm-password").value;

                                    if (createpass != confirmpass) {

                                        alert("The two passwords does not match!");
                                        document.getElementById("password").focus();
                                        return false;
                                    }
                                    return true;
                                }
                            </script>


                            <div class='form-group mb-3'>
                                <label for='memberplan'> Membership Plan </label>
                                <select name='member_plan' required id='memberplan' class='form-control'>
                                    <option value='Basic'> Basic Plan </option>
                                    <option value='Amateur'> Amateur Plan </option>
                                    <option value='Pro'> Pro Plan </option>
                                </select>
                            </div>

                            <div class='form-group mb-3'>
                                <label for='membershipDuration'> Membership Duration (Months) </label>
                                <select name='membership_duration' required id='membershipDuration' class='form-control'>
                                    <option value='1'> 1 Month </option>
                                    <option value='2'> 2 Months </option>
                                    <option value='3'> 3 Months </option>
                                    <option value='4'> 4 Months </option>
                                    <option value='5'> 5 Months </option>
                                    <option value='6'> 6 Months </option>
                                    <option value='7'> 7 Months </option>
                                    <option value='8'> 8 Months </option>
                                    <option value='9'> 9 Months </option>
                                    <option value='10'> 10 Months </option>
                                    <option value='11'> 11 Months </option>
                                    <option value='12'> 12 Months </option>
                                </select>
                            </div>


                            <div class='form-group mb-3 text-center'>
                                <input type='submit' value="Register Now!" name='register_btn' class='btn btn-dark' style='color: white;'>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>