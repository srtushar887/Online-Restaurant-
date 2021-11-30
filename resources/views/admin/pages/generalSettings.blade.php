@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">General Settings</h4>

                <div class="page-title-right">
                    {{--                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Create New</button>--}}
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.general.settings.save')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Name</label>
                                    <input type="text" class="form-control" name="site_name" value="{{$gen_setting->site_name}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Email</label>
                                    <input type="text" class="form-control" name="site_email" value="{{$gen_setting->site_email}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Phone Number</label>
                                    <input type="text" class="form-control" name="site_phone_number" value="{{$gen_setting->site_phone_number}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Currency</label>
                                    <input type="text" class="form-control" name="site_currency" value="{{$gen_setting->site_currency}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Tax(%)</label>
                                    <input type="number" class="form-control" name="tax" value="{{$gen_setting->tax}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Near 5KM Delivery Fees</label>
                                    <input type="number" class="form-control" name="near_five_km_fees" value="{{$gen_setting->near_five_km_fees}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Per KM Delivery Fees</label>
                                    <input type="number" class="form-control" name="per_km_fees" value="{{$gen_setting->per_km_fees}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Site Address</label>
                                    <textarea class="form-control" cols="5" rows="5" name="site_address">{!! $gen_setting->site_address !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Invoice Note</label>
                                    <textarea class="form-control" cols="5" rows="5" name="invoice_note">{!! $gen_setting->invoice_note !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Icon</label>
                                    <input type="file" class="form-control" name="icon">
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
