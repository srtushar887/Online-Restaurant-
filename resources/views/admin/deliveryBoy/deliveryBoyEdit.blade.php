@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Update Delivery Boy</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.delete.boy.update')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{$del_boy->first_name}}">
                                    <input type="hidden" class="form-control" name="edit_del_boy"
                                           value="{{$del_boy->id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{$del_boy->last_name}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                           value="{{$del_boy->email}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone"
                                           value="{{$del_boy->phone}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Account Password</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Address</label>
                                    <textarea type="text" class="form-control" cols="5" rows="5"
                                              name="address">{!! $del_boy->address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Profile Image</label>
                                    <br>
                                    <img src="{{asset($del_boy->profile_image)}}" style="height: 100px;width: 100px;">
                                    <input type="file" class="form-control" name="profile_image">
                                </div>
                            </div>


                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>

@endsection
