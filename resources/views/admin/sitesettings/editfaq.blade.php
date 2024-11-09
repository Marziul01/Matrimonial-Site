@extends('admin.master')

@section('title')
Edit FAQ
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
            <h6 class="m-0 font-weight-bold text-primary mb-3">Edit FAQ</h6>
        </div>
        <div class="card-body">

            <form action="{{ route('adminfaqupdate', $faq->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="editIconPicker">Choose an Icon:</label>
                    <!-- Set the data-icon to the saved icon's class -->
                    <button id="editIconPicker" class="btn btn-secondary" name="icon" role="iconpicker" data-icon="{{ $faq->icon }}"></button>
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
