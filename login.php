<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        body{
            font-family: kanit;
        }

        .social-login>span {
            white-space: nowrap;
        }

        .social-icons {
            display: flex;
            gap: 10px;
        }

        .social-icons button {
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .social-icons button.facebook {
            background-color: #1877f2;
        }

        .social-icons button.facebook:hover {
            background-color: #165ec9;
        }

        .social-icons button.twitter {
            background-color: #1da1f2;
        }

        .social-icons button.twitter:hover {
            background-color: #198ddb;
        }

        .social-icons button.google {
            background-color: #db4437;
        }

        .social-icons button.google:hover {
            background-color: #c33c2e;
        }


        @media (max-width: 576px) {
            .login-container {
                flex-direction: column;
                margin: 20px auto;
                min-height: unset;
            }

            .login-image {
                width: 100%;
                height: 180px;
                border-radius: 15px 15px 0 0;
            }

            .login-form {
                padding: 20px;
            }

            .login-form h2 {
                font-size: 1.3rem;
                text-align: center;
            }

            .form-control {
                font-size: 0.9rem;
            }

            .btn-login {
                font-size: 0.9rem;
                padding: 10px;
            }

            .social-login {
                flex-direction: column;
                align-items: center;
            }

            .social-icons {
                justify-content: center;
            }
        }
        html, body {
    height: auto;
    min-height: 100vh;
}

    </style>
</head>

<body style="background-color: darkgrey;">
    <div class="container ">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-6 col-xl-4">
                <div class="bg-white p-4 shadow rounded">
                    <H1 class="text-center mb-4" style="font-size: 5rem;"><i class="bi bi-person-bounding-box"></i></H1>
                    <form action="check_login.php" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text"name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="password"name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div class="d-grid mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
