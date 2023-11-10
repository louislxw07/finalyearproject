<?php
include('includes/header.php');
require 'config.php'; 
include("session.php");
require_once 'authController.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Appointment</title>

</head>
<body>
<div class='py-5'> <br><br><br>
        <div class='container'>
            <div class='row justify-content-center'>
                <div class='col-md-7'>
            <div class='card shadow'>
                <div class='card-header'>
                    <h5>Fill up your appointment details</h5>
                </div>

                <?php
                    $id = $_SESSION['id'];
                    $sql = "SELECT * from users WHERE id=$id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                <div class="card-body">
                    <form method="GET" id="placeOrder">
                        <div class="form-group mb-3">
                            <label for="name"> Name </label>
                            <input type="text" value="'.$row["name"].'" name="name" readonly class="form-control" id="name">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" value="'.$row["email"].'" name="email" readonly class="form-control" id="email">
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="fitnessclass"> Type of Class </label>
                            <select name="fitnessclass" required id="fitnessclass" class="form-control" onchange="updateOptions()">
                                <option value="">Please Select</option>
                                <option value="Fitness Class"> Fitness Class </option>
                                <option value="Muscle Training"> Muscle Training </option>
                                <option value="Body Building"> Body Building </option>
                                <option value="Yoga Training Class"> Yoga Training Class </option>
                                <option value="Advanced Training"> Advanced Training </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="timeslot"> Available Timeslot </label>
                            <select name="timeslot" required id="timeslot" class="form-control">
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="coach">Coach</label>
                            <input type="text" name="coach" readonly class="form-control" id="coach">
                        </div>

                        <div class="form-group mb-3">
                            <label for="amount">Total Amount (RM)</label>
                            <input type="text" name="amount" readonly class="form-control" id="amount">
                        </div>

                        <div class="form-group mb-3 text-center">
                            <div id="paypal-button"></div>
                        </div>
                    </form>
                </div>
                ';
            }
        } 
        ?>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function updateOptions() {
        const fitnessClassSelect = document.getElementById("fitnessclass");
        const timeslotSelect = document.getElementById("timeslot");
        const coachInput = document.getElementById("coach");
        const amountInput = document.getElementById("amount");

        const selectedClass = fitnessClassSelect.value;

        if (selectedClass === "Fitness Class") {
            // Set timeslot options and coach for Fitness Class
            timeslotSelect.innerHTML = `
                <option>Monday 10:00AM - 11:30AM</option>
                <option>Tuesday 2:00PM - 3:30PM</option>
            `;
            coachInput.value = "Jayson Loo";
            amountInput.value = "50";
        } else if (selectedClass === "Muscle Training") {
            // Set timeslot options and coach for Muscle Training
            timeslotSelect.innerHTML = `
                <option>Thursday 2:00PM - 3:30PM</option>
                <option>Friday 10:00AM - 11:30AM</option>
            `;
            coachInput.value = "Muhammad Abu";
            amountInput.value = "60";
        } else if (selectedClass === "Body Building") {
            // Set timeslot options and coach for Body Building
            timeslotSelect.innerHTML = `
                <option>Monday 2:00PM - 3:30PM</option>
                <option>Tuesday 10:00AM - 11:30AM</option>
            `;
            coachInput.value = "Krishnakumar Muthukappan";
            amountInput.value = "70";
        } else if (selectedClass === "Yoga Training Class") {
            // Set timeslot options and coach for Yoga Training Class
            timeslotSelect.innerHTML = `
                <option>Wednesday 10:00AM - 11:30AM</option>
                <option>Friday 2:00PM - 3:30PM</option>
            `;
            coachInput.value = "Jake Allen";
            amountInput.value = "80";
        } else if (selectedClass === "Advanced Training") {
            // Set timeslot options and coach for Advanced Training
            timeslotSelect.innerHTML = `
                <option>Wednesday 2:00PM - 3:30PM</option>
                <option>Thursday 10:00AM - 11:30AM</option>
            `;
            coachInput.value = "Sanjave Singh";
            amountInput.value = "90";
        }

        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        var fitnessclass = selectedClass;
        var timeslot = timeslotSelect.value;
        var coach = coachInput.value;
        var amount = amountInput.value; 
    }
</script>



<!-- Paypal Express -->
<script>
    paypal.Button.render({ 
        env: 'sandbox',	
        client: {
            sandbox:    'AVmJnC9yxpaJF2It0D20sHIvHXT9pZoz33rMDBOWVDXrYZaF3Lfat4FqtapENt1jX3-MA3YdwCuMUAVN',
        },

        commit: true, // Show a 'Pay Now' button
        onCancel: function (data) {
			alert("Payment has been cancelled, no amount was deducted!");
			},

        style: {
				layout: 'vertical',
				color:  'gold',
				shape:  'rect',
				label:  'paypal',
			},

            funding:
			{
				disallowed: [ paypal.FUNDING.CREDIT, paypal.FUNDING.CARD ]
			},

        
        payment: function(data, actions) {
            var currentAmount = document.getElementById("amount").value;
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            //total purchase
                            amount: { 
                                total: currentAmount, 
                                currency: 'MYR' 
                            }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
        var currentAmount = document.getElementById("amount").value;
        var selectedClass = document.getElementById("fitnessclass").value;
        var timeslot = document.getElementById("timeslot").value;
        var coach = document.getElementById("coach").value;
        var name = document.getElementById("name").value;
        var email = document.getElementById("email").value;
        return actions.payment.execute().then(function(payment) {
			window.location = 'sales.php' +
            '?amount=' + currentAmount +
            '&fitnessclass=' + selectedClass +
            '&timeslot=' + timeslot +
            '&coach=' + coach +
            '&name=' + name +
            '&email=' + email;
        });
    },

}, '#paypal-button');
</script>
</body>
</html>

<?php 
include('includes/footer.php');
?>