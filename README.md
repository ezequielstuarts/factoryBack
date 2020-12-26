<h1 align="center">## Factory Backend Laravel</h1>
<div align="center"></div>

## Install

```
composer update
```
```
php artisan migrate:fresh
```
```
php artisan passport:install
```

## Standard 

Modelos y Clases: Capitalize + Singular. Ej: Client.
Controladores: Capitalize + Singular. Ej: ClientController
Tablas: SnakeCase + Plural. Ej: users, user_roles.
Campos: SnakeCase. Ej: user_id.
Foreign BelongsTo: Nombre de modelo en singular + SnakeCase.

## Route Api Documentation

[Documentacion Postaman Api](https://www.getpostman.com/collections/6c1d74b271425dfb1b31)

