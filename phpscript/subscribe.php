<?php
use PHPMailer\PHPMailer\PHPMailer;

require '../phpscript/PHPMailer/src/PHPMailer.php';
require '../phpscript/PHPMailer/src/SMTP.php';
include '../phpscript/config.php';

if (isset($_POST['sendmail'])) {
    $sname = $_POST['sname'] ?? '';
    $semail = $_POST['semail'] ?? '';

    if (empty($sname) || empty($semail)) {
        $error_message = "Please fill in all the fields.";
    } else {
        $verification_token = bin2hex(random_bytes(16)); // Generate a random token

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sonanijemish7012@gmail.com';
        $mail->Password = 'qzmoobfrfbylvtjg';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = '465';
        $mail->setFrom('sonanijemish7012@gmail.com');
        $mail->addAddress($semail);
        $mail->isHTML(true);
        $mail->Subject = 'Hi ' . $sname . ', Confirm Subscription';

        $verification_link = 'http://localhost/asv/phpscript/verify.php?token=' . $verification_token;


        $mail->Body = "Click the following link to verify your email and confirm your subscription: $verification_link";

        if ($mail->send()) {
            // Email sent successfully, now insert into the database
            $qr = "INSERT INTO `subscriber`(`name`, `email`, `confirmation`, `tokenlist`) VALUES ('$sname', '$semail', '0', '$verification_token')";
            $res = mysqli_query($conn, $qr);

            if ($res) {
                header('Location:../subscriber.php');
                exit;
            } else {
                $error_message = "Error inserting into the database: " . mysqli_error($conn);
            }
        } else {
            $error_message = 'Email sending failed: ' . $mail->ErrorInfo;
        }
    }
}
?>
