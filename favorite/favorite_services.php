<?php

include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "add_favorite") {

        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];

        $sql = "INSERT INTO favorite_tb (user_id, item_id) VALUES ('$user_id', '$item_id') ";

        //echo $sql;

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }


    if ($function == "delete_favorite") {

        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];

        $sql = "DELETE FROM favorite_tb WHERE user_id = '$user_id' AND item_id = '$item_id' ";

        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
    }


    if ($function == "check_favorite") {

        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];

        $sql = "SELECT * FROM favorite_tb WHERE user_id = '$user_id' AND item_id = '$item_id' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo json_encode(array("favoriteFound" => true));
        } else {
            echo json_encode(array("favoriteFound" => false));
        }
    }


    if ($function == "read_favorite") {

        $user_id = $_POST['user_id'];

        $sql = "SELECT * FROM 
                                favorite_tb CROSS JOIN items_tb 
                         WHERE 
                                favorite_tb.user_id = '$user_id' 
                                AND favorite_tb.item_id = items_tb.item_id; ";

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $favoriteRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $favoriteRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "favoritetData" => $favoriteRecord
                )
            );
        }
    }
} else {
    echo json_encode(array("Verify token" => false));
}
