
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
       
        .logo{
            height: 90px;
            width: 170px;
        }
        .logo1{
            height: 100px;
            width: 170px;
        }
        .pricing-section {
            padding: 60px 0;
            background-color: #f8f9fa;
        }
        .pricing-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            background: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }
        .pricing-card:hover {
            transform: translateY(-5px);
        }
        .pricing-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .pricing-price {
            font-size: 36px;
            font-weight: bold;
            color: #007bff;
        }
        .pricing-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .pricing-list li {
            margin-bottom: 10px;
            font-size: 16px;
        }
        .pricing-list li i {
            color: #007bff;
            margin-right: 8px;
        }
        .pricing-btn {
            display: block;
            margin-top: 20px;
            padding: 12px;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-free {
            background: #fff;
            color: #007bff;
            border: 2px solid #007bff;
        }
        .btn-free:hover {
            background: #007bff;
            color: #fff;
        }
        .btn-premium, .btn-enterprise {
            background: #007bff;
            color: #fff;
            border: none;
        }
        .btn-premium:hover, .btn-enterprise:hover {
            background: #0056b3;
        }
        .faq-container {
            padding: 50px 0;
            background-color: #f8f9fa;
        }
        .faq-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .faq-card {
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .pricing-card {
    transition: transform 0.3s ease-in-out;
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
}
.pricing-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}
.pricing-card h2 {
    font-size: 2.5rem;
    font-weight: bold;
}
.pricing-card button {
    transition: all 0.3s ease;
    font-size: 1.1rem;
    padding: 12px;
}
.pricing-card button:hover {
    background: #007bff;
    color: #fff;
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
                        <h1>Pricing List</h1>
                        <p>Our pricing list offers flexible plans for job seekers and employers. Choose<br>  from free and premium options to post jobs shortcode which lets
                        access resumes,<br /> and boost visibility. Affordable, transparent, and tailored to your needs.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Hero Section -->
      

  
        <section class="pricing-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-primary">Our Pricing Plans</h2>
            <p class="text-muted">Choose the best plan that suits your needs</p>
        </div>
        <div class="row justify-content-center">
            @php
                $plans = [
                    ['name' => 'Free', 'amount' => 100, 'features' => ['Job Board (10 jobs/user)', 'Directory Listing']],
                    ['name' => 'Premium', 'amount' => 199, 'features' => ['Premium Listings', 'Resume Access']],
                    ['name' => 'Enterprise', 'amount' => 499, 'features' => ['Expanded credits (5 users)', 'Priority Support']],
                    ['name' => 'Enterprise+', 'amount' => 899, 'features' => ['Expanded team access (10 users)', 'Dedicated Support']]
                ];
            @endphp
            
            @foreach($plans as $plan)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card pricing-card shadow-sm border-0">
                    <div class="card-body text-center py-4">
                        <h4 class="fw-bold text-uppercase">{{ $plan['name'] }}</h4>
                        <h2 class="text-primary display-5">${{ $plan['amount'] }}<small class="text-muted">/mo</small></h2>
                        <hr>
                        <ul class="list-unstyled my-3">
                            @foreach($plan['features'] as $feature)
                            <li class="text-muted"><i class="fas fa-check-circle text-success me-2"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>
                        <button class="btn btn-outline-primary w-100 paynow" data-plan="{{ $plan['name'] }}" data-amount="{{ $plan['amount'] }}">Select Plan</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Stripe Payment Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-3">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="paymentModalLabel">Complete Your Payment</h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form action="{{ route('pay') }}" method="POST" id="payment-form">
                    @csrf
                    <input type="hidden" name="plan" id="plan">
                    <input type="hidden" name="amount" id="amount">
                    <input type="hidden" name="email" id="email" value="{{ auth()->user()->email ?? '' }}">
                    <input type="hidden" name="name" id="name" value="{{ auth()->user()->name ?? '' }}">
                    
                    <div class="mb-3">
                        <label for="card-element" class="form-label">Card Details</label>
                        <div id="card-element" class="form-control p-3 border rounded"></div>
                    </div>
                    
                    <button type="submit" id="submit-button" class="btn btn-success w-100 py-2 mt-3 fw-bold">
                        <i class="fas fa-credit-card"></i> Submit Payment
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- section about FAQS -->
  <section class="faq-container">
        <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s" style="font-size: 35px; font-weight: 800;">Frequently Asked Questions</h1>
            <div class="row g-4">
            @foreach($questions as $question)
                <div class="col-md-6">
                    <div class="faq-card p-3">
                        <h5>{{ $question->question }}</h5>
                        <p>{{ $question->answer }}</p>
                    </div>
                </div>
            
            @endforeach
        </div>
    </section>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');

    document.querySelectorAll('.paynow').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('plan').value = this.dataset.plan;
            document.getElementById('amount').value = this.dataset.amount;
            $('#paymentModal').modal('show');
        });
    });

    document.getElementById('payment-form').addEventListener('submit', function (event) {
        event.preventDefault();
        stripe.createToken(cardElement).then(result => {
            if (result.error) {
                alert(result.error.message);
            } else {
                const hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'stripeToken';
                hiddenInput.value = result.token.id;
                this.appendChild(hiddenInput);
                this.submit();
            }
        });
    });
</script>

  
   <!-- Footer Section -->
    @include('include.footer')<!-- Include SweetAlert Library -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if(session('success'))
            Swal.fire({
                title: "Payment Successful!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonColor: "#28a745"
            });
        @endif

        @if(session('error'))
            Swal.fire({
                title: "Payment Failed!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonColor: "#d33"
            });
        @endif
    });

    document.querySelectorAll('.paynow').forEach(button => {
        button.addEventListener('click', function () {
            let planName = this.dataset.plan;
            let planAmount = this.dataset.amount;

            Swal.fire({
                title: "Confirm Your Plan",
                text: `You have selected the ${planName} plan for $${planAmount}. Proceed to payment?`,
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Pay Now"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('plan').value = planName;
                    document.getElementById('amount').value = planAmount;
                    $('#paymentModal').modal('show');
                }
            });
        });
    });

    document.getElementById('payment-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        Swal.fire({
            title: "Processing Payment...",
            text: "Please wait while we process your payment.",
            icon: "info",
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 3000
        });

        setTimeout(() => {
            this.submit();
        }, 3000);
    });
</script>

     <!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="public/Job_portal/js/jquery-3.3.1.min.js"></script>
    <script src="public/Job_portal/js/bootstrap.min.js"></script>
    <script src="public/Job_portal/js/main.js"></script>
</body>

</html>