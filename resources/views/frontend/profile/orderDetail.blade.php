@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | My Account
@endsection

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span>Order Details
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 card">
                    <div class="card-header mobile-overflow-x">
                        <div>
                            <h6>Order Number:</h6>
                            <h4 class="mt-2">{{ $order->order_number }}</h4>
                        </div>
                        <div>
                            <h6>Order Date:</h6>
                            <h4 class="mt-2">{{ $order->created_at->format('Y-m-d') }}</h4>
                        </div>
                        <div>
                            <h6>Order Status:</h6>
                            <h4 class="mt-2">
                                @if($order->status == 1)
                                    Processing
                                @elseif($order->status == 2)
                                    Cancelled
                                    <br>
                                    <span class="text-danger">(" {{ $order->reason }} ")</span>
                                @elseif($order->status == 3)
                                    Out for Delivery
                                @elseif($order->status == 4)
                                    Delivered
                                @endif
                            </h4>
                        </div>
                        <div>
                            <h6>Payment Status:</h6>
                            <h4 class="mt-2">
                                @if($order->payment_status == 1)
                                        Pending
                                    @else
                                        Paid
                                    @endif
                                    <br>
                                    <span class="text-uppercase font-sm">( {{ $order->payment_option }} )</span>
                            </h4>
                        </div>
                        <div>
                            <h6>Order Amount:</h6>
                            <h4 class="mt-2">{{ $order->grand_total }} Tk</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-md no-border mobile-table">
                            <thead>
                                <tr>
                                    <td class="text-center"> Items </td>
                                    <td class="text-center"> Qty </td>
                                    <td class="text-center"> Total Price </td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                    <td class="d-flex align-items-center mobile-item-td" style="column-gap: 50px;">
                                        <a href="{{ route('products', $item->product->slug) }}"><img src="{{ asset($item->product->featured_image) }}" width="100px"></a>
                                        <div>
                                            <a href="{{ route('products', $item->product->slug) }}"><h4> {{ $item->product_name }} </h4></a>
                                            <p class="text-center">
                                                @if(isset($item->color)) Color : {{ $item->color }} x @endif
                                                @if(isset($item->size)) x Size : {{ $item->size }} @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-center"> {{ $item->qty }} </td>
                                    <td class="text-center"> {{ $item->total }} </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="card-footer row">
                        <div class="col-md-10 p-2 mobile-ship-width">
                            <h5> Shipping Details :</h5> <hr class="w-25">
                            <p> Name : {{ $order->first_name }} {{ $order->last_name }} </p>
                            <p> Email : {{ $order->email }} </p>
                            <p> Phone : {{ $order->phone }} </p>
                            <p> Address: {{ $order->address }} , {{ $order->state }} , {{ $order->country->name }}</p>

                            <h5 class="mt-4"> Payment Details :</h5> <hr class="w-25">
                            <p> Payment Method : @if($order->payment_option == 'cod') Cash On Delivery @endif </p>
                        </div>
                        <div class="col-md-2 d-flex flex-column align-items-center mobile-price-width">
                            <p class="text-center"> SubTotal : <strong>{{ $order->subtotal }} Tk </strong></p>
                            <p class="text-center"> Discount : <strong>{{ $order->discount }} Tk </strong> <br><span class="font-sm">(Code: {{ $order->coupon_code }})</span></p>
                            <p class="text-center mt-2"> Shipping : <strong>{{ $order->shipping }} Tk </strong></p>
                            <p class="text-center mt-2"> Total Payable : <strong>{{ $order->grand_total }} Tk </strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')



@endsection
