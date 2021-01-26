<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coffee-O-Meter</title>
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/coffeeometer.css" rel="stylesheet" />
    <link href="css/coffeeometer-login.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a87208e9ea.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">

                        <h5 class="card-title text-center">
                        <i class="fas fa-mug-hot fa-5x"></i>
                        </h5>

                        <form class="form-signin" action="validate-login.php" method="post">

                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                                <label for="email">Email</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required>
                                <label for="password">Senha</label>
                            </div>

                            <button class="btn btn-lg btn-dark btn-block text-uppercase" type="submit">Login</button>
			  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>