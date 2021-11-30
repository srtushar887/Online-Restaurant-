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
                                <th>First Name</th>
                                <th> Last Name</th>
                                <th> Email</th>
                                <th> Phone Number</th>
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


    <div class="modal fade" id="deletedelboymodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delivery Boy Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.delete.boy.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this delivery boy ?
                            <input type="hidden" class="form-control del_boy_delete" name="del_boy_delete"
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

        function deletedelboy(id) {
            $('.del_boy_delete').val(id);
        }


        $(document).ready(function () {
            $('#maincat').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.all.deliveryboy') }}",
                columns: [
                    {data: 'first_name', name: 'first_name', class: 'text-center'},
                    {data: 'last_name', name: 'last_name', class: 'text-center'},
                    {data: 'email', name: 'email', class: 'text-center'},
                    {data: 'phone', name: 'phone', class: 'text-center'},
                    {data: 'created_at', name: 'created_at', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
