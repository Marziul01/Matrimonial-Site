@extends('frontend.master')

@section('title')
    {{ $siteSettings->title }} | My Account
@endsection

@section('content')

    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow">Home</a>
                <span></span>My Account
            </div>
        </div>
    </div>
    <section class="pt-100 pb-100">
        <div class="container">
            @include('frontend.auth.frontMessage')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="alert-ul">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="{{ route('user.profile') }}" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Hello {{ Auth::user()->name }}! </h5>
                                        </div>
                                        <div class="card-body">
                                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Your Orders</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                        <th>Payment Status</th>
                                                        <th>Total</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if($orders->isNotEmpty())
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{ $order->order_number }}</td>
                                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                                        <td>
                                                            @if($order->status == 1)
                                                                Processing
                                                            @elseif($order->status == 2)
                                                                Cancelled
                                                            @elseif($order->status == 3)
                                                                Out for Delivery
                                                            @elseif($order->status == 4)
                                                                Delivered
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <p class="font-sm"> @if($order->payment_status == 1)
                                                                Pending
                                                            @else
                                                                Paid
                                                            @endif
                                                                <br>
                                                                <span class="text-uppercase">( {{ $order->payment_option }} )</span>
                                                            </p>
                                                        </td>
                                                        <td>{{ number_format($order->grand_total,2) }} Tk for {{ $order->orderItems->count() }} item</td>
                                                        <td><a href="{{ route('orderDetail', $order->id) }}" class="btn-small d-block">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            {{ $orders->links() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Orders tracking</h5>
                                        </div>
                                        <div class="card-body contact-from-area">
                                            <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <form class="contact-form-style mt-30 mb-50" action="#" method="post">
                                                        <div class="input-style mb-20">
                                                            <label>Order ID</label>
                                                            <input name="order-id" placeholder="Found in your order confirmation email" type="text" class="square">
                                                        </div>
                                                        <div class="input-style mb-20">
                                                            <label>Billing email</label>
                                                            <input name="billing-email" placeholder="Email you used during checkout" type="email" class="square">
                                                        </div>
                                                        <button class="submit submit-auto-width" type="submit">Track</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card mb-3 mb-lg-0">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Billing Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>{{ $userInfo->billing_address }}</address>
                                                    <p>{{ $userInfo->state }} ,</p>
                                                    <p>{{ $userInfo->country->name }}</p>
                                                    <a data-bs-toggle="modal" data-bs-target="#EditAddressModal" class="btn btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="mb-0">Shipping Address</h5>
                                                </div>
                                                <div class="card-body">
                                                    <address>{{ $userInfo->shipping_address }}</address>
                                                    <p>{{ $userInfo->shipping_state }} ,</p>
                                                    <p>{{ $userInfo->country->name }}</p>
                                                    <a data-bs-toggle="modal" data-bs-target="#EditShippingAddressModal" class="btn btn-small">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" action="{{ route('updateUserInfo', $user->id) }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>First Name</label>
                                                        <input required="" class="form-control square" name="first_name" type="text" value="{{ $userInfo->first_name }}">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Last Name</label>
                                                        <input class="form-control square" name="last_name" value="{{ $userInfo->last_name }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Display Name</label>
                                                        <input class="form-control square" name="name" type="text" value="{{ $user->name }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone</label>
                                                        <input class="form-control square" name="phone" type="text" value="{{ $userInfo->phone }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email Address</label>
                                                        <input class="form-control square" name="email" type="email" value="{{ $user->email }}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Current Password</label>
                                                        <input class="form-control square" name="old_password" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>New Password</label>
                                                        <input class="form-control square" id="password" name="password" type="password">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Confirm Password <span class="required">*</span></label>
                                                        <input class="form-control square" id="confirm-pass" name="confirm_password" type="password">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="EditAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal content goes here, make sure to customize it for each category -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Edit Billing Address
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateBillingAddress', $user->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Country</label>
                                <select class="form-control" name="country">
                                    <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">District</label>
                                <select class="form-control" name="billing_state">
                                    @foreach($states as $state)
                                    <option value="{{ $state }}"> {{ $state }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="billing_address" value="{{ $userInfo->billing_address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="EditShippingAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <!-- Modal content goes here, make sure to customize it for each category -->
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Edit Shipping Address
                </div>
                <div class="modal-body">
                    <form action="{{ route('updateShippingAddress', $user->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Country</label>
                                <select class="form-control" name="country">
                                    <option value="{{ $country->id }}"> {{ $country->name }} </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">District</label>
                                <select class="form-control" name="shipping_state">
                                    @foreach($states as $state)
                                        <option value="{{ $state }}"> {{ $state }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" name="shipping_address" value="{{ $userInfo->shipping_address }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('customJs')

    <script>
        document.getElementById('confirm-pass').addEventListener('input', function () {
            var password = document.getElementById('password').value;
            var confirmPassword = this.value;

            if (password !== confirmPassword) {
                this.setCustomValidity("Passwords do not match");
            } else {
                this.setCustomValidity("");
            }
        });
    </script>

@endsection
