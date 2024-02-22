@extends('layouts.opus')
@section('content')
<div class="breadcumb-wrapper " data-bg-src="{{asset('urbanhaul/assets/img/breadcumb/breadcumb-bg.jpg')}}" data-overlay="title" data-opacity="4">
    <div class="container z-index-common">

    </div>
</div>
<!--==============================
Taxi Area
==============================-->
<section class="bg-top-center space">
    <div class="container">
        <div class="row gx-60">
            <div class="col-lg-6">
                <div class="product-big-img">
                    @if($selectedAgent->photo)
                    <div class="img"><img src="{{ asset('storage/' . $selectedAgent->photo) }}" alt="Photo de l'agent"></div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="product-about">
                    <h2 class="product-title">{{ $selectedAgent->name }}</h2>
                    <p class="text">Echangez d'abord avec l'agent {{ $selectedAgent->name }}, et si tout est en ordre, vous pouvez lui envoyer une demande de service pour qu'il l'accepte</p>
                    <div class="checklist style3">
                        <ul>
                            <li>{{ $selectedAgent->status }}</li>
                            <li>Service Proposé:
                            <span>
                                @if($selectedAgent->assignment == 'les_deux')
                                    Livreur et Transporteur
                                @else
                                    {{ $selectedAgent->assignment }}
                                @endif
                            </span>
                            </li>
                            <li>Conctact: {{ $selectedAgent->phone_number }}</li>
                        </ul>
                    </div>
                    <ul class="nav product-tab-style1" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link th-btn" href="{{ $selectedAgent->whatsapp_link}}">Echangez</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link th-btn active send-request-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="true" data-agent-id="{{ $selectedAgent->id }}" >Envoyez la demande</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


