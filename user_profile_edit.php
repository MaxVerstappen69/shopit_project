<?php
require_once "db.php"; include 'include/navbar_main.php';
if (!isset($_SESSION['login_user'])) {
  header("Location: login.php"); // หากไม่ได้เข้าสู่ระบบ ให้เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
  exit;
}
$k = $_SESSION['login_user'];
$sql = "SELECT * FROM customer WHERE email='$k'";
$result = $conn->query($sql);
$sqladmid = "SELECT * FROM employee WHERE em_email = '$k';";
$resultadmin = $conn->query($sqladmid);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

  <div class="container text-center border rounded-4 shadow w-50 my-5">
    <div class="row">
      <div class="col fw-bold py-3 fs-3">
        แก้ไขข้อมูลผู้ใช้
      </div>
      <hr class="hr" />
    </div>

    <?php if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <form method="post" action="user_profile_edit_process.php" enctype="multipart/form-data">
          <?php
          if (isset($_SESSION['error'])) {
            echo '<script src="js/sweetalert_error.js"></script>';
            unset($_SESSION['error']);
          }
          ?>
          <?php
          if (isset($_SESSION['success'])) {
            echo '<script src="js/sweetalert_successEdit.js"></script>';
            unset($_SESSION['success']);
          }
          ?>
          <?php
          if (isset($_SESSION['currentPassword'])) {
            echo '<script src="js/sweetalert_currentPassword.js"></script>';
            unset($_SESSION['currentPassword']);
          }
          ?>
          <div class="btn-group">
            <img src="data:image/png;base64,<?php echo base64_encode($row['thumbnail']); ?>"
              class="img-fluid rounded-circle" style="width: 100px; height: 100px;" alt="Thumbnail">
          </div>
          <div class="container d-flex justify-content-between text-center pt-5">
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
              <label for="firstname">ชื่อจริง</label>
            </div>
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
              <label for="lastname">นามสกุล</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="text" class="form-control" name="address" value="<?php echo $row['address']; ?>">
              <label for="address">ที่อยู่</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly>
              <label for="email">อีเมล์ (ไม่สามารถแก้ได้)</label>
            </div>
          </div>
          <div class="container d-flex justify-content-between text-center pt-5">
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
              <label for="phone">เบอร์โทรศัพท์</label>
            </div>
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
              <label for="username">ชื่อผู้ใช้งาน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="password" class="form-control" name="new_password" placeholder="New Password">
              <label for="new_password">รหัสผ่าน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
              <label for="confirm_password">ยืนยันรหัสผ่าน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <label for="profile_picture" class="form-label">เลือกรูปภาพโปรไฟล์ใหม่</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
          </div>
          <div class="container pt-5">
            <button class="btn w-25 py-2 fw-bold rounded-pill" type="submit" name="submit"
              style="background-color: #EF959D; margin-bottom:30px;">ยืนยัน</button>
          </div>
        </form>
        <?php
      }
    } ?>

    <?php if (mysqli_num_rows($resultadmin) > 0) {
      while ($rowAdmin = mysqli_fetch_assoc($resultadmin)) {
        ?>
        <form method="post" action="user_profile_edit_process.php" enctype="multipart/form-data">
          <?php
          if (isset($_SESSION['error'])) {
            echo '<script src="js/sweetalert_error.js"></script>';
            unset($_SESSION['error']);
          }
          ?>
          <?php
          if (isset($_SESSION['success'])) {
            echo '<script src="js/sweetalert_successEdit.js"></script>';
            unset($_SESSION['success']);
          }
          ?>
          <?php
          if (isset($_SESSION['currentPassword'])) {
            echo '<script src="js/sweetalert_currentPassword.js"></script>';
            unset($_SESSION['currentPassword']);
          }
          ?>
          <div class="btn-group">
            <img src="data:image/png;base64,<?php echo base64_encode($rowAdmin['em_thumbnail']); ?>"
              class="img-fluid rounded-circle" style="width: 100px; height: 100px;" alt="Thumbnail">
          </div>
          <div class="container d-flex justify-content-between text-center pt-5">
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="em_firstname" value="<?php echo $rowAdmin['em_firstname']; ?>">
              <label for="firstname">ชื่อจริง</label>
            </div>
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="em_lastname" value="<?php echo $rowAdmin['em_lastname']; ?>">
              <label for="lastname">นามสกุล</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="email" class="form-control" name="em_email" value="<?php echo $rowAdmin['em_email']; ?>"
                readonly>
              <label for="email">อีเมล์ (ไม่สามารถแก้ได้)</label>
            </div>
          </div>
          <div class="container d-flex justify-content-between text-center pt-5">
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="em_phone" value="<?php echo $rowAdmin['em_phone']; ?>">
              <label for="phone">เบอร์โทรศัพท์</label>
            </div>
            <div class="card form-floating d-inline-block" style="width: 45%">
              <input type="text" class="form-control" name="em_username" value="<?php echo $rowAdmin['em_username']; ?>">
              <label for="username">ชื่อผู้ใช้งาน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="password" class="form-control" name="new_password" placeholder="New Password">
              <label for="new_password">รหัสผ่าน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <div class="card form-floating w-100 d-inline-block">
              <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
              <label for="confirm_password">ยืนยันรหัสผ่าน</label>
            </div>
          </div>
          <div class="container text-center pt-5">
            <label for="profile_picture" class="form-label">เลือกรูปภาพโปรไฟล์ใหม่</label>
            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
          </div>
          <div class="container pt-5">
            <button class="btn w-25 py-2 fw-bold rounded-pill" type="submit" name="submit_admin"
              style="background-color: #EF959D; margin-bottom:30px;">ยืนยัน</button>
          </div>
        </form>
        <?php
      }
    } else {
      echo "";
    } ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>