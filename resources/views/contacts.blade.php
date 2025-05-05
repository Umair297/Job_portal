<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Portal</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('public/Job_portal/img/job.jpg') }}" />

    <!-- Google Font & Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('public/job_portal/css/style.css') }}" type="text/css">

    <!-- SweetAlert CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .contact-info {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .contact-box {
            background: #e8f5e9;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .map-container iframe {
            width: 100%;
            height: 300px;
            border: none;
        }
        .logo {
            height: 90px;
            width: 170px;
        }
        .logo1 {
            height: 100px;
            width: 170px;
        }
    </style>
</head>

<body>
    <!-- Page Preloader -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section -->
    @include('include.header')

    <!-- Hero Section Begin -->
    <section class="hero-section set-bg" data-setbg="{{ asset('public/Job_portal/img/hero.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero-text">
                        <span>CAREER ELEMENTS</span>
                        <h1>Contact Us</h1>
                        <p>Get in touch with us for any inquiries, support, or partnership opportunities.<br> 
                           Reach us via email, phone, or our contact form. We’re here to assist you with your job portal needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <section class="container mt-5">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 35px; font-weight: 800;">Get in Touch</h1>
        
        <!-- Contact Info -->
        <div class="contact-info mt-4">
            <div class="contact-box"><i class="fas fa-map-marker-alt"></i> 123 Street, New York, USA</div>
            <div class="contact-box"><i class="fas fa-envelope"></i> info@example.com</div>
            <div class="contact-box"><i class="fas fa-phone"></i> +012 345 6789</div>
        </div>

        <!-- Contact Form & Map -->
        <div class="row mt-4">
            <div class="col-md-6 map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.850031373015!2d-74.00601548459361!3d40.71277617933005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2sNew+York%2C+USA!5e0!3m2!1sen!2s!4v1624638482545"></iframe>
            </div>
            <div class="col-md-6">
                @if(session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: '{{ session("success") }}',
                        });
                    </script>
                @endif

                <form id="contact-form" action="{{ route('contacts.store') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="message" rows="4" placeholder="Message" required></textarea>
                    <button type="submit" class="btn w-100" style="background-color: #3c82eb; color: white;">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    @include('include.footer')

    <!-- Bootstrap JS Bundle & jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('public/Job_portal/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/Job_portal/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/Job_portal/js/main.js') }}"></script>

    <!-- SweetAlert on Form Submission -->
    <script>
        document.getElementById('contact-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent actual form submission

            let form = this;

            Swal.fire({
                title: 'Sending Message...',
                text: 'Please wait while we process your request.',
                icon: 'info',
                showConfirmButton: false,
                timer: 2000
            }).then(() => {
                form.submit(); // Submit form after SweetAlert confirmation
            });
        });
    </script>

</body>
</html>
