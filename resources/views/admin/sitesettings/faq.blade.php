@extends('admin.master')

@section('title')
FAQ
@endsection

@section('content')

<div class="container-fluid">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    {{-- <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> --}}

    <!-- Bootstrap Icon Picker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/css/bootstrap-iconpicker.min.css">

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
            <a href=" {{ route('admin.faq.create') }} " class="btn btn-primary text-white">Add New</a>
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
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.faq.edit', $faq->id) }}"><i class="bi bi-pen-fill"></i> Edit</a>
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
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Bootstrap Icon Picker JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.10.0/js/bootstrap-iconpicker.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Override Bootstrap's focus enforcement
            $.fn.modal.Constructor.prototype._enforceFocus = function() {};

            // Initialize icon picker when modal is shown
            $('#AddNew').on('shown.bs.modal', function () {
                $('#iconPicker').iconpicker({
                    searchText: "Search icon...",
                    iconset: 'fontawesome5',
                    hideOnSelect: true,
                    showFooter: true,
                });
            });

            // Destroy icon picker instance on modal hide to avoid reinitialization conflicts
            $('#AddNew').on('hidden.bs.modal', function () {
                $('#iconPicker').iconpicker('destroy');
            });
        });
    </script>
@endsection
