<?php
include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <div class="row mt-5 mb-4 align-items-center">
        <!-- Title -->
        <div class="col-12 col-md-4 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Cart</h2>
        </div>

        <!-- Search form -->
        <div class="col-12 col-md-4 d-flex justify-content-center mb-2 mb-md-0">
            <form method="GET" action="" class="d-flex w-100">
                <div class="input-group w-100">
                    <input type="text" name="search" class="form-control" placeholder="Search here"
                        value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Table for Cart -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr No</th>
                            <th scope="col">Cart ID</th>
                            <th scope="col">User ID</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Get search keyword if available
                        $search = isset($_GET['search']) ? $_GET['search'] : '';

                        // SQL query to fetch cart records with search condition
                        $search_query = "";
                        if (!empty($search)) {
                            $search_query = "WHERE ct_id LIKE '%$search%' OR ct_username LIKE '%$search%' OR ct_p_code LIKE '%$search%' OR ct_p_tot_price LIKE '%$search%'";
                        }

                        // Count total records for pagination
                        $q_count = "SELECT COUNT(*) AS total FROM cart_tbl $search_query";
                        $result_count = mysqli_query($con, $q_count);
                        $row_count = mysqli_fetch_assoc($result_count);
                        $total_records = $row_count['total'];

                        // Set number of records per page
                        $records_per_page = 3;

                        // Calculate the total number of pages
                        $total_pages = ceil($total_records / $records_per_page);

                        // Get the current page number
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;

                        // Calculate the start record for the current page
                        $start_from = ($page - 1) * $records_per_page;

                        // Fetch cart records with pagination and search query
                        $q = "SELECT * FROM cart_tbl $search_query LIMIT $start_from, $records_per_page";
                        $result = mysqli_query($con, $q);

                        // Loop through cart records and display in table
                        if (mysqli_num_rows($result) > 0) {
                            $sr_no = $start_from + 1; // Row serial number
                            while ($r = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <!-- <td><?php echo $r['ct_id']; ?></td> -->
                                    <td><?php echo $sr_no++; ?></td>
                                    <td><?php echo $r['ct_code']; ?></td>
                                    <td><?php echo $r['ct_username']; ?></td>
                                    <td><?php echo $r['ct_p_code']; ?></td>
                                    <td>₹ <?php echo number_format($r['ct_p_tot_price'], 2); ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='5'>No records found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-md-5"></div>
                <nav class="col-md-2">
                    <ul class="pagination">
                        <?php
                        // Previous page link
                        if ($page > 1) {
                            echo "<li class='page-item'><a class='page-link btn-dark' href='?page=" . ($page - 1) . "&search=" . $search . "'><i class='fa fa-chevron-left'></i></a></li>";
                        }
                        // Page number links
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                        }
                        // Next page link
                        if ($page < $total_pages) {
                            echo "<li class='page-item'><a class='page-link' href='?page=" . ($page + 1) . "&search=" . $search . "'><i class='fa fa-chevron-right'></i></a></li>";
                        }
                        ?>
                    </ul>
                </nav>
                <div class="col-md-5"></div>
            </div>
        </div>
    </div>
</div>
</body>

</html>