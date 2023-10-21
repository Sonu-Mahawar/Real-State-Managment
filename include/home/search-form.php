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