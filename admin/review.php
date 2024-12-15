<?php
    include_once 'header.php';
include_once '../conn.php';
?>
<div class="container mt-5 pt-2">
    <!-- Title and Button Row -->
    <div class="row mt-5 mb-4">
        <div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
            <h2 class="text-center text-md-left">Manage Reviews</h2>
        </div>
    </div>

    <!-- Table for Categories -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <!-- Update the thead class to 'thead-dark' -->
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Sr no</th>
                            <th scope="col">Review Id</th>
                            <th scope="col">User Name</th>
                            <th scope="col">User Email</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Review</th>
                            <th scope="col">Review Date</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = "select * from review_tbl";
                        $result = mysqli_query($con, $q);
                        $srno=1;
                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                        <tr>
                            <td><?php echo $srno++; ?></td>
                            <td><?php echo $r['r_id']; ?></td>
                            <td><?php echo $r['r_username']; ?></td>
                            <td><?php echo $r['r_email']; ?></td>
                            <td><?php echo $r['r_p_code']; ?></td>
                            <td><?php echo $r['r_rating']; ?></td>
                            <td><?php echo $r['r_review']; ?></td>
                            <td><?php echo $r['r_date']; ?></td>
                            <td><form method="POST" action="">
                                    <input type="hidden" name="delete_id" value="<?php echo $r['r_id']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this record?');">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
// delete review
if (isset($_POST['delete'])) {
    $delete_id = $_POST['delete_id'];
    $delete_query = "delete from review_tbl where r_id = '$delete_id'";
    if (mysqli_query($con, $delete_query)) {
        echo "<script>confirm('Record deleted successfully');</script>";
    } else {
        echo "<script>confirm('Error deleting record');</script>";
    }
    echo "<script>window.location.href = 'review.php';</script>";
}
?>