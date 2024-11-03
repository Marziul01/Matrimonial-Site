@extends('admin.master')

@section('title')
FAQ
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
            <h6 class="m-0 font-weight-bold text-primary mb-3">All FAQs</h6>
            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#AddNew" data-whatever="@getbootstrap">Add New</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered userProfiles" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Icon</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($faqs->isNotEmpty())
                        @foreach ($faqs as $faq)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $faq->icon }}</td>
                            <td>{{ $faq->ques }}</td>
                            <td>{{ $faq->ans }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center" style="column-gap: 10px">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditCategoryModal_{{ $faq->id }}"><i class="bi bi-pen-fill"></i> Edit</a>
                                            <form action="{{ route('adminfaqDestroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this faq?');">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                            <td colspan="7"> No faqs Found !</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Faq</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('adminfaqStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Faq Icon  <a href="https://fontawesome.com/search" target="_blank">( Get From FontAwesome )</a>   </label>
                                    <input type="text" class="form-control" name="icon" id="recipient-name" placeholder="Faq Icon (Get from FontAwesome )">
                                </div>
                                <div class="form-group">
                                    <label for="">Faq Question </label>
                                    <input type="text" class="form-control" name="ques" id="recipient-name" placeholder="Faq Question ">
                                </div>
                                <div class="form-group">
                                    <label for="">Faq Answer</label>
                                    <textarea name="ans" id="" cols="30" rows="10" class="form-control" placeholder="Faq Answer"> </textarea>
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
        @if(isset($faq))
        @foreach($faqs as $faq)
         <div class="modal fade" id="EditCategoryModal_{{ $faq->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <!-- Modal content goes here, make sure to customize it for each category -->
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         Edit faq
                     </div>
                     <div class="modal-body">
                         <form action="{{ route('adminfaqupdate', $faq->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group">
                                <label for="">Faq Icon  <a href="https://fontawesome.com/search" target="_blank">( Get From FontAwesome )</a>   </label>
                                <input type="text" class="form-control" name="icon" id="recipient-name" placeholder="Faq Icon (Get from FontAwesome )" value="{{ $faq->icon }}">
                            </div>
                            <div class="form-group">
                                <label for="">Faq Question </label>
                                <input type="text" class="form-control" name="ques" id="recipient-name" placeholder="Faq Question " value="{{ $faq->ques }}">
                            </div>
                            <div class="form-group">
                                <label for="">Faq Answer</label>
                                <textarea name="ans" id="" cols="30" rows="10" class="form-control" placeholder="Faq Answer"> {{ $faq->ans }} </textarea>
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
