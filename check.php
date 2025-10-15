<?php
/*
SEHS4517 Web Application Development and Management
Individual Assignment
Submission date: 18 October 2025
Student Name: [Your Full Name]
Student ID: [Your Student ID]
*/

// Start session to retrieve form data
session_start();

// Retrieve data from session
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : '';
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : '';
$date = isset($_SESSION['date']) ? $_SESSION['date'] : '';
$time = isset($_SESSION['time']) ? $_SESSION['time'] : '';
$item = isset($_SESSION['item']) ? $_SESSION['item'] : '';

// Get current datetime
$current_datetime = new DateTime('now');

// Combine reservation date and time
$reservation_datetime_str = $date . ' ' . $time;
$reservation_datetime = DateTime::createFromFormat('Y-m-d H:i', $reservation_datetime_str);

// Calculate difference in hours
$interval = $current_datetime->diff($reservation_datetime);
$total_hours = ($interval->days * 24) + $interval->h + ($interval->i / 60);

// Check if reservation is in the past
$is_future = $current_datetime < $reservation_datetime;

// Determine the result (24-72 hours range check)
$is_valid = false;
$message_type = '';

if (!$is_future) {
    $message_type = 'past';
} elseif ($total_hours < 24) {
    $message_type = 'too_soon';
} elseif ($total_hours > 72) {
    $message_type = 'too_far';
} else {
    $message_type = 'success';
    $is_valid = true;
}

// Format date and time for display
$formatted_date = $reservation_datetime->format('l, F j, Y');
$formatted_time = $reservation_datetime->format('g:i A');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $is_valid ? 'Reservation Confirmed' : 'Reservation Error'; ?> - Grand Horizon Hotel</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/check-result.css" />
    <style>
        /* Dynamic styles based on validation result */
        body {
            background: linear-gradient(135deg, <?php echo $is_valid ? '#52c234 0%, #28a745 100%' : '#f093fb 0%, #f5576c 100%'; ?>);
        }

        .header {
            background: <?php echo $is_valid ? 'linear-gradient(135deg, #52c234 0%, #28a745 100%)' : 'linear-gradient(135deg, #e74c3c 0%, #c0392b 100%)'; ?>;
        }

        .message-box {
            background: <?php echo $is_valid ? '#d4edda' : '#f8d7da'; ?>;
            border: 2px solid <?php echo $is_valid ? '#28a745' : '#e74c3c'; ?>;
        }

        .message-box strong {
            color: <?php echo $is_valid ? '#28a745' : '#e74c3c'; ?>;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="icon-large">
                <?php echo $is_valid ? '✓' : '✗'; ?>
            </div>
            <h1><?php echo $is_valid ? 'Reservation Confirmed!' : 'Reservation Cannot Be Processed'; ?></h1>
        </header>

        <div class="content">
            <?php if ($is_valid): ?>
                <div class="message-box">
                    <p><strong>Thank you, <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?>!</strong></p>
                    <p>
                        Your reservation has been successfully confirmed. We are delighted to welcome you to
                        Grand Horizon Hotel. A confirmation email has been sent to your registered email address
                        with all the details of your booking.
                    </p>
                    <p>We look forward to providing you with an exceptional stay!</p>
                </div>

                <div class="details-summary">
                    <h3>Reservation Summary</h3>
                    <div class="summary-item">
                        <span class="summary-label">Guest Name:</span>
                        <span class="summary-value highlight"><?php echo htmlspecialchars($firstname . ' ' . $lastname); ?></span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Room Type:</span>
                        <span class="summary-value highlight"><?php echo htmlspecialchars($item); ?></span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Check-in Date:</span>
                        <span class="summary-value"><?php echo $formatted_date; ?></span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Check-in Time:</span>
                        <span class="summary-value"><?php echo $formatted_time; ?></span>
                    </div>
                </div>

                <div class="info-note">
                    <strong>Next Steps:</strong> Please check your email for detailed check-in instructions and
                    payment information. If you have any questions, feel free to contact our reception at
                    +852 1234 5678.
                </div>

            <?php else: ?>
                <div class="message-box">
                    <p><strong>We apologize, <?php echo htmlspecialchars($firstname . ' ' . $lastname); ?>.</strong></p>
                    <?php if ($message_type == 'past'): ?>
                        <p>
                            The reservation date and time you selected has already passed. Please select a
                            future date and time for your reservation.
                        </p>
                    <?php elseif ($message_type == 'too_soon'): ?>
                        <p>
                            Your reservation for <strong><?php echo $formatted_date; ?></strong> at
                            <strong><?php echo $formatted_time; ?></strong> is too soon. Reservations must be
                            made at least 24 hours (1 day) in advance.
                        </p>
                    <?php else: ?>
                        <p>
                            Your reservation for <strong><?php echo $formatted_date; ?></strong> at
                            <strong><?php echo $formatted_time; ?></strong> is too far in advance. Reservations
                            can only be made up to 72 hours (3 days) in advance.
                        </p>
                    <?php endif; ?>
                    <p>Please go back and select a different date and time within the allowed timeframe.</p>
                </div>

                <div class="info-note">
                    <strong>Reservation Policy:</strong> All reservations must be made between 24 to 72 hours
                    before your intended check-in time. This ensures we can provide you with the best service
                    and room availability.
                </div>
            <?php endif; ?>

            <div class="button-group">
                <a href="reserve.html" class="button">
                    <?php echo $is_valid ? 'Make Another Reservation' : 'Back to Reservation Form'; ?>
                </a>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2025 Grand Horizon Hotel. All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>