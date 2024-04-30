@extends('layouts.app')
@section('title', 'Manage Profile')
@section('main-content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="##" class="profile-wid-img" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="assets/images/download.jpeg"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                </div>
                                <h5 class="fs-16 mb-1">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</h5>
                                <p class="text-muted mb-0">
                                    {{ ucfirst($user->rolename->role_name) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Complete Your Profile</h5>
                                </div>

                            </div>
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                    <div class="label">100%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header" style="background-color: white">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#editProfile" role="tab">
                                        <i class="fas fa-user"></i> Edit Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="editProfile" role="tabpanel">
                                    <div class="row gy-4">
                                        <div class="col-md-10 mx-auto">
                                            <div class="card-header custom-card-header bg-light text-center">
                                                <h6 class="card-title mb-0 mx-auto"><i class="fas fa-user"
                                                        style="border: 2px solid #e1e6f1;border-radius: 50%;padding: 6px;background-color: #a9b1c0;color: #0a2647;"></i>
                                                    Edit General Information</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mx-auto border-right mt-3">
                                            <form id="form_update" class="row g-3 needs-validation" novalidate>
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">First Name</label>
                                                            <input type="hidden" id="id"
                                                                value="{{ $user->id }}">
                                                            <input type="hidden" id="get_url" value="/user_update">
                                                            <input type="hidden" name="_token" id="csrf_token"
                                                                value="{{ csrf_token() }}">
                                                            <input type="hidden" id="module_name" value="User">
                                                            <input type="text" name="first_name" class="form-control"
                                                                value="{{ $user->first_name }}"
                                                                placeholder="Enter Your First Name" required>
                                                            <strong class="text-danger" id="first_name"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Last Name</label>
                                                            <input type="text" name="last_name" class="form-control"
                                                                value="{{ $user->last_name }}"
                                                                placeholder="Enter Your Last Name" required>
                                                            <strong class="text-danger" id="last_name"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Email Address</label>
                                                            <input id="input-email" name="email"
                                                                value="{{ $user->email }}" class="form-control input-mask"
                                                                placeholder="Enter Your Email" required
                                                                data-inputmask="'alias': 'email'">
                                                            <strong class="text-danger" id="email"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Contact No <span
                                                                    class="text-muted">(with country code)</span></label>
                                                            <input id="input-mask" name="contact_no"
                                                                placeholder="Enter Your Contact No" required
                                                                class="form-control input-mask"
                                                                value="{{ $user->contact_number }}"
                                                                data-inputmask="'mask': '99-9999999999'">
                                                            <strong class="text-danger" id="contact_no"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Date of Birth</label>
                                                            <div class="input-group" id="datepicker1">
                                                                <input type="text" name="dob" required
                                                                    class="form-control" placeholder="dd M, yyyy"
                                                                    data-date-format="dd M, yyyy"
                                                                    value="{{ $user->dob }}"
                                                                    data-date-container='#datepicker1'
                                                                    data-provide="datepicker">

                                                                <span class="input-group-text"><i
                                                                        class="mdi mdi-calendar"></i></span>
                                                            </div>
                                                            <strong class="text-danger" id="dob"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Address</label>
                                                            <textarea name="address" rows="3" placeholder="Enter Address" class="form-control" required>{{ $user->street_address }}</textarea>
                                                            <strong class="text-danger" id="address"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Country</label>
                                                            <input type="text" name="country" class="form-control"
                                                                value="{{ $user->country }}"
                                                                placeholder="Enter Your Country" required>
                                                            <strong class="text-danger" id="country"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">State</label>
                                                            <input type="text" name="state" class="form-control"
                                                                value="{{ $user->state }}"
                                                                placeholder="Enter Your State" required>
                                                            <strong class="text-danger" id="state"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">City</label>
                                                            <input type="text" name="city" class="form-control"
                                                                value="{{ $user->city }}" placeholder="Enter Your City"
                                                                required>
                                                            <strong class="text-danger" id="city"></strong>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">Zip\Postal
                                                                Code</label>
                                                            <input type="text" name="zip_code" class="form-control"
                                                                value="{{ $user->zip_code }}"
                                                                placeholder="Enter Your Zip\Postal Code" required>
                                                            <strong class="text-danger" id="zip_code"></strong>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 text-end">
                                                        <button class="btn btn-primary m-1 rounded-pill" type="submit"
                                                            id="update">Update
                                                            Profile > </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> 2023 © Guidemember.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by ibexstack
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
