<?php

include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "upload_item") {

        $item_name = $_POST['item_name'];
        $item_rating = $_POST['item_rating'];
        $item_tags = $_POST['item_tags'];
        $item_price = $_POST['item_price'];
        $item_size = $_POST['item_size'];
        $item_color = $_POST['item_color'];
        $item_desc = $_POST['item_desc'];
        $item_image = $_POST['item_image'];

        $sql = "INSERT INTO items_tb (
                                        item_name, 
                                        item_rating, 
                                        item_tags, 
                                        item_price, 
                                        item_size, 
                                        item_color, 
                                        item_desc, 
                                        item_image
                                    ) VALUES (
                                        '" . $item_name . "',
                                        '" . $item_rating . "',
                                        '" . $item_tags . "',
                                        '" . $item_price . "',
                                        '" . $item_size . "',
                                        '" . $item_color . "',
                                        '" . $item_desc . "',
                                        '" . $item_image . "'
                                    ) ";
        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
        $conn->close();
        return;
    }

    if ($function == "get_trending") {

        $minRating = 4.0;
        $limitClothesItems = 5;

        $sql = "SELECT * FROM items_tb WHERE item_rating >= '$minRating' ORDER BY item_rating DESC LIMIT $limitClothesItems ";

        //echo json_encode(array("sql" => $sql));

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $clothesItemsRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $clothesItemsRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "clothItemsData" => $clothesItemsRecord
                )
            );
        } else {
            echo json_encode(array("success" => true));
        }
    }


    if ($function == "get_all_items") {

        $sql = "SELECT * FROM items_tb ORDER BY item_id DESC";

        //echo json_encode(array("sql" => $sql));

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $allItemsRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $allItemsRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "allItemsData" => $allItemsRecord
                )
            );
        } else {
            echo json_encode(array("success" => true));
        }
    }

    if ($function == "search_item") {

        $item_name = $_POST['typedKeyWord'];

        $sql = "SELECT * FROM items_tb WHERE item_name LIKE '%" . $item_name . "%' ORDER BY item_name ASC";

        //echo json_encode(array("sql" => $sql));

        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            $searchRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $searchRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "searchDataResult" => $searchRecord
                )
            );
        } else {
            echo json_encode(array("success" => true));
        }
    }
} else {
    echo json_encode(array("Verify token" => false));
}
