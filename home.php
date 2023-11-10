<?php
include('includes/header.php');
?>
<head>
    <style>
        .main-button1 a {
            display: inline-block;
            font-size: 15px;
            padding: 12px 20px;
            background-color: #000000;
            color: #fff;
            text-align: center;
            font-weight: 400;
            text-transform: uppercase;
            transition: all .3s;
            }

        .main-button1 a:hover {
            background-color: #ffffff;
            color: #000000;
        }
    </style>
</head>
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
        <video autoplay muted loop id="bg-video">
            <source src="assets/images/mainbackground.mp4" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h2><em>Physical and mental fitness compliment each other.</em></h2>
                <div class="main-button scroll-to-section">
                <li class="main-button1"><a href="register.php">Become a member now !!</a></li>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- *****our classes ***** -->
    <section style="background-color: white;" class="section" id="classes">
        <div style="margin-top: -100px;" class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>OUR CLASSES</em></h2>
                        <p>There are total of 5 classes prepared to test your body limit. For more informations, please read the description for the each class below.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/basicfitness.gif" alt="Class one">
                            </div>
                            <div class="right-content">
                                <h4>BASIC FITNESS</h4>
                                <p>Basic fitness encompasses fundamental physical abilities required for everyday activities. It includes elements like muscular strength, flexibility and balance.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/muscletraining.gif" alt="Class two">
                            </div>
                            <div class="right-content">
                                <h4>MUSCLE TRAINING</h4>
                                <p>Muscle training, also known as strength training is an exercise that focuses on increasing the strength, size and endurances of the muscles in the body.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/bodybuilding.gif" alt="Class three">
                            </div>
                            <div class="right-content">
                                <h4>BODY BUILDING</h4>
                                <p>Body building refers to a type of physical fitness and strength training that helps in developing and sculpting muscle mass. It combines exercise and nutrition to promote a perfect dream body and muscle growth.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/yogatraining.gif" alt="Class four">
                            </div>
                            <div class="right-content">
                                <h4>YOGA TRAINING</h4>
                                <p>Yoga training encompasses a holistic approach to physical and mental well-being through a series of postures, breathing exercises, and meditation techniques.</p>
                            </div>
                        </li>

                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="assets/images/advancedtraining.gif" alt="Class five">
                            </div>
                            <div class="right-content">
                                <h4>ADVANCED TRAINING</h4>
                                <p>Fitness advanced training comes with more intense level of exercise designed to challenge individuals who already have a foundation in fitness. It goes beyond basic workouts and targets specific aspects like strength, endurance, flexibility, or sports performance.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- ***** Features Item End ***** -->

    <!-- ***** Testimonials Starts ***** -->
    <section style="background-color: white;" class="section" id="trainers">
        <div style="margin-top: -100px;" class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Our Membership plan</h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>There are 3 types of membership plan prepared for you to test your body's limits.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/rookieplan.png" alt="plan 1">
                        </div>

                        <div class="down-content" style= "text-align: center;">
                            <span>RM 300 per month</span>
                            <h4>BASIC PLAN</h4>
                            <li>Limited access to the fitness centre</li>
                            <hr>
                            <li>Basic gym equipments (treadmills, cycles and dumbells)</li>
                            <hr>
                            <li>Access to locker rooms and showers</li>
                            <hr>
                            <li>Able to book for all types of Spartan fitness classes</li>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/amateurplan.png" alt="plan 2">
                        </div>

                        <div class="down-content" style= "text-align: center;">
                            <span>RM 600 PER MONTH</span>
                            <h4>AMATEUR PLAN</h4>
                            <li>Access to all benefits from Bronze membership</li>
                            <hr>
                            <li>Unlimited access to the fitness centre</li>
                            <hr>
                            <li>Able to use  gym equipments and facilities</li>
                            <hr>
                            <li>Gain access on sauna, steam room, lockers and showers.</li>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/images/proplan.png" alt="plan 3">
                        </div>
                        <div class="down-content" style= "text-align: center;">
                            <span>RM 900 PER MONTH</span>
                            <h4>PRO PLAN</h4>
                            <li>All benefits from Gold membership plan</li>
                            <hr>
                            <li>Free a fitness set upon selection of this plan</li>
                            <hr>
                            <li>Discounts on fitness supplements such as MyProtein</li>
                            <hr>
                            <li>Free personal coaching session to track your fitness progress</li>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
    </section>
    
    <!-- ***** Testimonials Ends ***** -->



<?php
include('includes/footer.php');
?>