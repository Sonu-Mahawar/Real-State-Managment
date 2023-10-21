<?php require 'include/config.php' ?>
<?php if (isset($_SESSION['username'])){
    header('location:index.php');}

if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo '<script>alert("Empty file");</script>';
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $insert = $conn->prepare("INSERT INTO users (username, email, mypassword) VALUES
        (:username, :email, :mypassword)");

        $insert->execute([
            ':username' => $username,
            ':email' => password_hash($email, PASSWORD_DEFAULT),
            ':mypassword' => password_hash($password, PASSWORD_DEFAULT)
        ]);
        header('location:login.php');
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
                    <h1 class="display-5 animated fadeIn mb-4">Regiteration Form</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Regiteration Form</li>
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
                        <h3 class="text-center mb-4">Regiteration Form</h3>
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