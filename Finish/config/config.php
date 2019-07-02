<?php
session_start();

define('SITE_DIR', __DIR__ . '/../');
define('CONFIG_DIR', SITE_DIR . 'config/');
define('DATA_DIR', SITE_DIR . 'data/');
define('ENGINE_DIR', SITE_DIR . 'engine/');
define('WWW_DIR', SITE_DIR . 'public/');
define('TEMPLATES_DIR', SITE_DIR . 'templates/');
define('ADM_DIR', SITE_DIR . 'public/admin/');
define('IMG_DIR', 'img/');

define('DB_HOST', 'localhost');
define('DB_USER', 'geek_brains');
define('DB_PASS', 'it1979tkf');
define('DB_NAME', 'geek_brains');


require_once ENGINE_DIR . 'functions.php';
require_once ENGINE_DIR . 'dbFunc.php';
require_once ENGINE_DIR . 'newsFunc.php';
require_once ENGINE_DIR . 'galleryFunc.php';
require_once ENGINE_DIR . 'reviewsFunc.php';
require_once ENGINE_DIR . 'calculatorFunc.php';
require_once ENGINE_DIR . 'productsFunc.php';
require_once ENGINE_DIR . 'cartFunc.php';

