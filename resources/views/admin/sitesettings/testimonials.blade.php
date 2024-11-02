@extends('admin.master')

@section('title')
Testimonials
@endsection

@section('content')

<div class="container-fluid">
    @include('admin.auth.message')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="alert-ul">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary mb-3">All Testimonials</h6>
            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#AddNew" data-whatever="@getbootstrap">Add New</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered userProfiles" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Testimonial</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($testimonials->isNotEmpty())
                        @foreach ($testimonials as $testimonial)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{asset($testimonial->image)}}" width="100px" height="100px" alt=""></td>
                            <td>{{ $testimonial->name }}</td>
                            <td>{{ $testimonial->address }}</td>
                            <td>{{ $testimonial->desc }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center" style="column-gap: 10px">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditCategoryModal_{{ $testimonial->id }}"><i class="bi bi-pen-fill"></i> Edit</a>
                                            <form action="{{ route('admintestimonialDestroy', $testimonial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                            <td colspan="7"> No Testimonial Found !</td>
                        @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <div class="modal fade" id="AddNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admintestimonialStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Testimonial User Name</label>
                                    <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Testimonial User Name">
                                </div>
                                <div class="form-group">
                                    <label for="">Testimonial User Address</label>
                                    <input type="email" class="form-control" name="email" id="recipient-name" placeholder="Testimonial User Address">
                                </div>
                                <div class="form-group">
                                    <label for="">Testimonial</label>
                                    <textarea name="desc" id="" cols="30" rows="10" class="form-control" placeholder="Testimonial"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">User Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                </form>
            </div>
        </div>
        </div>

        {{--    Edit Category Model--}}
        @if(isset($testimonial))
        @foreach($testimonials as $testimonial)
         <div class="modal fade" id="EditCategoryModal_{{ $testimonial->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <!-- Modal content goes here, make sure to customize it for each category -->
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         Edit Testimonial
                     </div>
                     <div class="modal-body">
                         <form action="{{ route('admintestimonialupdate', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group">
                                <label for="">Testimonial User Name</label>
                                <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Testimonial User Name" value="{{ $testimonial->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Testimonial User Address</label>
                                <input type="email" class="form-control" name="email" id="recipient-name" placeholder="Testimonial User Address" value="{{$testimonial->address}}">
                            </div>
                            <div class="form-group">
                                <label for="">Testimonial</label>
                                <textarea name="desc" id="" cols="30" rows="10" class="form-control" placeholder="Testimonial"> {{$testimonial->desc}} </textarea>
                            </div>
                            <div class="form-group">
                                <label for="">User Image</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <p class="mb-3"> Previous Image: </p>
                                <img src="{{asset($testimonial->image)}}" alt="">
                            </div>
                           
                             <button type="submit" class="btn btn-primary">Update</button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
        @endforeach
        @endif


@endsection
