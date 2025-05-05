@extends('home')

@section('content')

    <div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
    <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">Tutorials</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTutorialModal">
        Create Tutorial
    </button>

        </div>
        <div class="card-body">
            <table id="example" class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Video</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tutorials as $index => $tutorial)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $tutorial->title }}</td>
                        <td>
                            @if ($tutorial->video)
                                <video width="100px" height="auto" controls>
                                    <source src="{{ asset('http://localhost/job_portal/storage/app/public/' . $tutorial->video) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewTutorialModal{{ $tutorial->id }}">
                                        <i class="ti ti-eye me-1"></i> Show
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editTutorialModal{{ $tutorial->id }}">
                                        <i class="ti ti-pencil me-1"></i> Edit
                                    </a>
                                   
                                    <a class="dropdown-item" href="#" onclick="confirmDelete({{ $tutorial->id }})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $tutorial->id }}" action="{{ route('tutorials.destroy', $tutorial->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- View Tutorial Modal -->
                    <div class="modal fade" id="viewTutorialModal{{ $tutorial->id }}" tabindex="-1" aria-labelledby="viewTutorialModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewTutorialModalLabel">{{ $tutorial->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @if ($tutorial->video)
                                        <video width="640" height="360" controls>
                                            <source src="{{ asset('http://localhost/job_portal/storage/app/public/' . $tutorial->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    <br>
                                    <p>{{ $tutorial->description }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Tutorial Modal -->
                    <div class="modal fade" id="editTutorialModal{{ $tutorial->id }}" tabindex="-1" aria-labelledby="editTutorialModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('tutorials.update', $tutorial->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editTutorialModalLabel">Edit Tutorial</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{ $tutorial->title }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="edit_description_{{ $tutorial->id }}" name="description" rows="4" required>{{ $tutorial->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="video" class="form-label">Video</label>
                                            <input type="file" class="form-control" id="video" name="video" accept="video/*">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update Tutorial</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  

    <!-- Create Tutorial Modal -->
    <div class="modal fade" id="createTutorialModal" tabindex="-1" aria-labelledby="createTutorialModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('tutorials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createTutorialModalLabel">Create Tutorial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="create_description" name="description" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="video" class="form-label">Video</label>
                            <input type="file" class="form-control" id="video" name="video" accept="video/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Tutorial</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script>
    // Apply CKEditor to the create tutorial description field
    CKEDITOR.replace('create_description');

    // Apply CKEditor to all edit tutorial description fields dynamically
    @foreach($tutorials as $tutorial)
        CKEDITOR.replace('edit_description_{{ $tutorial->id }}');
    @endforeach
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



