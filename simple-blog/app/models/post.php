<?php

const ENTITY_POST = 'post';

function postGetAll()
{
    $posts = storageGetAll(ENTITY_POST);

    uasort($posts, function ($a, $b) {
        return $b['created'] <=> $a['created'];
    });

    return $posts;
}

function postGetById($id)
{
    return storageGetItemById(ENTITY_POST, $id);
}

function postSave(array $post, array &$errors = null)
{
    // очистка и валидация данных потом

    if ($errors) {
        return $post;
    }

    $status = storageSaveItem(ENTITY_POST, $post);

    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
    }

    return $post;
}