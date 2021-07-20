<html>
<head>
    <meta charset="UTF-8"/>
</head>
<body>
<div>
    <form action="" method="POST">
        <label for="surname">Фамилия</label><br>
        <input type="text" name="surname" id="surname" size=10>
        <br><br>
        <label for="name">Имя</label><br>
        <input type="text" name="name" id="name" size=10>
        <br><br>
        <label for="phone">Телефон</label><br>
        <input type="text" name="phone" id="phone" size=10 required>
        <br><br>
        <label for="message">Сообщение</label><br>
        <textarea type="text" name="message" id="message" size=10 value="+7-"></textarea>
        <br><br>
        <input type=submit value=Отправить>
    </form>
</div>
</body>
</html>

<?php
if (isset($_POST['phone'])) {
    $admin_email = "dmitrii.rudko1@gmail.com";
    $subject = "Test";
    $header = "From " . $_POST['name'] . $_POST['surname'] . '\n' . $_POST['phone'];
    $result = mail($admin_email, $subject, $_POST['message'], $header);
    if ($result) {
        echo 'Готово';
    } else {
        echo 'Ошибка';
    }
}
?>