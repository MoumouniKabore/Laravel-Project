## Comment lancer le projet

1. composer install

2. npm install

3.  * Copier et coller le fichier '.env.example'
    * Renommer le fichier coller en '.env' (Base de donées sqlite utiliser par défaut)

4. php artisan optimize:clear

5. php artisan key:generate

6. php artisan storage:link

7. php artisan migrate:fresh --seed

8.  * php artisan serve
    * npm run dev