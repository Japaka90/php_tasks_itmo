<?php

const ENTITY_USER = 'user';

function userGetBy($attribute, $criteria)
{
    return storageGetItemBy(ENTITY_USER, $attribute, $criteria);
}


function userSave(array $user, array &$errors = null)
{
    if ($errors) {
        return $user;
    }

    $status = storageSaveItem(ENTITY_USER, $user);

    if (!$status) {
        $errors['db'] = 'Не удалось сохранить данные в базу';
    }
    return $user;
}