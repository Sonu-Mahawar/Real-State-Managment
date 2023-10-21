<?php require 'include/config.php' ?>

<?php 

if (isset($_SESSION['username'])) {
    header('location:index.php');
}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script>alert("Empty file");</script>';
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = $conn->query("SELECT * FROM users WHERE username='$username'");
        $login->execute();

        /* fetch */
        $fetch = $login->fetch(PDO::FETCH_ASSOC);

        if ($login->rowCount() > 0) {
            /*  echo $login->rowCount();
            echo "Username not found"; */
            if (password_verify($email, $fetch['email'])) {
                if (password_verify($password, $fetch['mypassword'])) {
                    echo "<script>alert('Login Successfully');</script>";
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['user_ID'] = $fetch['id'];
                    /*     header("location:index.php"); */
?>
                    <script>
                        setTimeout(function() {
                            window.location.href = "index.php";
                        }, 0);
                    </script>
<?php
                } else {
                    echo '<script>alert("Password is Wrong");</script>';
                }
            } else {
                echo "<script>alert('Email is wrong');</script>";
            }
        } else {
            echo "<script>alert('username is wrong');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include 'include/head-link.php' ?>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include 'include/navbar.php' ?>
        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Login Form</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Login Form</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-fluid  bg_new">
            <div class="row justify-content-center ">
                <div class="col-4">
                    <form class="registeration_form" method="POST">
                        <h3 class="text-center mb-4">Login Form</h3>
                        <div class="mb-3">
                            <input type="txt" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include 'include/footer.php' ?>
    </div>
</body>

</html>