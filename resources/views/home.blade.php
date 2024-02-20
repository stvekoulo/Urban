@extends('layouts.opus')

@section('content')
        <!--==============================
About Area
==============================-->
<div class="space" id="about-sec" id="AboutSection">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="img-box7 wow fadeInLeft">
                    <div class="img1">
                        <img src="{{asset('urbanhaul/assets/img/transport1.jpg')}}" alt="About">
                    </div>
                    <div class="img2">
                        {{-- <img src="{{asset('urbanhaul/assets/img/transport2.jpg')}}" alt="About"> --}}
                    </div>
                    <div class="journey-box">
                        <h3 class="journey-title">Mis en Place </h3>
                        <span class="journey-year">2024</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xxl-5 ms-xl-4 wow fadeInRight">
                    <div class="title-area mb-20">
                        <span class="sub-title">À PROPOS DE URBANHAUL</span>
                        <h2 class="sec-title">Où que vous ayez besoin d'aller, nous vous y emmènerons.</h2>
                    </div>
                    <p class="mb-30">Notre plateforme connecte les clients à une communauté de chauffeurs qualifiés, prêts à vous conduire où vous le souhaitez, quand vous le souhaitez. Avec notre système de géolocalisation avancé, vous pouvez facilement trouver les chauffeurs disponibles à proximité, garantissant ainsi des temps d'attente minimes et des trajets rapides.</p>
                    <div class="journey-wrap style2">
                        <div class="journey-image">
                            <img src="{{asset('urbanhaul/assets/img/transport3.jpg')}}" alt="About">
                        </div>
                        <div class="checklist">
                            <ul>
                                <li>Fiabilité et Rapidité</li>
                                <li>Confort et Sécurité</li>
                                <li>Accessibilité et Commodité </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Service Area
==============================-->
<section class="ser-area bg-smoke overflow-hidden space" id="ServiceSection">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-xl-6">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title">Nos Services</span>
                    <h2 class="sec-title">Meilleurs services de Transport pour vous</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sec-btn">
                    <div class="icon-box">
                        <button data-slick-prev="#serviceSlide" class="slick-arrow default"><i
                                class="far fa-arrow-left"></i></button>
                        <button data-slick-next="#serviceSlide" class="slick-arrow default"><i
                                class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row slider-shadow th-carousel" id="serviceSlide" data-slide-show="3" data-lg-slide-show="3"
            data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1">

            <div class="col-md-6 col-lg-4 col-xl-3  ">
                <div class="service-item wow fadeInUp" data-bg-src="{{asset('urbanhaul/assets/img/transport4.jpg')}}')}}">
                    <div class="service-item_img">
                        <img src="{{asset('urbanhaul/assets/img/transport14.jpg')}}" alt="service image">
                    </div>
                    <div class="service-item_content">
                        <h3 class="service-item_title"><a href="service-details.html">Rechercher un agent </a></h3>
                        <p class="service-item_text">Peu importe où vous êtes, nous vous mettons en relation avec les agents les plus proches.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3  ">
                <div class="service-item wow fadeInUp" data-bg-src="{{asset('urbanhaul/assets/img/service/service_shape_1.jpg')}}')}}">
                    <div class="service-item_img">
                        <img src="{{asset('urbanhaul/assets/img/transport6.jpg')}}" alt="service image">
                    </div>
                    <div class="service-item_content">
                        <h3 class="service-item_title"><a href="service-details.html">Transferez un colis</a></h3>
                        <p class="service-item_text">Vous avez besoin de transférer un colis ? Il suffit de nous contacter.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3  ">
                <div class="service-item wow fadeInUp" data-bg-src="{{asset('urbanhaul/assets/img/transport10.jpg')}}">
                    <div class="service-item_img">
                        <img src="{{asset('urbanhaul/assets/img/transport19.jpg')}}" alt="service image">
                    </div>
                    <div class="service-item_content">
                        <h3 class="service-item_title"><a href="service-details.html">Devenez un Agent</a></h3>
                        <p class="service-item_text">Si vous souhaitez contribuer à simplifier le transport pour la population, inscrivez-vous en tant qu'Agent. Le processus est simple et sans frais.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xxl-block" data-top="0%" data-right="-0.5%"><img
            src="{{asset('urbanhaul/assets/img/transport9.png')}}" alt="shapes"></div>
</section>
<!--==============================
Team Area
==============================-->
<section class="space" id="MembersSection">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Membres de l'équipe<span class="double-line"></span></span>
        </div>
        <div class="row slider-shadow th-carousel" data-slide-show="4" data-lg-slide-show="3" data-md-slide-show="2"
            data-sm-slide-show="2" data-arrows="true">
            <!-- Single Item -->
            <div class="col-md-6 col-lg-4">
                <div class="team-item wow fadeInUp">
                    <div class="team-img">
                        <img style="height: 250px;" src="{{asset('urbanhaul/assets/img/profile1.jpg')}}" alt="Team">
                    </div>
                    <div class="team-item_content">
                        <h3 class="team-item_title">Sophia Isabella</h3>
                        <span class="team-item_desig">Expert Driver</span>
                        <div class="th-social team-social">
                        </div>
                    </div>
                    <div class="info-item">
                        <h3 class="team-item_title">Sophia Isabella</h3>
                    </div>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-md-6 col-lg-4">
                <div class="team-item wow fadeInUp">
                    <div class="team-img">
                        <img style="height: 250px;" src="{{asset('urbanhaul/assets/img/profile5.jpg')}}" alt="Team">
                    </div>
                    <div class="team-item_content">
                        <h3 class="team-item_title">Emma Margaret</h3>
                        <span class="team-item_desig">Senior Driver</span>
                        <div class="th-social team-social">
                        </div>
                    </div>
                    <div class="info-item">
                        <h3 class="team-item_title">Emma Margaret</h3>
                    </div>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-md-6 col-lg-4">
                <div class="team-item wow fadeInUp">
                    <div class="team-img">
                        <img style="height: 250px;" src="{{asset('urbanhaul/assets/img/profile3.jpg')}}" alt="Team">
                    </div>
                    <div class="team-item_content">
                        <h3 class="team-item_title">Jacob Michael</h3>
                        <span class="team-item_desig">Junior Driver</span>
                        <div class="th-social team-social">
                    </div>
                    </div>
                    <div class="info-item">
                        <h3 class="team-item_title">Jacob Michael</h3>
                    </div>
                </div>
            </div>
            <!-- Single Item -->
            <div class="col-md-6 col-lg-4">
                <div class="team-item wow fadeInUp">
                    <div class="team-img">
                        <img style="height: 250px;" src="{{asset('urbanhaul/assets/img/profile4.jpg')}}" alt="Team">
                    </div>
                    <div class="team-item_content">
                        <h3 class="team-item_title">Mason Robert</h3>
                        <span class="team-item_desig">Senior Driver</span>
                        <div class="th-social team-social">
                        </div>
                    </div>
                    <div class="info-item">
                        <h3 class="team-item_title">Mason Robert</h3>
                    </div>
                </div>
            </div>
            <!-- Single Item -->
        </div>
    </div>
</section>
<!--==============================
Taxi Area
==============================-->

<!--==============================
Download Area
==============================-->

<section class="download-area3 overflow-hidden space-top" data-bg-src="{{asset('urbanhaul/assets/img/transport8.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 text-center text-xl-start wow fadeInLeft">
                <div class="title-area mb-30">
                    <span class="sub-title">L'application UrbanHaul sera bientôt disponible au téléchargement</span>
                    <h2 class="sec-title text-capitalize">Sur L'AppStore et le Playstore</h2>
                    <p class="sec-text">En attendant, installez le site comme une application pour un accès rapide.</p>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="download-image wow fadeInRight">
                    <img src="{{asset('urbanhaul/assets/img/bg/phone_1.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!--==============================
Feature Area
==============================-->
<div class="feature-area  " data-bg-src="{{asset('urbanhaul/assets/img/transport17.jpg')}}">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="feature-video wow fadeInLeft">
                    <img src="assets/img/normal/video_1.jpg" alt="cta bg">
                    <a href="https://www.youtube.com/watch?v=CcpvU_pzR-s" class="play-btn popup-video"><i
                            class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="ps-xxl-5 ms-xl-5 wow fadeInRight">
                    <div class="title-area text-center text-xl-start">
                        <span class="sub-title">Pourquoi nous choisir</span>
                        <h2 class="sec-title text-white">Optez pour UrbanHaul pour des trajets en ville simples, sûrs et efficaces.</h2>
                    </div>
                    <div class="counter-wrap style2">
                        <div class="counter-line"></div>
                        <div class="counter-wrapper">
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{asset('urbanhaul/assets/img/icon/counter_2_1.svg')}}" alt="icon">
                                </div>
                                <div class="counter-card_number"><span class="counter-number">32.5</span>k<span
                                        class="text-theme">+</span>
                                </div>
                                <p class="counter-card_text">Special Vehicles</p>
                            </div>
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{asset('urbanhaul/assets/img/icon/counter_2_2.svg')}}" alt="icon">
                                </div>
                                <div class="counter-card_number"><span class="counter-number">13.8</span>k<span
                                        class="text-theme">+</span>
                                </div>
                                <p class="counter-card_text">People Dropped</p>
                            </div>
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{asset('urbanhaul/assets/img/icon/counter_2_3.svg')}}" alt="icon">
                                </div>
                                <div class="counter-card_number"><span class="counter-number">65.2</span>k<span
                                        class="text-theme">+</span>
                                </div>
                                <p class="counter-card_text">Satisfied Clients</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--==============================
Brand Area
==============================-->

<!--==============================
Testimonial Area
==============================-->
<section class="bg-smoke space" data-bg-src="{{asset('urbanhaul/assets/img/bg/testimonial_bg_1.jpg')}}">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center">
            <div class="col-lg-8">
                <div class="title-area text-center text-lg-start">
                    <span class="sub-title">Témoignage des clients</span>
                    <h2 class="sec-title">L'avis de nos clients heureux</h2>
                </div>
            </div>
            <div class="col-auto">
                <div class="sec-btn">
                    <div class="icon-item">
                        <button data-slick-prev="#testiSlide" class="slick-arrow default"><i
                                class="far fa-arrow-left"></i></button>
                        <button data-slick-next="#testiSlide" class="slick-arrow default"><i
                                class="far fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row slider-shadow th-carousel" id="testiSlide" data-slide-show="3" data-lg-slide-show="2"
            data-md-slide-show="2">
            <div class="col-md-6 col-xl-4">
                <div class="testi-item  wow fadeInUp">
                    <p class="testi-item_text">“Jroactively synthesize schemas before foster like leveraged
                        expertise user friendly open source schemas.”</p>
                    <div class="testi-item_wrapper">
                        <div class="testi-item_profile">
                            <div class="testi-item_img">
                                <img src="{{asset('urbanhaul/assets/img/testimonial/testi_3_4.jpg')}}" alt="Avater">
                            </div>
                            <div class="media-body">
                                <h3 class="testi-item_name">Marcos Manuel </h3>
                                <p class="testi-item_desig">Bank Manager</p>
                            </div>
                        </div>
                        <div class="testi-item_quote"><img src="{{asset('urbanhaul/assets/img/icon/quote_2.svg')}}" alt="quote"></div>
                    </div>
                    <div class="testi-item_review">
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="testi-item  wow fadeInUp">
                    <p class="testi-item_text">“Jroactively synthesize schemas before foster like leveraged
                        expertise user friendly open source schemas.”</p>
                    <div class="testi-item_wrapper">
                        <div class="testi-item_profile">
                            <div class="testi-item_img">
                                <img src="{{asset('urbanhaul/assets/img/testimonial/testi_3_4.jpg')}}" alt="Avater">
                            </div>
                            <div class="media-body">
                                <h3 class="testi-item_name">Marcos Manuel </h3>
                                <p class="testi-item_desig">Bank Manager</p>
                            </div>
                        </div>
                        <div class="testi-item_quote"><img src="{{asset('urbanhaul/assets/img/icon/quote_2.svg')}}" alt="quote"></div>
                    </div>
                    <div class="testi-item_review">
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-4">
                <div class="testi-item  wow fadeInUp">
                    <p class="testi-item_text">“Jroactively synthesize schemas before foster like leveraged
                        expertise user friendly open source schemas.”</p>
                    <div class="testi-item_wrapper">
                        <div class="testi-item_profile">
                            <div class="testi-item_img">
                                <img src="{{asset('urbanhaul/assets/img/testimonial/testi_3_4.jpg')}}" alt="Avater">
                            </div>
                            <div class="media-body">
                                <h3 class="testi-item_name">Marcos Manuel </h3>
                                <p class="testi-item_desig">Bank Manager</p>
                            </div>
                        </div>
                        <div class="testi-item_quote"><img src="{{asset('urbanhaul/assets/img/icon/quote_2.svg')}}" alt="quote"></div>
                    </div>
                    <div class="testi-item_review">
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                        <i class="fa-solid fa-star-sharp"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection
