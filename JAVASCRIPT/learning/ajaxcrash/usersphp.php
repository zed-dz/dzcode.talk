<?php 
// Create Connection
$conn = mysqli_connect('localhost', 'root', '123456', 'ajaxtest');

$query = 'SELECT * FROM users';

// Get Result
$result = mysqli_query($conn, $query);

// Fetch Data
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($users);