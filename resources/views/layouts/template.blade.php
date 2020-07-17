<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ayuba's Resume</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{!! asset('vendor/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="{!! asset('vendor/font-awesome/css/font-awesome.min.css') !!}" rel="stylesheet">
<!--     <link href="{!! asset('vendor/devicons/css/devicons.min.css') !!}" rel="stylesheet">
 -->    <link href="{!! asset('vendor/simple-line-icons/css/simple-line-icons.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/resume.css') !!}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">


">
   

  </head>
 

  <body id="page-top">
   <div id="app"> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">My Portfolio</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('img/profile.jpg') }}" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <router-link class="nav-link js-scroll-trigger" to="/">About</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link js-scroll-trigger" to="/experience">Experience</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link js-scroll-trigger" to="/education">Education</router-link>
          </li>
          <li class="nav-item">
           <router-link class="nav-link js-scroll-trigger" to="/skills">Skills</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link js-scroll-trigger" to="/interests">Interests</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link js-scroll-trigger" to="/awards">Awards</router-link>
          </li>
        </ul>
      </div>
    </nav>
      


     <div class="container-fluid p-0">
      <transition name="router-anim" enter-active-class="animated slideInLeft" leave-active-class="animated slideOutRight">
        <router-view></router-view>
      </transition>
     </div>
   </div>
 
    <style type="text/css">
        @import "/css/animate.css";

    </style>
    <script src="{!! asset('/js/app.js') !!}"></script>
    <script>
       window.auth_user = {!! json_encode(Auth::User()); !!};
    </script>
     <!-- Bootstrap core JavaScript -->
    <script src="{!! asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

    <!-- Plugin JavaScript -->
    <script src="{!! asset('vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

    <!-- Custom scripts for this template -->
    <script src="{!! asset('js/resume.min.js') !!}"></script>
    
  </body>

</html>
