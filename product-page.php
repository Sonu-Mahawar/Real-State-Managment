<?php require 'include/config.php' ?>

<?php

$select = $conn->query("SELECT * FROM product_page");
$select->execute();

$product_page = $select->fetchAll(PDO::FETCH_OBJ);

?>


<!DOCTYPE html>
<html lang="en">
<?php include 'include/head-link.php' ?>

<body>
    <div class="container-xxl bg-white p-0">

        <?php include 'include/navbar.php' ?>
        <?php include 'include/home/search-form.php' ?>

        <?php foreach ($product_page as $page_con) : ?>
            <!-- Header Start -->
            <div class="container-fluid header bg-white p-0">
                <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                    <div class="col-md-6 p-5 mt-lg-5">
                        <h1 class="display-5 animated fadeIn mb-4"><?php echo $page_con->home_name; ?></h1>
                        <nav aria-label="breadcrumb animated fadeIn">
                            <ol class="breadcrumb text-uppercase">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                <li class="breadcrumb-item text-body active" aria-current="page"><?php echo $page_con->home_name; ?></li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 animated fadeIn">
                        <img class="img-fluid" src="img/property-1.jpg" alt="property-1">
                    </div>
                </div>
            </div>
            <!-- Header End -->

            <div class="container-xxl py-5">
                <div class="container">
                    <div class="bg-light rounded p-3">
                        <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                            <div class="row g-5 align-items-center">
                                <div class="col-lg-6 wow fadeIn position-relative" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
                                    <img class="img-fluid rounded w-100" src="img/property-1.jpg" alt="">
                                    <div class="rounded text-white position-absolute start-0 top-0 m-4 py-2 px-4 <?php if($page_con->type == "Sale"): echo "bg-primary"; else: echo "bg-danger"; endif; ?>"><?php echo $page_con->type; ?></div>
                                </div>
                                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
                                    <div class="mb-4">
                                        <h4 class="mb-3"><?php echo $page_con->home_type; ?></h4>
                                        <h3 class="mb-3">$<?php echo $page_con->home_price; ?></h3>
                                        <h2 class="mb-3"><?php echo $page_con->home_name; ?></h2>
                                        <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $page_con->home_location; ?></p>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $page_con->home_sqft; ?> Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $page_con->home_beds; ?> Bed</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $page_con->home_bath; ?> Bath</small>
                                            <small class="flex-fill text-center py-2"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo $page_con->home_year_built; ?></small>
                                        </div>
                                    </div>
                                    <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A Call</a>
                                    <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get
                                        Appoinment</a>
                                </div>
                                <div class="col-12">
                                    <h2 class="mb-3">Discription</h2>
                                    <p><?php echo $page_con->discription; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- Search Start -->
        <!-- Search End -->

        <?php include 'include/footer.php' ?>

    </div>
</body>

</html>