<?php
$pdo = new PDO('mysql:host=localhost;dbname=php_cms;encoding=utf8', 'admin', 'ambitne6789');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
