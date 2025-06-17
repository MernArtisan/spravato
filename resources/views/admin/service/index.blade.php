@extends('admin.layouts.master')
@section('title', 'Spravato | Services')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mt-0">Service Management</h4>
                        <button class="btn btn-success btn-sm" onclick="openServiceModal()">
                            <i class="mdi mdi-plus-circle-outline"></i> Add Service
                        </button>
                    </div>

                    <table class="table table-bordered dt-responsive nowrap" id="datatable">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th style="width: 30%">Description</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Price</th>
                                {{-- <th>Active</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($services as $service)
                                <tr>
                                    <td><img src="{{ asset($service->image_path) }}" width="80" class="rounded" /></td>
                                    <td>{{ $service->title }}</td>
                                    <td>
                                        {!! wordwrap($service->description, 30, '<br>', true) !!}
                                    </td>

                                    <td>{{ ucfirst($service->type) }}</td>
                                    <td>{{ ucfirst($service->status) }}</td>
                                    <td>${{ number_format($service->price, 2) }}</td>
                                     <td>
                                        <button class="btn btn-primary btn-sm" onclick='editService(@json($service))'>
                                            <i class="mdi mdi-pencil"></i>
                                        </button>
                                        <form action="{{ route('admin.service.destroy', $service->id) }}"
                                              method="POST" style="display:inline-block"
                                              onsubmit="return confirm('Are you sure you want to delete this service?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No services found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Service Modal -->
<div id="service-modal" class="modal-demo p-4 rounded" style="width: 70%; margin-top: -8px; display: none;">
    <button type="button" class="close position-absolute end-0 top-0 m-3" onclick="Custombox.modal.close();">
        <span>&times;</span>
    </button>
    <h4 class="custom-modal-title mb-4 border-bottom pb-2" id="modal-title">Create New Service</h4>

    <form id="service-form" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" id="form-method" value="POST">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Type</label>
                <select name="type" class="form-control" required>
                    <option value="basic">Basic</option>
                    <option value="premium">Premium</option>
                    <option value="custom">Custom</option>
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea name="description" class="form-control" id="editor1" rows="3" required></textarea>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-control" required>
                    <option value="active">Active</option>
                    <option value="hold">Hold</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Image</label>
                <input type="file" name="image_path" class="form-control"  accept="image/*">
            </div>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="mdi mdi-content-save-outline"></i> <span id="submit-label">Save Service</span>
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    function openServiceModal() {
        resetServiceForm();
        document.getElementById('modal-title').innerText = 'Create New Service';
        document.getElementById('service-form').action = "{{ route('admin.service.store') }}";
        document.getElementById('form-method').value = 'POST';
        document.getElementById('submit-label').innerText = 'Save Service';
        new Custombox.modal({
            content: {
                effect: 'blur',
                target: '#service-modal'
            }
        }).open();
    }
        function editService(service) {
            document.getElementById('modal-title').innerText = 'Edit Service';

            // Use Blade to pass the route template with a placeholder
            let updateUrl = @json(route('admin.service.update', ['service' => '__ID__']));


            updateUrl = updateUrl.replace('__ID__', service.id);

            document.getElementById('service-form').action = updateUrl;
            document.getElementById('form-method').value = 'PUT';
            document.getElementById('submit-label').innerText = 'Update Service';

            const form = document.getElementById('service-form');
            form.querySelector('[name="title"]').value = service.title;
            form.querySelector('[name="type"]').value = service.type;
            form.querySelector('[name="description"]').value = service.description;
            form.querySelector('[name="price"]').value = service.price;
            form.querySelector('[name="status"]').value = service.status;

            new Custombox.modal({
                content: {
                    effect: 'blur',
                    target: '#service-modal'
                }
            }).open();
        }
        function resetServiceForm() {
            const form = document.getElementById('service-form');
            form.reset();
            form.querySelectorAll('select').forEach(s => s.selectedIndex = 0);
        }
        
    </script>

@endsection
