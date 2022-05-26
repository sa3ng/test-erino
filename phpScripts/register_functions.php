<?php
function registerUser($db_credentials, $user_credentials)
{
    $conn = new mysqli(
        $db_credentials['server'],
        $db_credentials['user'],
        $db_credentials['pass'],
        $db_credentials['db_name']
    );

    if (checkForSimilarEmail($conn, $user_credentials)) {
        displayAlertAndRedirect("EMAIL IS ALREADY TAKEN!");
    } else if (checkForSimilarUsername($conn, $user_credentials)) {
        displayAlertAndRedirect("USERNAME IS ALREADY TAKEN");
    } else {
        createAccount($conn, $user_credentials);
        header("index.php"); //Home page
    }

    $conn->close();
}

// HELPER FUNCTIONS
function checkForSimilarEmail($conn, $user_credentials)
{
    $stmt = $conn->prepare("SELECT * FROM accTBL WHERE user_email=?");
    $stmt->bind_param("s", $user_credentials["email_register"]);

    // execution
    $stmt->execute();
    // result retrieval
    $results = $stmt->get_result();
    // should only have one result; No need to have a while iterator here
    $user = $results->fetch_assoc();

    $stmt->close();

    // If no users were returned, EMAIL is OK
    if (empty($user)) {
        return false;
    }

    return true;
}

function checkForSimilarUsername($conn, $user_credentials)
{
    $stmt = $conn->prepare("SELECT * FROM user_table WHERE user_name=?");
    $stmt->bind_param("s", $user_credentials["user_register"]);

    // execution
    $stmt->execute();
    // result retrieval
    $results = $stmt->get_result();
    // should only have one result; No need to have a while iterator here
    $user = $results->fetch_assoc();

    $stmt->close();

    // If no users were returned, USERNAME is OK
    if (empty($user)) {
        return false;
    }

    return true;
}

function createAccount($conn, $user_credentials)
{
    $stmt = $conn->prepare("INSERT INTO `user_table` (`user_id`, `user_email`, `user_name`, `user_password`) VALUES (NULL, ?, ?, ?)");
    $stmt->bind_param(
        "sss",
        $user_credentials["email_register"],
        $user_credentials["user_register"],
        $user_credentials["pass_register"]
    );

    $stmt->execute();

    $stmt->close();
}

function displayAlertAndRedirect($message)
{
    echo
    "<script> 
        alert('" . $message . "');" .
        "</script>";
}
