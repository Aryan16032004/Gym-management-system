<?php
// Include header and database connection
define('TITLE', 'Email');
define('PAGE', 'email');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();

// Check if the user is logged in, otherwise redirect to the login page
if($_SESSION['is_login']){
    $mEmail = $_SESSION['mEmail'];
} else {
    echo "<script> location.href='memberLogin.php'; </script>";
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Validate if any field is empty
    if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['email']) || empty($_POST['message'])) {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fields </div>';
    } else {
        // Get form data
        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Email setup
        $mailTo = "aryan16062004@gmail.com"; // Recipient email address
        $headers = "From: " . $email;
        $txt = "You have received an email from " . $name . ".\n\n" . $message;

        // Send the email
        if(mail($mailTo, $subject, $txt, $headers)) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert"> Sent Successfully </div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert"> Failed to send message </div>';
        }
    }
}
?>

<!-- Contact Us Form Section -->
<div class="col-sm-9 col-md-10 mt-5 text-center">
    <div class="container">
        <h3 class="text-center">Contact us</h3><br />

        <div class="row">
            <!-- Contact Us Form Column -->
            <div class="col-md-8">
                <form action="" method="post">
                    <input type="text" class="form-control" name="name" placeholder="Name" required><br>
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required><br>
                    <input type="email" class="form-control" name="email" placeholder="E-mail" required><br>
                    <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;" required></textarea><br>
                    <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
                    <?php if(isset($msg)) { echo $msg; } ?>
                </form>
            </div>

            <!-- Contact Information Column -->
            <div class="col-md-4">
                <h4>Profitness Gym</h4>
                <p>Pro-fitness, LPU, Jalandhar - 144411<br />
                Phone: +2650884537267<br />
                Email: <a href="mailto:aryan16062004@gmail.com">aryan16062004@gmail.com</a><br />
                Website: <a href="http://www.profitness.com" target="_blank">www.profitness.com</a>
                </p>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Us Form Section -->

<?php
// Include footer
include('includes/footer.php'); 
?>
