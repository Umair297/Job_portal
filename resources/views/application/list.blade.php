@extends('home')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4" style="font-size: 1.8rem; font-weight: 600; color: #333;">Job Applications</h3>

    @if($applications->isEmpty())
        <div class="alert alert-info">
            No job applications found.
        </div>
    @else
    <!-- Display All Applicants in a Single Card -->
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Applicant Name</th>
                        <th>Email</th>
                        <th>Resume</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $index => $application)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $application->job->role ?? 'N/A' }}</td>
                        <td>{{ $application->first_name }} {{ $application->last_name }}</td>
                        <td>{{ $application->email }}</td>
                        <td>
                            @if($application->resume)
                                <a href="{{ asset('http://localhost/job_portal/storage/app/public/' . $application->resume) }}" target="_blank">View Resume</a>
                            @else
                                No Resume Uploaded
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#showApplicationModal{{ $application->id }}">
                                        <i class="ti ti-eye me-1"></i> Show
                                    </a>
                                   
                                    <a class="dropdown-item" href="#" onclick="confirmDelete({{ $application->id}})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $application->id }}" action="{{ route('applications.destroy',$application->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Show Application Modal -->
                    <div class="modal fade" id="showApplicationModal{{ $application->id }}" tabindex="-1" aria-labelledby="showApplicationModalLabel{{ $application->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="showApplicationModalLabel{{ $application->id }}">Application Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Job Title:</strong> {{ $application->job->role ?? 'N/A' }}</p>
                                    <p><strong>Applicant Name:</strong> {{ $application->first_name }} {{ $application->last_name }}</p>
                                    <p><strong>Email:</strong> {{ $application->email }}</p>
                                    <p><strong>Phone:</strong> {{ $application->phone }}</p>
                                    <p><strong>Address:</strong> {{ $application->street_address }}</p>
                                    <p><strong>City:</strong>{{ $application->city }}</p>
                                    <p><strong>State:</strong> {{ $application->state }}</p>
                                    <p><strong>Experience:</strong> {{ $application->experience ?? 'N/A' }}</p>
                                    <p><strong>Resume:</strong>
                                        @if($application->resume)
                                            <a href="{{ asset('http://localhost/jobportal/storage/app/public/' . $application->resume) }}" target="_blank">View Resume</a>
                                        @else
                                            No Resume Uploaded
                                        @endif
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>   
        </div>
    </div>
    @endif
</div>
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

