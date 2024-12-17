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

    <title>Login</title>
    <style>
        .khung {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
        }

        .boxlogin {
            max-width: 600px;
            min-width: 400px;
            background: white;
            display: block;
            padding: 20px;
            border-radius: 17px;
        }
    </style>
</head>

<body>
    <div class="khung">
        <div class="boxlogin">
            <h1>Login</h1>
            <form action="{{ route('website.doLogin') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username">
                        <strong>Username</strong>
                    </label>
                    <input type="text" id="username" class="form-control" placeholder="Username or email"
                        name="username">
                </div>
                <div class="mb-3">
                    <label for="password">
                        <strong>Password</strong>
                    </label>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-success">Login</button>
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
