# CONTRIBUTING — RapidNote

Merci de contribuer à **RapidNote** !  
Ce document décrit le workflow Git et les bonnes pratiques à suivre pour garantir un projet propre et maintenable !

---

## Workflow Git

### Branches

| Branche | Rôle |
|--------|------|
| main | Version stable (Production) |
| dev | Intégration des nouvelles fonctionnalités préparées en amont |
| feature/<nom> | Développement d’une fonctionnalité en particulier |


⚠️ **Règle principale :**  
Aucun push direct sur `main`.
Toutes les modifications passent par `dev` via une Pull Request !

---

## Création d’une branche

Avant de commencer, assurez-vous d’être à jour :

```bash
git checkout dev
git pull origin dev