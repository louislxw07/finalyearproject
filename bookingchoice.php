<?php
include('includes/header.php');
?>

<div class='py-5'><br><br><br><br><br>
    <div class='container'>
        <div class='row justify-content-center'>
            <div class='col-md-7'>

                <div class='card shadow'>
                    <div class='card-header'>
                        <h5>Set your appointment today</h5>
                    </div>
                    <div class='card-body'> 
                        <form action='logincode.php' method='POST'>
                            <div class='form-group mb-3 d-flex justify-content-center'>
                                <button type="button" onclick="redirectToFitness()" class='btn btn-primary'>Book Training Session!</button>
                            </div>

                            <script>
                                function redirectToFitness() {
                                    window.location.href = 'bookappointment.php'; 
                                }
                                function redirectToTrainer() {
                                    window.location.href = '#'; 
                                }
                            </script>
                        </form>
                        <br/>                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
include('includes/footer.php');
?>