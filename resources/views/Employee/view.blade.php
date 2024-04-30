@extends('layouts.app')
@section('title', 'Manage Employees')
@section('main-content')
    <div class="container-fluid">
        <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
            style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Update Employee</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                    </div>
                    <div class="modal-body">
                        <form id="form_update" class="row g-3 needs-validation" novalidate>
                            @method("PUT")
                            <div class="col-md-12">
                                <label class="form-label">Company *</label>
                                <input type="hidden" id="id">
                                <input type="hidden" id="get_url" value="{{ url('/employee') }}">
                                <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
                                <input type="hidden" id="module_name" value="Employee">
                                <select class="form-control" name="company" required id="get_company">
                                    <option value="" selected disabled>--Select Company--</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ Str::ucfirst($company->name) }}</option>
                                    @endforeach
                                </select>
                                <strong class="text-danger" id="name"></strong>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" name="first_name" id="get_first_name"
                                    value="{{ old('first_name') }}" placeholder="Enter First Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="first_name"></strong>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" name="last_name" id="get_last_name"
                                    value="{{ old('last_name') }}" placeholder="Enter Last Name" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="last_name"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Email *</label>
                                <input type="email" class="form-control" name="email" id="get_email"
                                    value="{{ old('email') }}" placeholder="Enter Email" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="email"></strong>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Contact No *</label>
                                <input type="text" class="form-control"  name="contact_no" id="get_contact_no"
                                    value="{{ old('contact_no') }}" placeholder="Enter Contact No" autocomplete="off"
                                    required>
                                <strong class="text-danger" id="contact_no"></strong>
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn rounded-pill btn-primary waves-effect waves-light" type="submit"
                                    id="update">Edit Employee > </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Employees</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/employee') }}">Employees</a></li>
                            <li class="breadcrumb-item active">Manage</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pt-5 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Manage Employees</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th data-ordering="false">SR No.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Contact No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $num = 1;
                                @endphp
                                @forelse ($allemployees as $employee)
                                    @if ($array_data[$employee->id])
                                        <tr>
                                            <td data-ordering="false">{{ $num++ }}</td>
                                            <td>{{ Str::ucfirst($employee->first_name) }}</td>
                                            <td>{{ Str::ucfirst($employee->last_name) }}</td>
                                            <td>{{ $employee->email }}</td>
                                            <td>{{ Str::ucfirst($array_data[$employee->id]) }}</td>
                                            <td>{{ $employee->contact_no }}</td>
                                            <td>
                                                <form>
                                                    <input type="hidden" id="get_url" value="{{ url('employee') }}">
                                                    <input type="hidden" name="_token" id="csrf_token"
                                                        value="{{ csrf_token() }}">
                                                    <input type="hidden" id="module_name" value="Employee">
                                                </form>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-grip-lines align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item edit-item-btn update"
                                                                data-update="{{ $employee->id }}"
                                                                style="cursor: pointer;"><i
                                                                    class="fas fa-edit align-bottom me-2 text-muted"></i>
                                                                Edit</a></li>
                                                        <li>
                                                            <a class="dropdown-item remove-item-btn delete"
                                                                data-del="{{ $employee->id }}"
                                                                style="cursor: pointer;">
                                                                <i class="fas fa-trash align-bottom me-2 text-muted"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
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
            var table = $('#example2').DataTable({
                lengthChange: false,
                "dom": 'Bfrtip',
                "buttons": [{
                        extend: 'excel',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5]
                        }
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="bx bx-file"></i> Pdf',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5]
                        }
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-primary rounded-0',
                        text: '<i class="fas fa-file-csv" style="font-size:17px;"></i> CSV',
                        exportOptions: {
                            columns: [0, 1, 2, 3,4,5]
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
                    url: `{{ url('/employee/${id}/edit') }}`,
                    method: "GET",
                    success: function(response) {
                        $("#id").empty();
                        $("#get_first_name").empty();
                        $("#get_last_name").empty();
                        $("#get_email").empty();
                        $("#get_contact_no").empty();
                        $("#myModal").modal("show");
                        $("#id").val(response.message.id);
                        $("#get_company").val(response.message.company);
                        $("#get_first_name").val(response.message.first_name);
                        $("#get_last_name").val(response.message.last_name);
                        $("#get_email").val(response.message.email);
                        $("#get_contact_no").val(response.message.contact_no);
                    }
                });
            });

        })
    </script>
@endsection
