@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Main Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createMainCatModal">
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
                                <th> Name</th>
                                <th> Image</th>
                                <th>Store Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="createMainCatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.main.category.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control" name="main_category_name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Category Image</label>
                            <input type="file" class="form-control" name="main_category_image">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Category Type</label>
                            <select class="form-control" name="main_category_store_type" required>
                                <option value="">select any</option>
                                @foreach($store_types as $types)
                                    <option value="{{$types->id}}"> {{$types->store_type_name}}</option>
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



    <div class="modal fade" id="editmaincategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.main.category.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" class="form-control main_category_name" name="main_category_name_edit"
                                   required>
                            <input type="hidden" class="form-control main_category_edit" name="main_category_edit"
                                   required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Category Image</label>
                            <br>
                            <img class="edit_maincat_image" src="" style="height: 100px;width: 100px">
                            <input type="file" class="form-control " name="main_category_image_edit">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Category Type</label>
                            <select class="form-control main_category_store_type" name="main_category_store_type_edit"
                                    required>
                                <option value="">select any</option>
                                @foreach($store_types as $types)
                                    <option value="{{$types->id}}"> {{$types->store_type_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="deletemaincategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.main.category.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this main category ?
                            <input type="hidden" class="form-control main_category_delete" name="main_category_delete"
                                   required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
@section('js')
    <script>

        function deletemaincat(id) {
            $('.main_category_delete').val(id);
        }

        function editmaincat(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.single.main.category')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {

                    $('.main_category_edit').val(id);
                    $('.main_category_name').val(data.cat.main_category_name);
                    $('.edit_maincat_image').attr('src', data.image);
                    $('.main_category_store_type').val(data.cat.main_category_store_type);

                }
            });
        };


        $(document).ready(function () {
            $('#maincat').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.main.category') }}",
                columns: [
                    {data: 'main_category_name', name: 'main_category_name', class: 'text-center'},
                    {
                        data: 'main_category_image', class: 'text-center',
                        render: function (data) {
                            if (data != null) {
                                return "<img src='{{asset('/')}}" + data + "' style='height:60px;width:60px'>";
                            } else {
                                return "<img src='https://www.chanchao.com.tw/images/default.jpg' style='height:50px;width:50px'>";
                            }

                        },
                        defaultContent: '<img src="https://www.chanchao.com.tw/images/default.jpg" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'main_category_store_type', name: 'main_category_store_type', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
