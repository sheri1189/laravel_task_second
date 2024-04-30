@extends('layouts.app')
@section('title', 'Manage Companies')
@section('main-content')
    <div class="container-fluid">
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Company</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method('PUT')
                            <div class="col-md-12">
                                <label class="form-label">Company Name *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="{{ url('/company') }}">
                                <input type="hidden" id="module_name" value="Company">
                                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                                <input type="text" class="form-control" name="name" id="get_name"
                                    value="{{ old('name') }}" placeholder="Enter Company Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Company Email *</label>
                                <input type="email" class="form-control" name="email" id="get_email"
                                    value="{{ old('email') }}" placeholder="Enter Company Email" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="email"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Company Website *</label>
                                <input type="text" class="form-control" name="website" id="get_website"
                                    value="{{ old('website') }}" placeholder="Enter Company Website" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="website"></strong>

                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Company Logo *</label>
                                <input type="file" class="form-control" name="logo" value="{{ old('logo') }}"
                                    placeholder="Enter Sorting Number" autocomplete="off">
                                <strong class="text-danger" id="logo"></strong>
                                <img class="img-thumbnail mt-3" alt="200x200" id="image_thumbnail" width="200"
                                    src="{{ asset('./images/dummy.png') }}">
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Edit Company > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModalDescription" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">View Description</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <p id="view_description"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Categories</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/category') }}">Categories</a></li>
                            <li class="breadcrumb-item active">Manage</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 mt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Manage Companies</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Logo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allcompanies as $company)
                                    <tr>
                                        <td data-ordering="false">{{ $num++ }}</td>
                                        <td>{{ Str::ucfirst($company->name) }}</td>
                                        <td>{{ $company->email }}</td>
                                        <td><a href="{{ $company->website }}"
                                                target="_blank">{{ $company->website }}</a></td>
                                        <td><img src="{{ './logos/' . $company->logo }}" class="avatar-md rounded"
                                                alt="Img not found">
                                        </td>
                                        <td>
                                            <form>
                                                <input type="hidden" id="get_url" value="{{ url('company') }}">
                                                <input type="hidden" name="_token" id="csrf_token"
                                                    value="{{ csrf_token() }}">
                                                <input type="hidden" id="module_name" value="Company">
                                            </form>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-grip-lines align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item edit-item-btn update"
                                                            data-update="{{ $company->id }}"
                                                            style="cursor: pointer;"><i
                                                                class="fas fa-edit align-bottom me-2 text-muted"></i>
                                                            Edit</a></li>
                                                    <li>
                                                        <a class="dropdown-item remove-item-btn delete"
                                                            data-del="{{ $company->id }}"
                                                            style="cursor: pointer;">
                                                            <i class="fas fa-trash align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" align="center" style="color:#004454;font-weight:bold;">No
                                            Data Avalable</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).on("change", "input[name='logo']", function(event) {
                event.preventDefault();
                var file = event.target.files[0];
                $("#image_thumbnail")
                    .css({
                        opacity: 0
                    })
                    .slideDown("slow")
                    .animate({
                        opacity: 1
                    }, function() {
                        $(this).prop("required", true);
                        $(this).attr("src", URL.createObjectURL(file));
                    });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'excel',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                ]
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
        $(document).ready(function() {
            $(document).on("click", ".update", function(stop) {
                stop.preventDefault();
                var id = $(this).data("update");
                var baseURL = `{{ asset('logos/') }}`;
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                });
                $.ajax({
                    url: `{{ url('/company/${id}/edit') }}`,
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#get_name").empty();
                        $("#get_email").empty();
                        $("#get_website").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#get_name").val(response.message.name);
                        $("#get_email").val(response.message.email);
                        $("#get_website").val(response.message.website);
                        $("#image_thumbnail").attr("src", "");
                        $("#image_thumbnail").attr("src", baseURL + "/" + response.message
                        .logo);
                    }
                });
            });

        })
    </script>
@endsection
