<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];
    $fname = $_POST['fname'] ?? '';
    $lname = $_POST['lname'] ?? '';
    $father = $_POST['father'] ?? '';
    $day = $_POST['day'] ?? '';
    $month = $_POST['month'] ?? '';
    $year = $_POST['year'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $departments = $_POST['department'] ?? [];
    $course = $_POST['course'] ?? '';
    $city = $_POST['city'] ?? '';
    $address = $_POST['address'] ?? '';

    if ($fname === '') $errors[] = "First Name is required.";
    if ($lname === '') $errors[] = "Last Name is required.";
    if ($father === '') $errors[] = "Father's Name is required.";
    if ($day === '' || $month === '' || $year === '') $errors[] = "Complete Date of Birth is required.";
    if ($mobile === '') $errors[] = "Mobile number is required.";
    if ($email === '') $errors[] = "Email is required.";
    if ($password === '') $errors[] = "Password is required.";
    if ($gender === '') $errors[] = "Gender is required.";
    if (empty($departments)) $errors[] = "At least one Department must be selected.";
    if ($course === '') $errors[] = "Course is required.";
    if ($city === '') $errors[] = "City is required.";
    if ($address === '') $errors[] = "Address is required.";

    echo '<!DOCTYPE html>
    <html>
    <head>
    <title>Registration Result</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .success {
            background: #41d38f;
            color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 20px auto;
        }
        .error {
            background: #ff7777;
            color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 600px;
            margin: 20px auto;
        }
        .error p {
            margin: 5px 0;
        }
    </style>
    </head>
    <body>';

    if (!empty($errors)) {
        echo '<div class="error">';
        echo '<h2>Form Errors:</h2>';
        foreach ($errors as $error) {
            echo '<p>'.$error.'!!!!</p>';
        }
        echo '</div>';
    } else {
        echo '<div class="success">
            <h1>Registration Details</h1>
            <p><strong>Full Name:</strong> '.$fname.' '.$lname.'</p>
            <p><strong>Father\'s Name:</strong> '.$father.'</p>
            <p><strong>Date of Birth:</strong> '.$day.'-'.$month.'-'.$year.'</p>
            <p><strong>Mobile:</strong> +95-'.$mobile.'</p>
            <p><strong>Email:</strong> '.$email.'</p>
            <p><strong>Password:</strong> '.$password.'</p>
            <p><strong>Gender:</strong> '.$gender.'</p>
            <p><strong>Departments:</strong> '.(!empty($departments) ? implode(", ", $departments) : "None").'</p>
            <p><strong>Course:</strong> '.$course.'</p>
            <p><strong>City:</strong> '.$city.'</p>
            <p><strong>Address:</strong> '.$address.'</p>
        </div>';
    }
    echo '</body></html>';
} else {
    echo '<div style="color: red;">Invalid request method.</div>';
}
?>
