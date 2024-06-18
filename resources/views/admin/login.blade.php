
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{asset('assets/js/jquery-3.6.4.min.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .form-login {
            border-left: 1px solid #ccc;
        }
        @media only screen and (max-width:800px) {
            .form-login {
                border-left: none;
                border-top: 1px solid #ccc;
            }
        }
    </style>
</head>
<body>

<div class="container pt-5">
    <h2 class="text-center mb-5">Trang dành cho quản trị viên</h2>
    <div class="row mb-5 shadow p-3 bg-white rounded">
        <div class="col-12 col-lg-6">
            <img class="w-100" src="{{asset('web/images/logo.png')}}" alt="">
        </div>
        <div class="col-12 col-lg-6  form-login">
            <h2>Đăng Nhập</h2>
            <form action="{{ route('ad.login') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="remember"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Đăng nhập</button>
            </form>
        </div>
    </div>
</div>
@if(session('error'))
    <div class="error">{{session('error')}}</div>
@endif
</body>
</html>

