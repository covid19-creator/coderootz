<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="login-form ">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center vh-100">
                <div class="col-md-3">
                    <div class="card mt-5">
                        <h3 class="card-header text-center">Login</h3>
                        <div class="card-body">
                            <form method="POST" action="{{ route('customLogin') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                    @if ($errors->has('emailPassword'))
                                        <span class="text-danger">{{ $errors->first('emailPassword') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid mb-3">
                                    <button type="submit" class="btn btn-dark btn-block">Sign in</button>
                                </div>
                            </form>

                            <div class="d-grid">
                                <a href="{{ route('register-user') }}" class="btn btn-primary btn-block">Register</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
