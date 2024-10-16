<?php
    include_once 'header.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Cart</h2>
        </div>
    </div>

     <!-- search form -->
     <div class="d-flex justify-content-between align-items-center mb-3">
    <!-- Search Form -->
    <form method="GET" action="" class="d-flex align-items-center">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search here" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <div class="input-group-append">
                <button class="btn btn-dark" type="submit">Search</button>
            </div>
        </div>
    </form>
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
                            <th scope="col">User Id</th>
                            <th scope="col">Product Id</th>
                            <th scope="col">Product Amount</th>
                        </tr>
                    </thead>

                    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>CRT001</td>
                            <td>USR101</td>
                            <td>PRD005</td>
                            <td>₹ 50,000</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>CRT002</td>
                            <td>USR105</td>
                            <td>PRD010</td>
                            <td>₹ 70,000</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>CRT003</td>
                            <td>USR110</td>
                            <td>PRD001</td>
                            <td>₹ 40,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" >
                    <div class="col-md-5"></div>
                <nav class="col-md-2"> 
                    <ul class="pagination">
                    <?php
                    if ($page > 1) {
                        echo "<li class='page-item'><a class='page-link btn-dark' href='?page=" . ($page - 1) . "&search=" . $search . "'><i class='fa fa-chevron-left'></i></a></li>";
                    }
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                    }
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
