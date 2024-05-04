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

<section class="mt-2">
    <div class="container">
        <div class="row py-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div class="col-12">
                                    <input type="text" name="email" required class="form-control" placeholder="Blog Title" aria-label="Username"
                                           aria-describedby="basic-addon1">
                                </div>
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div id="summernote"><p>Hello Summernote</p></div>
                                <div class="col-12">
                                    <textarea id="summernote" placeholder="Blog Contents Here...." name="description"></textarea>
                                </div>
                                @error('email')
                                <div class="text-danger">{{ $description }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" multiple name="images[]">
                                        @error('email')
                                        <div class="text-danger">{{ $image }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success w-50 float-end">Post</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if(Session::get('user_id'))
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="p-2">
                            <img src="{{ asset($user->image) }}" class="card-img-top border border-secondary"  width="150" style="border-radius: 50%" alt="...">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text text-muted">{{ $user->profession }}</p>
                            {{--                        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <img src="" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>






@include('blog.blog-js')
