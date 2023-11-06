<?php
include("./controllers/LoginController.php");

if (isset($_POST['submit'])) {
    $register = new LoginController($_POST);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #04364A;
        }
        .container {
            background-color: #176B87;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .btn-primary {
            background-color: #64CCC5;
            border-color: #64CCC5;
        }
        .btn-primary:hover {
            background-color: #DAFFFB;
            border-color: #DAFFFB;
        }
        .link-opacity-50-hover:hover {
            color: #DAFFFB;
        }
    </style>
</head>

<body>
    <div class="container col-lg-4">
        <h1 class="text-center my-4" style="color: #DAFFFB;">SIGN IN</h1>

        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-info' role='alert' style='background-color: #DAFFFB; color: #04364A;'>$_GET[message]</div>";
        }
        ?>

        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label" style="color: #DAFFFB;">Username (NIM)</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="color: #DAFFFB;">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Login</button>
        </form>
        <p style="color: #DAFFFB;">Belum punya akun?
            <a href="./register.php" class="link-opacity-50-hover" style="color: #04364A;">Daftar di sini!</a>
        </p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
