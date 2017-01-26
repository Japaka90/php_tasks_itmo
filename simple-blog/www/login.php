
<?php require_once  __DIR__ . '/../init.php'; ?>

<?php

if (isAuthorized()){
    header('location: index.php');
    exit;
}

$data = $_POST['user'] ?? [];

if ($data) {
    if (!authorize($data['username'], $data['password'])) {
    echo "Вы ввели неправильный логин или пароль";
    }
}

?>


<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>
    <h2>Войти на сайт</h2>
    <form method="post">
        <div>
            <label for="user_login">Введите логин</label>
            <input name="user[login]" id="user_login" type="text">
        </div>
        <div>
            <label for="user_password">Введите пароль</label>
            <input name="user[password]" id="user_password" type="password">
        </div>
        <div>
            <input type="submit" value="Войти">
        </div>
    </form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>