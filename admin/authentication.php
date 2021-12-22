<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/authentication.css">
    <title>Verify Yourself - Yoginee</title>
</head>

<body>
    <!-- <div class="container">
        <h1>Login to Continue</h1>
    </div> -->
    <main class="form-signin">
        <div class="container text-center " >
            <form class="my-3" method="post" action="operation/signin-process.php">
                <img class="mb-4" src="images/logo-mini.svg" alt="" width="100" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

                <div class="form-floating my-2">
                    <input type="email" class="form-control" id="floatingInput" name="emial" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <!-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->
                <button class="w-100 btn btn-lg btn-primary" name="subBtn" type="submit">Sign in</button>
                <p class="mt-2 mb-3 text-muted"><a href="#">Create an account</a>  | <a href="#">Forgot password</a> </p>
                <p class="mt-5 mb-3 text-muted">Yoginee © 2021-2022</p>
            </form>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>