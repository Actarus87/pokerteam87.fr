<?php
require_once $_SERVER['DOCUMENT_ROOT']."/config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/model/administration/administration.php";

visitUpdate();

if (!isset($_SESSION['membre_pseudo']) || $_SESSION['membre_pseudo'] != "Actarus"){
    error_reporting(0);
}

if (isset($_SESSION['membre_statut']) AND (($_SESSION['membre_statut'] == "Administrateur") || ($_SESSION['membre_statut'] == "Membre du CA"))) {
    global $year;
    $members = retrieveAllMembers("0");
    $memberNumber = count($members);
    $adherents = retrieveAllAdherent($year);
    $adherentNumber = count($adherents);
    $lastMember = retrieveLastMember();
    $lastItem = retrieveLastItem();
    require_once $_SERVER['DOCUMENT_ROOT']."/templates/administration/administration.php";
} else {
    displayMessage("Vous n'êtes pas autorisé à accéder à cette page !", "/index.php");
}