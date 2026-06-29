# DevOps Strategy — RapidNote

Ce document décrit la stratégie DevOps mise en place pour le projet **RapidNote**.  
L’objectif est d’assurer un développement structuré, des déploiements fiables et une bonne qualité globale du code.

---

## Gestion des branches

Le projet suit un workflow inspiré de GitFlow :

| Branche | Rôle |
|--------|------|
| main | Version stable (production) |
| dev | Intégration des nouvelles fonctionnalités |
| feature/* | Développement de nouvelles fonctionnalités |
| fix/* | Correction de bugs |

### Règles

- Aucun push direct sur `main`
- Les fonctionnalités passent par `dev` avant d’être livrées
- Utilisation de Pull Requests pour valider les changements

---

## Intégration Continue (CI)

Un pipeline CI est configuré avec **GitHub Actions**.

### Déclenchement

- Push sur `main`
- Pull Request vers `main`

### Étapes

1. Récupération du code source
2. Configuration de l’environnement PHP
3. Installation des dépendances (Composer)
4. Exécution des tests PHPUnit
5. Notification par email en cas de succès

### Objectifs

- Garantir la qualité du code
- Détecter rapidement les erreurs
- Automatiser les tests

---

## Déploiement Continu (CD)

Le déploiement est automatisé via GitHub Actions.

### Déclenchement

- Push sur la branche `main`

### Étapes

1. Build de l’image Docker
2. Envoi de l’image sur Docker Hub
3. Notification par email

### Objectifs

- Déployer rapidement et automatiquement
- Maintenir une version toujours disponible
- Réduire les erreurs humaines

---

## Conteneurisation

Le projet utilise **Docker** pour standardiser l’environnement.

### Avantages

- Portabilité de l’application
- Environnement identique en local et en production
- Facilité de déploiement

### Services

- Application PHP
- Base de données MySQL
- phpMyAdmin (pour la gestion BDD)

---

## Sécurité

Plusieurs bonnes pratiques sont appliquées :

- Utilisation de GitHub Secrets pour les informations sensibles
- Aucun mot de passe dans le code source
- Requêtes préparées avec PDO (anti SQL injection)
- Protection XSS via `htmlspecialchars`
- Séparation des configurations via `.env`

---

## Qualité du code

- Tests unitaires avec PHPUnit
- Commits structurés
- Code lisible et documenté
- Validation via CI avant mise en production

---

## Configuration et environnement

- Utilisation d’un fichier `.env` pour les variables sensibles
- Fourniture d’un `.env.example` pour faciliter l’installation
- Configuration centralisée

---

## 👨‍💻 Auteur

Mathéo GAILLARD (GitMat15)