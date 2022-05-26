<?php

function checkConnection($db_credentials)
{

    $conn = new mysqli(
        $db_credentials["server"],
        $db_credentials["user"],
        $db_credentials["pass"],
        $db_credentials["db_name"],
        $db_credentials["port"]
    );

    if ($conn) return true;
    else return false;
}

/*this should set a user_id_cookie for easy database querying.*/
function queryAccount($db_credentials, $login_credentials)
{
    $conn = new mysqli(
        $db_credentials["server"],
        $db_credentials["user"],
        $db_credentials["pass"],
        $db_credentials["db_name"],
        $db_credentials["port"]
    );

    // preparation of prepared statement
    $stmt = $conn->prepare("SELECT * FROM accTBL WHERE Name=?");
    $stmt->bind_param("s", $login_credentials["email"]);

    // execution
    $stmt->execute();
    // result retrieval
    $results = $stmt->get_result();
    // should only have one result; No need to have a while iterator here
    $user = $results->fetch_assoc();

    if (empty($user)) {
        // exit, go back to login with error styling
        return -1;
    } else {
        // If a user has been returned, validate password
        if ($user["Pass"] == $login_credentials["pass"]) {
            //valid account, set it to a cookie for reference
            $cookie_acc_id_name  = "acc_id";
            $cookie_acc_id_value = $user["AccID"];

            //checking if "remember me" was ticked
            if (array_key_exists("remember-check", $_POST)) {
                setcookie($cookie_acc_id_name, $cookie_acc_id_value, 0, "/");
            } else {
                setcookie($cookie_acc_id_name, $cookie_acc_id_value, 0, "/");
            }

            // change to different page
            header("Location: ../phpPages/usrPage.php");
            die();
        } else {
            return -2;
        }
    }

    // closing of connections
    $stmt->close();
    $conn->close();

    //return values:
    // -1 = bad name;
    // -2 = bad pass;
}
