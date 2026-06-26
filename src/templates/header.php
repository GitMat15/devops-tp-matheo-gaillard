<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapidNote - Prise de Notes Rapide</title>
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
