<?php

include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "add_to_cart") {

        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $size = $_POST['size'];

        $sql = "INSERT INTO cart_tb ( 
                                        user_id, 
                                        item_id, 
                                        quantity, 
                                        color, 
                                        size
                                        ) VALUES (
                                        '" . $user_id . "',
                                        '" . $item_id . "',
                                        '" . $quantity . "',
                                        '" . $color . "',
                                        '" . $size . "'
                                        ) ";

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }

    if ($function == "read_cart") {
        $user_id = $_POST["currentOnlineUserID"];
        $sql = "SELECT * FROM cart_user_view WHERE user_id = '$user_id' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $cartRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $cartRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "currentUserCartData" => $cartRecord
                )
            );
        }
    }

    if ($function == "delete_cart") {

        $cart_id = $_POST['cart_id'];

        $sql = "DELETE FROM cart_tb WHERE cart_id = '$cart_id' ";

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }

    if ($function == "update_cart") {

        $cart_id = $_POST['cart_id'];
        $quantity = $_POST['quantity'];

        $sql = "UPDATE cart_tb SET quantity = '$quantity' WHERE cart_id = '$cart_id' ";

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }

} else {
    echo json_encode(array("Verify token" => false));
}
