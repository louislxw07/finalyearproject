<?php
include('includes/header.php');
?>

<section class="section" id="schedule">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Classes <em>Schedule</em></h2>
                        <img src="assets/images/line-dec.png" alt="">
                        <p>Our fitness class schedule offers a diverse range of invigorating workouts tailored to suit all levels of fitness enthusiasts. 
                            From high-energy cardio sessions to mind-body practices like yoga and Pilates, our expert instructors lead dynamic classes designed to promote strength, flexibility, and overall well-being. With convenient timings throughout the week, you can choose sessions that best fit your schedule. Whether you're a seasoned athlete or just starting your fitness journey, there's a class for everyone. Join us and experience a path to a healthier, happier you.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="filters">
                        <ul class="schedule-filter">
                            <li class="active" data-tsfilter="monday">Monday</li>
                            <li data-tsfilter="tuesday">Tuesday</li>
                            <li data-tsfilter="wednesday">Wednesday</li>
                            <li data-tsfilter="thursday">Thursday</li>
                            <li data-tsfilter="friday">Friday</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1">
                    <div class="schedule-table filtering">
                        <table>
                            <tbody>
                                <tr>
                                    <td class="day-time">Fitness Class<br><B>RM50</B></td>
                                    <td class="monday ts-item show" data-tsmeta="monday">10:00AM - 11:30AM</td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">2:00PM - 3:30PM</td>
                                    <td>Jayson Loo</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Muscle Training<br><B>RM60</B></td>
                                    <td class="friday ts-item" data-tsmeta="friday">10:00AM - 11:30AM</td>
                                    <td class="thursday friday ts-item" data-tsmeta="thursday" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Muhammad Abu</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Body Building<br><B>RM70</B></td>
                                    <td class="tuesday ts-item" data-tsmeta="tuesday">10:00AM - 11:30AM</td>
                                    <td class="monday ts-item show" data-tsmeta="monday">2:00PM - 3:30PM</td>
                                    <td>Krishnakumar Muthukappan</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Yoga Training Class<br><B>RM80</B></td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">10:00AM - 11:30AM</td>
                                    <td class="friday ts-item" data-tsmeta="friday">2:00PM - 3:30PM</td>
                                    <td>Jake Allen</td>
                                </tr>
                                <tr>
                                    <td class="day-time">Advanced Training<br><B>RM90</B></td>
                                    <td class="thursday ts-item" data-tsmeta="thursday">10:00AM - 11:30AM</td>
                                    <td class="wednesday ts-item" data-tsmeta="wednesday">2:00PM - 3:30PM</td>
                                    <td>Sanjave Singh</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include('includes/footer.php');
?>