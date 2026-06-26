<?php
session_start();
require_once 'db/connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);

    $_SESSION['flash_message'] = 'Votre note supprimée avec succès.';
    header('Location: view_notes.php');
    exit;
}

$_SESSION['flash_message'] = 'Aucune note à supprimer.';
header('Location: view_notes.php');
exit;
