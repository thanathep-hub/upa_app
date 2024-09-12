<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UPA</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            font-family: "Kanit", sans-serif;
            box-sizing: border-box;
            margin: 0;
            background-color: #f9fafb;
        }

        .container {
            height: 100dvh;
            align-content: center;
        }

        .row {
            justify-content: center;
        }

        .card {
            max-width: 400px;
        }

        .btn-login {
            background-color: #0094ff;
            border: #0094ff;
        }

        .feedback {
            color: #003fb1 !important;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="card p-4 shadow-lg border-0">
                <div class="image-logo text-center mb-3">
                    <img src="{{ asset('auth/logo-upa.png') }}" alt="" height="100px">
                </div>
                <form method="post" action="/login">
                    @csrf
                    <div class="title mb-3 border-bottom">
                        <h5 style="color:#003fb1;font-weight: bold;">เข้าสู่ระบบด้วย ERP</h5>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="user" name="username"
                            placeholder="รหัสผู้ใช้">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="รหัสผ่าน">
                    </div>
                    <div class="feedback mb-3 text-end">
                        <a href="#" class="feedback" style="font-size: 14px;">หากพบปัญหาติดต่อฝ่ายไอที</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 btn-login"
                        style="font-weight: bold;">เข้าสู่ระบบ</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
