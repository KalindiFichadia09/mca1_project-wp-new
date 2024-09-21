<?php
    include_once 'header.php';
?>

<!-- Image Carousel-start -->
<div id="jewelryCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="../images/carouselImg1.png" class="d-block w-100" alt="Jewelry Image 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Try Something New</h5>
                <p>Explore our latest pieces</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../images/carouselImg2.png" class="d-block w-100" alt="Jewelry Image 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Elegance Redefined</h5>
                <p>Discover our exclusive collection</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="../images/carouselImg3.png" class="d-block w-100" alt="Jewelry Image 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Timeless Beauty</h5>
                <p>Find your perfect piece</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev carousel-button" type="button" data-bs-target="#jewelryCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next carousel-button" type="button" data-bs-target="#jewelryCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Image Carousel-end -->
<br/>
<!-- categories-start -->
<section class="popular-categories">
  <h2>Popular Categories</h2>
  <div class="categories-container">
  <a href="product.php">
      <div class="category">
          <img src="../images/category1.jpg" alt="Category 1">
          <h3>Category 1</h3>
      </div>
    </a>
    <a href="product.php">
      <div class="category">
          <img src="../images/category2.jpg" alt="Category 1">
          <h3>Category 2</h3>
      </div>
    </a>
    <a href="product.php">
      <div class="category">
          <img src="../images/category3.jpg" alt="Category 1">
          <h3>Category 3</h3>
      </div>
    </a>
    <a href="product.php">
      <div class="category">
          <img src="../images/category4.jpg" alt="Category 1">
          <h3>Category 4</h3>
      </div>
    </a>
    <a href="product.php">
      <div class="category">
          <img src="../images/category1.jpg" alt="Category 1">
          <h3>Category 1</h3>
      </div>
    </a>
  </div>
</section>
<!-- categories-end -->

<!-- new arrival - start -->
<section class="new-arrivals">
  <h2>New Arrivals</h2>
  <div class="arrivals-container">
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg1.jpg" alt="New Arrival 1">
        <h3>Product 1</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg2.jpg" alt="New Arrival 1">
        <h3>Product 2</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg3.jpg" alt="New Arrival 1">
        <h3>Product 3</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg4.jpg" alt="New Arrival 1">
        <h3>Product 4</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
  </div>
</section>
<!-- new arrival - end -->

<!-- featured product - start -->
<section class="new-arrivals">
  <h2>Featured Product</h2>
  <div class="arrivals-container">
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg1.jpg" alt="New Arrival 1">
        <h3>Product 1</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg2.jpg" alt="New Arrival 1">
        <h3>Product 2</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg3.jpg" alt="New Arrival 1">
        <h3>Product 3</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
    <a href="single-product.php">
      <div class="arrival-item">
        <img src="../images/newArrivalImg4.jpg" alt="New Arrival 1">
        <h3>Product 4</h3>
        <p class="price">₹ 49.99</p>
        <button class="buy-now">Buy Now</button>
      </div>
    </a>
  </div>
</section>
<!-- featured product - end -->

<?php
    include_once 'footer.php';
?>