# Laravel CRUD API Documentation

To get started with testing the CRUD functionality of your Laravel application, you can use the following commands and
routes.

## Setting Up the Application

1. **Generate Application Key**

   ```bash

   ```
2. **Run Migrations**

   ```bash
   docker-compose exec app php artisan migrate
   ```
3. **Seed the Database**

   ```bash
    docker-compose exec app php artisan db:import-sql panteras2.sql
   ```
4. **List All Routes**

   ```bash
   docker-compose exec app php artisan route:list
   ```

## CRUD Operations

### Asesor CRUD Routes

1. **Create a New Asesor (POST)**

   ```bash
   curl -X POST http://localhost:8000/api/asesors \
   -H "Content-Type: application/json" \
   -d '{
   "correo": "example1@mail.com",
   "nombre": "Asesor 1"
   }'
   ```
2. **List All Asesors (GET)**

   ```bash
   curl -X GET http://localhost:8000/api/asesors
   ```
3. **Retrieve a Specific Asesor (GET)**

   ```bash
   curl -X GET http://localhost:8000/api/asesors/{id}
   ```
4. **Update an Existing Asesor (PUT)**

   ```bash
   curl -X PUT http://localhost:8000/api/asesors/{id} \
   -H "Content-Type: application/json" \
   -d '{
   "correo": "updated1@mail.com",
   "nombre": "Updated Asesor 1"
   }'
   ```
5. **Delete an Asesor (DELETE)**

   ```bash
   curl -X DELETE http://localhost:8000/api/asesors/{id}
   ```

### Assesory CRUD Routes

1. **Create a New Assesory (POST)**

   ```bash
   curl -X POST http://localhost:8000/api/assesories \
   -H "Content-Type: application/json" \
   -d '{
   "email": "assesory1@example.com",
   "date": "2024-10-19",
   "duration": 60,
   "id_sede": 1,
   "category_id": 1,
   "asesors": [1, 2]
   }'
   ```
2. **List All Assesories (GET)**

   ```bash
   curl -X GET http://localhost:8000/api/assesories
   ```
3. **Retrieve a Specific Assesory (GET)**

   ```bash
   curl -X GET http://localhost:8000/api/assesories/{id}
   ```
4. **Update an Existing Assesory (PUT)**

   ```bash
   curl -X PUT http://localhost:8000/api/assesories/{id} \
   -H "Content-Type: application/json" \
   -d '{
   "email": "updated_assesory@example.com",
   "date": "2024-11-01",
   "duration": 90,
   "id_sede": 2,
   "category_id": 2,
   "asesors": [3, 4]
   }'
   ```
5. **Delete an Assesory (DELETE)**

   ```bash
   curl -X DELETE http://localhost:8000/api/assesories/{id}
   ```
