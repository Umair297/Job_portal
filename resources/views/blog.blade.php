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
       .logo{
            height: 90px;
            width: 170px;
        }
        .logo1{
            height: 110px;
            width: 180px;
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
                        <h1>Blog List</h1>
                        <p>Stay updated with the latest job market trends, career tips, and industry insights. Our <br/>blogs and news section provides valuable guidance, expert advice, and updates to help you advance in your career.</p>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
  
<section class="container my-5">
    <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 35px; font-weight: 800;">Explore Blogs</h1>
    <div class="row">
    @foreach($blogs as $blog)
        <div class="col-md-4 pt-2 pb-3" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
            <div class="card border-0 shadow-sm">
            <!-- <img src="{{ asset('uploads/' . $blog->image) }}" class="card-img-top" alt="Blog Image"> -->
            <img src="{{ asset('http://localhost/job_portal/public/uploads/' . $blog->image) }}" class="card-img-top"
            alt="Blog Image">
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 22px; font-weight: 600;">{{ $blog->title }}</h5>
                    <p class="card-text">{{ Str::limit($blog->description, 100) }}</p>
                </div>
            </div>
        </div>
        @endforeach
</div>
</section>
  
        
   <!-- Footer Section -->
    @include('include.footer')

     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
</body>

</html>