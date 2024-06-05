<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ $title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- "{{ asset() }}" --}}
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    @yield('head')
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/materialdesignicons.min.css') }}" />

    <!--pe-7 Icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/pe-icon-7-stroke.css') }}" />

    <!-- Custom  sCss -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="58" class="scrollspy-example">

    <!--Navbar Start-->
    <nav class="navbar navbar-expand-lg fixed-top navbar-custom sticky sticky-dark" id="nav-sticky">
        <div class="container-fluid">
            <!-- LOGO -->
            <a class="logo text-uppercase" href="index.html">
                <img src="{{ asset('images/logo-light.png') }}" alt="" class="logo-light" height="18" />
                <img src="{{ asset('images/logo-dark.png') }}" alt="" class="logo-dark" height="18" />
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="mdi mdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ms-auto" id="mySidenav">
                    <li class="nav-item">
                        <a href="#home" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#features" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item">
                        <a href="#services" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('merchants.create') }}" class="nav-link bg-success ">Switch to Merchant</a>
                    </li>
                    <li class="nav-item">
                        <a href="#pricing" class="nav-link">Merchants</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link">Contact</a>
                    </li>

                    <li>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    {{-- <a href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Dashboard
                                    </a> --}}
                                    <li class="dropdown notification-list topbar-dropdown">
                                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                            aria-expanded="false">
                                            {{-- <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="user-image"
                                                class="rounded-circle"> --}}
                                            <span class="pro-user-name ms-1 bg-warning">
                                                {{ Auth::user()->name }}
                                            </span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                            <!-- item-->
                                            <div class="dropdown-header noti-title">
                                                <h6 class="text-overflow m-0">Welcome !</h6>
                                            </div>
                
                                            <!-- item-->
                                            <a href="contacts-profile.html" class="dropdown-item notify-item">
                
                                                <span>My Account</span>
                                            </a>
                
                                            <!-- item-->
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>
                                            <!-- item-->
                                            <span>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                
                                                    <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </span>
                                        </div>
                                    </li>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="bg-info rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="bg-warning rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- home start -->
    <section class="bg-home bg-gradient" id="home">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container-fluid">
                   @yield('home')
                </div>
                <!-- end container-fluid -->
            </div>
        </div>
    </section>
    <!-- home end -->

    <!-- features start -->
    <section class="features" id="features">
        <div class="container-fluid">
            @yield('feature')
        </div>
        <!-- end container-fluid -->
    </section>
    <!-- features end -->

    <!-- services start -->
    <section class="section bg-light" id="services">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center">
                        <h6 class="text-primary small-title">Services</h6>
                        <h4>What we do</h4>
                        <p class="text-muted">At solmen va esser far uniform grammatica.</p>
                    </div>
                </div>
            </div>
            @yield('service')
        </div>
        <!-- end container-fluid -->
    </section>
    <!-- services end -->

    <!-- merchants start -->
    <section class="section bg-light" id="clients">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center mb-4">
                        <h6 class="text-primary small-title">Merchants</h6>
                        <h4>What our Merchants Says</h4>
                        <p class="text-muted">At solmen va esser far uniform grammatica.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->
        @yield('merchant')
        </div>
        <!-- end container-fluid -->
    </section>
    <!-- merchants end -->

    <!-- contact start -->
    <section class="section" id="contact">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="title text-center mb-5">
                        <h6 class="text-primary small-title">Contact</h6>
                        <h4>Have any Questions ?</h4>
                        <p class="text-muted">At solmen va esser far uniform grammatica.</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-4">
                    <div class="get-in-touch">
                        <h5>Get in touch</h5>
                        <p class="text-muted mb-5">At solmen va esser necessi far</p>

                        <div class="mb-3">
                            <div class="get-touch-icon float-start me-3">
                                <h2><i class="pe-7s-mail text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">E-mail</h5>
                                <p class="text-muted">example@abc.com</p>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="get-touch-icon float-start me-3">
                                <h2><i class="pe-7s-phone text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">Phone</h5>
                                <p class="text-muted">012-345-6789</p>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="get-touch-icon float-start me-3">
                                <h2> <i class="pe-7s-map-marker text-primary"></i></h2>
                            </div>
                            <div class="overflow-hidden">
                                <h5 class="font-16 mb-0">Address</h5>
                                <p class="text-muted">20 Rollins Road Cotesfield, NE 68829</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="custom-form bg-white">
                        <span id="error-msg"></span>
                        <form method="post" name="myForm" onsubmit="return validateForm()">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input name="name" id="name" type="text" class="form-control"
                                            placeholder="Enter your name...">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input name="email" id="email" type="email" class="form-control"
                                            placeholder="Enter your email...">
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject</label>
                                        <input name="subject" id="subject" type="text" class="form-control"
                                            placeholder="Enter Subject...">
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="comments" class="form-label">Message</label>
                                        <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Enter your message..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-lg-12 text-end">
                                    <input type="submit" id="submit" name="send"
                                        class="submitBnt btn btn-custom" value="Send Message" />
                                </div>
                            </div>
                            <!-- end row -->
                        </form>
                    </div>
                    <!-- end custom-form -->

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </section>
    <!-- contact end -->

    <!-- footer start -->
    <footer class="footer bg-dark">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="text-center">
                        <div class="footer-logo mb-3">
                            <img src="{{ asset('images/logo-light.png') }}" alt="" height="20">
                        </div>
                        <ul class="list-inline footer-list text-center mt-5">
                            <li class="list-inline-item"><a href="#">Home</a></li>
                            <li class="list-inline-item"><a href="#">About</a></li>
                            <li class="list-inline-item"><a href="#">Services</a></li>
                            <li class="list-inline-item"><a href="#">Clients</a></li>
                            <li class="list-inline-item"><a href="#">Pricing</a></li>
                            <li class="list-inline-item"><a href="#">Contact</a></li>
                        </ul>
                        <ul class="list-inline social-links mb-4 mt-5">
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="mdi mdi-google-plus"></i></a>
                            </li>
                        </ul>
                        <p class="text-white-50 mb-4">2016 - 2020 © Adminto. Design by <a href="#"
                                target="_blank" class="text-white-50">Coderthemes</a> </p>

                    </div>
                </div>

            </div>

        </div>
    </footer>
    <!-- footer end -->

    <!-- Back to top -->
    <a href="#" class="back-to-top" id="back-to-top"> <i class="mdi mdi-chevron-up"> </i> </a>

    <!-- javascript -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- counter js -->
    <script src="{{ asset('js/counter.int.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    @yield('script')
</body>

</html>
