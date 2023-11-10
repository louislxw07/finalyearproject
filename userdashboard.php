<?php
include('includes/header.php');
require 'config.php'; 
include("session.php");
?>

<html>
<body>
<head>
<style>
body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
</head>

<div class="container">
    <div class="main-body">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
        </nav>
        <!-- /Breadcrumb -->

        <?php
        $id = $_SESSION['id'];
        $sql = "SELECT * from users WHERE id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '
                <div class="card">
                    <div class="card-body">
                        <div class="row gutters-sm">
                            <div class="col-md-4 mb-3">
                                <div class="d-flex flex-column align-items-center text-center"><br><br><br>
                                    <div class="mt-3">
                                        <h4>'.$row["name"].'</h4>
                                        <p class="text-secondary mb-1">Born since '.$row["dob"].'</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                            '.$row["name"].'
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Email</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                            '.$row["email"].'
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Gender</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                            '.$row["gender"].'
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <h6 class="mb-0">Member Plan</h6>
                                          </div>
                                          <div class="col-sm-9 text-secondary">
                                          '.$row["memberplan"].'
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-3">
                                            <h6 class="mb-0">Membership Duration</h6>
                                          </div>
                                          <div class="col-sm-9 text-secondary">
                                          '.$row["membershipDuration"].' Months
                                          </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                          <div class="col-sm-12">
                                          <button type="button" class="btn btn-primary editbtn" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="'.$row['id'].'" data-name="'.$row['name'].'" data-gender="'.$row['gender'].'" data-dob="'.$row['dob'].'" data-email="'.$row['email'].'" data-memberplan="'.$row['memberplan'].'" data-membershipduration="'.$row['membershipDuration'].'">Edit</button>	
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo "0 result";
        }
        ?>
    </div>
</div>

<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <h4 style="text-align: center;"> Class Booking Info</h4><br>
                <table id="example4" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Class Type</th>
                            <th>Timeslot</th>
                            <th>Coach</th>
                            <th>Status</th>
                            <th>Amount Paid</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = $_SESSION['id'];
                        $sql = "SELECT * from booking WHERE userid = $id";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '
                        <tr>
                            <td>B000' . $row['id'] . '</td>
                            <td>' . $row['class_type'] . '</td>
                            <td>' . $row['class_timeslot'] . '</td>
                            <td>' . $row['class_coach'] . '</td> 
                            <td>' . $row['booking_status'] . '</td> 
                            <td>RM' . $row['payment'] . '</td> 
                            <td>
                            <a onclick="return confirm(\'Are you sure you want to cancel Booking ID: 000'.$row['id'].'?\')" href="delete-booking.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Cancel</button></a>
                            </td>
                        </tr>';
                    }
                } 
                ?>
                    </tbody>
                </table>
            </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Update User Profile Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
            </div>
            <div class="modal-body">
                <form id="profileForm" action="user-update.php" method="POST">
                    <input type="hidden" name="id" id="id" />
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name" name="name" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" id="dob" name="dob" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name='gender' required id='gender' class='form-control'>
                            <option value='male'>Male</option>
                            <option value='female'>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Member Plan</label>
                        <select name='memberplan' required id='memberplan' class='form-control'>
                            <option value='Basic'> Basic Plan </option>
                            <option value='Amateur'> Amateur Plan </option>
                            <option value='Pro'> Pro Plan </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Membership Duration</label>
                        <select name='membershipduration' required id='membershipduration' class='form-control'>
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
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="update-food"><span class="glyphicon glyphicon-save"></span>Confirm!</button>
                </div>
                </form>
            </div>
    </div>
</div>

<?php 
include('includes/footer.php');
?>


<script>
    $(document).on("click", ".editbtn", function() {
        var id = $(this).data("id");
        var name = $(this).data("name");
        var dob = $(this).data("dob");
        var email = $(this).data("email");
        var gender = $(this).data("gender");
        var memberplan = $(this).data("memberplan");
        var membershipduration = $(this).data("membershipduration");
        
        $("#id").val(id);
        $("#name").val(name);
        $("#dob").val(dob);
        $("#email").val(email);
        $("#memberplan").val(memberplan);
        $("#gender").val(gender);
        $("#membershipduration").val(membershipduration);
        $('#exampleModal').modal('show');
    });

    // Submit the form using AJAX
    $('#profileForm').submit(function(event) {
        event.preventDefault();

        // Get the form data
        var formData = $(this).serialize();

        // Send the AJAX request
        $.ajax({
        url: $(this).attr('action'),
        type: 'POST',
        data: formData,
        success: function(response) {
            // Handle the response
            alert(response);
            $('#exampleModal').modal('hide');
            if (response === "User profile edited successfully.") {
                location.reload(); // Refresh the page
            }
        },
        error: function() {
            alert('Error occurred. Please try again.');
        }
        });
    });
</script>

</body>
</html>