@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Update Store</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.store.list')}}">
                        <button class="btn btn-primary btn-sm">Go Back</button>
                    </a>
                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.store.update')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Name</label>
                                    <input type="text" class="form-control" name="restaurant_name"
                                           value="{{$store_edit->restaurant_name}}">
                                    <input type="hidden" class="form-control" name="restaurant_edit"
                                           value="{{$store_edit->id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Email</label>
                                    <input type="text" class="form-control" name="restaurant_email"
                                           value="{{$store_edit->restaurant_email}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Phone Number</label>
                                    <input type="text" class="form-control" name="restaurant_phone"
                                           value="{{$store_edit->restaurant_phone}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Account Password</label>
                                    <input type="text" class="form-control" name="password">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Type</label>
                                    <select class="form-control" name="restaurant_store_type">
                                        <option value="">select any</option>
                                        @foreach($store_types as $types)
                                            <option
                                                value="{{$types->id}}" {{$store_edit->restaurant_store_type == $types->id ? 'selected' : ''}}>{{$types->store_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Google Address</label>
                                    <input type="text" class="form-control" name="restaurant_google_address"
                                           value="{{$store_edit->restaurant_google_address}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Google Latitude</label>
                                    <input type="text" class="form-control" name="restaurant_google_latitude"
                                           value="{{$store_edit->restaurant_google_latitude}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Google Longitude</label>
                                    <input type="text" class="form-control" name="restaurant_google_longitude"
                                           value="{{$store_edit->restaurant_google_longitude}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Address</label>
                                    <textarea type="text" cols="5" rows="5" name="restaurant_address"
                                              class="form-control">{!! $store_edit->restaurant_address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Description</label>
                                    <textarea type="text" cols="5" rows="5" name="restaurant_description"
                                              class="form-control">{!! $store_edit->restaurant_description !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store Image</label>
                                    <input type="file" class="form-control" name="restaurant_image">
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end card -->
        </div> <!-- end col -->

    </div>

@endsection
