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
    <link rel="stylesheet" href="public/job_portal/css/style.css" type="text/css">
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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Header Section -->
    @include('include.header')

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="public/Job_portal/img/hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-text">
                        <span>CAREER ELEMENTS</span>
                        <h1>Job List</h1>
                        <p>We connect talented individuals with top employers, offering a seamless job search experience. Our platform
                             provides career opportunities, resources, and support to help you achieve your professional goals.<br /> 
                             At Job Portal, we bridge the gap between job seekers and employers, providing a user-friendly platform
                              with personalized job matches, career resources, and opportunities to empower your professional journey.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

<!-- Filter Section -->
<div class="container my-5">
    <div class="card p-4 shadow-sm">
        <form action="{{ route('job.filter') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-3">
                    <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{ request()->company_name }}">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="city" placeholder="City" value="{{ request()->city }}">
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="salary">
                        <option value="">Salary Range</option>
                        <option value="0-50000" {{ request()->salary == '0-50000' ? 'selected' : '' }}>$0 - $50,000</option>
                        <option value="50000-100000" {{ request()->salary == '50000-100000' ? 'selected' : '' }}>$50,000 - $100,000</option>
                        <option value="100000+" {{ request()->salary == '100000+' ? 'selected' : '' }}>$100,000+</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" name="job_type">
                        <option value="">Job Type</option>
                        <option value="Full Time" {{ request()->job_type == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                        <option value="Part Time" {{ request()->job_type == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                    </select>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary px-4">Filter Jobs</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach ($jobs as $job)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('public/Job_portal/img/com-logo-1.jpg') }}" alt="Company Logo" class="me-3 rounded-circle" style="width: 60px; height: 60px;">
                        <div>
                            <h5 class="mb-1">{{ $job->company_name }}</h5>
                            <p class="small text-muted">
                                <i class="fa fa-map-marker-alt me-1 text-primary"></i>{{ $job->city }}, {{ $job->country }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <p><i class="far fa-clock text-primary me-2"></i>{{ $job->job_type }}</p>
                    <p><i class="far fa-money-bill-alt text-primary me-2"></i>${{ $job->salary }}</p>

                    <a href="#" onclick="checkLogin(event, {{ $job->id }})" class="btn btn-primary w-100 mt-2">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function checkLogin(event, jobId) {
        event.preventDefault(); // Prevent default redirection

        @if(auth()->check())
            // If user is logged in, redirect to job detail page
            window.location.href = "{{ url('/jobdetail') }}/" + jobId;
        @else
            // If user is not logged in, show alert
            alert("Please log in first to view job details.");
        @endif
    }
</script>


<!-- Apply Job Modal -->
<div class="modal fade" id="ModalApplyJobForm" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-5">
                <h2 class="text-center">Apply for Job</h2>
                <p class="text-muted text-center">Fill in your details and submit your application.</p>
                <form action="{{ route('job.apply', $job->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input type="text" class="form-control" name="first_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name *</label>
                        <input type="text" class="form-control" name="last_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload Resume</label>
                        <input type="file" class="form-control" name="resume">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5">Submit Application</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    
  
        
        
   <!-- Footer Section -->
    @include('include.footer')

     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
</body>

</html>