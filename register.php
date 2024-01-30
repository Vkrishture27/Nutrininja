<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $school = $_POST["school"];
    $address = $_POST["address"];
    $fatherName = $_POST["fatherName"];
    $fatherPhone = $_POST["fatherPhone"];
    $motherName = $_POST["motherName"];
    $motherPhone = $_POST["motherPhone"];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $interests = isset($_POST["interests"]) ? $_POST["interests"] : [];

    // You can process the data as needed, such as storing it in a database
    // For this example, we will simply display a confirmation message
    echo "<h2>Registration Successful</h2>";
    echo "<p>Name: $name</p>";
    echo "<p>Age: $age</p>";
    echo "<p>Gender: $gender</p>";
    echo "<p>School: $school</p>";
    echo "<p>Address: $address</p>";
    echo "<p>Father's Name: $fatherName</p>";
    echo "<p>Father's Phone Number: $fatherPhone</p>";
    echo "<p>Mother's Name: $motherName</p>";
    echo "<p>Mother's Phone Number: $motherPhone</p>";
    echo "<p>City: $city</p>";
    echo "<p>Country: $country</p>";
    echo "<p>Interests: " . implode(", ", $interests) . "</p>";

} else {
    // Redirect users who access this script directly without submitting the form
    header("Location: index.html");
    exit();
}
?>
