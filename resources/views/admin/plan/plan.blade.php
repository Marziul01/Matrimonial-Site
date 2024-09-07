@extends('admin.master')

@section('title')
    Credit Plans
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
            <div class="card-header py-3  d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Manage Credit Plans</h6>
                <a href="#" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addNewModal">
                    <i class="fa-solid fa-plus"></i> Add New
                </a>

            </div>
            <div class="card-body">
                <div class="row">
                    @if ($plans->isNotEmpty())
                        @foreach ($plans as $plan )
                            <div class="col-md-4">
                                <div class="card ">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        @if ($plan->status == 1)
                                          <a class="btn btn-sm btn-success">  <i class="fa-solid fa-circle-dot"></i> Active </a>
                                        @else
                                            <a class="btn btn-sm btn-danger">  <i class="fa-solid fa-circle-dot"></i> Inactive </a>
                                        @endif
                                        <div>
                                            <a class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $plan->id }}">  <i class="fa-solid fa-pen"></i> Edit </a>
                                            <a class="btn btn-sm btn-danger" href="{{ route('deletePlan',$plan->id) }}" onclick="return confirm('Are you sure you want to delete this plan?');"><i class="fa-regular fa-trash-can"></i> Delete </a>
                                        </div>

                                    </div>
                                    <div class="card-body">
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
                                                <a class="btn plansBtn" style="color: {{ $plan->buttons_color }} ; background: {{ $plan->buttons_background }}"> Choose Plan </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <p class="text-center"> No Plans created yet! </p>
                        </div>
                    @endif

                </div>
            </div>
        </div>

    <!--Add New Modal -->
    <!-- Modal -->
<div class="modal fade" id="addNewModal" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewModalLabel">Add New Plan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('addCreditPlan') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Title</label>
                    <input class="form-control" type="text" name="title" placeholder="Plan Title">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Sub Title</label>
                    <input class="form-control" type="text" name="sub_title" placeholder="Plan Sub Title">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Badge</label>
                    <input class="form-control" type="text" name="badge" placeholder="Plan Badge">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Price</label>
                    <input class="form-control" type="number" name="price" placeholder="Plan Price">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Time</label>
                    <select class="form-control" name="time">
                        <option value="15"> 15 Days </option>
                        <option value="30"> 30 Days </option>
                        <option value="45"> 45 Days </option>
                        <option value="60"> 2 Month </option>
                        <option value="90"> 3 Month </option>
                        <option value="180"> 6 Month </option>
                        <option value="365"> 1 Year </option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plans some Description</label>
                    <input class="form-control" type="text" name="subdesc" placeholder="Plan some Description">
                </div>
                <div class="col-md-12 form-group">
                    <label class="form-label">Plan Services</label>
                    <div id="servicesWrapper">
                        <div class="addinput-group mb-3">
                            <input class="form-control" type="text" name="services[]" placeholder="Service 1">
                            <button type="button" class="btn btn-danger addremove-service"><i class="fa-solid fa-circle-xmark"></i></button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-primary w-100" id="addServiceBtn"> <i class="fa-solid fa-plus"></i> Add New Service</button>
                    <button type="button" class="btn btn-outline-success w-100 mt-2" id="styleBtn">
                        <i class="fa-solid fa-pen"></i> Custom Style This Plan ?
                    </button>
                </div>
                <div id="styleInputs" class="col-md-12 row d-none px-0 mx-0">
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Background Color</label>
                        <input class="form-control" type="color" name="background_color" value="{{ old('background_color', '#ffffff') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Title Color</label>
                        <input class="form-control" type="color" name="title_color" value="{{ old('title_color', '#000000') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Text, Services, Price Color</label>
                        <input class="form-control" type="color" name="text_color" value="{{ old('title_color', '#000000') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Times Color</label>
                        <input class="form-control" type="color" name="times_color" value="{{ old('title_color', '#b5b5b5') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Buttons Text Color</label>
                        <input class="form-control" type="color" name="button_color" value="{{ old('title_color', '#000000') }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label class="form-label">Plan Buttons Background</label>
                        <input class="form-control" type="color" name="button_background" value="{{ old('title_color', '#ffffff') }}">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-success">Save Plan</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

@if(isset($plans))
@foreach ( $plans as $plan )
<div class="modal fade" id="editModal{{ $plan->id }}" tabindex="-1" aria-labelledby="addNewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addNewModalLabel">Edit Plan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('editCreditPlan', $plan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Title</label>
                    <input class="form-control" type="text" name="title" value="{{ $plan->name }}">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Sub Title</label>
                    <input class="form-control" type="text" name="sub_title" value="{{ $plan->subtitle }}">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Badge</label>
                    <input class="form-control" type="text" name="badge" value="{{ $plan->badge }}">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Price</label>
                    <input class="form-control" type="number" name="price" value="{{ $plan->price }}">
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plan Time</label>
                    <select class="form-control" name="time">
                        <option value="15" {{ $plan->duration_in_days == 15 ? 'selected' : '' }}> 15 Days </option>
                        <option value="30" {{ $plan->duration_in_days == 30 ? 'selected' : '' }}> 30 Days </option>
                        <option value="45" {{ $plan->duration_in_days == 45 ? 'selected' : '' }}> 45 Days </option>
                        <option value="60" {{ $plan->duration_in_days == 60 ? 'selected' : '' }}> 2 Month </option>
                        <option value="90" {{ $plan->duration_in_days == 90 ? 'selected' : '' }}> 3 Month </option>
                        <option value="180" {{ $plan->duration_in_days == 180 ? 'selected' : '' }}> 6 Month </option>
                        <option value="365" {{ $plan->duration_in_days == 365 ? 'selected' : '' }}> 1 Year </option>
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label class="form-label">Plans some Description</label>
                    <input class="form-control" type="text" name="subdesc"  value="{{ $plan->subdesc }}">
                </div>
                <div class="col-md-12 form-group">
                    <label class="form-label">Plan Services</label>
                    <div id="editservicesWrapper">
                        @foreach(explode(',', $plan->services) as $service)
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" name="services[]" value="{{ $service }}">
                            <button type="button" class="btn btn-danger remove-service"><i class="fa-solid fa-circle-xmark"></i></button>
                        </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-primary w-100" id="editServiceBtn"> <i class="fa-solid fa-plus"></i> Add New Service</button>
                </div>
                <div class="col-md-12 row px-0 mx-0">
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Background Color</label>
                        <input class="form-control" type="color" name="background_color" value="{{ $plan->background_color }}">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Title Color</label>
                        <input class="form-control" type="color" name="title_color" value="{{ $plan->title_color }}">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Text, Services, Price Color</label>
                        <input class="form-control" type="color" name="text_color" value="{{ $plan->text_color }}">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Times Color</label>
                        <input class="form-control" type="color" name="times_color" value="{{ $plan->plantimes_color }}">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Buttons Text Color</label>
                        <input class="form-control" type="color" name="button_color" value="{{ $plan->buttons_color }}">
                    </div>
                    <div class="col-6 form-group">
                        <label class="form-label">Plan Buttons Background</label>
                        <input class="form-control" type="color" name="button_background" value="{{ $plan->buttons_background }}">
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <label class="form-label">Plan Status</label>
                    <select class="form-control" name="status">
                        <option value="1" {{ $plan->status == 1 ? 'selected' : '' }}> Active </option>
                        <option value="2" {{ $plan->status == 2 ? 'selected' : '' }}> Inactive </option>
                    </select>
                </div>
                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-success">Save Plan</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif


@endsection

@section('customjs')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addServiceBtn = document.getElementById('addServiceBtn');
        const servicesWrapper = document.getElementById('servicesWrapper');

        // Event listener for adding new service input field
        addServiceBtn.addEventListener('click', function() {
            const newService = document.createElement('div');
            newService.classList.add('addinput-group', 'mb-3');
            newService.innerHTML = `
                <input class="form-control" type="text" name="services[]" placeholder="New Service">
                <button type="button" class="btn btn-danger addremove-service"><i class="fa-solid fa-circle-xmark"></i></button>
            `;
            servicesWrapper.appendChild(newService);
        });

        // Event delegation for removing service input fields
        servicesWrapper.addEventListener('click', function(event) {
            if (event.target.classList.contains('addremove-service')) {
                const inputGroup = event.target.closest('.addinput-group');
                inputGroup.remove();
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const styleBtn = document.getElementById('styleBtn');
        const styleInputs = document.getElementById('styleInputs');

        styleBtn.addEventListener('click', function() {
            if (styleInputs.classList.contains('d-none')) {
                // Show the style inputs div and change button text
                styleInputs.classList.remove('d-none');
                styleBtn.innerHTML = '<i class="fa-solid fa-pen"></i> Keep Default Style again';
                styleBtn.classList.remove('btn-outline-success');
                styleBtn.classList.add('btn-danger');
            } else {
                // Hide the style inputs div, reset inputs, and change button text
                styleInputs.classList.add('d-none');
                styleBtn.innerHTML = '<i class="fa-solid fa-pen"></i> Custom Style This Plan ?';
                styleBtn.classList.remove('btn-danger');
                styleBtn.classList.add('btn-outline-success');

                // // Reset input values
                // styleInputs.querySelectorAll('input[type="color"]').forEach(input => {
                //     input.value = ''; // Reset to default color
                // });
            }
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add new service input
        document.getElementById('editServiceBtn').addEventListener('click', function() {
            const wrapper = document.getElementById('editservicesWrapper');
            const index = wrapper.children.length + 1;
            const newServiceHTML = `
                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="services[]" placeholder="Service ${index}">
                    <button type="button" class="btn btn-danger remove-service"><i class="fa-solid fa-circle-xmark"></i></button>
                </div>
            `;
            wrapper.insertAdjacentHTML('beforeend', newServiceHTML);
        });

        // Remove service input
        document.getElementById('editservicesWrapper').addEventListener('click', function(event) {
            if (event.target.closest('.remove-service')) {
                event.target.closest('.input-group').remove();
            }
        });
    });
    </script>


@endsection


