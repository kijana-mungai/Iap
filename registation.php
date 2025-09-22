<?php
// registration.php

// Check if form is submitted
$prefilledName  = $_GET['name'] ?? '';
$prefilledEmail = $_GET['email'] ?? '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = htmlspecialchars($_POST['course']);
    $year   = htmlspecialchars($_POST['year']);

    echo "<h3>Registration Successful!</h3>";
    echo "Course: " . $course . "<br>";
    echo "Year of Study: " . $year;
} else {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Student Registration</title>
    </head>
    <body>
        <h2>Student Registration Form</h2>
        <form method="POST" action="">
            <label for="course">Course:</label><br>
            <input type="text" name="course" id="course" required><br><br>

            <label for="year">Year of Study:</label><br>
            <select name="year" id="year" required>
                <option value="">-- Select Year --</option>
                <option value="1">1st Year</option>
                <option value="2">2nd Year</option>
                <option value="3">3rd Year</option>
                <option value="4">4th Year</option>
            </select><br><br>

            <input type="submit" value="Register">
        </form>
    </body>
    </html>
    <?php
}
?>
