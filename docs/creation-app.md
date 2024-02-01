# Les lignes de commande utilisées
1. creation de projet Laravel
```bash
composer create-project laravel/laravel=10 .
```
2. install adminLTE avec npm
```bash
npm install admin-lte@3.1 --save
```
3. créer les model 
```bash
php artisan make:model Examen
php artisan make:model Question
```
4. créer les controller 
```bash
php artisan make:controller ExamenController
php artisan make:controller QuestionConteroller
```
5. créer les migration
```bash
php artisan make:migration create_examens_table
php artisan make:migration create_questions_table

```
6. créer les seeders
```bash
php artisan make:seeder create_examens_seeders
php artisan make:seeder create_questions_seeders

```
7. commands to create Request

```bash
php artisan make:request ValidateRequest
```
