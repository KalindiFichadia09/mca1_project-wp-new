<?php
session_start();
include '../conn.php';  // Your database connection file

// Check if data is received via GET request
if (isset($_GET['payment_id']) && isset($_GET['order_id']) && isset($_GET['total_amount']) && isset($_GET['email'])) {
    $payment_id = $_GET['payment_id'];
    $order_id = $_GET['order_id'];
    $total_amount = $_GET['total_amount'];
    $email = $_GET['email'];

    // Fetch cart products directly from the cart_tbl based on the user's email
    $query = "SELECT * FROM cart_tbl WHERE ct_username = '$email'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
        // Assuming customer address and other details are stored in session
        $address = $_SESSION['user_address'];
        $phone = $_SESSION['user_phone'];
        $city = $_SESSION['user_city'];
        $zip = $_SESSION['user_zip'];
        $state = $_SESSION['user_state'];
        $offer = $_SESSION['offer-name'];

        $total = $_SESSION['gt'];

        // Generate a unique sub-order ID
        $sub_order_id = uniqid();

        // Prepare the SQL query for each product in the cart
        while ($row = mysqli_fetch_assoc($result)) {
            $product_id = $row['ct_p_code'];  // The product ID in the cart
            $quantity = $row['ct_quentity'];  // The quantity of the product
            // $Payment_Status = Paid;

            // Prepare the SQL insert statement for the order
            $query = "INSERT INTO `order_tbl`(`o_username`, `o_order_id`, `o_sub_order_id`, `o_p_code`, `o_total_amount`, `o_quentity`, `o_address`, `o_mobile`, `o_city`, `o_pincode`, `o_state`, `o_delivery_status`, `o_payment_status`, `o_offer_name`, `o_payment_mode`, `o_date`) 
            VALUES ('$email', '$order_id', '$sub_order_id', '$product_id', '$total', '$quantity', '$address', '$phone', '$city', '$zip', '$state','Delivered', 'Completed', '$offer', 'Online', NOW())";
            echo $query; 
            // Execute the query
            if (!mysqli_query($con, $query)) {
                echo 'Error while inserting order details';
                exit();
            }

            // Update the product stock in the product_tbl
            $update_stock_query = "UPDATE product_tbl SET p_stock = p_stock - $quantity WHERE p_code = '$product_id'";

            if (!mysqli_query($con, $update_stock_query)) {
                echo 'Error while updating product stock';
                exit();
            }

        }

        // After successfully inserting into the order table, empty the cart
        $delete_query = "DELETE FROM cart_tbl WHERE ct_username = '$email'";

        if (mysqli_query($con, $delete_query)) {
            // Redirect to the order history page after clearing the cart
            header('Location: order-history.php');
            exit();
        } else {
            echo 'Error while emptying the cart';
            exit();
        }

        // // After all products are inserted, you can redirect to an order confirmation page
        // header('Location: orderHistory.php');
        // exit();
    } else {
        echo 'Cart is empty.';
    }
} else {
    // If necessary parameters are missing, redirect to error page or show a message
    echo 'Payment details are missing.';
}
?>