@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Main Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#assignDelBoyModal">
                        Create
                        New
                    </button>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0" id="maincat">

                            <thead class="table-light">
                            <tr>
                                <th> Restaurant</th>
                                <th> Delivery Boy</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ass_assign_del_boys as $ass_boys)
                                <?php
                                $res_name = \App\Models\Restaurant::select('id', 'restaurant_name')->where('id', $ass_boys->restaurant_id)->first();
                                $delboy_name = \App\Models\DeliveryBoy::select('id', 'first_name', 'last_name')->where('id', $ass_boys->deliveryboy_id)->first();
                                ?>
                                <tr>
                                    <td>
                                        @if($res_name)
                                            {{$res_name->restaurant_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>
                                        @if($delboy_name)
                                            {{$delboy_name->first_name}} {{$delboy_name->last_name}}
                                        @else
                                            Not Set
                                        @endif
                                    </td>
                                    <td>{{\Carbon\Carbon::parse($ass_boys->created_at)->format('d-F-Y')}}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editassinmodal{{$ass_boys->id}}"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#deleteassinmodal{{$ass_boys->id}}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>



                                <div class="modal fade" id="editassinmodal{{$ass_boys->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Assign Delivery
                                                    Boy</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('admin.assign.delivery.boy.update')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Restaurant</label>
                                                        <select class="form-control" name="restaurant_id" required>
                                                            <option value="">select any</option>
                                                            @foreach($all_rest as $res)
                                                                <option
                                                                    value="{{$res->id}}" {{$ass_boys->restaurant_id == $res->id ? 'selected' :''}}>{{$res->restaurant_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input type="hidden" name="edit_assign"
                                                               value="{{$ass_boys->id}}">
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label>Delivery Boy</label>
                                                        <select class="form-control" name="deliveryboy_id" required>
                                                            <option value="">select any</option>
                                                            @foreach($all_del_boy as $del_boy)
                                                                <option
                                                                    value="{{$del_boy->id}}" {{$ass_boys->deliveryboy_id == $del_boy->id ? 'selected' :''}}>{{$del_boy->first_name}} {{$del_boy->last_name}}</option>
                                                            @endforeach
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



                                <div class="modal fade" id="deleteassinmodal{{$ass_boys->id}}" data-bs-backdrop="static"
                                     data-bs-keyboard="false" tabindex="-1"
                                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Assign Delivery
                                                    Boy</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('admin.assign.delivery.boy.delete')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        are you sure to delete this assign delivery boy ?
                                                        <input type="hidden" class="form-control main_category_delete"
                                                               name="delete_assign_delboy" value="{{$ass_boys->id}}"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{$ass_assign_del_boys->links()}}
                    </div>

                </div>

            </div>
        </div>


    </div>

    <div class="modal fade" id="assignDelBoyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.assign.delivery.boy.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Restaurant</label>
                            <select class="form-control" name="restaurant_id" required>
                                <option value="">select any</option>
                                @foreach($all_rest as $res)
                                    <option value="{{$res->id}}">{{$res->restaurant_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Delivery Boy</label>
                            <select class="form-control" name="deliveryboy_id" required>
                                <option value="">select any</option>
                                @foreach($all_del_boy as $del_boy)
                                    <option
                                        value="{{$del_boy->id}}">{{$del_boy->first_name}} {{$del_boy->last_name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>







@endsection
@section('js')
    <script>


        $(document).ready(function () {

        })
    </script>
@endsection
