<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['upload_path'] = "./assets/img/public/";
$config['max_size'] = "5120";
$config['max_width'] = "0";
$config['max_height'] = "0";
$config['allowed_types'] = "jpg|jpeg|png";
$config['file_ext_tolower'] = TRUE;
$config['overwrite'] = TRUE;