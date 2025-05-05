@extends('home')

@section('content')
    <div class="row px-3">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
            <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">Jobs</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJobModal">Add Job</button>
            </div>
            <div class="card-datatable table-responsive">
                <table id="example" class="dt-responsive table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company Name</th>
                            <th>Role</th>
                            <th>Location</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jobs as $index => $job)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $job->company_name }}</td>
                                <td>{{ $job->role }}</td>
                                <td>{{ $job->city }}, {{ $job->country }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#jobView{{ $job->id }}">
                                                <i class="ti ti-eye me-1"></i> Show
                                            </a>
                                            <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#jobedit{{ $job->id }}">
                                                <i class="ti ti-pencil me-1"></i> Edit
                                            </a>
                                            
                                            <a class="dropdown-item" href="#" onclick="confirmDelete({{ $job->id}})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $job->id }}" action="{{ route('jobs.delete', $job->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Job Modal -->
    <div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJobModalLabel">Add Job</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('jobs.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                    <div class="mb-3">
    <label for="company_name" class="form-label">Company Name</label>
    <select class="form-select" id="company_name" name="company_name" required>
        <option value="" disabled selected>Select Company</option>
        @foreach ($companies as $company)
            <option value="{{ $company->name }}">{{ $company->name }}</option>
        @endforeach
    </select>
</div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" disabled selected>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                         
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value="Retail and Products">Retail and Products</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Content Writer">Content Writer</option>
                                <option value="Management">Management</option>
                                <option value="Finance">Finance</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="add_city" name="city" required>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="add_country" name="country" required>
                          
                        </div>
                    
<div class="mb-3">
    <label for="about_job" class="form-label">About the Job</label>
    <textarea class="form-control" id="about_job" name="about_job" rows="3" required></textarea>
</div>

<div class="mb-3">
    <label for="requirement" class="form-label">Requirement</label>
    <textarea class="form-control" id="requirement" name="requirement" rows="3" required></textarea>
</div>

                        <div class="mb-3">
                            <label for="experience" class="form-label">Experience</label>
                            <input type="text" class="form-control" id="experience" name="experience" required>
                        </div>
                        <div class="mb-3">
                            <label for="job_type" class="form-label">Job Type</label>
                            <input type="text" class="form-control" id="job_type" name="job_type" required>
                        </div>
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" required>
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Job</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Job Modal -->
    @foreach ($jobs as $job)
        <div class="modal fade" id="jobView{{ $job->id }}" tabindex="-1" aria-labelledby="viewJobModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewJobModalLabel">View Job Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Company Name:</strong> {{ $job->company_name }}</p>
                        <p><strong>Role:</strong> {{ $job->role }}</p>
                        <p><strong>Location:</strong> {{ $job->city }}, {{ $job->country }}</p>
                        <p><strong>Category:</strong> {{ $job->category }}</p>
                        <p><strong>Salary:</strong> {{ $job->salary }}</p>
                        <p><strong>Experience:</strong> {{ $job->experience }}</p>
                        

                        
                        <p><strong>About the Job:</strong></p>
                        <p>{{ $job->about_job }}</p>

                        <p><strong>Requirements:</strong></p>
                        <p>{{ $job->requirement }}</p>

                        <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Update Job Modal -->
    @foreach ($jobs as $job)
        <div class="modal fade" id="jobedit{{ $job->id }}" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('jobs.update', ['id' => $job->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name', $job->company_name) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ $job->role == $role ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="edit_city" name="city" value="{{ old('city', $job->city) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="edit_country" name="country" value="{{ old('country', $job->country) }}" required>
                                
                            </div>
                         
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    <option value="" disabled>Select Category</option>
                                    <option value="Marketing" {{ $job->category == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="Management" {{ $job->category == 'Management' ? 'selected' : '' }}>Management</option>
                                    <option value="Finance" {{ $job->category == 'Finance' ? 'selected' : '' }}>Finance</option>
                                    <option value="Human Resource" {{ $job->category == 'Human Resource' ? 'selected' : '' }}>Human Resource</option>
                                    <option value="Retail and Products" {{ $job->category == 'Retail and Products' ? 'selected' : '' }}>Retail and Products</option>
                                    <option value="Content Writer" {{ $job->category == 'Content Writer' ? 'selected' : '' }}>Content Writer</option>
                                </select>
                            </div>
                            <!-- Edit Job Modal -->
<div class="mb-3">
    <label for="edit_about_job" class="form-label">About the Job</label>
    <textarea class="form-control" id="edit_about_job" name="about_job" rows="3" required>{{ old('about_job', $job->about_job) }}</textarea>
</div>

<div class="mb-3">
    <label for="edit_requirement" class="form-label">Requirement</label>
    <textarea class="form-control" id="edit_requirement" name="requirement" rows="3" required>{{ old('requirement', $job->requirement) }}</textarea>
</div>

                            <div class="mb-3">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience" value="{{ old('experience', $job->experience) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="job_type" class="form-label">Job Type</label>
                                <input type="text" class="form-control" id="job_type" name="job_type" value="{{ old('job_type', $job->job_type) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label">Salary</label>
                                <input type="text" class="form-control" id="salary" name="salary" value="{{ old('salary', $job->salary) }}" required>
                            </div>
                         
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update Job</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
    <script>
    // Apply CKEditor to Add Job Form
    CKEDITOR.replace('about_job');  
    CKEDITOR.replace('requirement');

    // Apply CKEditor to Edit Job Modal
    CKEDITOR.replace('edit_about_job');  
    CKEDITOR.replace('edit_requirement');
</script>


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





