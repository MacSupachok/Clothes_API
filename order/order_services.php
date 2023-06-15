<?php

include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "add_order") {

        $userID = $_POST["user_id"];
        $selectedItems = $_POST["selectedItems"];
        $deliverySystem = $_POST["deliverySystem"];
        $paymentSystem = $_POST["paymentSystem"];
        $note = $_POST["note"];
        $totalAmount = $_POST["totalAmount"];
        $image = $_POST["image"];
        $status = $_POST["status"];
        $shipmentAddress = $_POST["shipmentAddress"];
        $phoneNumber = $_POST["phoneNumber"];
        $imageFileBase64 = $_POST["imageFile"];

        $sql = "INSERT INTO order_tb (
                                        user_id, 
                                        selected_item, 
                                        delivery_system, 
                                        payment_system, 
                                        note, 
                                        total_amount, 
                                        image, 
                                        status,
                                        ship_add,
                                        phone_number
                                    ) VALUES (
                                        '" . $userID . "',
                                        '" . $selectedItems . "',
                                        '" . $deliverySystem . "',
                                        '" . $paymentSystem . "',
                                        '" . $note . "',
                                        '" . $totalAmount . "',
                                        '" . $image . "',
                                        '" . $status . "',
                                        '" . $shipmentAddress . "',
                                        '" . $phoneNumber . "'
                                    ) ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            //upload image to server
            $imageFileOfTransactionProof = base64_decode($imageFileBase64);
            file_put_contents("../transaction_img/" . $image, $imageFileOfTransactionProof);

            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }

    if ($function == "read_order") {

        $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM order_tb WHERE user_id = '$user_id' AND status = 'new' ORDER BY date_time DESC";

        //echo $sql;

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $ordersRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $ordersRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "orderData" => $ordersRecord
                )
            );
        } else {
            echo json_encode(array("success" => false));
        }
    }

    if ($function == "read_order_history") {

        $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM order_tb WHERE user_id = '$user_id' AND status = 'received' ORDER BY date_time DESC";

        //echo $sql;

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $ordersRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $ordersRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "orderData" => $ordersRecord
                )
            );
        } else {
            echo json_encode(array("success" => false));
        }
    }

    if ($function == "update_order") {

        $order_id = $_POST['order_id'];

        $sql = "UPDATE order_tb SET status = 'received' WHERE order_id = $order_id ";

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }
} else {
    echo json_encode(array("Verify token" => false));
    //test
}
