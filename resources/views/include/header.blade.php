  <!-- Header Section Begin -->
  <header class="header-section">
    <div class="container">
        <div class="logo">
       
                <img class="logo1" src="public/Job_portal/img/logos.png" alt="">
        
        </div>
        <div class="nav-menu">
    <nav class="mainmenu mobile-menu">
        <ul style="margin-top: 35px;">
            <li class="active"><a href="http://localhost/job_portal/" style="text-decoration: none;">Home</a></li>
            <li><a href="{{ route('about')}}" style="text-decoration: none;">About</a></li>
            <li><a href="{{ route('blog.view')}}" style="text-decoration: none;">Blog</a></li>
            <li><a href="{{ route('jobs.view')}}" style="text-decoration: none;">jobs</a></li>
            <li><a href="{{ route('faq.view')}}" style="text-decoration: none;">Pricing</a></li>
            <li><a href="{{ route('contacts.list')}}" style="text-decoration: none;">Contacts</a></li>
        </ul>
    </nav>

    @if (Auth::check())
    <!-- Show Dashboard Button -->
    <a href="{{ url('/home') }}" style="color: white; border: 2.5px solid #3c82eb;  padding: 10px 25px 10px 25px; border-radius: 5px;" class="primary-btn signup-btn">Dashboard</a>
    
    <!-- Logout Button -->
    <a href="{{ route('logout') }}" style="color: white; border: 2.5px solid #3c82eb;  padding: 10px 25px 10px 25px; border-radius: 5px;" class="primary-btn signup-btn" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@else
    <!-- Show Sign Up Today Button -->
    <a href="#" style="text-decoration: none; color: white; border: 2.5px solid #3c82eb;  padding: 10px 25px 10px 25px; border-radius: 5px;" class="primary-btn signup-btn" data-bs-toggle="modal" data-bs-target="#authModal">Register</a>
@endif

</div>

        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- Modal -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <ul class="nav nav-tabs w-100" id="authTabs" role="tablist">
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" 
                            type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item flex-grow-1 text-center" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" 
                            type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="tab-content" id="authTabContent">
                    <!-- Login Form -->
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn w-100" style="background: #3c82eb;">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>

                    <!-- Register Form -->
                    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <!-- Image -->
                          

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Job_seaker">Job Seeker</option>
                                    <option value="Job_uploader">Job Uploader</option>
                                </select>
                                @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                             
                            <div class="text-end">
                                <button type="submit" class="btn w-100" style="background: #3c82eb;">{{ __('Register') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- Header End -->