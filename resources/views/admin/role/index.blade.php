@extends('admin.layouts.master')
@section('title', 'Spravato | Roles')
@section('styles')
    <style>
        .gap .form-check.form-check-inline.me-3 {
            padding: 0px 20px;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="text-transform: uppercase">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="mt-0">Roles Management</h4>
                            <a href="javascript:void(0);" class="btn btn-success btn-sm" onclick="openCreateRoleModal()">
                                <i class="mdi mdi-plus-circle-outline"></i> Create New Role
                            </a>
                        </div>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $key => $role)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $role->updated_at->format('d-m-Y') }}</td>
                                        <td class="text-center">
                                            <a href="javascript:void(0);" class="btn btn-primary btn-sm" onclick='openEditRoleModal(@json([
                                                "id" => $role->id,
                                                "name" => $role->name,
                                                "permissions" => $role->permissions->pluck("id")
                                            ]))'>
                                                <i class="dripicons-document-edit"></i>
                                            </a>


                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                                style="display: inline-block;" onsubmit="return confirm('Are you sure?');">
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
                                        <td colspan="3" class="text-center">No data found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="custom-modal" class="modal-demo p-4 rounded" style="width: 50%; margin-top: -298px;">
        <button type="button" class="close position-absolute end-0 top-0 m-3" onclick="Custombox.modal.close();">
            <span>&times;</span>
        </button>
        <h4 class="custom-modal-title mb-4 border-bottom pb-2" id="modal-title">Create New Role</h4>
        <form id="role-form" method="POST">
            @csrf
            <input type="hidden" name="_method" id="form-method" value="POST">
            <div class="mb-3">
                <label for="role-name" class="form-label fw-bold">Role Name</label>
                <input type="text" name="name" id="role-name" class="form-control" placeholder="Enter role name" required>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 20%">Module</th>
                            <th>Permissions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedPermissions = [];
                            foreach ($permissions as $permission) {
                                $parts = explode('-', $permission->name, 2);
                                $module = ucfirst($parts[0]);
                                $groupedPermissions[$module][] = $permission;
                            }
                        @endphp

                        @foreach ($groupedPermissions as $module => $perms)
                            <tr>
                                <td class="fw-bold text-dark align-middle">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input check-all-module"
                                            data-module="{{ strtolower($module) }}" id="check-{{ strtolower($module) }}">
                                        <label class="form-check-label" for="check-{{ strtolower($module) }}">
                                            {{ $module }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($perms as $perm)
                                        <div class="form-check form-check-inline me-3">
                                            <input type="checkbox"
                                                class="form-check-input module-permission checkbox-{{ strtolower(explode('-', $perm->name)[0]) }}"
                                                id="perm-{{ $perm->id }}" name="permissions[]" value="{{ $perm->id }}">
                                            <label class="form-check-label" for="perm-{{ $perm->id }}">
                                                {{ ucfirst(str_replace('-', ' ', explode('-', $perm->name, 2)[1])) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="mdi mdi-content-save-outline"></i>
                    <span id="submit-label">Save Role</span>
                </button>
            </div>
        </form>
    </div>





@endsection
@section('scripts')
    <script>
        function openCreateRoleModal() {
            document.getElementById('modal-title').innerText = 'Create New Role';
            document.getElementById('role-form').action = '{{ route('admin.roles.store') }}';
            document.getElementById('form-method').value = 'POST';
            document.getElementById('role-name').value = '';
            document.querySelectorAll('input[name="permissions[]"]').forEach(e => e.checked = false);
            document.getElementById('submit-label').innerText = 'Save Role';

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#custom-modal'
                }
            }).open();
        }

        function openEditRoleModal(role) {
            document.getElementById('modal-title').innerText = 'Edit Role';
            document.getElementById('role-form').action = '/spravato/roles/' + role.id;
            document.getElementById('form-method').value = 'PUT';
            document.getElementById('role-name').value = role.name;
            document.querySelectorAll('input[name="permissions[]"]').forEach(e => e.checked = false);
            role.permissions.forEach(function (pid) {
                let cb = document.querySelector('#perm-' + pid);
                if (cb) cb.checked = true;
            });
            document.getElementById('submit-label').innerText = 'Update Role';

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#custom-modal'
                }
            }).open();
        }

        // Handle check-all per module
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.check-all-module').forEach(function (el) {
                el.addEventListener('change', function () {
                    let mod = this.dataset.module;
                    document.querySelectorAll('.checkbox-' + mod).forEach(c => c.checked = this.checked);
                });
            });
        });
    </script>

@endsection