
@extends('home')

@section('content')
<div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
        <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">Users</h1>
        
    </div>
    <div class="card-datatable table-responsive text-nowrap">
        <table id='example' class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($users->isNotEmpty())
                    @foreach ($users as $index => $user)
                        <tr>
                        <td>{{ $index + 1 }}</td>
                            
                            <td class="d-flex align-items-center">
                            <i class="ti ti-user ti-md text-primary me-4"></i>
                                <span class="fw-medium">{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge" style="color: {{ $user->role === 'Job_uploader' ? '#164da0' : '#28a745' }}; background-color: #D5D5D5;">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editEmployeModal{{ $user->id }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" href="#" onclick="confirmDelete({{ $user->id }})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <!-- Edit Employee Modal -->
<div class="modal fade" id="editEmployeModal{{ $user->id }}" tabindex="-1" aria-labelledby="editEmployeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeModalLabel">Edit Users</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <!-- Name Field -->
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input value="{{ $user->name }}" type="text" class="form-control" name="name" required>
                        </div>
                        <!-- Email Field -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input value="{{ $user->email }}" type="text" class="form-control" name="email" required>
                        </div>
                        <!-- Password Field -->
                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter new password">
                        </div>
                        <!-- Role Field -->
                        <div class="col-md-12">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Staff" {{ $user->role == 'Staff' ? 'selected' : '' }}>Staff</option>
                                <option value="Job_seaker" {{ $user->role == 'Job_seaker' ? 'selected' : '' }}>Job_seaker</option>
                                <option value="Job_uploader" {{ $user->role == 'Job_uploader' ? 'selected' : '' }}>Job_uploader</option>
                            </select>
                        </div>
                    
                    </div>
                    <!-- Update Button -->
                    <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Users</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

                        </div>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No users found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
<style>
    .color{
        background-color:#333black;
    }
</style>
<script>
    function confirmDelete(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this entry!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById('delete-employe-form-' + id).submit();
            }
        });
    }
</script>

@if (session('success'))
<script>
    swal({
        title: "Success!",
        text: "{{ session('success') }}",
        icon: "success",
        button: "OK",
    });
</script>
@endif
@endsection

<!-- Include Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBcDLPzCoHvcLAjs8n3lATJv1z7URQk93jEN0lpR9nSM1pIP" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuWLQjQjzHKAgCf2ZxKcbhs5jqKls8Z8Ncz5e8xAHPc2JOcI9C4OP9e5ab/78N3F" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
