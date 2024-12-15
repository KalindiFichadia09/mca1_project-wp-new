<?php
include_once 'header.php';
include_once '../conn.php';
session_start();
if (!isset($_SESSION['user_username'])) {
    $eml = $_SESSION['user_username'];
    ?>
    <script>
        window.location.href = "../index.php";
    </script>
    <?php
    exit();
} else {
    $eml = $_SESSION['user_username'];
    $q = "select * from order_tbl where o_username = '$eml' ";
    $result = mysqli_query($con, $q);
    $srno = 1;
    ?>
    <section class="cart-section py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Order History</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Order Number</th>
                            <th>Status</th>
                            <th>Total Amount</th>
                            <th>Payment Mode</th>
                            <th>Order Date</th>
                            <th>Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($r = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $srno++; ?></td>
                                <td><?php echo $r['o_order_id']; ?></td>
                                <td><?php echo $r['o_delivery_status']; ?></td>
                                <td>₹<?php echo $r['o_total_amount']; ?></td>
                                <td><?php echo $r['o_payment_mode']; ?></td>
                                <td><?php echo $r['o_date']; ?></td>
                                <!-- <td><img src="../images/product1(1).jpeg" alt="Product Image" class="img-thumbnail"
                                        style="width: 100px;"></td> -->
                                <td><a href="order-detail.php?o_id=<?php echo $r['o_id']; ?>" class="btn btn-info btn-sm">View
                                        Details</a></td>
                            </tr>
                        <?php } ?>
                        <!-- <tr>
                                <td>2</td>
                                <td>2024-07-15</td>
                                <td>#ORD12344</td>
                                <td>Pending</td>
                                <td>₹799.99</td>
                                <td><img src="../images/product2(1).jpeg" alt="Product Image" class="img-thumbnail"
                                        style="width: 100px;"></td>
                                <td><a href="order-detail.php" class="btn btn-info btn-sm">View Details</a></td>
                            </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <?php
}
include_once('footer.php');
?>