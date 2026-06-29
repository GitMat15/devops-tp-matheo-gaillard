# 📝 RapidNote

[![CI](https://github.com/GitMat15/devops-tp-matheo-gaillard/actions/workflows/ci.yml/badge.svg)](https://github.com/GitMat15/devops-tp-matheo-gaillard/actions/workflows/ci.yml)
[![CD](https://github.com/GitMat15/devops-tp-matheo-gaillard/actions/workflows/cd.yml/badge.svg)](https://github.com/GitMat15/devops-tp-matheo-gaillard/actions/workflows/cd.yml)
![Dependabot](https://img.shields.io/badge/dependabot-enabled-brightgreen)

RapidNote est une application web simple de prise de notes développée en PHP avec une base de données MySQL. Elle permet d’ajouter, consulter, modifier et supprimer des notes rapidement via une interface intuitive et légère qui s'installe en 5 minutes !

## **Stack**

- PHP
- MySQL
- Apache
- Docker
- Docker Compose
- PHPUnit
- GitHub Actions
- phpMyAdmin

## **Lancer le projet**

### Prérequis :

- Docker Desktop
- Git

### Installation :

*1. Cloner le dépôt :*

```bash
git clone https://github.com/GitMat15/devops-tp-matheo-gaillard
cd devops-tp-matheo-gaillard
```

*2. Démarrer l'application :*

```bash
docker-compose up --build
```

*3. Accéder aux services :*

- Application : http://localhost:8000/index.php
- phpMyAdmin : http://localhost:8080/

## **Architecture :**

La documentation de l'architecture du projet est disponible dans le dossier :

```text
docs/
```

## **Fonctionnalités :**

- ✍️ Écrire une nouvelle note
- 📋 Afficher toutes les notes
- ✏️ Modifier une note existante
- 🗑️ Supprimer une note
- 🛠️ Tests automatisés avec PHPUnit
- ✅ Intégration continue avec GitHub Actions

## **Auteur du projet :**

Mathéo GAILLARD *Étudiant à Hexagone (M1-SI)*

## **Licence**

Ce projet est sous licence MIT. 
Voir le fichier [LICENSE](LICENSE).
