<?php
require_once '../Ayuda/utilities.php';
require_once 'persona.php';
require_once '../service/IServiceBase.php';
require_once 'PersonServiceCookies.php';

$service = new PersonServiceCookies();

$isContainId = isset($_GET['id']);

if ($isContainId) {
    $personId = $_GET['id'];
    $service->Delete($personId);
}
header('Location: ../index.php');
exit();