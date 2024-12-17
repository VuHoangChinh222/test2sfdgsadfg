<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"
        integrity="sha512-6S2HWzVFxruDlZxI3sXOZZ4/eJ8AcxkQH1+JjSe/ONCEqR9L4Ysq5JdT5ipqtzU7WHalNwzwBv+iE51gNHJNqQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Register</title>
    <style>
        .khung {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
        }

        .boxlogin {
            max-width: 90%;
            min-width: 90%;
            background: white;
            display: block;
            padding: 20px;
            border-radius: 17px;
        }

        .btn {
            width: 70%;
            background-image: linear-gradient(to top, #f05053 0%, #e1eec3 100%);
            color: white;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="khung">
        <div class="boxlogin">
            <h1 class="text-center">Register</h1>
            <form action="{{ route('website.doRegister') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="name">
                            <strong>Full name</strong>
                        </label>
                        <input type="text" id="name" class="form-control" placeholder="Enter your full name"
                            name="name">
                        @error('name')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="username">
                            <strong>Username</strong>
                        </label>
                        <input type="text" id="username" class="form-control" placeholder="Enter username"
                            name="username">
                        @error('username')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="email">
                            <strong>Email</strong>
                        </label>
                        <input type="email" id="email" class="form-control" placeholder="Enter email"
                            name="email">
                        @error('email')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="password">
                            <strong>Password</strong>
                        </label>
                        <input type="password" id="password" class="form-control" placeholder="Enter password "
                            name="password">
                        @error('password')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="rePassword">
                            <strong>Confirm password</strong>
                        </label>
                        <input type="password" id="rePassword" class="form-control" placeholder="Confirm password"
                            name="rePassword">
                        @error('rePassword')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label for="phone">
                            <strong>Phone</strong>
                        </label>
                        <input type="text" id="phone" class="form-control" placeholder="Enter phone"
                            name="phone">
                        @error('phone')
                            <span class="text-danger"> {{ $message }} </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="address">
                            <strong>Address</strong>
                        </label>
                        <textarea id="address" rows="5" class="form-control" placeholder="Enter address" name="address"></textarea>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="row">
                            <div class="col-12">
                                <label for="gender">
                                    <strong>Gender</strong>
                                </label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="image">
                                    <strong>Image</strong>
                                </label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn">Sign up</button>
                </div>
            </form>
        </div>
    </div>

    <script src={{ asset('jquery/jquery-3.7.1.min.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"
        integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "processBar": true,
                "closeButton": true
            }
            toastr.error("{{ Session::get('message') }}");
        </script>
    @endif
</body>

</html>
