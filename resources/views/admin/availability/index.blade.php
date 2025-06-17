@extends('admin.layouts.master')
@section('title', 'Spravato | Services')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mt-0">Availability </h4>
                        <button class="btn btn-success btn-sm" onclick="openServiceModal()">
                            <i class="mdi mdi-plus-circle-outline"></i> Add Availability
                        </button>
                    </div>
                    <table id="availabilities-table" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>User ID</th>
            <th>Time Slot</th>
            <th>Status</th>
            <th>Created At</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($availabilities as $key => $availability)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $availability->user_id }}</td>
                <td>{{ $availability->time_slot }}</td>
                <td>{{ ucfirst($availability->status) }}</td>
                <td>{{ $availability->created_at->format('d-m-Y') }}</td>
                <td class="text-center">
                    <a href="javascript:void(0);" class="btn btn-primary btn-sm"
                        onclick='editAvailability({!! json_encode($availability) !!})'>
                        <i class="dripicons-document-edit"></i>
                    </a>

                    <form action="{{ route('admin.availability.destroy', $availability->id) }}"
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
    </div>
</div>

<div id="availability-modal" class="modal-demo p-4 rounded" style="width: 50%; margin-top: -8px;">
    <button type="button" class="close position-absolute end-0 top-0 m-3" onclick="Custombox.modal.close();">
        <span>&times;</span>
    </button>

    <h4 class="custom-modal-title mb-4 border-bottom pb-2" id="availability-modal-title">Add Availability</h4>

    <form id="availability-form" method="POST">
        @csrf
        <input type="hidden" name="_method" id="availability-form-method" value="POST">
        <input type="hidden" name="id" id="availability-id">

        <div class="mb-3">
            <label class="form-label fw-bold">User ID</label>
            <input type="number" name="user_id" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Time Slot</label>
            <input type="text" name="time_slot" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-bold">Status</label>
            <select name="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary px-4">
                <i class="mdi mdi-content-save-outline"></i>
                Save Availability
            </button>
        </div>
    </form>
</div>


@endsection

@section('scripts')

    <script>
function openServiceModal() {
    document.getElementById('availability-modal-title').innerText = 'Add Availability';
    document.getElementById('availability-form').action = '{{ route('admin.availability.store') }}';
    document.getElementById('availability-form-method').value = 'POST';
    document.getElementById('availability-id').value = '';

    let form = document.getElementById('availability-form');
    form.querySelector('input[name="user_id"]').value = '';
    form.querySelector('input[name="time_slot"]').value = '';
    form.querySelector('select[name="status"]').value = 'active';

    new Custombox.modal({
        content: {
            effect: 'blur',
            target: '#availability-modal'
        }
    }).open();
}

function editAvailability(data) {
    document.getElementById('availability-modal-title').innerText = 'Edit Availability';
    document.getElementById('availability-form').action = `{{ route('admin.availability.update', ['availability' => '___ID___']) }}`.replace('___ID___', data.id);
    document.getElementById('availability-form-method').value = 'PUT';
    document.getElementById('availability-id').value = data.id;

    let form = document.getElementById('availability-form');
    form.querySelector('input[name="user_id"]').value = data.user_id;
    form.querySelector('input[name="time_slot"]').value = data.time_slot;
    form.querySelector('select[name="status"]').value = data.status;

    new Custombox.modal({
        content: {
            effect: 'blur',
            target: '#availability-modal'
        }
    }).open();
}

    </script>

@endsection