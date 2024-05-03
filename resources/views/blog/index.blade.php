<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogs - Curlware</title>
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container">
        <a class="navbar-brand" href="#">Curl Ware</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if(Session::get('user_id'))
                <li class="nav-item">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
                @endif
            </ul>
            <div class="d-flex me-2">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(!Session::get('user_id'))
                        <li class="nav-item">
                            <a class="nav-link" href="#login" data-bs-toggle="modal"
                               data-bs-target="#loginModal">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#register" data-bs-toggle="modal"
                               data-bs-target="#registrationModal">Registration</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset(Session::get('user_image')) }}" height="30" width="30" class="border border-secondary" style="border-radius: 50%" alt="">
                                {{ Session::get('user_name') }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>








@include('blog.blog-js')
