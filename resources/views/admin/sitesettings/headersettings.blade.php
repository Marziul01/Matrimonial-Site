@extends('admin.master')

@section('title')
    {{ $siteSettings->title }} | Site Settings
@endsection

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Site Settings</h1>
        </div>
        @include('admin.auth.message')
        <div class="row ">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.siteSettingUpdate') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $siteSettings->id }}">
                    <div class="card" style="margin-top: 0px !important;">
                        <div class="card-header">
                            <h5 class="text-black">General Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <h4 class="">Logo</h4>
                                        <img src="{{ asset($siteSettings->logo) }}" class="w-50 py-3">
                                        <br>
                                        <input type="file" name="logo" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <h4>Favicon</h4>
                                        <img src="{{ asset($siteSettings->favicon) }}" class="py-3" height="100px"><br>

                                        <input type="file" name="favicon" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-12 py-5">
                                    <label>Site Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $siteSettings->title }}">
                                </div>
                                
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-25">Save settings</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
                <form method="post" action="{{ route('admin.siteSettingUpdatetwo') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $siteSettings->id }}">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-black">Other Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $siteSettings->phone }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $siteSettings->address }}">
                                    </div>
                                </div>
                                <div class="col-md-6 py-5">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" value="{{ $siteSettings->email }}">
                                </div>
                                <div class="col-md-6 py-5">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" class="form-control" value="{{ $siteSettings->facebook }}">
                                </div>
                                <div class="col-md-6 ">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" class="form-control" value="{{ $siteSettings->instagram }}">
                                </div>
                                <div class="col-md-6 ">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" class="form-control" value="{{ $siteSettings->youtube }}">
                                </div>
                                <div class="col-md-6 py-5">
                                    <label>Twitter/X</label>
                                    <input type="text" name="twitter" class="form-control" value="{{ $siteSettings->twitter }}">
                                </div>
                                <div class="col-md-6 py-5">
                                    <label>Play Store</label>
                                    <input type="text" name="play_store" class="form-control" value="{{ $siteSettings->play_store }}">
                                </div>
                                <div class="col-md-6 pb-5">
                                    <label>App Store</label>
                                    <input type="text" name="app_store" class="form-control" value="{{ $siteSettings->app_store }}">
                                </div>
                                <div class="col-md-12 " style="padding-bottom: 0px !important;">
                                    <button type="submit" class="btn btn-primary w-25">Save settings</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>


    </div>

@endsection
