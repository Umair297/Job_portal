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
            height: 110px;
            width: 180px;
        }
        .search{
            color:white;
            padding: 15px;
            border-radius: 5px;
        }
        .testimonial-slider {
            padding: 50px 0;
            text-align: left;
        }
        .testimonial-item {
            padding: 20px;
            border-radius: 10px;
            text-align: left;
            transition: 0.3s;
            background: #e8f5e9;
        }
        .testimonial-item.active {
            background: #3c82eb;
            color: white;
        }
        .testimonial-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .quote-icon {
            font-size: 30px;
            color:  #3c82eb;
        }
        .carousel-indicators button {
            background-color: #3c82eb;
        }
        .eleventh h1 {
    color: #111911;
    text-align: center;
    letter-spacing: -.05em;
    text-transform: none;
    margin-top: 10px;
    margin-bottom: 10px;
    font-family: Inter, sans-serif;
    font-size: 50px;
    font-weight: 700;
    line-height: 1.1em;
}
.eleventh img{
    width: 170px;
}
.paragraph-small {
    font-size: 18px;
    line-height: 1.5em;
}
.eleventh p{
    color: #7987a1;
    text-align: left;
    letter-spacing: -.05em;
    margin-top: 10px;
    margin-bottom: 10px;
    font-family: Inter, sans-serif;
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
                color:rgba(139, 131, 131, 0.15);
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
                        <h1 style="font-size: 65px  !important;">Find The Best Job</h1>
                        <p>Highlight your skills, passion, and dedication! Showcase your expertise,<br /> adaptability, and drive to contribute meaningfully to a dynamic team. <br />Let’s craft the perfect opportunity together!</p>
                        <a href="#jobbs" class="search" style="text-decoration: none; background: #3c82eb; padding: 12px;">Search a Job</a>
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
  
          <!-- Category Start -->
          <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 35px; font-weight: 800;">Explore By Category</h1>
                <div class="row g-4" style="">
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.1s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Marketing</h6>
                            <p class="mb-0">Marketing is the art of and converting customers communication and creativity.</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.3s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Customer Service</h6>
                            <p class="mb-0">Customer service is delivering support trust efficiently.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.5s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Human Resource</h6>
                            <p class="mb-0">
                            Human Resource manages talent, culture, and growth to build a successful workforce.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.7s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-tasks text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Project Management</h6>
                            <p class="mb-0">Project management ensures planning, and strategic decision-making.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.1s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-chart-line text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Business Development</h6>
                            <p class="mb-0">Business development drives growth and strategic partnerships for success.</p>
                        </a>
                    </div>
                    <div class="col-lg-3 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.3s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-hands-helping text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Sales & Communication</h6>
                            <p class="mb-0">Sales and communication drive business success.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.5s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-book-reader text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Teaching & Education</h6>
                            <p class="mb-0">
                            Teaching and education inspire learning, growth, and knowledge for a better future.</p>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6 wow fadeInUp pt-3" data-wow-delay="0.7s" style="margin-right: 25px; background: whitesmoke; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.32);">
                        <a class="cat-item rounded p-4" href="">
                            <i class="fa fa-3x fa-drafting-compass text-primary mb-4"></i>
                            <h6 class="mb-3" style="font-size: 20px; font-weight: 600;">Design & Creative</h6>
                            <p class="mb-0">
                            Design and creativity bring ideas to life with innovation and vision.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End -->

             <!-- Our Team -->
 <session class="eleventh">
    <div class="container">
       <div class="row" style="display: flex; justify-content: center; padding-top: 1.5rem; padding-bottom: 1rem;">
        <h1 style="font-size: 40px; font-weight: 800; font-style: normal; font-family: Poppins, sans-serif;">Our Team</h1>
       </div>
       <div class="row">
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img1.webp') }}" alt="">
            <div class="worker-name text-center">Usman Asif</div>
            <div class="worker-title text-center">Founder, CEO</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img2.png') }}" alt="">
            <div class="worker-name text-center">Qamar Abbas Sipra</div>
            <div class="worker-title text-center">Chief Finance Officer</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img3.png') }}" alt="">
            <div class="worker-name text-center">Badar Shafiq</div>
            <div class="worker-title text-center">Chief Delivery Officer</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img4.png') }}" alt="">
            <div class="worker-name text-center">Badar Shafiq</div>
            <div class="worker-title text-center">Chief Delivery Officer</div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img5.webp') }}" alt="">
            <div class="worker-name text-center">Usman Asif</div>
            <div class="worker-title text-center">Founder, CEO</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img6.png') }}" alt="">
            <div class="worker-name text-center">Qamar Abbas Sipra</div>
            <div class="worker-title text-center">Chief Finance Officer</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img7.png') }}" alt="">
            <div class="worker-name text-center">Badar Shafiq</div>
            <div class="worker-title text-center">Chief Delivery Officer</div>
        </div>
        <div class="col-md-3 d-flex flex-column align-items-center">
            <img src="{{ asset('public/Job_portal/img/img8.png') }}" alt="">
            <div class="worker-name text-center">Badar Shafiq</div>
            <div class="worker-title text-center">Chief Delivery Officer</div>
        </div>
  
    
        </div>
        <div class="row">
            <div class="col-md-3 d-flex flex-column align-items-center">
                <img src="{{ asset('public/Job_portal/img/img9.png') }}" alt="">
                <div class="worker-name text-center">Usman Asif</div>
                <div class="worker-title text-center">Founder, CEO</div>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center">
                <img src="{{ asset('public/Job_portal/img/img4.png') }}" alt="">
                <div class="worker-name text-center">Qamar Abbas Sipra</div>
                <div class="worker-title text-center">Chief Finance Officer</div>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center">
                <img src="{{ asset('public/Job_portal/img/img2.png') }}" alt="">
                <div class="worker-name text-center">Badar Shafiq</div>
                <div class="worker-title text-center">Chief Delivery Officer</div>
            </div>
            <div class="col-md-3 d-flex flex-column align-items-center">
                <img src="{{ asset('public/Job_portal/img/img5.png') }}" alt="">
                <div class="worker-name text-center">Badar Shafiq</div>
                <div class="worker-title text-center">Chief Delivery Officer</div>
            </div>
        </div>
        
    </div>
</session>


 <!-- Model end -->
   <!-- Testimonial Slider Section -->
   <section class="testimonial-slider">
        <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 35px; font-weight: 800;">Our Clients Say!!!</h1>
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                
                <!-- Indicators -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2"></button>
                </div>

                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/testimonial-1.jpg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item active">
                                    <i class="fas fa-quote-left quote-icon" style="color: white;"></i>
                                    <p style="font-size: 16px; color: rgba(241, 232, 232, 0.88);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/testimonial-2.jpg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/testimonial-3.jpg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/client2.jpeg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item active">
                                    <i class="fas fa-quote-left quote-icon" style="color: white;"></i>
                                    <p style="font-size: 16px; color: rgba(241, 232, 232, 0.88);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/client3.jpeg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/client7.jpeg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Slide 3 -->
                     <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/testimonial-4.jpg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item active">
                                    <i class="fas fa-quote-left quote-icon" style="color: white;"></i>
                                    <p style="font-size: 16px; color: rgba(241, 232, 232, 0.88);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/client6.jpeg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="testimonial-item">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p style="font-size: 16px; color: rgba(15, 15, 15, 0.51);">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                    <div class="d-flex align-items-center mt-3">
                                        <img src="{{ asset('public/Job_portal/img/client5.jpeg') }}" alt="Client">
                                        <div>
                                            <strong>Client Name</strong><br>
                                            <small>Profession</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>   
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

   <!-- Footer Section -->
    @include('include.footer')

     <!-- Bootstrap JS Bundle -->

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>