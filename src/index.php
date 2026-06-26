<?php
require_once 'db/connection.php';

function fetchNotes($conn) {
    $sql = "SELECT * FROM notes ORDER BY created_at DESC LIMIT 3";  // Limite aux 3 dernières notes
    $stmt = $conn->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$notes = fetchNotes($pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 RapidNote - Accueil</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
        /* Page styling */
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
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .note-card h3 {
            margin-top: 0;
            font-size: 1.5rem;
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

        /* Navigation */
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

        /* Burger menu button */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #ecf0f1;
            cursor: pointer;
        }

        /* Mobile styles */
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

        /* Button styling */
        .btn {
            background-color: #2980b9;
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #3498db;
        }

        .btn-container {
            margin-top: 2rem;
        }

    .theme-btn {
        position: absolute;
        top: 1.5rem;
        left: 1.5rem;
        border: none;
        background: #34495e;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
    }

    .dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

    .dark-mode header {
        background-color: #1a1a1a;
    }

    .dark-mode .note-card {
        background-color: #1e1e1e;
        color: #ffffff;
    }

    .dark-mode .note-card p,
    .dark-mode .note-date {
        color: #cccccc;
    }

    .dark-mode nav a {
        color: white;
    }

    .dark-mode .btn {
        background-color: #4a90e2;
    }

    .dark-mode .btn:hover {
        background-color: #357abd;
    }

    </style>
</head>
<body>
    <header>
    <button class="menu-toggle" aria-label="Menu">&#9776;</button>
    <button id="theme-toggle" class="theme-btn">🌙</button>
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
        <section>
            <h1>Mes dernières notes (affichage des 3 plus récentes) :</h1>
            <div class="recent-notes">
                <?php
                if (empty($notes)) {
                    echo "<p>⚠️ Aucune note récente à afficher.</p>";
                } else {
                    foreach ($notes as $note) {
                        echo "<div class='note-card'>
                                <h3>" . htmlspecialchars($note['title']) . "</h3>
                                <p>" . nl2br(htmlspecialchars($note['description'])) . "</p>
                                <p class='note-date'>Créée le : " . date('d/m/Y à H:i', strtotime($note['created_at'])) . "</p>
                            </div>";
                    }
                }
                ?>
            </div>
        </section>

        <section class="btn-container">
            <a href="add_note.php" class="btn">✍️ Écrire une nouvelle note</a>
            <a href="view_notes.php" class="btn" style="margin-left: 10px;">📋 Consulter toutes les notes</a>
        </section>
    </main>

    <script>
        const toggleBtn = document.querySelector('.menu-toggle');
        const navList = document.getElementById('nav-list');

        toggleBtn.addEventListener('click', () => {
         navList.classList.toggle('show');
     });

        const themeBtn = document.getElementById('theme-toggle');

    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
        themeBtn.textContent = '☀️';
    }

        themeBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
            themeBtn.textContent = '☀️';
         } else {
            localStorage.setItem('theme', 'light');
            themeBtn.textContent = '🌙';
        }
        });
    </script>
</body>
</html>