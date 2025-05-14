<div>
{{-- <style>
.navbar.scrolled {
background-color: #008080; 
 }

.navbar.scrolled .nav-link {
color: white;
}

.navbar .nav-link {
    color: black;
}
</style> --}}

{{-- <div>
    
    <!-- Signin / Register Modal -->
    <div class="modal fade" id="sinRe" tabindex="-1" aria-labelledby="sinReLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="border: none;">
                    <img src="{{ asset('asset/image/logo.png') }}" alt="Logo" style="width: 150px; height: auto;"
                        class="modal-title">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: rgb(2, 17, 83);"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center mb-3">
                            <h5 class="modal-title fs-4 fw-bold" id="sinReLabel" style="color: rgb(2, 17, 83);">
                                {{ __('sign_in_register') }}
                            </h5>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form>
                                <!-- Email Input -->
                                <div class="mb-3 d-flex align-items-center"
                                    style="border: 1px solid rgb(2, 17, 83); border-radius: 0.375rem; background-color: white;">
                                    <span class="pe-2 p-2" style="flex: 0 0 30%; color: rgb(2, 17, 83);">
                                        <i class="bi bi-envelope-paper-fill"></i> {{ __('email') }}
                                    </span>
                                    <input type="email" id="signup-email" name="email" class="form-control border-0"
                                        required style="background: transparent; flex: 1;">
                                </div>

                                <!-- Password Input -->
                                <div class="mb-3 d-flex align-items-center"
                                    style="border: 1px solid rgb(2, 17, 83); border-radius: 0.375rem; background-color: white;">
                                    <span class="pe-2 p-2" style="flex: 0 0 30%; color: rgb(2, 17, 83);">
                                        <i class="bi bi-file-earmark-lock2"></i> {{ __('password') }}
                                    </span>
                                    <input type="password" id="login-password" name="password"
                                        class="form-control border-0" required
                                        style="background: transparent; flex: 1;">
                                </div>

                                <!-- Continue Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn text-white fw-bold"
                                        style="background-color: rgb(2, 17, 83);">
                                        {{ __('continue') }}
                                    </button>
                                </div>

                                <hr style="color: rgb(2, 17, 83);">

                                <!-- Social Login Options -->
                                <div class="text-center">
                                    <span class="fs-5 fw-bold" style="color: rgb(2, 17, 83);">
                                        {{ __('or_login_with') }}
                                    </span>
                                </div>

                                <!-- Social Media Icons -->
                                <div class="d-flex justify-content-center fs-1 gap-3 mt-3">
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center"
                                        style="color: rgb(2, 17, 83); width: 70px; height: 70px;">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center"
                                        style="color: rgb(2, 17, 83); width: 70px; height: 70px;">
                                        <i class="bi bi-google"></i>
                                    </a>
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center"
                                        style="color: rgb(2, 17, 83); width: 70px; height: 70px;">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('asset\image\image\longttp.png') }}" alt="" style="width:250px;height:auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
                    <!-- Left Side Navigation Links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"> --}}
                       
        
                        {{-- <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('messages.more') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">{{ __('messages.inspiration') }}</a></li>
                                <li><a class="dropdown-item" href="#">{{ __('messages.offers') }}</a></li>
                            </ul>
                        </li> --> --}}
                    {{-- </ul>
        
                    <!-- Right Side Refer & Earn, Language Dropdown -->
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
        


                        <!-- flights -->

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{Route('Home-Page')}}" style="background: transparent;">{{ __('flights') }}</a>
                        </li>
                        <!-- Language & Country Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ ['en' => 'English', 'si' => 'සිංහල', 'ta' => 'தமிழ்'][app()->getLocale()] ?? app()->getLocale() }}
                            </a>
                            

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() == 'ta' ? 'active' : '' }}" wire:click="switchLanguage('ta')">
                                        தமிழ்
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() == 'si' ? 'active' : '' }}" wire:click="switchLanguage('si')">
                                        සිංහල
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" wire:click="switchLanguage('en')">
                                        English
                                    </a>
                                </li>
                            </ul>
                        </li>


        
                        <!-- Help Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('help') }}
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">{{ __('faqs') }}</a></li>
                                <li><a class="dropdown-item" href="{{Route('customer-Contact-Form')}}">{{ __('contact_us') }}</a></li>
                            </ul>
                        </li>
        
                        <!-- Login / Sign Up Dropdown -->
                        
                        <li class="nav-item  d-flex ">
                            <a class="nav-link" href="#" role="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#sinRe">
                            <i class="bi bi-person-circle"></i> {{ __('login_signup') }}
                            </a>
                            
                    
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
</div> --}}

{{-- <Script>
      const navbar = document.querySelector('.navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</Script> --}}

<style>
    .navbar.scrolled {
        background-color: #008080;
    }
    
    .navbar.scrolled .nav-link {
        color: white;
    }
    
    .navbar .nav-link {
        color: black;
        font-size: 14px; /* Reduced font size */
    }
    
    /* Additional responsive font size adjustments */
    @media (max-width: 576px) {
        .navbar .nav-link {
            font-size: 12px; /* Smaller font size for mobile */
        }
        .modal-title {
            font-size: 18px !important; /* Smaller modal title for mobile */
        }
        .modal-body .fs-5 {
            font-size: 14px !important; /* Smaller text for social login */
        }
    }
    </style>

<div>
    <!-- Signin / Register Modal -->
    <div class="modal fade" id="sinRe" tabindex="-1" aria-labelledby="sinReLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="border: none;">
                    <img src="{{ asset('asset/image/logo.png') }}" alt="Logo" style="width: 120px; height: auto;" class="modal-title">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: rgb(2, 17, 83);"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <div class="col-12 text-center mb-3">
                            <h5 class="modal-title fs-4 fw-bold" id="sinReLabel" style="color: rgb(2, 17, 83); font-size: 20px;">
                                {{ __('sign_in_register') }}
                            </h5>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form>
                                <!-- Email Input -->
                                <div class="mb-3 d-flex align-items-center" style="border: 1px solid rgb(2, 17, 83); border-radius: 0.375rem; background-color: white;">
                                    <span class="pe-2 p-2" style="flex: 0 0 30%; color: rgb(2, 17, 83); font-size: 14px;">
                                        <i class="bi bi-envelope-paper-fill"></i> {{ __('email') }}
                                    </span>
                                    <input type="email" id="signup-email" name="email" class="form-control border-0" required style="background: transparent; flex: 1; font-size: 14px;">
                                </div>

                                <!-- Password Input -->
                                <div class="mb-3 d-flex align-items-center" style="border: 1px solid rgb(2, 17, 83); border-radius: 0.375rem; background-color: white;">
                                    <span class="pe-2 p-2" style="flex: 0 0 30%; color: rgb(2, 17, 83); font-size: 14px;">
                                        <i class="bi bi-file-earmark-lock2"></i> {{ __('password') }}
                                    </span>
                                    <input type="password" id="login-password" name="password" class="form-control border-0" required style="background: transparent; flex: 1; font-size: 14px;">
                                </div>

                                <!-- Continue Button -->
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn text-white fw-bold" style="background-color: rgb(2, 17, 83); font-size: 14px; padding: 8px 16px;">
                                        {{ __('continue') }}
                                    </button>
                                </div>

                                <hr style="color: rgb(2, 17, 83);">

                                <!-- Social Login Options -->
                                <div class="text-center">
                                    <span class="fs-5 fw-bold" style="color: rgb(2, 17, 83); font-size: 14px;">
                                        {{ __('or_login_with') }}
                                    </span>
                                </div>

                                <!-- Social Media Icons -->
                                <div class="d-flex justify-content-center gap-3 mt-3">
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center" style="color: rgb(2, 17, 83); width: 50px; height: 50px; font-size: 24px;">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center" style="color: rgb(2, 17, 83); width: 50px; height: 50px; font-size: 24px;">
                                        <i class="bi bi-google"></i>
                                    </a>
                                    <a href="#" class="rounded-5 d-flex align-items-center justify-content-center" style="color: rgb(2, 17, 83); width: 50px; height: 50px; font-size: 24px;">
                                        <i class="bi bi-twitter"></i>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('asset\image\image\longttp.png') }}" alt="" style="width: 200px; height: auto;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarSupportedContent">
                <!-- Left Side Navigation Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Add navigation links here if needed -->
                </ul>

                <!-- Right Side Navigation Links -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                    <!-- Flights -->
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="" style="background: transparent;">{{ __('flights') }}</a>
                    </li>

                    <!-- Language & Country Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ ['en' => 'English', 'si' => 'සිංහල', 'ta' => 'தமிழ்'][app()->getLocale()] ?? app()->getLocale() }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'ta' ? 'active' : '' }}" wire:click="switchLanguage('ta')" style="font-size: 14px;">
                                    தமிழ்
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'si' ? 'active' : '' }}" wire:click="switchLanguage('si')" style="font-size: 14px;">
                                    සිංහල
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}" wire:click="switchLanguage('en')" style="font-size: 14px;">
                                    English
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Help Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('help') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" style="font-size: 14px;">{{ __('faqs') }}</a></li>
                            <li><a class="dropdown-item" href="" style="font-size: 14px;">{{ __('contact_us') }}</a></li>
                        </ul>
                    </li>

                    <!-- Login / Sign Up -->
                    <li class="nav-item d-flex">
                        <a class="nav-link" href="#" role="button" aria-expanded="false" data-bs-toggle="modal" data-bs-target="#sinRe">
                            <i class="bi bi-person-circle"></i> {{ __('login_signup') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>


<script>
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>
</div>
