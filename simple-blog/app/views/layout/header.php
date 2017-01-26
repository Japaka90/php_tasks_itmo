<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php if (isAuthorized()):?>
<div>
    <h2>Вы вошли как <?= $_SESSION['user']['username'] ?></h2>
    <a href="logout.php"><button>Выход</button></a>
</div>
<?php endif; ?>