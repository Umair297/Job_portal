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
                        <h1>About Us</h1>
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

    
 <!-- About Section Begin -->
 <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="public/Job_portal/img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="public/Job_portal/img/about-2.jpg" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="public/Job_portal/img/about-3.jpg" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="public/Job_portal/img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4" style="font-size: 35px; font-weight: 800;">We Help To Get The Best Job And Find A Talent</h1>
                        <p class="mb-4" style="font-size: 20px;">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
                        <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
                        <a class="btn btn-primary py-3 px-5 mt-3" href="" style="background: #3c82eb";>Read More</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- About Section End -->

    
  
        
        
   <!-- Footer Section -->
    @include('include.footer')

     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
</body>

</html>