<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $hobbies = isset($_POST['hobbies']) ? $_POST['hobbies'] : [];

    // Prepare user data
    $userData = array(
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "dob" => $dob,
        "gender" => $gender,
        "address" => $address,
        "city" => $city,
        "pincode" => $pincode,
        "state" => $state,
        "hobbies" => $hobbies
    );

    // Simulate storing user data in local storage
    $users = json_decode(file_get_contents('users.json'), true) ?: [];
    $users[] = $userData;
    file_put_contents('users.json', json_encode($users));

    // Simulate success
    echo json_encode(array("success" => true, "message" => "Signup successful!"));
} else {
    // Invalid request method
    echo json_encode(array("success" => false, "message" => "Invalid request method"));
}
?>
