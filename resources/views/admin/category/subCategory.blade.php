@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Sub Category</h4>

                <div class="page-title-right">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createSubCatModal">
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
                        <table class="table mb-0" id="subcat">

                            <thead class="table-light">
                            <tr>
                                <th>Main Category Name</th>
                                <th> Sub-Category</th>
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

    <div class="modal fade" id="createSubCatModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.category.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Main Category</label>
                            <select class="form-control" name="main_category_id" required>
                                <option value="">select any</option>
                                @foreach($main_cats as $mcat)
                                    <option value="{{$mcat->id}}"> {{$mcat->main_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Name</label>
                            <input type="text" class="form-control" name="sub_category_name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Image</label>
                            <input type="file" class="form-control" name="sub_category_image">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Type</label>
                            <select class="form-control" name="sub_category_store_type" required>
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



    <div class="modal fade" id="editsubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.category.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Main Category</label>
                            <select class="form-control edit_main_category_id" name="edit_main_category_id" required>
                                <option value="">select any</option>
                                @foreach($main_cats as $mcat)
                                    <option value="{{$mcat->id}}"> {{$mcat->main_category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Name</label>
                            <input type="text" class="form-control edit_sub_category_name" name="edit_sub_category_name"
                                   required>
                            <input type="hidden" class="form-control sub_category_edit" name="sub_category_edit"
                                   required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Image</label>
                            <br>
                            <img class="edit_subcat_image" src="" style="height: 100px;width: 100px">
                            <input type="file" class="form-control" name="edit_subcat_image">
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Sub-Category Type</label>
                            <select class="form-control edit_sub_category_store_type"
                                    name="edit_sub_category_store_type"
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


    <div class="modal fade" id="deletesubcategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.sub.category.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this sub category ?
                            <input type="hidden" class="form-control sub_category_delete" name="sub_category_delete"
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

        function deletesubcat(id) {
            $('.sub_category_delete').val(id);
        }

        function editsubcat(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.single.sub.category')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {

                    $('.sub_category_edit').val(id);
                    $('.edit_main_category_id').val(data.subcat.main_category_id);
                    $('.edit_sub_category_name').val(data.subcat.sub_category_name);
                    $('.edit_subcat_image').attr('src', data.img);
                    $('.edit_sub_category_store_type').val(data.subcat.sub_category_store_type);

                }
            });
        };


        $(document).ready(function () {
            $('#subcat').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.sub.category') }}",
                columns: [
                    {data: 'main_category_id', name: 'main_category_id', class: 'text-center'},
                    {data: 'sub_category_name', name: 'sub_category_name', class: 'text-center'},
                    {
                        data: 'sub_category_image', class: 'text-center',
                        render: function (data) {
                            if (data != null) {
                                return "<img src='{{asset('/')}}" + data + "' style='height:60px;width:60px'>";
                            } else {
                                return "<img src='https://www.chanchao.com.tw/images/default.jpg' style='height:50px;width:50px'>";
                            }

                        },
                        defaultContent: '<img src="https://www.chanchao.com.tw/images/default.jpg" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'sub_category_store_type', name: 'sub_category_store_type', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
