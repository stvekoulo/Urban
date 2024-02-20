@extends('layouts.opus')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="{{asset('urbanhaul/assets/img/breadcumb/breadcumb-bg.jpg')}}" data-overlay="title" data-opacity="4">
<div class="container z-index-common">

</div>
<!--==============================
Taxi Area
==============================-->
<section class="bg-top-center space">
    <div class="container">
        <div class="row">
            @foreach ($agents as $agent)
            <div class="row gx-60">
                <div class="col-lg-6">
                    <div class="product-big-img">
                        @if($agent->photo)
                        <div class="img"><img src="{{ asset('storage/' . $agent->photo) }}" alt="Product Image"></div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="product-about">
                        <h2 class="product-title">{{ $agent->name }}</h2>
                        <p class="text">Echangez d'abord avec l'agent {{ $agent->name }} et si tout est bon vous pouvez
                        lui envoyez une demande de service pour qu'il accepte</p>
                        <div class="checklist style3">
                            <ul>
                                <li>{{ $agent->status }}</li>
                                <li>{{ $agent->assignment }}</li>
                                <li>{{ $agent->phone_number }}</li>
                            </ul>
                        </div>
                        <ul class="nav product-tab-style1" id="productTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link th-btn" href="{{ $agent->whatsapp_link}}">Echangez</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link th-btn active" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true">Envoyez la demande</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

