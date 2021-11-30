@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Store Item</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.store.items')}}">
                        <button class="btn btn-primary btn-sm">
                            Go Back
                        </button>
                    </a>

                </div>

            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate="" action="{{route('admin.store.items.save')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Store</label>
                                    <select class="form-control" name="restaurant_id">
                                        <option value="">select any</option>
                                        @foreach($all_res as $res)
                                            <option value="{{$res->id}}">{{$res->restaurant_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Main Category</label>
                                    <select class="form-control" name="main_category_id">
                                        <option value="">select any</option>
                                        @foreach($main_cats as $mcat)
                                            <option value="{{$mcat->id}}">{{$mcat->main_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Sub Category</label>
                                    <select class="form-control" name="sub_category_id">
                                        <option value="">select any</option>
                                        @foreach($sub_cats as $scat)
                                            <option value="{{$scat->id}}">{{$scat->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Item Name</label>
                                    <input type="text" class="form-control" name="item_name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Measurement (if have)</label>
                                    <select class="form-control" name="measurement_id">
                                        <option value="">select any</option>
                                        @foreach($meas as $mes)
                                            <option value="{{$mes->id}}">{{$mes->measurement_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Item Price</label>
                                    <input type="number" class="form-control" name="item_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Item Description</label>
                                    <textarea class="form-control" cols="5" rows="5"
                                              name="item_description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">
                                        Item Image</label>
                                    <input type="file" class="form-control" name="item_image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Veg/Non-Veg (if
                                        have)</label>
                                    <select class="form-control" name="is_veg">
                                        <option value="">select any</option>
                                        <option value="1">Veg</option>
                                        <option value="2">Non-Veg</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Available</label>
                                    <select class="form-control" name="is_available">
                                        <option value="">select any</option>
                                        <option value="1">Available</option>
                                        <option value="2">Not Available</option>
                                    </select>
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
