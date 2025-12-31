<?php
require __DIR__ . '/../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);
try {
    // Cấu hình máy chủ SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'datpltn205@gmail.com';
    $mail->Password   = 'xzxh hwms dmea jkel';// Mật khẩu ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    // Người gửi và người nhận
    $mail->setFrom('datpltn205@gmail.com', 'Mailer Demo');
    $mail->addAddress('23010541@st.phenikaa-uni.edu.vn', 'Người nhận');
    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = 'Test mail from PHPMailer';
    $mail->Body    = '<b>Hello!</b> Đây là email thử nghiệm gửi bằng PHPMailer + Gmail.';
    $mail->AltBody = 'Hello! Đây là email thử nghiệm gửi bằng PHPMailer + Gmail.';

    $mail->send();
    echo 'Email đã được gửi thành công';

} catch (Exception $e) {
    echo "Lỗi khi gửi: {$mail->ErrorInfo}";
}

?>