<?php

SESSION_START();

if (isset ($_SESSION['login_user'])) {
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<style>
    .form-control {
        border: 1px solid #ced4da;
        /* Example border color */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        /* Example box-shadow */
    }
</style>

<body>

    <?php include 'include/navbar_login.php'; ?>

    <form method="post" action="login_process.php">

        <?php
        if (isset ($_SESSION['error'])) {
            echo '<script src="js/sweetalert_errorlogin.js"></script>';
            unset($_SESSION['error']);
        }
        ?>
        <div class="container text-center border rounded-4 shadow w-50 my-5">
            <div class="row">
                <div class="col fw-bold py-3 fs-3">
                    ลงชื่อเข้าใช้
                </div>
                <hr class="hr" />
            </div>
            <div class="container text-center pt-5">
                <div class="form-floating w-50 d-inline-block">
                    <input type="text" name="email" class="form-control rounded-pill" id="floatingInput"
                        placeholder="name@example.com">
                    <label for="floatingInput">อีเมล์หรือชื่อผู้ใช้</label>
                </div>
            </div>
            <div class="container text-center pt-3">
                <div class="form-floating w-50 d-inline-block">
                    <input type="password" name="password" class="form-control rounded-pill" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">รหัสผ่าน</label>
                </div>
            </div>

            <button class="btn w-25 py-2 fw-bold rounded-pill mt-5" type="submit"
                style="background-color: #EF959D">ลงชื่อเข้าใช้</button>
            <p class="mt-5 mb-5 text-body-secondary">ยังไม่มีบัญชี?<a href="register.php">สมัครบัญชี</a></p>
        </div>

    </form>




</body>

</html>