@extends('frontend.master')

@section('title')
    | Price
@endsection

@section('content')

    <div class="section">
        <div class="bg-price p-5">
            <div>
                <div>
                    <h1 class="text-center mainHeading">Pay only for what you need</h1>
                    <p class="text-center subHeading">Pricing Plans for every budget</p>
                </div>
                <div>
                    <div class="d-flex align-items-start justify-content-center w-100 priceMobileTab">
                        {{-- <div class="nav flex-column nav-pills me-3 w-25 pt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <div><h4 class="text-center text-bold mt-5 mb-2">Choose Plan</h4></div>
                          <div class="priceMobileBtnDiv">
                            <button class="nav-link " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="false"><i class="fa-solid fa-circle-dot"></i> Yearly Billing</button>
                            <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true"><i class="fa-solid fa-circle-dot"></i> Monthly Billing</button>
                          </div>
                        </div> --}}
                        <div class="tab-content w-75" id="v-pills-tabContent">
                          {{-- <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                <div class="pricePlanCard1">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Free</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 0</h1>

                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard2">
                                    <div class="border-bottom-1 pb-3">
                                        <h2 class="priceTitle">Pro</h2>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 299 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                                <div class="pricePlanCard3">
                                    <div class="border-bottom-1 pb-3">
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="priceTitle">Pro Plus</h2>
                                            <p class="pricePopularTag">Popular</p>
                                        </div>
                                        <p class="priceSubTitle"> Basic Chat Functionality </p>
                                        <h1 class="priceAmount">BDT 499 <span>/ mo</span></h1>
                                        <p class="priceAmountText">Per month renew</p>
                                    </div>
                                    <div class="py-3">
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> 30 days history</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Up to 1000 messages/mo</p>
                                        <p class="planServices"><i class="fa-solid fa-circle-check"></i> Unlimited AI Capabilities</p>
                                    </div>
                                    <div>
                                        <a href="" class="price1Btn"> Choose Plan </a>
                                    </div>
                                </div>
                            </div>
                          </div> --}}
                          <div class="tab-pane fade  show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="p-4 d-flex justify-content-center align-items-center w-100 mobilePriceTabCard">
                                @if ($plans->isNotEmpty())
                                @foreach ($plans as $plan )
                                <div class="pricePlanCards" style="background: {{ $plan->background_color }} ;">
                                    <div class="border-bottom-1 pb-3">
                                        <div class="d-flex align-items-center justify-content-between column-gap-4">
                                            <h2 class="planTitle" style="color: {{ $plan->title_color }} ;">{{ $plan->name }}</h2>
                                            {!! isset($plan->badge) ? '<p class="planBadge">'. $plan->badge .'</p>' : '' !!}
                                        </div>
                                        <p class="planSubTitle" style="color: {{ $plan->text_color }} ;"> {{ $plan->susTitle }} </p>
                                        <h1 class="planAmount" style="color: {{ $plan->text_color }} ;">BDT {{ $plan->price }} {!! isset($plan->time) ? '<span style="color:' . $plan->plantimes_color . ';">/ ' . $plan->time . '</span>' : '' !!}
                                        </h1>
                                        {!! isset($plan->subdesc) ? '<p class="planAmountText" style="color:' . $plan->plantimes_color . ';">' . $plan->subdesc . '</p>' : '' !!}
                                    </div>
                                    @php
                                        $services = explode(',', $plan->services);
                                    @endphp
                                    <div class="py-3">
                                        @foreach($services as $service)
                                            <p class="planServices" style="color: {{ $plan->text_color }} ;"><i class="fa-solid fa-circle-check"></i> {{ $service }}</p>
                                        @endforeach
                                    </div>
                                    <div>
                                        <a class="btn plansBtn" style="color: {{ $plan->buttons_color }} ; background: {{ $plan->buttons_background }} ; border-color: {{ $plan->buttons_background == $plan->background_color ? '#b9b9b9' : 'transparent' }}"> Choose Plan </a>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('customJs')

@endsection
