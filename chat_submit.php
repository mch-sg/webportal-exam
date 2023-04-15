<?php

session_start();

$serverName = "127.0.0.1:3306";
$dBUsername = "u463909974_exam";
$dBPassword = "Ekg123321";
$dBName = "u463909974_portal";

try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dBName", $dBUsername, $dBPassword);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}


$name = $_SESSION["useruid"];

$chat_room_name = html_entity_decode(htmlspecialchars($_POST['room_name'], ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');
$from = $_SESSION['useruid'];
$bruger = htmlspecialchars($_POST['bruger'], ENT_QUOTES, 'UTF-8');
$chat_id = uniqid();


// Autoriser bruger
$authorized = false;
if (isset($_SESSION['useruid'])) {
    $session_user_id = $_SESSION['useruid'];
    $authorized = true;
}
if (!$authorized) {
    die("Du har ikke tilladelse til at se denne side.");
}

$stmt = $conn->prepare("INSERT INTO chat_rooms (name, user_from, user_to, uuid) VALUES (:name, :user_from, :user_to, :uuid)");
$stmt->bindParam(':name', $chat_room_name);
$stmt->bindParam(':user_from', $from);
$stmt->bindParam(':user_to', $bruger);
$stmt->bindParam(':uuid', $chat_id);

if ($stmt->execute()) {
    header("location: chat_room.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>