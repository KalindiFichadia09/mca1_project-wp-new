<?php
include_once 'header.php';
include_once '../conn.php';
?>

<!-- categories-start -->
<section class="popular-categories">
  <div class="row align-items-center mb-3">
    <!-- Left Side: Title -->
    <div class="col-md-3">
      <h2 class="mb-0">Categories</h2>
    </div>

    <!-- Middle: Category Dropdown -->
    <div class="col-md-3">
      <form action="" method="GET">
        <select name="c_code" id="category" class="form-select form-select-sm" onchange="this.form.submit()">
          <option value="">Select Category</option>
          <?php
          // Fetch categories based on gender filter
          $gender_filter = isset($_GET['gender']) ? $_GET['gender'] : '';
          $query = "SELECT * FROM category_tbl WHERE c_status='Active'";
          if ($gender_filter && $gender_filter !== 'all') {
            $query .= " AND c_gender='$gender_filter'";
          }
          $query .= " ORDER BY c_id DESC";
          $result = mysqli_query($con, $query);

          while ($r = mysqli_fetch_assoc($result)) {
            $selected = (isset($_GET['c_code']) && $_GET['c_code'] == $r['c_code']) ? 'selected' : '';
            echo "<option value='{$r['c_code']}' $selected>{$r['c_name']} ({$r['c_gender']})</option>";
          }
          ?>
        </select>
      </form>
    </div>

    <!-- Right Side: Gender and Search Filters -->
    <div class="col-md-6">
      <form action="" method="GET" class="d-flex justify-content-end gap-2">
        <!-- Keep category selected when filtering -->
        <input type="hidden" name="c_code" value="<?php echo isset($_GET['c_code']) ? $_GET['c_code'] : ''; ?>">

        <!-- Gender Dropdown -->
        <select name="gender" id="gender" class="form-select form-select-sm" onchange="this.form.submit()">
          <option value="">Select Gender</option>
          <option value="all" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'all') ? 'selected' : ''; ?>>All</option>
          <option value="male" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'male') ? 'selected' : ''; ?>>Male</option>
          <option value="female" <?php echo (isset($_GET['gender']) && $_GET['gender'] == 'female') ? 'selected' : ''; ?>>Female</option>
        </select>

        <!-- Search Box -->
        <input type="text" name="search" placeholder="Search categories..." class="form-control form-control-sm"
          style="width: auto;" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
          oninput="this.form.submit()">
      </form>
    </div>
  </div>

  <!-- Subcategories Display -->
  <div class="categories-container">
    <?php
    // Get filter values
    $c_code = isset($_GET['c_code']) ? $_GET['c_code'] : '';
    $gender_filter = isset($_GET['gender']) ? $_GET['gender'] : '';
    $search_filter = isset($_GET['search']) ? $_GET['search'] : '';

    // Base query
    $q = "SELECT * FROM sub_category_tbl WHERE sc_status='Active'";

    // Apply category filter if selected
    if ($c_code) {
      $q .= " AND c_code='$c_code'";
    }

    // Apply gender filter if selected and not "all"
    if ($gender_filter && $gender_filter !== 'all') {
      $q .= " AND c_code IN (SELECT c_code FROM category_tbl WHERE c_gender='$gender_filter' AND c_status='Active')";
    }

    // Apply search filter if entered
    if ($search_filter) {
      $q .= " AND sc_name LIKE '%$search_filter%'";
    }

    // Execute query
    $result = mysqli_query($con, $q);

    // Check if any subcategories exist
    if (mysqli_num_rows($result) > 0) {
      while ($r = mysqli_fetch_assoc($result)) {
        ?>
        <a href="product.php?sc_code=<?php echo $r['sc_code']; ?>">
          <div class="category">
            <img src="<?php echo $r['sc_image']; ?>" alt="<?php echo $r['sc_name']; ?>">
            <h3><?php echo $r['sc_name']; ?></h3>
          </div>
        </a>
        <?php
      }
    } else {
      echo "<p class='text-center'>No subcategories found.</p>";
    }
    ?>
  </div>
</section>
<!-- categories-end -->

<?php
include('footer.php');
?>
