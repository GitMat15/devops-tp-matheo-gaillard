<?php
session_start();
require_once 'db/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';

    // Insertion de la nouvelle note dans la base de données
    $sql = "INSERT INTO notes (title, description) VALUES (:title, :description)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $_SESSION['flash_message'] = 'Note ajoutée avec succès.';
        header('Location: view_notes.php');
        exit;
    } else {
        $error = 'Erreur lors de l\'ajout de la note.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>📝 RapidNote - Rédiger une note</title>
    <link rel="stylesheet" href="../public/css/styles.css">
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

        .form-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        h1 {
            text-align: center;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        input, textarea {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            margin-bottom: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        /* Zone de texte bien centrée */
        input, textarea {
            display: block;
            width: 100%;
            box-sizing: border-box;
        }

        /* Bouton avec emoji à gauche */
        .btn {
            background-color: #27ae60; /* Couleur verte */
            color: #fff;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Pour espacer l'emoji et le texte */
        }

        .btn:hover {
            background-color: #2ecc71; /* Couleur verte plus claire au survol */
        }

        .flash-message {
            background-color: #e0ffe0;
            border: 1px solid #90ee90;
            padding: 1rem;
            border-radius: 5px;
            margin-bottom: 1.5rem;
        }

        .btn-container {
            text-align: center;
            margin-top: 2rem;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            .form-container {
                width: 100%;
                padding: 1rem;
            }
        }

        
    theme-btn {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        border: none;
        border-radius: 50%;
        width: 45px;
        height: 45px;
        background: #34495e;
        color: white;
        cursor: pointer;
        font-size: 18px;
    }

    .dark-mode {
        background-color: #121212;
        color: #ffffff;
    }

.dark-mode .container,
.dark-mode h1,
.dark-mode label {
    color: #ffffff;
}

.dark-mode .form-container {
    background-color: #1e1e1e;
    box-shadow: 0 0 10px rgba(255,255,255,0.05);
}

.dark-mode input,
.dark-mode textarea {
    background-color: #2a2a2a;
    color: #ffffff;
    border: 1px solid #444;
}

.dark-mode input::placeholder,
.dark-mode textarea::placeholder {
    color: #bbbbbb;
}

.dark-mode .flash-message {
    background-color: #1f3b1f;
    border-color: #2ecc71;
    color: #ffffff;
}

    </style>
</head>
<body>
    <button id="theme-toggle" class="theme-btn">🌙</button>
    <?php include 'templates/header.php'; ?>

    <main class="container">
        <h1>Commencez à écrire votre nouvelle note...</h1>

        <!-- Flash message -->
        <?php if (isset($error)): ?>
            <div class="flash-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div class="form-container">
            <form action="" method="POST">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Contenu :</label>
                <textarea id="description" name="description" required></textarea>

                <div class="btn-container">
                    <button type="submit" class="btn">
                        Ajouter la note
                    </button>
                </div>
            </form>
        </div>
    </main>

<script>
    const toggleBtn = document.querySelector('.menu-toggle');
    const navList = document.getElementById('nav-list');

    if (toggleBtn && navList) {
        toggleBtn.addEventListener('click', () => {
            navList.classList.toggle('show');
        });
    }

    const themeBtn = document.getElementById('theme-toggle');

    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');

        if (themeBtn) {
            themeBtn.textContent = '☀️';
        }
    }

    if (themeBtn) {
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
    }
</script>
</body>
</html>