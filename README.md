## Factory Backend

#Install

1)- composer update
2)- php artisan migrate:fresh
3)- php artisan passport:install

## Standard 

Modelos y Clases: Capitalize + Singular. Ej: Client.
Controladores: Capitalize + Singular. Ej: ClientController
Tablas: SnakeCase + Plural. Ej: users, user_roles.
Campos: SnakeCase. Ej: user_id.
Foreign BelongsTo: Nombre de modelo en singular + SnakeCase.


