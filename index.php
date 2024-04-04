<?php

$config = require_once 'config.php';
require_once 'funcstions.php';
require_once 'classes/Db.php';
require_once 'classes/Pagination.php';

$db = (Db::getInstance())->getConnection($config['db']);

$page = $_GET['page'] ?? 1;
$per_page = $config['per_page'];
$total = get_count('city');
$pagination = new Pagination((int)$page, $per_page, $total);
$start = $pagination->get_start();
$cities = get_cities($start, $per_page);

require_once 'views/index.tpl.php';
