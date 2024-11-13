<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

require_once('controller/Patient_controller.php');
require_once("controller/Template.php");

$template = new Template();
$template->view();