@extends('layouts.opus')

@section('content')
    <div class="breadcumb-wrapper " data-bg-src="assets/img/breadcumb/breadcumb-bg.jpg" data-overlay="title" data-opacity="4">
        <div class="container z-index-common">
            <ul class="breadcumb-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>A propos</li>
            </ul>
        </div>
    </div>
    <!--==============================
    Faq Area
    ==============================-->
    <div class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="accordion-area accordion mb-30" id="faqAccordion">


                        <div class="accordion-card style4  active">
                            <div class="accordion-header" id="collapse-item-1">
                                <button class="accordion-button " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">How to
                                    select a Cab?</button>
                            </div>
                            <div id="collapse-1" class="accordion-collapse collapse show" aria-labelledby="collapse-item-1"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Research reputable cab services: Start by researching and
                                        identifying reputable cab services in your area. Look for well-known companies with
                                        positive reviews and good customer feedback.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-2" aria-expanded="false" aria-controls="collapse-2">How to
                                    Download taxi app?</button>
                            </div>
                            <div id="collapse-2" class="accordion-collapse collapse " aria-labelledby="collapse-item-2"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Determine the App Store: Identify the app store that is compatible
                                        with your device. For iOS devices, such as iPhones and iPads, use the Apple App
                                        Store. For Android devices, such as smartphones and tablets, use the Google Play
                                        Store.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-3" aria-expanded="false" aria-controls="collapse-3">How to
                                    select a Driver?</button>
                            </div>
                            <div id="collapse-3" class="accordion-collapse collapse " aria-labelledby="collapse-item-3"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Driver Ratings and Reviews: Many ride-sharing apps provide driver
                                        ratings and reviews from previous passengers. Check the drivers overall rating and
                                        read through the reviews to get an idea of their reliability, professionalism, and
                                        driving skills. Choose drivers with consistently positive ratings and favorable
                                        reviews.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-4" aria-expanded="false" aria-controls="collapse-4">What
                                    Should I be Asking For first ride?</button>
                            </div>
                            <div id="collapse-4" class="accordion-collapse collapse " aria-labelledby="collapse-item-4"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Confirmation of Drivers Identity: Before getting into the vehicle,
                                        ask the driver to confirm their name and cross-reference it with the information
                                        provided by the ride-sharing app or taxi service. This helps ensure youre getting
                                        into the correct vehicle and with the right driver.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-5">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-5" aria-expanded="false" aria-controls="collapse-5">How Many
                                    cars does rider taxi service Have?</button>
                            </div>
                            <div id="collapse-5" class="accordion-collapse collapse " aria-labelledby="collapse-item-5"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">As an AI language model, I dont have access to real-time data or
                                        information about specific taxi services, including Rider Taxi Service. The number
                                        of cars a taxi service has can vary depending on the size and scale of the company,
                                        its operating area, and demand in the market.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-6">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-6" aria-expanded="false" aria-controls="collapse-6">What makes
                                    a good taxi service?</button>
                            </div>
                            <div id="collapse-6" class="accordion-collapse collapse " aria-labelledby="collapse-item-6"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Reliability and Punctuality: A good taxi service should be reliable
                                        and arrive on time. Passengers should be able to count on the service to be
                                        available when needed, especially during peak hours or in busy areas.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-card style4  ">
                            <div class="accordion-header" id="collapse-item-7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse-7" aria-expanded="false" aria-controls="collapse-7">What is
                                    the purpose of a taxi service?</button>
                            </div>
                            <div id="collapse-7" class="accordion-collapse collapse " aria-labelledby="collapse-item-7"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">Convenience: Taxis offer a convenient mode of transportation,
                                        allowing people to easily get from one place to another without the need for
                                        personal vehicles or relying on public transportation schedules.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="sidebar-area faq-sidebar">
                        <div class="widget widget_quote">
                            <h3 class="widget_title">Ask A Question</h3>
                            <form action="mail.php" method="POST" class="widget-form ajax-contact">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="tel" class="form-control" name="number" id="number"
                                        placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="text" id="text"
                                        placeholder="Subjects">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" cols="30" rows="3" class="form-control"
                                        placeholder="Your Question"></textarea>
                                </div>
                                <div class="form-btn">
                                    <button class="th-btn w-100">SEND QUESTIONS <i
                                            class="fa-regular fa-arrow-right"></i></button>
                                </div>
                                <p class="form-messages mb-0 mt-3"></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
