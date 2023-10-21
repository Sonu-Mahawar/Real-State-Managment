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

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-6 p-5 mt-lg-5">
                    <h1 class="display-5 animated fadeIn mb-4">Property List</h1>
                    <nav aria-label="breadcrumb animated fadeIn">
                        <ol class="breadcrumb text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-body active" aria-current="page">Property List</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-md-6 animated fadeIn">
                    <img class="img-fluid" src="img/header.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- Header End -->

        <?php include 'include/home/search-form.php' ?>

        <!-- Property List Start -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-0 gx-5 align-items-end">
                    <div class="col-lg-6">
                        <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                            <h1 class="mb-3">Property Listing</h1>
                            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                            </li>
                            <li class="nav-item me-0">
                                <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php foreach ($product_page as $page_con) : ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="img/<?php echo $page_con->home_image; ?>" alt=""></a>
                                            <div class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 
                                    <?php if ($page_con->type == "Sale") : echo "bg-primary";
                                    else : echo "bg-danger";
                                    endif; ?>"><?php echo $page_con->type; ?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $page_con->home_type; ?></div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$<?php echo $page_con->home_price; ?></h5>
                                            <a class="d-block h5 mb-2" href=""><?php echo $page_con->home_name; ?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $page_con->home_location; ?></p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $page_con->home_sqft; ?> Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $page_con->home_beds; ?> Bed</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $page_con->home_bath; ?> Bath</small>
                                            <small class="flex-fill text-center py-2"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo $page_con->home_year_built; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <?php foreach ($product_page as $page_con) : ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="img/<?php echo $page_con->home_image; ?>" alt=""></a>
                                            <div class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 
                                    <?php if ($page_con->type == "Sale") : echo "bg-primary";
                                    else : echo "bg-danger";
                                    endif; ?>"><?php echo $page_con->type; ?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $page_con->home_type; ?></div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$<?php echo $page_con->home_price; ?></h5>
                                            <a class="d-block h5 mb-2" href=""><?php echo $page_con->home_name; ?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $page_con->home_location; ?></p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $page_con->home_sqft; ?> Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $page_con->home_beds; ?> Bed</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $page_con->home_bath; ?> Bath</small>
                                            <small class="flex-fill text-center py-2"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo $page_con->home_year_built; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-12 text-center">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <?php foreach ($product_page as $page_con) : ?>
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="img/<?php echo $page_con->home_image; ?>" alt=""></a>
                                            <div class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 
                                    <?php if ($page_con->sale_type == "Sale") : echo "bg-primary";
                                    else : echo "bg-danger";
                                    endif; ?>"><?php echo $page_con->sale_type; ?></div>
                                            <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $page_con->home_type; ?></div>
                                        </div>
                                        <div class="p-4 pb-0">
                                            <h5 class="text-primary mb-3">$<?php echo $page_con->home_price; ?></h5>
                                            <a class="d-block h5 mb-2" href=""><?php echo $page_con->home_name; ?></a>
                                            <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $page_con->home_location; ?></p>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $page_con->home_sqft; ?> Sqft</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $page_con->home_beds; ?> Bed</small>
                                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $page_con->home_bath; ?> Bath</small>
                                            <small class="flex-fill text-center py-2"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo $page_con->home_year_built; ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="col-12 text-center">
                                <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Property List End -->


        <?php include 'include/footer.php' ?>

    </div>
</body>

</html>