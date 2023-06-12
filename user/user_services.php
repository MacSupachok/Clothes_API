<?php
include("../connection.php");

//authen api
$function = $_GET['function'];
$api_token = $_GET['api_token'];

if ($token == $api_token) {

    if ($function == "check_auth") {

        echo json_encode(
            array(
                "message" => "API authen pass."
            )
        );
    }

    if ($function == "login_user") {

        $user_email = $_POST['user_email'];
        $user_password = sha1($_POST['user_password']);

        $sql = "SELECT * FROM users_tb WHERE user_email = '" . $user_email . "' AND user_password = '" . $user_password . "' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            $userRecord = array();
            while ($rowFound = $result->fetch_assoc()) {
                $userRecord[] = $rowFound;
            }
            echo json_encode(
                array(
                    "success" => true,
                    "userData" => $userRecord[0]
                )
            );
        } else {
            echo json_encode(
                array(
                    "userLogin" => false,
                    "message" => "Email or password not correct."
                )
            );
        }
    }

    if ($function == "validate_email") {

        $user_email = $_POST['user_email'];

        $sql = "SELECT * FROM users_tb WHERE user_email = '" . $user_email . "' ";
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows > 0) {
            echo json_encode(
                array(
                    "emailFound" => true,
                    "message" => "Email already exist. Try another email."
                )
            );
        } else {
            echo json_encode(
                array(
                    "emailFound" => false,
                    "message" => "Email is not exist."
                )
            );
        }
    }

    if ($function == "signup_user") {

        //form parameter
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = sha1($_POST['user_password']);

        $sql = "INSERT INTO users_tb (
                                user_name,
                                user_email,
                                user_password
                            ) VALUES (
                                '" . $user_name . "',
                                '" . $user_email . "',
                                '" . $user_password . "'
                            )";
        if ($result = mysqli_query($conn, $sql)) {
            echo json_encode(array("success" => true));
        } else {
            echo json_encode(array("success" => false));
        }
        $conn->close();
        return;
    }
} else {
    echo json_encode(array("Verify token" => false));
}
