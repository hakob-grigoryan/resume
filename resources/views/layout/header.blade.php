<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <![endif]-->
        <title>FREE RESPONSIVE HORIZONTAL ADMIN</title>
        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet" />
        <!-- FONT AWESOME STYLE  -->
        <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet" />
        <!-- CUSTOM STYLE  -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
        <!-- GOOGLE FONT -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
        <style>
            .show {
                display: block;
            }

            .hide {
                display: none;
            }

            .post_update_section_click {
                cursor: pointer;
            }

            .ed_click {
                cursor: pointer;
            }

            .skill_click {
                cursor: pointer;
            }

            .info_click {
                cursor: pointer;
            }

            .news_click {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse set-radius-zero">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('assets/img/logo.png')}}" />
                    </a>
                </div>
                <div class="right-div">
                    <a href="{{route('admin.logout')}}" class="btn btn-info pull-right">LOG ME OUT</a>
                </div>
            </div>
        </div>
        <!-- LOGO HEADER END-->
        <section class="menu-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="navbar-collapse collapse">
                            <ul id="menu-top" class="nav navbar-nav navbar-right">
                                <li><a href="{{route('admin.adminDashboard')}}">DASHBOARD</a></li>
                                <li><a href="{{route('admin.tableDashboard')}}">TABLES</a></li>
                                <li><a href="{{route('admin.formDashboard')}}">FORM</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<main>
    @yield('content')
</main>
<section class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2014 Yourdomain.com |
                        <a href="http://www.binarytheme.com/" target="_blank"> Designed by : binarytheme.com </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER SECTION END-->
        <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
        <!-- CORE JQUERY  -->
        <script src="{{asset('assets/js/jquery-1.10.2.js')}}"></script>
        <!-- BOOTSTRAP SCRIPTS  -->
        <script src="{{asset('assets/js/bootstrap.js')}}"></script>
        <!-- CUSTOM SCRIPTS  -->
        <script src="{{asset('assets/js/adminJs/custom.js')}}"></script>
        <script>
            document.querySelector(".post_update_section_click").addEventListener("click", toggleDropdownPost);
            function toggleDropdownPost() {
                let element = document.querySelector(".post_update_section").classList.toggle("show");
            }

            document.querySelector(".ed_click").addEventListener("click", toggleDropdownEducation);
            function toggleDropdownEducation() {
                let elm = document.querySelector(".education_update_section").classList.toggle("show");
            }

            document.querySelector(".skill_click").addEventListener("click", toggleDropdownSkill);
            function toggleDropdownSkill() {
                let skill = document.querySelector(".skill_update_section").classList.toggle("show");
            }

            document.querySelector(".info_click").addEventListener("click", toggleDropdownInfo);
            function toggleDropdownInfo() {
                let info = document.querySelector(".info_update_section").classList.toggle("show");
            }

            document.querySelector(".news_click").addEventListener("click", toggleDropdownNews);
            function toggleDropdownNews() {
                let news = document.querySelector(".news_update_section").classList.toggle("show");
            }
        </script>
    </body>
</html>