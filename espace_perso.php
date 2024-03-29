<?php

session_start();
include_once("config/PDO.php");
print_r($db);
$sql = "SELECT user_id FROM user";
$result = $db->query($sql);


$user_id = $_SESSION['user_id-logged'];

$sql = "SELECT COUNT(*) AS total_messages FROM messages WHERE _id = $user_id";
$result = $db->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $totalMessages = $row["total_messages"];


    echo "Nombre de messages reçus : " . $totalMessages . "<br>";
} else {
    echo "Aucun résultat trouvé.";
}

$db->close();
?>


<html>

<head>
    <title>Mon Espace Personnel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Mon Espace Personnel</h1>
    <?php echo "Bienvenue! Vous avez  messages."; ?>
</body>

</html>