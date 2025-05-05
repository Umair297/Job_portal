@extends('home')

@section('content')

    <!-- FAQ List -->
    <div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
    <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">FAQS</h1>
    <div class="mb-4 text-end">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFaqModal">Add FAQ</button>
    </div>
        </div>
        <div class="card-body">
            <table id="example" class="table table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $index => $question)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <!-- View FAQ -->
                                    <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#viewFaqModal{{ $question->id }}">
                                        <i class="ti ti-eye me-1"></i> Show
                                    </a>
                                    <!-- Edit FAQ -->
                                    <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#editFaqModal{{ $question->id }}">
                                        <i class="ti ti-pencil me-1"></i> Edit
                                    </a>
                                    <!-- Delete FAQ -->
                                    <a class="dropdown-item" href="#" onclick="confirmDelete({{ $question->id}})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $question->id}}" action="{{ route('questions.destroy', $question->id) }}" method="POST" style="display: none;">
                                        @csrf
                                            @method('DELETE')
                                        </form>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- View FAQ Modal -->
                    <div class="modal fade" id="viewFaqModal{{ $question->id }}" tabindex="-1" aria-labelledby="viewFaqModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="viewFaqModalLabel">View FAQ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Question:
                                        <br>
                                    </strong> {{ $question->question }}</p>
                                    <p><strong>Answer:
                                        <br>
                                    </strong> {{ $question->answer }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit FAQ Modal -->
                    <div class="modal fade" id="editFaqModal{{ $question->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit FAQ</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('questions.update', $question->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="question{{ $question->id }}" class="form-label">Question</label>
                                            <input type="text" name="question" class="form-control" id="question{{ $question->id }}" value="{{ $question->question }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="answer{{ $question->id }}" class="form-label">Answer</label>
                                            <textarea name="answer" class="form-control" id="answer{{ $question->id }}" rows="3">{{ $question->answer }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Update FAQ</button>
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

    <!-- Add FAQ Modal -->
    <div class="modal fade" id="addFaqModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" name="question" class="form-control" id="question" required>
                        </div>
                        <div class="mb-3">
                            <label for="answer" class="form-label">Answer</label>

                            <textarea name="answer" class="form-control" id="answer" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add FAQ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

