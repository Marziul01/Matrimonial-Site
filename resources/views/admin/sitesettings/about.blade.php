@extends('admin.master')

@section('title')
    {{ $siteSetting->title }} | About Settings
@endsection

@section('content')

    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">About Settings</h1>
        </div>
        @include('admin.auth.message')
        <div class="row ">
            <div class="col-md-12">
                <form method="post" action="{{ route('admin.aboutSettingUpdate', $about->id ) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card" style="margin-top: 0px !important;">
                        <div class="card-header">
                            <h5 class="text-black">About Sections Descriptions</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div>
                                        <h4 class="">Section One</h4>
                                        <textarea name="desc" id="" class="form-control" cols="30" rows="10">{{ $about->desc }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <div>
                                        <h4 class="">Section One</h4>
                                        <textarea name="desc2" id="" class="form-control"  cols="30" rows="10">{{ $about->desc2 }}</textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 mt-3">
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
