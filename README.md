## Trader Interactive Interview

2023-03-21 19:00:00 - 19:15:00
  - Created new L10 project
  - Initialized git repository
  - Setup PHP 8.2 runtime with XDebug and verified unit tests passed

2023-03-21 19:30:00 - 21:00:00
  - Install and setup sail with mysql (Docker Desktop already installed)
    - https://laravel.com/docs/10.x/sail#main-content
    - Port 80 already in use (another project), choosing 8088
    - Set `APP_PORT` and start `sail up -d`
    - Verify MySQL connection using Sequel Ace query browser
    - Setup test mysql container and `.env.testing` on port 8011
    - Run migrations
      - Error `nodename nor servname provided`, needed to add `mysql` to _/etc/hosts_
    - Create supporting directories
      - _.../app/Contracts_
        - Store interfaces
      - _.../app/Payloads_
          - Data transfer objects (DTOs)
      - _.../app/Repositories_
          - Repository classes to connect with external APIs/DBs
      - _.../app/Services_
          - Service classes to do the business logic
    - New branch for TASK-1
    - Create activities table migration, constants, and unit tests
      - Connection refused to test DB, DB server stopped, added tmpfs to docker-compose
      - Use `RefreshDatabase` trait
      - Tests passing!
    - Create model and factory with unit tests
      - Nothing to test in `Activity` model yet
    - Install `symplify/easy-coding-standard` package



