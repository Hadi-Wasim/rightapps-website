<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
    exit;
}

$name    = trim(strip_tags($_POST['name'] ?? ''));
$email   = trim(strip_tags($_POST['email'] ?? ''));
$company = trim(strip_tags($_POST['company'] ?? ''));
$phone   = trim(strip_tags($_POST['phone'] ?? ''));
$subject = trim(strip_tags($_POST['subject'] ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

if (empty($name) || empty($email) || empty($message)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Name, email, and message are required.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Please enter a valid email address.']);
    exit;
}

$to      = 'info@rightapps.net';
$subject = $subject ?: 'New Contact Form Submission';
$headers = implode("\r\n", [
    'From: Rightway Systems Website <no-reply@rightapps.net>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
]);

$body = '
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"></head>
<body style="font-family:Arial,sans-serif;background:#f4f4f4;padding:20px;">
  <div style="max-width:600px;margin:auto;background:#fff;border-radius:8px;overflow:hidden;">
    <div style="background:#071018;padding:24px 32px;">
      <h2 style="color:#fff;margin:0;font-size:20px;">New Contact Form Submission</h2>
      <p style="color:#aaa;margin:4px 0 0;font-size:13px;">From rightapps.net</p>
    </div>
    <div style="padding:32px;">
      <table style="width:100%;border-collapse:collapse;">
        <tr><td style="padding:8px 0;color:#555;width:120px;font-size:14px;"><strong>Name:</strong></td><td style="padding:8px 0;font-size:14px;">' . htmlspecialchars($name) . '</td></tr>
        <tr><td style="padding:8px 0;color:#555;font-size:14px;"><strong>Email:</strong></td><td style="padding:8px 0;font-size:14px;"><a href="mailto:' . htmlspecialchars($email) . '">' . htmlspecialchars($email) . '</a></td></tr>
        <tr><td style="padding:8px 0;color:#555;font-size:14px;"><strong>Company:</strong></td><td style="padding:8px 0;font-size:14px;">' . htmlspecialchars($company ?: '—') . '</td></tr>
        <tr><td style="padding:8px 0;color:#555;font-size:14px;"><strong>Phone:</strong></td><td style="padding:8px 0;font-size:14px;">' . htmlspecialchars($phone ?: '—') . '</td></tr>
        <tr><td style="padding:8px 0;color:#555;font-size:14px;"><strong>Subject:</strong></td><td style="padding:8px 0;font-size:14px;">' . htmlspecialchars($subject) . '</td></tr>
      </table>
      <hr style="border:none;border-top:1px solid #eee;margin:20px 0;">
      <p style="color:#555;font-size:14px;"><strong>Message:</strong></p>
      <p style="color:#333;font-size:14px;line-height:1.6;white-space:pre-wrap;">' . htmlspecialchars($message) . '</p>
    </div>
    <div style="background:#f9f9f9;padding:16px 32px;text-align:center;">
      <p style="color:#aaa;font-size:12px;margin:0;">This email was sent from the contact form at rightapps.net</p>
    </div>
  </div>
</body>
</html>';

$sent = mail($to, $subject, $body, $headers);

if ($sent) {
    echo json_encode(['success' => true, 'message' => 'Thank you! We\'ll be in touch within 24 hours.']);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Sorry, something went wrong. Please email us directly at info@rightapps.net']);
}
