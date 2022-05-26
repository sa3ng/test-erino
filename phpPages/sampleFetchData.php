<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test-gang</title>
</head>
<body>

<?php
$DB_CREDENTIALS =
[
    "user" => "o9Dh9V4Tbr",
    "pass" => "cEMBedVrx0",
    "db_name" => "o9Dh9V4Tbr",
    "server" => "remotemysql.com",
    "port" => 3306
];

function fetchCandidates($db_credentials, $candidateNames, $candidateMsg)
    {
        $conn = new mysqli(
            $db_credentials["server"],
            $db_credentials["user"],
            $db_credentials["pass"],
            $db_credentials["db_name"],
            $db_credentials["port"]
        );
    
        // preparation of prepared statement
        $stmt = $conn->prepare("SELECT * FROM postsTBL");
        // execution
        $stmt->execute();
        // result retrieval
        $results = $stmt->get_result();

        //Fill up Candidate Names
        while($candidates = mysqli_fetch_assoc($results)){
            array_push($candidateNames , $candidates['header']);
            array_push($candidateMsg , $candidates['message']);
            
        }
        
        $conn->close();
        $stmt->close();
    }

    $candidateMsg = array();
    $candidateNames = array();  
   fetchCandidates($DB_CREDENTIALS, $candidateNames, $candidateMsg);

   foreach($candidateNames as $names){
       echo $names;
   }
?>
    
</body>
</html>