# Points importants sur la sécurité — RapidNote

### Exposition de secrets

- Utiliser les **GitHub Secrets** pour les workflows (MAIL, DOCKER, etc.)

---

### Indisponibilité de la base de données

- Utiliser Docker pour isoler la base de données
- Vérifier que les conteneurs sont actifs
- Sauvegarder régulièrement les données

---

### Vulnérabilités dans le code

- Utiliser des requêtes préparées avec PDO (protection contre les injections SQL)
- Mettre à jour régulièrement les dépendances PHP

---

### Problèmes liés à Docker

- Utiliser des images Docker officielles
- Maintenir les images à jour
- Surveiller les logs des conteneurs

---

### Pipeline CI/CD

- Vérifier que les tests PHPUnit passent avant déploiement
- Utiliser GitHub Actions pour automatiser les vérifications
- Ne déployer que du code validé sur la branche `main`
