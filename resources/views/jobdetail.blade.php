<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job_portal</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="public/Job_portal/img/job.jpg" />

    <!-- Google Font -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

     <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/job_portal/public/job_portal/css/style.css" type="text/css">
    <style>
        .modal-header {
            padding: 0;
            border-bottom: none;
        }
        #authTabs {
            border-radius: 5px;
            overflow: hidden;
            padding: 10px;
        }
        #authTabs .nav-link {
            color: #000000;
            background-color: white;
            border: none;
            border-radius: 0px;
            font-weight: bold;
            text-align: center;
            padding: 20px 90px;
        }
        #authTabs .nav-link.active {
            background: linear-gradient(to right, #3c82eb, #3c82eb);
            color: #ffffff;
            border-bottom: none;
        }
        .logo{
            height: 90px;
            width: 170px;
        }
        .logo1{
            height: 100px;
            width: 170px;
        }
        
  
        @media (max-width: 515px) {
            #authTabs .nav-link {
                color: #000000;
                background-color: white;
                border: none;
                border-radius: 0px;
                font-weight: bold;
                text-align: center;
                padding: 20px 65px;
            }
        }
        @media (max-width: 415px) {
            #authTabs .nav-link {
                color: #000000;
                background-color: white;
                border: none;
                border-radius: 0px;
                font-weight: bold;
                text-align: center;
                padding: 20px 40px;
            }
        }
    </style>
</head>

<body>
        <!-- Jobs Start -->
        <div class="container py-5">
    <h1 class="text-center" style="font-size: 35px; font-weight: 800;">{{ $job->company_name }}</h1>
    <div class="job-item p-4 mb-4" style="background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
        <div class="row g-4">
            <div class="col-md-4">
                <img class="img-fluid border rounded" src="{{ asset('public/Job_portal/img/com-logo-1.jpg') }}" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-md-8">
                <h5>{{ $job->title }}</h5>
                <p><i class="fa fa-map-marker-alt text-primary"></i> {{ $job->city }}, {{ $job->country }}</p>
                <p><i class="far fa-clock text-primary"></i> Full Time</p>
                <p><i class="far fa-money-bill-alt text-primary"></i> ${{ $job->salary }}</p>
                <p><strong>Role:</strong> {{ $job->role }}</p>
                <p><strong>Category:</strong> {{ $job->category }}</p>
                <p><strong>Experience:</strong> {{ $job->experience }}</p>
                <p><strong>About the Job:</strong></p>
                        <p>{{ $job->about_job }}</p>

                        <p><strong>Requirements:</strong></p>
                        <p>{{ $job->requirement }}</p>

                        <p><strong>Job Type:</strong> {{ $job->job_type }}</p>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalApplyJobForm" style="background: #3c82eb;">
                                            Apply Now
                                        </button>
                        <a href="{{ route('resume.create')}}" class="btn btn-primary" style="background: #3c82eb;">
                                           Create Resume
                      </a>
                     
                      @php
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user(); // Get the logged-in user
@endphp

<a href="
    @if($user && $user->id == $job->user_id) 
        {{ url('chates/2') }} 
    @else 
        {{ route('chat.start', ['receiver_id' => $job->user_id]) }} 
    @endif
" class="btn btn-primary">
    Chat Now
</a>

                                    
            </div>
        </div>
    </div>
</div>

<!-- Jobs End -->

<!-- Modal -->
<div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4 shadow-lg rounded-4 border-0">
            <button class="btn-close position-absolute top-0 end-0 m-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body px-4 pt-4">
                <div class="text-center">
                    <p class="font-sm text-primary fw-bold">🚀 Job Application</p>
                    <h2 class="mt-3 mb-3 text-dark fw-semibold">Start Your Career!</h2>
                </div>

                <form id="jobApplyForm" action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name *</label>
                            <input type="text" class="form-control p-3 rounded-3" id="first_name" name="first_name" required placeholder="Umair">
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name *</label>
                            <input type="text" class="form-control p-3 rounded-3" id="last_name" name="last_name" required placeholder="Hassan">
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control p-3 rounded-3" id="email" name="email" required placeholder="umair@gmail.com">
                        </div>
                        <div class="col-md-6">
                        <label for="phone" class="form-label">Phone *</label>
                        <input type="text" class="form-control p-3 rounded-3" id="phone" name="phone" required placeholder="0345 2014458">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="street_address">Street Address *</label>
                        <input class="form-control" id="street_address" type="text" name="street_address" required placeholder="123 satlitetown">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                        <label class="form-label" for="city">City *</label>
                        <input class="form-control" id="city" type="text" name="city" required placeholder="City">
                        </div>
                        <div class="col-md-6">
                        <label class="form-label" for="state">State *</label>
                        <input class="form-control" id="state" type="text" name="state" required placeholder="State">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" for="experience">Experience *</label>
                        <input class="form-control" id="experience" type="text" name="experience" required placeholder="e.g., 5 years">
                    </div>
                    <div class="mt-3">
                        <label for="resume" class="form-label">Upload Resume *</label>
                        <input type="file" class="form-control p-3 rounded-3" id="resume" name="resume" required>
                    </div>

                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label text-muted" for="terms">I agree to the <a href="#" class="text-primary fw-bold">terms & conditions</a>.</label>
                    </div>

    <button type="button" class="btn btn-primary w-100 p-2 mt-4 fw-semibold shadow-sm rounded-3" onclick="confirmApply()">    📩 Apply Now</button>



                </form>
            </div>
        </div>
    </div>
</div>

    
  
        
        
   <!-- Footer Section -->
    @include('include.footer')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmApply() {
        Swal.fire({
            title: "Are you sure?",
            text: "Do you want to apply for this job?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Apply!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("jobApplyForm").submit();
            }
        });
    }

    // Show success message after redirect
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                title: "Success!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "OK"
            });
        @endif
    });
</script>


     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>