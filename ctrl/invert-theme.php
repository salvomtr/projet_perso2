<?php

$oldValue = $_COOKIE['prefer-inverted-theme'];
$nextValue = !$oldValue;

setcookie('prefer-inverted-theme', $nextValue);

header('Location: /');
