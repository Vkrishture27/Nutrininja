<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_sample_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = sanitize_input($_POST["email"]); // Use email instead of username for consistency
    $password = sanitize_input($_POST["password"]);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE email = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, redirect to the food ordering page
            header("Location: food_ordering_page.php");
            exit();
        } else {
            // Invalid login, display an error message
            $error_message = "Invalid username or password";
        }
    } else {
        // Invalid login, display an error message
        $error_message = "Invalid username or password";
    }
}

$conn->close();
?>

<!-- Your login form goes here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Add any additional head elements or stylesheets here -->
</head>
<body>

<!-- Add your header content here -->
<header>
    <div>
        <br>
        <br>
        <center>
            <h2>Welcome to NutriNinja</h2>
        </center>
    </div>
</header>
<br>
<br>
<br>
<br>

<div id="main-container">
    <div id="form-container">
        <div id="content">
            <span class="title-text">Login</span>
            <?php
            // Display error message if applicable
            if (isset($error_message)) {
                echo "<p style='color: red;'>$error_message</p>";
            }
            ?>
            <form action="your-php-file-name.php" method="post">
                <div class="field">
                    <input required="" type="text" name="email">
                    <label>Email</label>
                </div>
                <div class="field">
                    <input required="" type="password" name="password">
                    <label>Password</label>
                </div>
                <div id="action">
                    <label><input type="checkbox">Remember me</label>
                    <a id="forget" href="">Forgot password?</a>
                </div>
                <button type="submit" id="login">Login</button>
                <div id="signup">
                    <h4>Don't have an Account?</h4>
                    <a href="register.php">Sign up</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
