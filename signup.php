<?php
include 'db.php';

// Get raw JSON input
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->username) && !empty($data->password)) {
    $username = $data->username;
    $password = password_hash($data->password, PASSWORD_BCRYPT); // Hash password

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Signup successful"]);
    } else {
        echo json_encode(["message" => "Error: Username already exists"]);
    }

    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid input"]);
}

$conn->close();
?>
