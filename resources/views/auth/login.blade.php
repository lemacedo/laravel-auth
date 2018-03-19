<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 col-md-offset-4 text-center">
                <h1>Login page</h1>
                <pre>{{ var_dump($errors) }}</pre>
                <pre>{{ var_dump(session('fail')) }}</pre>

                <form action="/auth/login" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" value="{{ old('email')  }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label><input type="checkbox" name="remember"> Remember </label>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>