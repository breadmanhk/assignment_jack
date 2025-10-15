<?php
/*
SEHS4517 Web Application Development and Management
Individual Assignment
Submission date: 18 October 2025
Student Name: [Your Full Name]
Student ID: [Your Student ID]
*/

// Start session to store form data
session_start();

// Sanitize and retrieve POST data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Store all form data in session
    $_SESSION['firstname'] = sanitize_input($_POST['firstname']);
    $_SESSION['lastname'] = sanitize_input($_POST['lastname']);
    $_SESSION['gender'] = sanitize_input($_POST['gender']);
    $_SESSION['date'] = sanitize_input($_POST['date']);
    $_SESSION['time'] = sanitize_input($_POST['time']);
    $_SESSION['item'] = sanitize_input($_POST['item']);
    $_SESSION['address'] = sanitize_input($_POST['address']);
    $_SESSION['phone'] = sanitize_input($_POST['phone']);
    $_SESSION['email'] = sanitize_input($_POST['email']);
    $_SESSION['username'] = sanitize_input($_POST['username']);
    $_SESSION['password'] = sanitize_input($_POST['password']);
}

// Retrieve data from session
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$gender = isset($_SESSION['gender']) ? $_SESSION['gender'] : '';
$date = isset($_SESSION['date']) ? $_SESSION['date'] : '';
$time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
$item = isset($_SESSION['item']) ? $_SESSION['item'] : '';
$address = isset($_SESSION['address']) ? $_SESSION['address'] : '';
$phone = isset($_SESSION['phone']) ? $_SESSION['phone'] : '';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

// Format date for display
$formatted_date = '';
if (!empty($date)) {
    $date_obj = DateTime::createFromFormat('Y-m-d', $date);
    if ($date_obj) {
        $formatted_date = $date_obj->format('l, F j, Y');
    }
}

// Format time for display
$formatted_time = '';
if (!empty($time)) {
    $time_obj = DateTime::createFromFormat('H:i', $time);
    if ($time_obj) {
        $formatted_time = $time_obj->format('g:i A');
    }
}

// Mask password for display
$masked_password = str_repeat('*', strlen($password));
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Confirm Reservation - Grand Horizon Hotel</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/reserve-confirm.css" />
</head>
<body>
    <div class="container">
        <header class="header">
            <h1>Review Your Reservation</h1>
            <p>Please verify your information before confirming</p>
        </header>

        <div class="content">
            <div class="alert-info">
                <strong>Important:</strong> Please review all the details below carefully.
                Click "Back" to make changes or "Confirm" to proceed with your reservation.
            </div>

            <div class="details-card">
                <h2>Personal Information</h2>
                <div class="detail-row">
                    <span class="detail-label">Full Name:</span>
                    <span class="detail-value highlight"><?php echo $firstname . ' ' . $lastname; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Gender:</span>
                    <span class="detail-value"><?php echo $gender; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Username:</span>
                    <span class="detail-value"><?php echo $username; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Password:</span>
                    <span class="detail-value"><?php echo $masked_password; ?></span>
                </div>
            </div>

            <div class="details-card">
                <h2>Reservation Details</h2>
                <div class="detail-row">
                    <span class="detail-label">Room Type:</span>
                    <span class="detail-value highlight"><?php echo $item; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Check-in Date:</span>
                    <span class="detail-value highlight"><?php echo $formatted_date; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Check-in Time:</span>
                    <span class="detail-value highlight"><?php echo $formatted_time; ?></span>
                </div>
            </div>

            <div class="details-card">
                <h2>Contact Information</h2>
                <div class="detail-row">
                    <span class="detail-label">Email Address:</span>
                    <span class="detail-value"><?php echo $email; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Phone Number:</span>
                    <span class="detail-value"><?php echo $phone; ?></span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">Mailing Address:</span>
                    <span class="detail-value"><?php echo nl2br($address); ?></span>
                </div>
            </div>

            <div class="button-group">
                <form action="check.php" method="post">
                    <button type="submit" class="btn-confirm">
                        <span class="icon">✓</span>Confirm
                    </button>
                </form>
                <a href="reserve.html" class="button btn-back">
                    <span class="icon">←</span>Back
                </a>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2025 Grand Horizon Hotel. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>