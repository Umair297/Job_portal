@extends('home')

@section('content')
<div class="row px-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
        <h1 style="font-size: 1.5rem; font-weight: 600; color: #333;">Companies</h1>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompanyModal">Add Company</button>
        </div>
        <div class="card-datatable table-responsive">
            <table id='example' class="dt-responsive table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Employees</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $index => $company)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->phone }}</td>
                            <td>{{ $company->employees }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#viewCompanyModal{{ $company->id }}">
                                            <i class="ti ti-eye me-1"></i> Show
                                        </a>
                                        <a class="dropdown-item waves-effect" data-bs-toggle="modal" data-bs-target="#editCompanyModal{{ $company->id }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                       
                                        <a class="dropdown-item" href="#" onclick="confirmDelete({{ $company->id }})">
                                            <i class="ti ti-trash me-1"></i> Delete
                                        </a>
                                        <form id="delete-employe-form-{{ $company->id }}" action="{{ route('companies.destroy', $company->id ) }}" method="POST" style="display: none;">
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

<!-- View Company Modal -->
@foreach ($companies as $company)
<div class="modal fade" id="viewCompanyModal{{ $company->id }}" tabindex="-1" aria-labelledby="viewCompanyModalLabel{{ $company->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewCompanyModalLabel{{ $company->id }}">View Company Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Basic Information -->
                    <div class="col-md-6">
                        <p><strong>Name:</strong> {{ $company->name }}</p>
                        <p><strong>Email:</strong> {{ $company->email }}</p>
                        <p><strong>Phone:</strong> {{ $company->phone }}</p>
                        <p><strong>Address:</strong> {{ $company->address }}</p>
                        <p><strong>City:</strong> {{ $company->city }}</p>
                        <p><strong>Country:</strong> {{ $company->country }}</p>
                    </div>
              
                </div>

                <hr>

                <!-- Additional Information -->
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Category:</strong> {{ $company->category }}</p>
                        <p><strong>Industry:</strong> {{ $company->industry }}</p>
                        <p><strong>Employees:</strong> {{ $company->employees }}</p>
                        <p><strong>Description:</strong> {{ $company->description }}</p>
                        <p><strong>LinkedIn:</strong> <a href="{{ $company->linkedin_url }}" target="_blank">{{ $company->linkedin_url }}</a></p>
                        <p><strong>Facebook:</strong> <a href="{{ $company->facebook_url }}" target="_blank">{{ $company->facebook_url }}</a></p>
                        <p><strong>Twitter:</strong> <a href="{{ $company->twitter_url }}" target="_blank">{{ $company->twitter_url }}</a></p>
                        <p><strong>Instagram:</strong> <a href="{{ $company->instagram_url }}" target="_blank">{{ $company->instagram_url }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Add Company Modal -->

<div class="modal fade" id="addCompanyModal" tabindex="-1" aria-labelledby="addCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCompanyModalLabel">Add Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                  
                  
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city">
                    </div>
                   
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <input type="text" class="form-control" id="category" name="category">
                    </div>
                    <div class="mb-3">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control" id="industry" name="industry">
                    </div>
                   
                    <div class="mb-3">
                        <label for="employees" class="form-label">Number of Employees</label>
                        <input type="number" class="form-control" id="employees" name="employees" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="text" class="form-control" id="linkedin_url" name="linkedin_url">
                    </div>
                    <div class="mb-3">
                        <label for="facebook_url" class="form-label">Facebook URL</label>
                        <input type="text" class="form-control" id="facebook_url" name="facebook_url">
                    </div>
                    <div class="mb-3">
                        <label for="twitter_url" class="form-label">Twitter URL</label>
                        <input type="text" class="form-control" id="twitter_url" name="twitter_url">
                    </div>
                    <div class="mb-3">
                        <label for="instagram_url" class="form-label">Instagram URL</label>
                        <input type="text" class="form-control" id="instagram_url" name="instagram_url">
                    </div>
                    <div class="mb-3">
                        <label for="services" class="form-label">Services</label>
                        <textarea class="form-control" id="services" name="services"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="certifications" class="form-label">Certifications</label>
                        <textarea class="form-control" id="certifications" name="certifications"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="awards" class="form-label">Awards</label>
                        <textarea class="form-control" id="awards" name="awards"></textarea>
                    </div>
                   
                    <div class="mb-3">
                        <label for="registration_number" class="form-label">Registration Number</label>
                        <input type="text" class="form-control" id="registration_number" name="registration_number">
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Company</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Company Modals -->
@foreach ($companies as $company)
<div class="modal fade" id="editCompanyModal{{ $company->id }}" tabindex="-1" aria-labelledby="editCompanyModalLabel{{ $company->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompanyModalLabel{{ $company->id }}">Edit Company</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <!-- Basic Information -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $company->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $company->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                @if($company->logo)
                                <img src="{{ asset('http://localhost/jobportal/storage/app/public/' . $company->logo) }}" alt="Logo" class="img-thumbnail mt-2" style="max-width: 100px;">
                                @endif
                            </div>
                           
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $company->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ $company->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="{{ $company->city }}">
                            </div>
                           
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="{{ $company->country }}">
                            </div>
                        </div>

                        <!-- Company Profile Details -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category" value="{{ $company->category }}">
                            </div>
                            <div class="mb-3">
                                <label for="industry" class="form-label">Industry</label>
                                <input type="text" class="form-control" id="industry" name="industry" value="{{ $company->industry }}">
                            </div>
                           
                            <div class="mb-3">
                                <label for="employees" class="form-label">Employees</label>
                                <input type="number" class="form-control" id="employees" name="employees" value="{{ $company->employees }}">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3">{{ $company->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                                <input type="text" class="form-control" id="linkedin_url" name="linkedin_url" value="{{ $company->linkedin_url }}">
                            </div>
                            <div class="mb-3">
                                <label for="facebook_url" class="form-label">Facebook URL</label>
                                <input type="text" class="form-control" id="facebook_url" name="facebook_url" value="{{ $company->facebook_url }}">
                            </div>
                            <div class="mb-3">
                                <label for="twitter_url" class="form-label">Twitter URL</label>
                                <input type="text" class="form-control" id="twitter_url" name="twitter_url" value="{{ $company->twitter_url }}">
                            </div>
                            <div class="mb-3">
                                <label for="instagram_url" class="form-label">Instagram URL</label>
                                <input type="text" class="form-control" id="instagram_url" name="instagram_url" value="{{ $company->instagram_url }}">
                            </div>
                        </div>

                        <!-- Additional Details -->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="services" class="form-label">Services</label>
                                <textarea class="form-control" id="services" name="services" rows="3">{{ $company->services }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="certifications" class="form-label">Certifications</label>
                                <textarea class="form-control" id="certifications" name="certifications" rows="3">{{ $company->certifications }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="awards" class="form-label">Awards</label>
                                <textarea class="form-control" id="awards" name="awards" rows="3">{{ $company->awards }}</textarea>
                            </div>
                            
                           
                            <div class="mb-3">
                                <label for="registration_number" class="form-label">Registration Number</label>
                                <input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $company->registration_number }}">
                            </div>
                
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Company</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
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

