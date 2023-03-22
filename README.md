## Trader Interactive Interview

2023-03-21 19:00:00 - 19:15:00
  - Created new L10 project
  - Initialized git repository
  - Setup PHP 8.2 runtime with XDebug and verified unit tests passed

2023-03-21 19:30:00 - 
  - Install and setup sail with mysql (Docker Desktop already installed)
    - https://laravel.com/docs/10.x/sail#main-content
    - Port 80 already in use (another project), choosing 8088
    - Set `APP_PORT` and start `sail up -d`
    - Verify MySQL connection using Sequel Ace query browser
    - Setup test mysql container and `.env.testing` on port 8011
    - Create supporting directories
      - _.../contracts_
        - Store interfaces
      - _.../payloads_
          - Data transfer objects (DTOs)
      - _.../repositories_
          - Repository classes to connect with external APIs/DBs
      - _.../services_
          - Service classes to do the business logic



