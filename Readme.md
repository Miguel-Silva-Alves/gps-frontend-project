gi# Sport Manager
## How to run
- sudo docker compose up --build

## Pages
- http://localhost:8080/home.php

### Para criar usuarios
- docker exec -it app bash -c "bash /var/www/html/database/generate_users.sh"
