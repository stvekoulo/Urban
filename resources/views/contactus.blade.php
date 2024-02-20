@extends('layouts.opus')

@section('content')

<div class="breadcumb-wrapper " data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg" data-overlay="title" data-opacity="4">
    <div class="container z-index-common">
        <h1 class="breadcumb-title">Contact Us</h1>
        <ul class="breadcumb-menu">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Contact</li>
        </ul>
    </div>
</div>
<!--==============================
Service Area
==============================-->
<section class="space">
    <div class="container">
        <div class="title-area mb-30">
            <h3 class="sec-title text-center">Contact Now For Taxi Booking</h3>
        </div>
        <div class="tab-content">
            <!-- Single item -->
            <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                <div class="row gy-30 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box style2">
                            <div class="contact-box_content">
                                <div class="contact-box_icon"><i class="fa-light fa-map-location-dot"></i></div>
                                <div class="contact-box_info">
                                    <p class="contact-box_text">OUR OFFICE LOCATION</p>
                                    <h5 class="contact-box_link">25 Street, City Road, USA</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box style2">
                            <div class="contact-box_content">
                                <div class="contact-box_icon"><i class="fa-light fa-phone-arrow-up-right"></i></div>
                                <div class="contact-box_info">
                                    <p class="contact-box_text">Have A Question?</p>
                                    <h5 class="contact-box_link"><a href="tel:+468254762443">+(468)-2547-62443</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="contact-box style2">
                            <div class="contact-box_content">
                                <div class="contact-box_icon"><i class="fa-light fa-envelopes-bulk"></i></div>
                                <div class="contact-box_info">
                                    <p class="contact-box_text">Any question? email us!</p>
                                    <h5 class="contact-box_link"><a href="mailto:info@texiar.com">info@taxiar.com</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Appointment Area
==============================-->
<section class="space-bottom position-relative">
    <div class="container">
        <div class="contact-form-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="map-sec">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3644.7310056272386!2d89.2286059153658!3d24.00527418490799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe9b97badc6151%3A0x30b048c9fb2129bc!2sTaxiar!5e0!3m2!1sen!2sbd!4v1651028958211!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form action="mail.php" method="POST" class="contact-form ajax-contact">
                        <div class="title-area mb-30 text-center text-lg-start">
                            <h2 class="sec-title">Get A <span class="text-theme">Free</span> Quote</h2>
                            <p class="mb-30">Car driver instructor must also have good communication skills patience
                                confidence and teaching skills.</p>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                                <i class="fal fa-user"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                                <i class="fa-light fa-phone"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="subject" id="subject" class="form-select nice-select">
                                    <option value="" disabled selected hidden>Select Subject</option>
                                    <option value="Electrical System">Electrical System</option>
                                    <option value="Auto Car Repair">Auto Car Repair</option>
                                    <option value="Engine Diagnostics">Engine Diagnostics</option>
                                    <option value="Car & Engine Clean">Car & Engine Clean</option>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
                                <i class="fal fa-comment"></i>
                            </div>
                            <div class="form-btn col-12 text-center">
                                <button class="th-btn fw-btn">Send Message<i class="fa-regular fa-arrow-right"></i></button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
