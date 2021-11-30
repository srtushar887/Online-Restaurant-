@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Create Gallery</h4>

                <div class="page-title-right">
                    <a href="{{route('admin.store.gallery')}}">
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
                    <form class="needs-validation" novalidate="" action="{{route('admin.store.gallery.save')}}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
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
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Description</label>
                                    <textarea type="text" cols="5" rows="5" name="description"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Main Image</label>
                                    <input type="file" class="form-control" name="main_image">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Optional Image</label>
                                    <input type="file" class="form-control" name="optional_image_one">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Optional Image</label>
                                    <input type="file" class="form-control" name="optional_image_two">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Optional Image</label>
                                    <input type="file" class="form-control" name="optional_image_three">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Optional Image</label>
                                    <input type="file" class="form-control" name="optional_image_four">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="validationCustom01" class="form-label">Optional Image</label>
                                    <input type="file" class="form-control" name="optional_image_five">
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
