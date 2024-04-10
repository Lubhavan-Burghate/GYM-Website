<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file

    // Database connection parameters
    $servername = "localhost"; // Change this to your MySQL server hostname
    $username = "root"; // Change this to your MySQL username
    $password = ""; // Change this to your MySQL password
    $database = "gym_feedback"; // Change this to your MySQL database name

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $equipment = $_POST["equipment"];
    $changing_rooms = $_POST["changing_rooms"];
    $safety_maintenance = $_POST["safety_maintenance"];
    $cleanliness = $_POST["cleanliness"];
    $staff_friendliness = $_POST["staff_friendliness"];
    $workout_effectiveness = $_POST["workout_effectiveness"];
    $additional_comments = $_POST["additional_comments"];

    // Prepare SQL query
    $sql = "INSERT INTO feedback (name, email, mobile, equipment, changing_rooms, safety_maintenance, cleanliness, staff_friendliness, workout_effectiveness, additional_comments)
            VALUES ('$name', '$email', '$mobile', '$equipment', '$changing_rooms', '$safety_maintenance', '$cleanliness', '$staff_friendliness', '$workout_effectiveness', '$additional_comments')";

    // Execute SQL query
    if (mysqli_query($conn, $sql)) {
        // Feedback submitted successfully
        echo '<script>alert("Feedback submitted successfully!");</script>';
        // Redirect to index.html after 1 second
        echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 1000);</script>';
        exit(); 
    } else {
        // Feedback submission failed
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
  <title>Gym Feedback Form</title>
  <link rel="stylesheet" href="feedback.css">
</head>
<body>
  <div class="container">
    <h1>Give Us Feedback</h1>
    <form id="feedbackForm" onsubmit="return formValidation()" method = "post">
      <h2>Personal Information</h2>
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email Address:</label>
      <input type="email" id="email" name="email" required>

      <label for="mobile">Mobile Number:</label>
      <input type="tel" id="mobile" name="mobile" required>

      <h2>Feedback Questions</h2>
      <label for="equipment">Availability of Equipment:</label>
      <select id="equipment" name="equipment" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <label for="changing_rooms">Changing Rooms:</label>
      <select id="changing_rooms" name="changing_rooms" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <label for="safety_maintenance">Safety and Maintenance:</label>
      <select id="safety_maintenance" name="safety_maintenance" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <label for="cleanliness">Cleanliness of Gym:</label>
      <select id="cleanliness" name="cleanliness" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <label for="staff_friendliness">Friendliness of Staff:</label>
      <select id="staff_friendliness" name="staff_friendliness" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <label for="workout_effectiveness">Effectiveness of Workouts:</label>
      <select id="workout_effectiveness" name="workout_effectiveness" required>
        <option value="" disabled selected>Select one...</option>
        <option value="Very Poor">Very Poor</option>
        <option value="Poor">Poor</option>
        <option value="Average">Average</option>
        <option value="Good">Good</option>
        <option value="Excellent">Excellent</option>
      </select>

      <!-- Add other feedback questions here -->

      <h2>Additional Message</h2>
      <label for="additional_comments">Additional Comments:</label>
      <textarea id="additional_comments" name="additional_comments" rows="4"></textarea>

      <button type="submit" value="Submit">Submit</button>
    </form>
  </div>

  <script src="validate.js"></script>
</body>
</html>
