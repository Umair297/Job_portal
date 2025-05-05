@extends('home')

@section('content')

    <div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
    <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">Blogs</h1>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createBlogModal">
        Create Blog
    </button>
            
        </div>
        <div class="card-body">
            <table id="example" class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $index => $blog)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->tags ?? 'N/A' }}</td>
                        <td>
                            <img src="{{ asset('http://localhost/job_portal/public/uploads/' . $blog->image) }}"
                                 alt="Blog Image" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#showBlogModal{{ $blog->id }}">
                                        <i class="ti ti-eye me-1"></i> Show
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editBlogModal{{ $blog->id }}">
                                        <i class="ti ti-pencil me-1"></i> Edit
                                    </a>
            
                                    <a class="dropdown-item" href="#" onclick="confirmDelete({{ $blog->id}})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Show Modal -->
                    <div class="modal fade" id="showBlogModal{{ $blog->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">{{ $blog->title }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('http://localhost/job_portal/public/uploads/' . $blog->image) }}"
                                         alt="Blog Image" style="width: 120px; height: 110px;" class="img-fluid">
                                    <p class="mt-3">{{ $blog->description }}</p>
                                    <strong>Tags:</strong> {{ $blog->tags ?? 'N/A' }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Blog</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                                        </div>
                                        <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description_create" class="form-control" rows="4" required></textarea>
    </div>

                                        <div class="mb-3">
                                            <label for="tags" class="form-label">Tags</label>
                                            <input type="text" name="tags" class="form-control" value="{{ $blog->tags }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
 

    <!-- Create Modal -->
    <div class="modal fade" id="createBlogModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Create Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" id="description_edit_{{ $blog->id }}" class="form-control" rows="4" required>{{ $blog->description }}</textarea>
</div>

                        <div class="mb-3">
                            <label for="tags" class="form-label">Tags</label>
                            <input type="text" name="tags" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Blog</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>

<script>
    // Apply CKEditor to the create blog modal
    CKEDITOR.replace('description_create');

    // Apply CKEditor to all edit modals dynamically
    @foreach($blogs as $blog)
        CKEDITOR.replace('description_edit_{{ $blog->id }}');
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


