@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Store List</h4>

                <div class="page-title-right">

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table mb-0" id="allstores">

                            <thead class="table-light">
                            <tr>
                                <th>Store ID</th>
                                <th>Store Name</th>
                                <th>Store Email</th>
                                <th>Store Phone Number</th>
                                <th>Store Type</th>
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


    <div class="modal fade" id="deletstore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.store.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this store ?
                            <input type="hidden" class="form-control delete_store" name="delete_store"
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

        function deletestore(id) {
            $('.delete_store').val(id);
        }


        $(document).ready(function () {
            $('#allstores').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.store') }}",
                columns: [
                    {data: 'restaurant_id', name: 'restaurant_id', class: 'text-center'},
                    {data: 'restaurant_name', name: 'restaurant_name', class: 'text-center'},
                    {data: 'restaurant_email', name: 'restaurant_email', class: 'text-center'},
                    {data: 'restaurant_phone', name: 'restaurant_phone', class: 'text-center'},
                    {data: 'restaurant_store_type', name: 'restaurant_store_type', class: 'text-center'},
                    {data: 'created_at', name: 'created_at', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
