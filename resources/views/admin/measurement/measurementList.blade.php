@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Measurement</h4>

                <div class="page-title-right">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createeasurementModal">
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
                        <table class="table mb-0" id="measurement">

                            <thead class="table-light">
                            <tr>
                                <th>Measurement Name</th>
                                <th>Measurement Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="createeasurementModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Measurement Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.measurement.save')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Measurement Name</label>
                            <input type="text" class="form-control" name="measurement_name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Measurement Type</label>
                            <select class="form-control" name="measurement_store_type" required>
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



    <div class="modal fade" id="editmeasurement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Update</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.measurement.update')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Measurement Name</label>
                            <input type="text" class="form-control edit_measurement_name" name="edit_measurement_name"
                                   required>
                            <input type="hidden" class="form-control edit_measurement" name="edit_measurement"
                                   required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Measurement Type</label>
                            <select class="form-control edit_measurement_store_type" name="edit_measurement_store_type"
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


    <div class="modal fade" id="deletemeasurement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Main Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('admin.measurement.delete')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            are you sure to delete this measurement category ?
                            <input type="hidden" class="form-control measurement_delete" name="measurement_delete"
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

        function deletemeas(id) {
            $('.measurement_delete').val(id);
        }

        function editmeas(id) {
            var id = id;
            $.ajax({
                type: "POST",
                url: "{{route('admin.single.measurement')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (data) {

                    $('.edit_measurement').val(id);
                    $('.edit_measurement_name').val(data.measurement_name);
                    $('.edit_measurement_store_type').val(data.measurement_store_type);

                }
            });
        };


        $(document).ready(function () {
            $('#measurement').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('admin.get.measurement') }}",
                columns: [
                    {data: 'measurement_name', name: 'measurement_name', class: 'text-center'},
                    {data: 'measurement_store_type', name: 'measurement_store_type', class: 'text-center'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, class: 'text-center'},
                ]
            });
        })
    </script>
@endsection
