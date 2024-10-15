docker-compose exec app php artisan key:generate

docker-compose exec app php artisan migrate

docker-compose exec app php artisan db:seed --class=AsesorSeeder

docker-compose exec app php artisan route:list

1. Create a New Asesor (POST)
   ```curl -X POST http://localhost:8000/api/asesors \
   -H "Content-Type: application/json" \
   -d '{
   "correo": "example1@mail.com",
   "nombre": "Asesor 1"
   }'
   ```
2. List All Asesors (GET)
    ```
    curl -X GET http://localhost:8000/api/asesors
    ```

3. Retrieve a Specific Asesor (GET)
    ```
   curl -X GET http://localhost:8000/api/asesors/{id}
    ```
4. Update an Existing Asesor (PUT)
   ```
   curl -X PUT http://localhost:8000/api/asesors/{id} \

    -H "Content-Type: application/json" \
    -d '{
    "correo": "updated1@mail.com",
    "nombre": "Updated Asesor 1"
    }'
   ```
   
5. Delete an Asesor (DELETE)
    ```
    curl -X DELETE http://localhost:8000/api/asesors/{id}
    ```
