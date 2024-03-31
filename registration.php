<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file

    $servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$database = "gym"; // Change this to your MySQL database name

    $conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


    // Collect form data
    $username = $_POST["username"];
    $ph_no = $_POST["ph_no"];
    $password = $_POST["passid"];
    $address = $_POST["address"];
    $country = $_POST["country"];
    $zip = $_POST["zip"];
    $email = $_POST["email"];
    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';

    // Prepare SQL query
    $sql = "INSERT INTO registration (username, ph_no, password, address, country, zip, email, gender)
            VALUES ('$username', '$ph_no', '$password', '$address', '$country', '$zip', '$email', '$gender')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        // Registration successful
        echo '<script>alert("Registration successful!");</script>';
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gym Registration Form</title>
<style>
	body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

.container {
  width: 50%;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
  display: flex;
  flex-direction: column;
}

label {
  margin-bottom: 5px;
}

input[type="text"],
input[type="password"],
input[type="email"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
}

.gender {
  margin-bottom: 15px;
}

.gender label {
  margin-right: 10px;
}

</style>
</head>
<body>

<div class="container">
  <form name="registration" onsubmit="return formValidation()" method = "post">
    <h2>Gym Registration Form</h2>
    <label for="username">Full Name:</label>
    <input type="text" id="username" name="username" required>
    <label for="ph_no">Phone Number:</label>
    <input type="text" id="ph_no" name="ph_no" required>
    <label for="passid">Password:</label>
    <input type="password" id="passid" name="passid" required>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>
    <label for="country">Country:</label>
    <select id="country" name="country" required>
      <option value="Default">Select Country</option>
      <!-- Add more options if needed -->
      <option value="USA">India</option>
      <option value="UK">Russia</option>
      <option value="UK">bangladesh</option>
      <option value="UK">other</option>
    </select>
    <label for="zip">ZIP Code:</label>
    <input type="text" id="zip" name="zip" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <div class="gender">
      <input type="radio" id="msex" name="gender" value="male">
      <label for="msex">Male</label>
      <input type="radio" id="fsex" name="gender" value="female">
      <label for="fsex">Female</label>
    </div>
    <input type="submit" value="Submit">
  </form>
</div>

<script src="validate.js"></script>
</body>
</html>


