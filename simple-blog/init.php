<?php

const ROOT_DIR = __DIR__;

require_once ROOT_DIR . '/libs/storage.php';
require_once ROOT_DIR . '/libs/sanitize.php';
require_once ROOT_DIR . '/libs/models/user.php';
require_once ROOT_DIR . '/libs/auth.php';
require_once ROOT_DIR . '/libs/view.php';

require_once ROOT_DIR . '/app/models/post.php';

session_start();