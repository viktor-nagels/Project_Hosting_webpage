@extends('layouts.template')

@section('main')
<main> 
<header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <h1 class="masthead-heading text-uppercase mb-0">Hosting</h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                </div>
                <p class="masthead-subheading font-weight-light mb-0">Team 06</p>
            </div>
        </header>
        @guest
        <section class="page-section bg-white text-black mb-0" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-black">Hello</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">we are 6 students from thomas more and this is our hosting service. You can create a free domain with us. We support Mysql, php & laravel framework. </p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">We believe, that a great hosting platform is essential for great APP developers. If you create a domain now. Then within a few seconds your domain will be activated automatically!!</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-dark" href="/register">
                        <i class="fas fa-sign-in-alt"></i>
                        Get started!
                    </a>
                </div>
            </div>
        </section>
        @endguest
        @auth
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Dashboard</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!--SFTP-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/sftpinfo">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/folder.png" alt="..." />
                        </div>
                        </a>
                        <h3 class="text-center">SFTP</h3>
                    </div>
                    <!--MAKE DOMAIN-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <a href="/domaininfo">
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/bg.jpg" alt="..." />
                        </div>
                        </a>
                        <h3 class="text-center">domain info</h3>
                    </div>
                    <!--HOW TO-->
                    <div class="col-md-6 col-lg-4 mb-5">
                    <a href="/assets/Handleiding.pdf" target="_blank">    
                        <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                            
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            
                            <img class="img-fluid" src="assets/help.png" alt="..." />
                        </div>
                        </a>
                        <h3 class="text-center">HOW TO</h3>
                    </div>
                    
                </div>
            </div>
        </section>
        @endauth
        </main>
@endsection
