<?php

/**
 * Récupère les notes depuis la base de données.
 *
 * @param PDO $pdo
 * @return array
 */
function fetchNotes(PDO $pdo): array
{
    // Requête SQL pour récupérer toutes les notes, triées du plus ancien au plus récent
    $sql = "SELECT * FROM notes ORDER BY created_at ASC"; // Trier du plus ancien au plus récent
    $stmt = $pdo->query($sql);
    
    // Retourner toutes les notes sous forme de tableau associatif
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
