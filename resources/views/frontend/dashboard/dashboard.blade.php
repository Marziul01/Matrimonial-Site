@extends('frontend.master')

@section('title')
    User Dashboard
@endsection

@section('modals')

@endsection

@section('content')

<div class="section d-flex align-items-center" style="height: 100vh">
    <h1>Dashboard</h1>
    <a href="{{ route('user.logout') }}" style="margin-top: 200px">Logout</a>
</div>

@endsection
