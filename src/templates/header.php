<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Open-Note - Prise de Notes Rapide</title>
    <link rel="stylesheet" href="/css/styles.css">
    <style>
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
    </header>

    <script>
        const toggleBtn = document.querySelector('.menu-toggle');
        const navList = document.getElementById('nav-list');

        toggleBtn.addEventListener('click', () => {
            navList.classList.toggle('show');
        });
    </script>
</body>
</html>
