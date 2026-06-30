# Tests

Le projet RapidNote utilise **PHPUnit** pour vérifier le bon fonctionnement des principales fonctionnalités.

## Exécution des tests

Lancer les tests avec :

```bash
vendor/bin/phpunit
```

ou dans Docker :

```bash
docker-compose exec web vendor/bin/phpunit
```

---

## Tests implémentés

### Test de récupération des notes

**Fichier :**

```text
tests/NoteTest.php
```

**Objectif :**

Vérifier que la fonction `fetchNotes()` récupère correctement les notes depuis la base de données et retourne un tableau exploitable.

**Scénario testé :**

1. Création d'une base SQLite en mémoire.
2. Création de la table `notes`.
3. Insertion de deux notes de test.
4. Appel de la fonction `fetchNotes()`.
5. Vérification que :
   - le résultat est un tableau ;
   - le tableau contient exactement 2 notes ;
   - les titres récupérés correspondent aux données insérées.

**Assertions effectuées :**

```php
$this->assertIsArray($notes);
$this->assertCount(2, $notes);
$this->assertEquals('Première note', $notes[0]['title']);
$this->assertEquals('Deuxième note', $notes[1]['title']);
```

**Résultat attendu :**

La fonction retourne un tableau contenant les deux notes enregistrées dans la base de données de test.

---

## Intégration Continue

Les tests sont exécutés automatiquement par GitHub Actions lors des opérations de CI afin de garantir la stabilité de l'application avant chaque mise en production.
``