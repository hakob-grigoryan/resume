<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upright</title>
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}">  
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">    
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">      
    <link rel="stylesheet" href="{{asset('assets/slick/slick.min.css')}}">        
    <link rel="stylesheet" href="{{asset('assets/slick/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/templatemo.css')}}">

</head>
<body>    
    <div class="container-fluid">
        <div class="row">
            <!-- Leftside bar -->
            <div id="tm-sidebar" class="tm-sidebar"> 
                <nav class="tm-nav">
                    <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <div class="tm-brand-box">
                            <h3 class="tm-brand">{{$userInfo->name ?? ''}} {{$userInfo->surname ?? ''}}</h3>
                        </div>    
                        @if($settings)      
                        <ul id="tm-main-nav">
                          
                            <li class="nav-item">                                
                                <a href="#home" class="nav-link current">
                                    <div class="triangle-right"></div>
                                    <i class="fas fa-home nav-icon"></i>
                                    {{$settings->tab_1 ?? 'Home'}}
                                </a>
                              
                            </li>
                            <li class="nav-item">
                                <a href="#gallery" class="nav-link">
                                    <div class="triangle-right"></div>
                                    <i class="fas fa-images nav-icon"></i>
                                    {{$settings->tab_2 ?? 'Gallery'}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#about" class="nav-link">
                                    <div class="triangle-right"></div>
                                    <i class="fas fa-user-friends nav-icon"></i>
                                    {{$settings->tab_3 ?? 'Post'}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact" class="nav-link">
                                    <div class="triangle-right"></div>
                                    <i class="fas fa-envelope nav-icon"></i>
                                    {{$settings->tab_4 ?? 'Contact'}}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://paypal.me/templatemo" class="nav-link external" target="_parent" rel="sponsored">
                                    <div class="triangle-right"></div>
                                    <i class="fas fa-external-link-alt nav-icon"></i>
                                    External
                                </a>
                            </li>
                          
                        </ul>
                        @endif
                    </div>
                    <footer class="mb-3 tm-mt-100">
                        Design: <a href="https://templatemo.com" target="_parent" rel="sponsored">TemplateMo</a>
                    </footer>
                </nav>
            </div>
            
            <div class="tm-main">
                <!-- Home section -->
                <div class="tm-section-wrap">
                    <div class="tm-parallax" data-parallax="scroll" data-image-src="img/img-01.jpg"></div>                  
                    <section id="home" class="tm-section">
                      
                        <h2 class="tm-text-primary">{{$userInfo->information->name}}</h2>
                        <hr class="mb-5">
                        <div class="row">
                            <div class="col-lg-6 tm-col-home mb-4">
                                <div class="tm-text-container">
                                    <!-- <div class="tm-icon-container mb-5 mr-0 ml-auto">
                                        <i class="fas fa-satellite-dish fa-4x tm-text-primary"></i>
                                    </div> -->
                                                                  
                                    <p>
                                      {{$userInfo->information->content}}
                                    </p>
                                  
                                </div>                                
                            </div>
                        
                        </div>
                        <hr class="tm-hr-short mb-5">
                        <div class="row tm-row-home">                            
                            <div class="tm-col-home tm-col-home-l">
                                @foreach($userInfo->news as $value)
                                <div class="media mb-4">
                                    <i class="far fa-newspaper fa-4x tm-post-icon tm-text-primary"></i>
                                    <div class="media-body">
                                        @php
                                            $timestamp = strtotime($value->created_at);
                                            $formattedDate = date('j F Y', $timestamp);
                                        @endphp
                                        <p class="d-block mb-2 tm-text-primary tm-post-link">{{$formattedDate}}</p>  
                                        <p>{{$value->content}} </p>
                                          
                                    </div>                                    
                                </div>
                                @endforeach
                                
                            </div>
                            <div class="tm-col-home mr-0 ml-auto">
                                <div class="tm-img-home-container">
                                <img src="{{ asset('storage/assets/images/'.$myImg->image_path) }}" alt="{{$myImg->image_name}}"/>
                                </div>                                
                            </div>
                        </div>
                    </section>
                </div>
                <div class="tm-section-wrap">
                    <div class="tm-parallax" data-parallax="scroll" data-image-src="img/img-02.jpg"></div>                  
                    <section id="gallery" class="tm-section">
                        <h2 class="tm-text-primary">Upright Gallery</h2>
                        <hr class="mb-5">
                        <div class="tm-gallery">
                            @foreach($userInfo->posts as $post)
                                <figure class="effect-honey tm-gallery-item portrait">
                                    <img src="{{ asset('storage/assets/images/'.$post->image_pate) }}" alt="{{$post->image_name}}"/>
                                    <figcaption>
                                    <h2><i>{{$post->name}}</i></h2>
                                    <a href="{{ asset('storage/assets/images/'.$post->image_pate) }}">View Post</a>                        
                                    </figcaption>    
                                </figure>
                            @endforeach
                        
                        </div>
                    </section>
                </div>
                <!-- About section -->
                <div class="tm-section-wrap">
                    <div class="tm-parallax" data-parallax="scroll" data-image-src="img/img-03.jpg"></div>
                    <section id="about" class="tm-section">
                        <h2 class="tm-text-primary">EDUCATIONS AND SKILLS</h2>
                        <hr class="mb-5">
                        
                        <div class="row tm-row-about">
                            @foreach($userInfo->educations as $education)
                            <div class="tm-col-about tm-col-about-l">
                                <p class="mb-4">
                                    <strong>{{$education->name}}</strong> {{$education->description}}
                                </p>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-5">
                            <div class="tm-carousel">
                                @foreach($userInfo->skills as $skill)
                                <div class="tm-carousel-item">
                                    <figure class="effect-honey mb-4">
                                    <img src="{{ asset('storage/assets/images/'.$skill->image_path) }}" alt="{{$skill->image_name}}"/>
                                    </figure>
                                    <div class="tm-about-text">
                                    <h3 class="mb-3 tm-text-primary tm-about-title">{{$skill->name}}</h3>
                                        <p>{{$skill->description}}</p>
                                        
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Contact section -->
                <div class="tm-section-wrap">
                    <div class="tm-parallax" data-parallax="scroll" data-image-src="img/img-04.jpg"></div>
                    <div id="contact" class="tm-section">
                        <h2 class="tm-text-primary">Contact Upright</h2>
                        <hr class="mb-5">
                        <div class="row">
                            <div class="col-xl-6 tm-contact-col-l mb-4">
                                <form id="contact-form" action="{{route('notice_store')}}" method="POST" class="tm-contact-form">
                                    @csrf
                                    <div class="form-group">
                                        
                                        <input type="text" name="name" class="form-control rounded-0" placeholder="Name"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control rounded-0" placeholder="Email"  />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input type="phone" name="phone" class="form-control rounded-0" placeholder="Phone"  />
                                      
                                    </div>
                                    <div class="form-group">
                                        <textarea rows="8" name="message" class="form-control rounded-0" placeholder="Message" ></textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group tm-text-right">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6 tm-contact-col-r">
                                <!-- Map -->
                                <div class="mapouter mb-4">
                                    <div class="gmap_canvas">
                                        <iframe width="100%" height="520" id="gmap_canvas"
                                            src="{{$settings->map_link ?? '#'}}"
                                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                    </div>
                                </div>
            
                                <!-- Address -->
                                <address class="mb-4">
                                    Armenia Yerevan<br>
                                    {{$userInfo->addres ?? ''}}<br>
                                  
                                </address>
            
                                <!-- Links -->
                                <ul class="tm-contact-links mb-4">
                                    <li class="mb-2">
                                        <a href="tel:0100200340">
                                            <i class="fas fa-phone mr-2 tm-contact-link-icon"></i>
                                            Tel: {{$userInfo->phone ?? ''}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@company.com">
                                            <i class="fas fa-at mr-2 tm-contact-link-icon"></i>
                                            {{$userInfo->email ?? ''}}
                                        </a>
                                    </li>
                                </ul>
                                <ul class="tm-contact-social">
                                    <li><a href="{{$settings->facebook ?? '#'}}" class="tm-social-link"><i class="fab fa-facebook"></i></a></li>
                                    <!-- <li><a href="{{$settings->twitter ?? '#'}}" class="tm-social-link"><i class="fab fa-twitter"></i></a></li> -->
                                    <li><a href="{{$settings->instagram ?? '#'}}" class="tm-social-link"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{$settings->linkedin ?? '#'}}" class="tm-social-link"><i class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Copyright -->                
                <div class="tm-section-wrap tm-copyright row">
                    <div class="col-12">
                        <div class="text-right">
                            Copyright 2020 Upright Company
                        </div> 
                    </div>
                </div>                
            </div> <!-- .tm-main -->                      
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>        
    <script src="{{asset('assets/js/jquery.singlePageNav.min.js')}}"></script> 
    <script src="{{asset('assets/js/parallax/parallax.min.js')}}"></script>    
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>    
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>        
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script> 
    <script src="{{asset('assets/slick/slick.min.js')}}"></script>              
    <script src="{{asset('assets/js/templatemo-script.js')}}"></script>
</body>
</html> 