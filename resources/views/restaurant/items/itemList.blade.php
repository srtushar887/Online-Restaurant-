@extends('layouts.restaurant')
@section('store')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Store Items</h4>

                <div class="page-title-right">
                    <a href="{{route('restaurant.store.items.create')}}">
                        <button class="btn btn-primary btn-sm">
                            Create
                            New
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

                    <div class="table-responsive">
                        <table class="table mb-0" id="storeitems">

                            <thead class="table-light">
                            <tr>
                                <th>Main Category</th>
                                <th>Sub Category</th>
                                <th>Item Name</th>
                                <th>Item Price</th>
                                <th>Item Image</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>



    <div class="modal fade" id="deletstoreitem" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Store Item Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('restaurant.store.items.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this store item ?
                            <input type="hidden" class="form-control store_item_delete" name="store_item_delete"
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

        function storedeletestoreitem(id) {
            $('.store_item_delete').val(id);
        }


        $(document).ready(function () {
            $('#storeitems').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('restaurant.get.all.items') }}",
                columns: [
                    {data: 'main_category_id', name: 'main_category_id', class: 'text-center'},
                    {data: 'sub_category_id', name: 'sub_category_id', class: 'text-center'},
                    {data: 'item_name', name: 'item_name', class: 'text-center'},
                    {data: 'item_price', name: 'item_price', class: 'text-center'},
                    {
                        data: 'item_image', class: 'text-center',
                        render: function (data) {
                            if (data != null) {
                                return "<img src='{{asset('/')}}" + data + "' style='height:60px;width:60px'>";
                            } else {
                                return "<img src='assets/dashboard/images/default.jpg' style='height:50px;width:50px'>";
                            }

                        },
                        defaultContent: '<img src="assets/dashboard/images/default.jpg" alt="" img style="width:100%; height:100px">'
                    },
                    {data: 'created_at', name: 'created_at', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
