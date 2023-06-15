<?php
include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "login_admin") {

        $admin_email = $_POST['admin_email'];
        $admin_password = sha1($_POST['admin_password']);

        $sql = "SELECT * FROM admin_tb WHERE admin_email = '" . $admin_email . "' AND admin_password = '" . $admin_password . "' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $adminRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $adminRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "adminData" => $adminRecord[0]
                )
            );
        } else {
            echo json_encode(
                array(
                    "adminLogin" => false,
                    "message" => "Email or password not correct."
                )
            );
        }
    }

    if ($function == "read_order") {

        // $user_id = $_POST["user_id"];

        $sql = "SELECT * FROM order_tb WHERE status = 'new' ORDER BY date_time DESC";

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
                    "allOrderData" => $ordersRecord
                )
            );
        } else {
            echo json_encode(array("success" => false));
        }
    }

} else {
    echo json_encode(array("Verify token" => false));
}