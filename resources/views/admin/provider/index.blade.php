@extends('admin.layouts.master')
@section('title', 'Spravato | Provider')
@section('styles')
    <style>
        .gap .form-check.form-check-inline.me-3 {
            padding: 0px 20px;
        }
    </style>
@endsection
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">



                <!-- Tabs content -->
                <div class="tab-content" id="managementTabsContent">
                    <!-- Tabs nav -->

                    <ul class="nav nav-tabs mb-3" id="managementTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="providers-tab" data-bs-toggle="tab"
                                data-bs-target="#providers" type="button" role="tab" aria-controls="providers"
                                aria-selected="true">
                                Providers
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users"
                                type="button" role="tab" aria-controls="users" aria-selected="false">
                                Users
                            </button>
                        </li>
                    </ul>
                    <div class="tab-pane fade show active" id="providers" role="tabpanel" aria-labelledby="providers-tab">


                        <div class="card">

                            <div class="card-body" style="text-transform: uppercase">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="mt-0">Provider Management</h4>
                                    <a href="javascript:void(0);" class="btn btn-success btn-sm"
                                        onclick="openCreateProviderModal()">
                                        <i class="mdi mdi-plus-circle-outline"></i> Add
                                    </a>
                                </div>



                                <table id="providers-table" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Store Image</th>
                                            <th>Store Name</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created date</th>
                                            <th>Updated date</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($providers as $key => $provider)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><img src="{{ asset($provider->provider->logo) }}" alt=""
                                                        class="img-fluid rounded border-1" width="100px"></td>
                                                <td>{{ $provider->provider->name }}</td>
                                                <td>{{ $provider->first_name }} {{ $provider->last_name }}</td>
                                                <td>{{ $provider->email }} </td>
                                                <td>{{ $provider->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $provider->updated_at->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                        onclick='etcc({!! json_encode([
                                                            'id' => $provider->id,
                                                            'first_name' => $provider->first_name,
                                                            'last_name' => $provider->last_name,
                                                            'email' => $provider->email,
                                                            'name' => $provider->provider->name,
                                                            'establish_since' => $provider->provider->establish_since,
                                                            'description' => $provider->provider->description,
                                                            'status' => $provider->provider->status,
                                                            'logo_url' => asset($provider->provider->logo),
                                                        ]) !!})'>
                                                        <i class="dripicons-document-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.provider.destroy', $provider->id) }}"
                                                        method="POST" style="display: inline-block;"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="dripicons-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center">No data found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Users Tab -->
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mt-0 mb-3">Users Management</h4>

                                <!-- Example Users Table -->
                                <table id="users-table" class="table table-bordered dt-responsive nowrap"
                                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td><img src="{{ asset($user->image) }}" alt=""
                                                        class="img-fluid rounded border-1" width="100px"></td>
                                                <td>{{ $loop->iteration++ }}</td>
                                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->status }}</td>
                                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                                                        onclick='editUser({!! json_encode([
                                                            'id' => $user->id,
                                                            'first_name' => $user->first_name,
                                                            'last_name' => $user->last_name,
                                                            'email' => $user->email,
                                                            'image_url' => asset($user->image),
                                                        ]) !!})'>
                                                        <i class="dripicons-document-edit"></i>
                                                    </a>

                                                    <form action="{{ route('admin.provider.destroy', $user->id) }}"
                                                        method="POST" style="display:inline-block"
                                                        onsubmit="return confirm('Are you sure?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="dripicons-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div> <!-- tab-content -->

            </div>
        </div>
    </div>



    <div id="custom-modal" class="modal-demo p-4 rounded" style="width: 70%; margin-top: -8px;">
        <button type="button" class="close position-absolute end-0 top-0 m-3" onclick="Custombox.modal.close();">
            <span>&times;</span>
        </button>

        <h4 class="custom-modal-title mb-4 border-bottom pb-2" id="modal-title">Create New Provider</h4>

        <form id="provider-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">
            <input type="hidden" name="role" value="provider">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="border-top pt-3 mt-2 mb-2">
                <h5 class="mb-3">Business Information</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold d-block">Business Logo</label>
                        <div class="position-relative d-inline-block">
                            <img id="logo-preview" src="{{ asset('store.jpg') }}" class="rounded border"
                                style="width: 120px; height: 120px; object-fit: cover; cursor: pointer;"
                                onclick="document.getElementById('logo-input').click();">
                            <i class="mdi mdi-camera position-absolute bottom-0 end-0 m-1 bg-white text-dark p-1 rounded-circle"
                                style="cursor: pointer;" onclick="document.getElementById('logo-input').click();"></i>
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Business Name</label>
                        <input type="text" name="provider_store_name" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Established Since</label>
                        <input type="text" name="establish_since" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Certificate</label>
                        <input type="file" name="certificate" accept=".pdf,.doc,.docx,.jpg,.png" class="form-control"
                            required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Business Description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="active">Active</option>
                            <option value="hold">Hold</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4" id="submit-btn" disabled>
                    <i class="mdi mdi-content-save-outline"></i>
                    <span id="submit-label">Save Provider</span>
                </button>
            </div>
        </form>
    </div>

    {{-- User Edit --}}
    <div id="user-modal" class="modal-demo p-4 rounded" style="width: 50%; margin-top: -8px;">
        <button type="button" class="close position-absolute end-0 top-0 m-3" onclick="Custombox.modal.close();">
            <span>&times;</span>
        </button>

        <h4 class="custom-modal-title mb-4 border-bottom pb-2" id="user-modal-title">Edit User</h4>

        <form id="user-form" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" id="user-form-method" value="PUT">
            <input type="hidden" name="id" id="user-id">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold d-block">Profile Image</label>
                    <div class="position-relative d-inline-block mb-2">
                        <img id="user-image-preview" src="{{ asset('user.jpg') }}" class="rounded border"
                            style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                    <input type="file" name="image" accept="image/*" class="form-control"
                        onchange="previewUserImage(event)">
                </div>

            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="mdi mdi-content-save-outline"></i>
                    Save User
                </button>
            </div>
        </form>
    </div>

@endsection
@section('scripts')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('provider-form');
            const submitBtn = document.getElementById('submit-btn');
            const requiredFields = form.querySelectorAll('input[required], select[required], textarea[required]');

            function checkFormValidity() {
                let allValid = true;

                requiredFields.forEach(field => {
                    if (field.type === 'file') {
                        if (!field.files || field.files.length === 0) {
                            allValid = false;
                        }
                    } else {
                        if (!field.value.trim()) {
                            allValid = false;
                        }
                    }
                    if (field.name === 'password_confirmation') {
                        const pwd = form.querySelector('input[name="password"]');
                        if (pwd && pwd.value !== field.value) {
                            allValid = false;
                        }
                    }
                });

                submitBtn.disabled = !allValid;
            }

            requiredFields.forEach(field => {
                field.addEventListener('input', checkFormValidity);
                field.addEventListener('change', checkFormValidity);
            });

            checkFormValidity();
        });

        function previewLogo(event) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('logo-preview').src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }

        function openCreateProviderModal() {
            document.getElementById('modal-title').innerText = 'Create New Provider';
            document.getElementById('provider-form').action = '{{ route('admin.provider.store') }}';
            document.getElementById('form-method').value = 'POST';
            document.getElementById('submit-label').innerText = 'Save Provider';
            document.getElementById('submit-btn').disabled = true;

            document.querySelectorAll('#provider-form input, #provider-form textarea, #provider-form select').forEach(
                el => {
                    if (el.type !== 'hidden' && el.type !== 'file') el.value = '';
                });

            document.querySelectorAll('#provider-form input[type="file"]').forEach(el => el.value = '');
            document.getElementById('logo-preview').src = '{{ asset('store.jpg') }}';

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#custom-modal'
                }
            }).open();
        }

        function etcc(data) {
            document.getElementById('modal-title').innerText = 'Edit Provider';
            document.getElementById('provider-form').action = `{{ route('admin.provider.store') }}/${data.id}`;
            document.getElementById('form-method').value = 'PUT';
            // document.getElementById('submit-label').innerText = 'Update Provider';
            // document.getElementById('submit-btn').disabled = false;
            let form = document.getElementById('provider-form');
            form.querySelector('input[name="first_name"]').value = data.first_name || '';
            form.querySelector('input[name="last_name"]').value = data.last_name || '';
            form.querySelector('input[name="email"]').value = data.email || '';
            form.querySelector('textarea[name="description"]').value = data.description || '';
            form.querySelector('input[name="provider_store_name"]').value = data.name || '';
            form.querySelector('input[name="establish_since"]').value = data.establish_since || '';

            // Set status
            const statusSelect = form.querySelector('select[name="status"]');
            [...statusSelect.options].forEach(opt => {
                opt.selected = opt.value === data.status;
            });

            // Set logo preview if exists
            if (data.logo_url) {
                document.getElementById('logo-preview').src = data.logo_url;
            }

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#custom-modal'
                }
            }).open();
        }

        $(document).ready(function() {
            $('#providers-table').DataTable();
            $('#users-table').DataTable();
        });

        function editUser(data) {
            document.getElementById('user-modal-title').innerText = 'Edit User';
            document.getElementById('user-form').action = `{{ route('admin.user_update', ['user' => '___ID___']) }}`.replace('___ID___', data.id);

            document.getElementById('user-form-method').value = 'PUT';
            document.getElementById('user-id').value = data.id;

            let form = document.getElementById('user-form');
            form.querySelector('input[name="first_name"]').value = data.first_name || '';
            form.querySelector('input[name="last_name"]').value = data.last_name || '';
            form.querySelector('input[name="email"]').value = data.email || '';

          

            // Set image preview
            if (data.image_url) {
                document.getElementById('user-image-preview').src = data.image_url;
            }

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#user-modal'
                }
            }).open();
        }


        function previewUserImage(event) {
            const reader = new FileReader();
            reader.onload = () => {
                document.getElementById('user-image-preview').src = reader.result;
            };
            if (event.target.files[0]) {
                reader.readAsDataURL(event.target.files[0]);
            }
        }
    </script>


@endsection
