<?php
$admin_email = "dmitrii.rudko1@gmail.com";
$subject = "Test";

$result = mail($admin_email, $subject, $_POST['message']);
if ($result){ echo 'Готово';}
else {echo 'Ошибка';}
header("Location: /index.html");