<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 function sendPasswordResetEmail($email, $newPassword, $hasError , $message)
 {
     $mail = new PHPMailer(true);

     try {
         //Server settings
         $mail->isSMTP();
         $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
         $mail->SMTPAuth = true;
         $mail->Username = 'andohfrancis9187@gmail.com';
         $mail->Password = 'mdgu tsjx utef vgcw';
         $mail->SMTPSecure = 'tls';
         $mail->Port = 587;

         //Recipients
         $mail->setFrom('andohfrancis9187@gmail.com', 'Wiawso College of Education');
         $mail->addAddress($email);

         //Content
         $mail->isHTML(true);
         $mail->Subject = 'Password Reset';
         $mail->Body = $message;

         $mail->send();
     } catch (Exception $e) {
         echo '<script>
new Notify({
 title: "Failed to Send",
 text: "Someting went wrong, thats all we know",
 autoclose: true,
 autotimeout: 6000,
 status: "error"
});
</script>';
     }
 } ?>