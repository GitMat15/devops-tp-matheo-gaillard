<?php
use PHPUnit\Framework\TestCase;

class NoteTest extends TestCase
{
    // Test de la fonction fetchNotes()
    public function testFetchNotesReturnsArray()
    {
        // Simuler une base de données en mémoire (SQLite)
        $pdo = new PDO('sqlite::memory:');
        
        // Créer la table des notes
        $pdo->exec("CREATE TABLE notes (id INTEGER PRIMARY KEY, title TEXT, description TEXT, created_at TEXT)");
        
        // Insérer des données de test
        $pdo->exec("INSERT INTO notes (title, description, created_at) VALUES ('Première note', 'Description de la première note', '2023-01-01 12:00:00')");
        $pdo->exec("INSERT INTO notes (title, description, created_at) VALUES ('Deuxième note', 'Description de la deuxième note', '2023-01-02 12:00:00')");
        
        // Inclure la fonction fetchNotes() si ce n'est pas déjà autoloadé
        require_once __DIR__ . '/../src/functions.php'; // Assurez-vous que le chemin est correct
        
        // Appelle la fonction définie dans functions.php
        $notes = fetchNotes($pdo);
        
        // Vérifier que le retour est bien un tableau
        $this->assertIsArray($notes);
        
        // Vérifier qu'il y a bien deux notes dans le tableau
        $this->assertCount(2, $notes);
        
        // Vérifier que les données sont correctes selon l'ordre de tri des dates (du plus ancien au plus récent)
        $this->assertEquals('Première note', $notes[0]['title']);
        $this->assertEquals('Deuxième note', $notes[1]['title']);
    }
}
