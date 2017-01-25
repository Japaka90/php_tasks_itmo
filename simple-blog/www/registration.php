<?php

require_once __DIR__ . '/../init.php';

$data = $_POST['user'] ?? [];
$errors = [];
$user = [];
$id =  $data['user'] ?? $_GET['user'] ?? null;

if ($id) {
    $user = userGetById((int) $id);

    if (!$user) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit('Пользователь не найден!');
    }
}

if ($data) {
    $user = userSave($data);

    //защита от F5
    if (!$errors) {
        // всплывающее сообщение об успехе
        header('location: registration.php?user=' . $user['user']);
        var_dump($_POST['user']);
        exit;
    }
}

?>


<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<form class="registration" method=post"">
    <div>
        <label for="user_login">Введите логин</label>
        <input name="user[login]" id="user_login" type="text" value="<?= $user['login'] ?? '' ?>">
    </div>
    <div>
        <label for="user_password">Введите пароль</label>
        <input name="user[password]" id="user_password" type="password">
    </div>
    <?php if (isset($user['id'])): ?>
        <input type="hidden" name="user['user']" value="<?= $user['user']?>">
    <?php endif; ?>
    <div>
        <input type="submit" value="Зарегистрироваться">
    </div>
</form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>