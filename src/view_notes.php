<?php
session_start();
require_once 'db/connection.php';

function fetchNotes($conn) {
    $sql = "SELECT * FROM notes ORDER BY created_at DESC";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$notes = fetchNotes($pdo);
$flash = $_SESSION['flash_message'] ?? null;
unset($_SESSION['flash_message']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>📝 RapidNote - Mes notes</title>
    <link rel="stylesheet" href="public/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ecf0f1;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 2rem;
        }

        .recent-notes {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .note-card {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .note-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .note-card p {
            font-size: 1rem;
            color: #555;
        }

        .note-card .note-date {
            font-size: 0.9rem;
            color: #888;
            margin-top: 0.5rem;
        }

        .note-actions {
            margin-top: 1rem;
            display: flex;
            gap: 0.5rem;
        }

        .edit-button {
            background-color: #2980b9;
            color: white;
            font-weight: bold;
            padding: 7px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .delete-button {
            background-color: #c0392b;
            color: white;
            font-weight: bold;
            padding: 7px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
        }

        .edit-button:hover,
        .delete-button:hover {
            opacity: 0.9;
            cursor: pointer;
        }

        .flash-message {
            background-color: #e0ffe0;
            border: 1px solid #90ee90;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
        }

        /* Header styling */
        header {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 1.5rem;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2rem;
        }

        header h2 {
            margin-top: 0.5rem;
            font-weight: normal;
            font-size: 1.2rem;
            color: #bdc3c7;
        }

        nav {
            margin-top: 1rem;
        }

        nav ul {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        nav a {
            color: #ecf0f1;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #ecf0f1;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
                flex-direction: column;
                gap: 1rem;
                margin-top: 1rem;
            }

            nav ul.show {
                display: flex;
            }

            .menu-toggle {
                display: inline-block;
                position: absolute;
                top: 1.5rem;
                right: 1.5rem;
            }

            header {
                position: relative;
            }
        }
    </style>
</head>
<body>

<header>
    <button class="menu-toggle" aria-label="Menu">&#9776;</button>
    <h1>📝 RapidNote</h1>
    <h2>Prenez des notes en quelques clics !</h2>
    <nav aria-label="Navigation principale">
        <ul id="nav-list">
                <li><a href="index.php">🏠 Accueil</a></li>
                <li><a href="view_notes.php">📋 Mes notes</a></li>
                <li><a href="add_note.php">✍️ Nouvelle note</a></li>
        </ul>
    </nav>
</header>

<main class="container">
    <h1>Toutes mes notes :</h1>

    <?php if ($flash): ?>
        <div class="flash-message">
            <?= htmlspecialchars($flash) ?>
        </div>
    <?php endif; ?>

    <?php if (empty($notes)): ?>
        <p>⚠️ Aucune note pour le moment.</p>
    <?php else: ?>
        <div class="recent-notes">
            <?php foreach ($notes as $note): ?>
                <div class="note-card">
                    <?php if (!empty($note['title'])): ?>
                        <div class="note-title"><?= htmlspecialchars($note['title']) ?></div>
                    <?php endif; ?>
                    <p><?= nl2br(htmlspecialchars($note['description'])) ?></p>
                    <div class="note-date">Créée le : <?= date('d/m/Y à H:i', strtotime($note['created_at'])) ?></div>
                    <div class="note-actions">
                        <a href="edit_note.php?id=<?= $note['id'] ?>" class="edit-button">✏️ Modifier</a>
                        <a href="delete_note.php?id=<?= $note['id'] ?>" class="delete-button" onclick="return confirm('Supprimer cette note ?')">🗑️ Supprimer</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<script>
    const toggleBtn = document.querySelector('.menu-toggle');
    const navList = document.getElementById('nav-list');

    toggleBtn.addEventListener('click', () => {
        navList.classList.toggle('show');
    });
</script>

</body>
</html>
