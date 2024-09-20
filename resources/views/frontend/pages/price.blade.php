@extends('frontend.master')

@section('title')
    | Pricings
@endsection

@section('content')
@php $showLoggedOutHeader = true; @endphp
    <div class="bg-price">
        <div class="section membershipbg">
            <div class="py-5">
                <div class="d-flex justify-content-between align-items-end">
                    <div>
                        <h1 class="mainHeading">Membership Packages</h1>
                        <p class="subHeading">4 Convenient Premium Packages to Choose From!</p>
                    </div>

                    <div class="nav nav-pills me-3 w-25 pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <div class="priceMobileBtnDiv">
                            <button class="nav-link active" id="v-pills-profile-tab" onclick="leftclick()" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"> Monthly</button>
                            <button class="nav-link " id="v-pills-home-tab" onclick="rightclick()" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false"> Yearly</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <div class="section">
                    <div class="d-flex align-items-start justify-content-center w-100 priceMobileTab">

                        <div class="tab-content w-100 py-5 my-4" id="v-pills-tabContent">
                          <div class="tab-pane fade plans" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="p-4 d-flex justify-content-evenly align-items-strech w-100 mobilePriceTabCard">
                                @if ($plans->isNotEmpty())
                                @foreach ($plans->where('plan_type', 'Yearly') as $plan )
                                <div class="pricePlanCards" @if(isset($plan->badge)) style="background:#f43662; margin-top: -55px;" @endif >
                                    <div class="border-bottom-1 pb-3">
                                        <div class="mb-2 d-flex justify-content-end">
                                            <p class="{{ isset($plan->badge) ? 'planBadge' : 'planBadgeNull' }} " @if(isset($plan->badge)) style="background:white; color: #f43662;" @endif>{{ $plan->badge  }}</p>
                                        </div>
                                        <h1 class="planAmount" @if(isset($plan->badge)) style=" color: white;" @endif>৳ {{ $plan->price }}
                                            <span @if(isset($plan->badge)) style=" color: white;" @endif>/ {{ $plan->time }}</span>
                                        </h1>
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="planTitle" @if(isset($plan->badge)) style=" color: white;" @endif>{{ $plan->name }}</h2>

                                        </div>
                                        <p class="planSubTitle" @if(isset($plan->badge)) style=" color: white;" @endif> {{ $plan->subtitle }} </p>
                                    </div>
                                    @php
                                        $services = explode(',', $plan->services);
                                    @endphp
                                    <div class="py-3">
                                        @foreach($services as $service)
                                            <p class="planServices" @if(isset($plan->badge)) style=" color: white;" @endif><i class="fa-solid fa-check" @if(isset($plan->badge)) style=" background: #F995AC;" @endif></i> {{ $service }}</p>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="{{ route('login') }}" class="btn plansBtn" @if(isset($plan->badge)) style="background:white; color: #f43662;" @endif> Choose Plan </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                          </div>
                          <div class="tab-pane fade  show active p-1 plans" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="p-4 d-flex justify-content-evenly align-items-strech w-100 mobilePriceTabCard">
                                @if ($plans->isNotEmpty())
                                @foreach ($plans->where('plan_type', 'Monthly') as $plan )
                                <div class="pricePlanCards" @if(isset($plan->badge)) style="background:#f43662; margin-top: -55px;" @endif >
                                    <div class="border-bottom-1 pb-3">
                                        <div class="mb-2 d-flex justify-content-end">
                                            <p class="{{ isset($plan->badge) ? 'planBadge' : 'planBadgeNull' }} " @if(isset($plan->badge)) style="background:white; color: #f43662;" @endif>{{ $plan->badge  }}</p>
                                        </div>
                                        <h1 class="planAmount" @if(isset($plan->badge)) style=" color: white;" @endif>৳ {{ $plan->price }}
                                            <span @if(isset($plan->badge)) style=" color: white;" @endif>/ {{ $plan->time }}</span>
                                        </h1>
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="planTitle" @if(isset($plan->badge)) style=" color: white;" @endif>{{ $plan->name }}</h2>

                                        </div>
                                        <p class="planSubTitle" @if(isset($plan->badge)) style=" color: white;" @endif> {{ $plan->subtitle }} </p>
                                    </div>
                                    @php
                                        $services = explode(',', $plan->services);
                                    @endphp
                                    <div class="py-3">
                                        @foreach($services as $service)
                                            <p class="planServices" @if(isset($plan->badge)) style=" color: white;" @endif><i class="fa-solid fa-check" @if(isset($plan->badge)) style=" background: #F995AC;" @endif></i> {{ $service }}</p>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a href="{{ route('login') }}" class="btn plansBtn" @if(isset($plan->badge)) style="background:white; color: #f43662;" @endif> Choose Plan </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

@endsection


@section('customJs')


@endsection
