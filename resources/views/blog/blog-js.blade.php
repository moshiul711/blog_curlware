<script src="{{ asset('/') }}assets/js/bundle.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script src="{{ asset('/') }}assets/js/summernote1.js"></script>
<script src="{{ asset('/') }}assets/js/summernote.js"></script>

{{--<!-- WYSIWYG Editor JS -->--}}
{{--<script src="{{ asset('/') }}assets/js/jquery.richtext.js"></script>--}}
{{--<script src="{{ asset('/') }}assets/js/wysiwyag.js"></script>--}}

{{--<!-- FORMEDITOR JS -->--}}
{{--<script src="{{ asset('/') }}assets/js/quill.min.js"></script>--}}
{{--<script src="{{ asset('/') }}assets/js/form-editor2.js"></script>--}}
{!! Toastr::message() !!}

@if(session('success'))
    <script>
        Command: toastr["success"]("{{ session('success') }}")

        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endif


<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Blog Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-regular fa-envelope"></i></span>
                            <input type="text" name="email" required class="form-control" placeholder="Email" aria-label="Username"
                                   aria-describedby="basic-addon1">
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" name="password" required placeholder="Password" class="form-control"
                                   id="exampleInputPassword1">
                        </div>
                        @error('password')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="float-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user"></i></span>
                            <input type="text" required class="form-control" name="name" placeholder="Name"
                                   aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-regular fa-envelope"></i></span>
                            <input type="email" required class="form-control" name="email" placeholder="Email"
                                   aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputProfession" class="form-label">Profession</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user-tie"></i></span>
                            <input type="text" required class="form-control" name="profession" placeholder="Profession"
                                   aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-lock"></i></span>
                            <input type="password" required placeholder="Password" class="form-control" name="password"
                                   id="exampleInputPassword1">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputFile" class="form-label">Profile Picture</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-image"></i></span>
                            <input type="file" required class="form-control" id="exampleInputFile" name="image">
                        </div>
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="float-end">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Registration</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
