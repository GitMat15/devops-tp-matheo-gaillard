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
    </style>
</head>
<body>
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

        toggleBtn.addEventListener('click', () => {
            navList.classList.toggle('show');
        });
    </script>
</body>
</html>
