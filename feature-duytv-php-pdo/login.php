<?php
session_start();
require_once "./db.php";
require_once "./local.php"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center">
            Login
        </h2>
        <?php if (isset($_GET['msg'])) : ?>
            <div class="text-center"><?= $_GET['msg'] ?></div>
        <?php endif ?>
        <form action="<?= BASE_URL ?>LoginPdo.php " method="post">
            <div class="mb-3">
                <label for="exampleDropdownFormEmail1" class="form-label">Email address</label>
                <input type="email" name="mail" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
                <?php if (isset($_GET['mailErr'])) : ?>
                    <span class="text-danger"><?= $_GET['mailErr'] ?></span>
                <?php endif ?>
            </div>
            <div class="mb-3">
                <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                <?php /* if (isset($_GET['passwordErr'])) : ?>
                    <span class="text-danger"><?= $_GET['passwordErr'] ?></span>
                <?php endif */ ?>
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="dropdownCheck2" name="remeber">
                    <label class="form-check-label" for="dropdownCheck2">
                        Remember me
                    </label>
                </div>
            </div>
            <button ype="submit" name="btnLogin" class="btn btn-primary">Sign in</button>
        </form>
    </div>
</body>

</html>