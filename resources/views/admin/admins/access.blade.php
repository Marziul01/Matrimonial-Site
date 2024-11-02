@extends('admin.master')

@section('title')
Admins
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
            <h6 class="m-0 font-weight-bold text-primary mb-3">All Admins Details</h6>
            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#AddNew" data-whatever="@getbootstrap">Add New</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered userProfiles" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Sl No.</th>
                            <th>Admin Name</th>
                            <th>Admin Role</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($admins->isNotEmpty())
                        @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->role_name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                <div class="d-flex justify-content-start align-items-center" style="column-gap: 10px">
                                    <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#EditCategoryModal_{{ $admin->id }}"><i class="bi bi-pen-fill"></i> Edit</a>
                                            <form action="{{ route('adminManageDestroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                                @csrf

                                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i> Delete</button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                        @else
                            <td colspan="7"> No admin Found !</td>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add New Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('adminManageStore') }}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="modal-body">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Admin Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="role_name" id="recipient-name" placeholder="Admin Role">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" id="recipient-name" placeholder="Admin Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="password" id="recipient-name" placeholder="Admin Passsword">
                                </div>

                                <div class=" row p-0 m-0 column-gap-2 row-gap-2">
                                    <div class="col-6 mb-2">
                                        <label for="">Users Section Access?</label>
                                        <select name="users" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Orders Section Access?</label>
                                        <select name="orders" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Courses Section Access?</label>
                                        <select name="courses" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Blogs Section Access?</label>
                                        <select name="blogs" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Payments Methods Section Access?</label>
                                        <select name="payment_methods" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Coupon Section Access?</label>
                                        <select name="coupons" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Affiliate Commissions Section Access?</label>
                                        <select name="affiliate_commission" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Site Settings Section Access?</label>
                                        <select name="site_settings" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <label for="">Home Page Settings Section Access?</label>
                                        <select name="home_settings" id="" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>
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
        @if(isset($admin))
        @foreach($admins as $admin)
         <div class="modal fade" id="EditCategoryModal_{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
             <!-- Modal content goes here, make sure to customize it for each category -->
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         Edit admin
                     </div>
                     <div class="modal-body">
                         <form action="{{ route('adminUManagepdate', $admin->id) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                             <div class="form-group">
                                <label for="">Admin Name</label>
                                <input type="text" class="form-control" name="name" id="recipient-name" value="{{ $admin->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Admin Role</label>
                                <input type="text" class="form-control" name="role_name" id="recipient-name" value="{{ $admin->role_name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Admin Email</label>
                                <input type="email" class="form-control" name="email" id="recipient-name" value="{{ $admin->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Admin Password</label>
                                <input type="text" class="form-control" name="password" id="recipient-name">
                            </div>
                            <div class=" row p-0 m-0 column-gap-2 row-gap-2">
                                <div class="col-6 mb-2">
                                    <label for="">Users Section Access?</label>
                                    <select name="users" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Orders Section Access?</label>
                                    <select name="orders" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Courses Section Access?</label>
                                    <select name="courses" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Blogs Section Access?</label>
                                    <select name="blogs" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Payments Methods Section Access?</label>
                                    <select name="payment_methods" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Coupon Section Access?</label>
                                    <select name="coupons" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Affiliate Commissions Section Access?</label>
                                    <select name="affiliate_commission" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Site Settings Section Access?</label>
                                    <select name="site_settings" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
                                <div class="col-6 mb-2">
                                    <label for="">Home Page Settings Section Access?</label>
                                    <select name="home_settings" id="" class="form-control">
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>
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
