<?php
include('includes/header.php');
?>

<!-- ***** Contact Us Area Starts ***** -->
<section class="section" id="contact-us">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div id="map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127113.85796015277!2d100.17828069987601!3d5.36990147890823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ae9f2c040cfa9%3A0x107144aef7e7c112!2sPenang%20Island!5e0!3m2!1sen!2smy!4v1694056392873!5m2!1sen!2smy" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="contact-form">
                        <form id="contact" action="contact_process.php" method="post">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email*" required="">
                              </fieldset>
                            </div>
                            <div class="col-md-12 col-sm-12">
                              <fieldset>
                                <input name="subject" type="text" id="subject" placeholder="Subject">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" id="message" placeholder="Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('form-submit').addEventListener('click', function(event) {
                var name = document.getElementById('name').value;
                var email = document.getElementById('email').value;
                var subject = document.getElementById('subject').value;
                var message = document.getElementById('message').value;

                // Check if any of the fields are empty
                if (name.trim() === '' || email.trim() === '' || subject.trim() === '' || message.trim() === '') {
                    alert('Enquiry failed. Please fill out all fields below.');
                    event.preventDefault(); // Prevent the form from submitting
                } else {
                    // All fields are filled, display success message
                    alert('We will get back to you soon.');
                }
            });
        </script>


    </section>
    <!-- ***** Contact Us Area Ends ***** -->

<?php
include('includes/footer.php');
?>