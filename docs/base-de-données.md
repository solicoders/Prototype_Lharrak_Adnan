# Base de donnée
## Lignes de commande utilisées
1. créer les migration
```bash
php artisan make:migration create_examens_table
php artisan make:migration create_questions_table

```
2. envoyer les donneés vers la database
```bash
php artisan migrate

```

## La form MLD de la base de données

  - Examens (Id,Titre,Description,date_debut,date_fin,created_at, updated_at)
  - Questions (Id,Titre,Option1,Option2,Id_examen,created_at, updated_at)
