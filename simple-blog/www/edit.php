<?php

require_once __DIR__ . '/../init.php';

if (!isAuthorized()) {
    header('location: login.php');
    exit;
}

$data = $_POST['post'] ?? [];
$errors = [];
$post = [];
$id =  $data['id'] ?? $_GET ?? null;

if ($id) {
    $post = postGetById((int) $id);

    if (!$post) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not found');
        exit('Запись не найдена!');
    }
}

if ($data) {
    $msg = 'Запись успешно ' . ($id ? 'обновлена' : 'добавлена');
    $post = postSave($data);

    //защита от F5
    if (!$errors) {
        // всплывающее сообщение об успехе
        header('location: edit.php?id=' . $post['id']);
        exit;
    }

    // всплывающее сообщение с ошибками
}

?>




<?php include ROOT_DIR . '/app/views/layout/header.php'; ?>

<h1>
    <?= isset($post['id']) ? 'Редактировать запись' : 'Новая запись' ?>
</h1>

<form method="post">
    <div>
        <label for="post_title">Заголовок</label>
        <input name="post[title]" id="post_title" type="text" value="<?= $post['title'] ?? '' ?>">
    </div>
    <div>
        <label for="post_content">Содержимое</label>
        <textarea name="post[content]" id="post_content"><?= $post['content'] ?? '' ?></textarea>
    </div>
    <?php if (isset($post['id'])): ?>
        <input type="hidden" name="post['id']" value="<?= $post['id']?>">
    <?php endif; ?>
    <div>
        <input type="submit" value="Отправить">
    </div>
</form>

<?php include ROOT_DIR . '/app/views/layout/footer.php'; ?>
