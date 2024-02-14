<?php
$fullname = "";
$phone = "";
$email = "";
$message = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $fullname   = anti_inject($_POST['fullname']);
    $phone = anti_inject($_POST['phone']);
    $email   = anti_inject($_POST['email']);
    $message   = anti_inject($_POST['message']);
}
function anti_inject($data){
    $data = trim($data); //mengahpus spasi kosong kanan kiri data
    $data = stripslashes($data); //menghilangkan karakter /\
    $data = htmlspecialchars($data); //menghilangkan simbol khusus
    $data = preg_replace("/[^a-zA-Z0-9 @]/", "", $data); //mengkonformasi agar yang akan muncul hanya A-Z, a-z, 0-9, Tamabahkan juga spasi 1x agar dapat mmembaca spasi

    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validating</title>
    <link rel="stylesheet" href="all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="#" method="post" target="_self" enctype="multipart/form-data">
            <i class="fas fa-paper-plane"></i>
            <div class="input-group">
                <label>Full name</label>
                <input type="text" class="input" placeholder="Enter your Full name" name="fullname" id="contact-name" onkeyup="validateName()">
                <span id="name-error"></span>
            </div>
            <div class="input-group">
                <label>Phone No.</label>
                <input type="tel" class="input" placeholder="123 456 7890" name="phone" id="contact-phone" onkeyup="validatePhone()">
                <span id="phone-error"></span>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" class="input" placeholder="Enter your Email" name="email" id="contact-email" onkeyup="validateEmail()">
                <span id="email-error"></span>
            </div>
            <div class="input-group">
                <label>Message</label>
                <textarea rows="5" class="input" placeholder="Enter your Message" name="message" id="contact-message" onkeyup="validateMessage()"></textarea>
                <span id="message-error"></span>
            </div>
            <button onclick="return validateForm()">Submit</button>
            <span id="submit-error"></span>
        </form>
        <div class="output">
            <b>Fullname : <?php echo $fullname . "<br>" ?></b>
            <b>Phone No : <?php echo $phone . "<br>" ?></b>
            <b>Email Id : <?php echo $email . "<br>" ?></b>
            <b>Message  : <?php echo $message . "<br>" ?></b>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script src="https://kit.fontawesome.com/c425e24a8.js" crossorigin="anonymous"></script>
</html>