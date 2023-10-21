<?php require 'include/config.php' ?>
<?php
$select = $conn->query("SELECT * FROM product_page");
$select->execute();
$product_page = $select->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {
    $home_type = $_POST['types'];
    $cities = $_POST['cities'];
    $type = $_POST['offers'];

    $search = $conn->query("SELECT * FROM product_page WHERE home_type LIKE '%$home_type%' AND sale_type LIKE '%$type%' OR home_location LIKE '%$cities%'");

    $search->execute();

    $listing = $search->fetchAll(PDO::FETCH_OBJ);
} else {
    header("location:index.php");
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

        <!-- Search Start -->
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form method="POST" action="search-form.php" class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <select name="types" class="form-select border-0 py-3">
                                    <option selected>Property Type</option>
                                    <option value="Appartment">Appartment</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Office">Office</option>
                                    <option value="Building">Building</option>
                                    <option value="Home">Home</option>
                                    <option value="Shop">Shop</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="cities" class="form-select border-0 py-3">
                                    <option selected>Location</option>
                                    <option value="london">London</option>
                                    <option value="germany">Germany</option>
                                    <option value="india">India</option>
                                    <option value="america">America</option>
                                    <option value="japan">Japan</option>
                                    <option value="new york">New York</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="offers" class="form-select border-0 py-3">
                                    <option selected>Offer Type</option>
                                    <option value="sale">Sale</option>
                                    <option value="rent">Rent</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100 py-3" name="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Search End -->


        <!-- Property List Start -->

        <div class="container-xxl py-5">
            <div class="container">
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php if (count($listing) > 0) : ?>
                                <?php foreach ($listing as $search_list) : ?>
                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="property-item rounded overflow-hidden">
                                            <div class="position-relative overflow-hidden">
                                                <a href=""><img class="img-fluid" src="img/<?php echo $search_list->home_image; ?>" alt=""></a>
                                                <div class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 
                                        <?php if ($search_list->sale_type == "Sale") : echo "bg-primary";
                                        else : echo "bg-danger";
                                        endif; ?>"><?php echo $search_list->sale_type; ?></div>
                                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"><?php echo $search_list->home_type; ?></div>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <h5 class="text-primary mb-3">$<?php echo $search_list->home_price; ?></h5>
                                                <a class="d-block h5 mb-2" href="details.php?id=<?php echo $search_list->id; ?>"><?php echo $search_list->home_name; ?></a>
                                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i><?php echo $search_list->home_location; ?></p>
                                            </div>
                                            <div class="d-flex border-top">
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i><?php echo $search_list->home_sqft; ?> Sqft</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i><?php echo $search_list->home_beds; ?> Bed</small>
                                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bath text-primary me-2"></i><?php echo $search_list->home_bath; ?> Bath</small>
                                                <small class="flex-fill text-center py-2"><i class="far fa-calendar-alt text-primary me-2"></i> <?php echo $search_list->home_year_built; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="bg-success text-white d-flex justify-content-center align-items-center w-100">
                                    Property not Found
                                </div>
                                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                    <a class="btn btn-primary py-3 px-5" href="">Browse More Property</a>
                                </div>
                            <?php endif ?>
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