# music_player
A single page application built entirely with Laravel framework and MySql using Eloquent ORM.
You can upload your songs and they will be stored locally (under public/storage/myMusic)
and a link will be added to your DB.

Instrucions:
1. Create a database named 'music'.
2. Run the migration files from the command line: php artisan migrate.
3. Configure the .env file with the DB name, username and password.
4. Run the following in the command line: php artisan storage:link (creates a symbolic link to the storage folder)
5. Run php artisan serve and go to localhost:8000/player in your browser.

Enjoy.
