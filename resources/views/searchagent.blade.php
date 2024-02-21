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
        <div class="title-area text-center">
            <span class="sub-title">Agents Trouvés<span class="double-line"></span></span>
            <h2 class="sec-title text-capitalize">Faites Votre Sélection</h2>
        </div>
        <div class="row">
            {{ dd($agents) }}
            @foreach ($agents as $agent)
            <div class="col-md-4">
                <div class="taxi-item style2">
                    <div class="taxi-item_img">
                        @if($agent->photo)
                        <img src="{{ asset('storage/' . $agent->photo) }}" class="rounded-circle img-thumbnail" style="width: 150px; height: 150px;" alt="Photo de l'agent">
                        @endif
                    </div>
                    <h3 class="taxi-item_title"><a href="taxi-details.html">{{ $agent->name }}</a></h3>
                    <p class="taxi-item_subtitle">{{ $agent->status }}</p>
                    <a href="{{route('agentdetail')}}" class="th-btn fw-btn">Selectionner<i class="fa-regular fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
