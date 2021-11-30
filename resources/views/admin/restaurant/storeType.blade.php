@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Store Type</h4>

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

                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                            <tr>
                                <th>Store Type Name</th>
                                <th>Store Type Image</th>
                                <th>Store Type Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($store_types as $types)
                                <tr>
                                    <th scope="row">{{$types->store_type_name}}</th>
                                    <td>
                                        <img src="{{asset($types->store_type_image)}}"
                                             style="height: 100px;width: 100px">
                                    </td>
                                    <td>
                                        @if ($types->store_type_status == 1)
                                            Active
                                        @elseif($types->store_type_status == 2)
                                            De-Active
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#updatestore{{$types->id}}"><i class="fas fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>


                                <div class="modal fade" id="updatestore{{$types->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Store Type Update</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('admin.store.type.update')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Store Type Image</label>
                                                        <br>
                                                        <img src="{{asset($types->store_type_image)}}"
                                                             style="height: 100px;width: 100px;">
                                                        <input type="file" class="form-control" name="store_type_image">
                                                        <input type="hidden" class="form-control" name="store_type_edit"
                                                               value="{{$types->id}}">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label>Store Type Status</label>
                                                        <select class="form-control" name="store_type_status" required>
                                                            <option value="">select any</option>
                                                            <option
                                                                value="1" {{$types->store_type_status == 1 ? 'selected' : ''}}>
                                                                Active
                                                            </option>
                                                            <option
                                                                value="2" {{$types->store_type_status == 2 ? 'selected' : ''}}>
                                                                De-Active
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

