## Trader Interactive Interview

2023-03-21 19:00:00 - 19:15:00
  - Created new L10 project
  - Initialized git repository
  - Setup PHP 8.2 runtime with XDebug and verified unit tests passed

2023-03-21 19:30:00 - 22:30:00
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
    - Create repository, services
    - Created job, listeners, command
    - Found I was working on Task 2 as well

2023-03-22 18:30:00 - 20:00:00
  - Starting in on task 3, building the API endpoint
  - Create resource controller with test, add resource route without middleware
  - Don't need to create, update, or delete
  - Create Activity Service
    - Bind with app, bind with route service provider
  - Create Activity API resource for json response
    - With collection resource
  - Add ability to specify groupBy input parameter
  - Unit tests failed unexpectedly when running entire suite, forgot to use RefreshDatabase in one test case
  - Added groupBy resources
    - I spent too much time on this part. I wanted to find a better way.
  - Realized I was also doing Task 4
    - Instead, spent time in Postman to verify visually
    - Found that max_price wasn't populating correctly (null)
      - Improved unit tests to catch this
      - Found I was using MIN(min_price), not MAX(max_price)

2023-03-22 20:00:00 - 21:00:00
  - Start on task 5, frontend
  - I'm choosing vue.js, there seems to be a lot of demand for this framework
    - https://laravel.com/docs/10.x/vite#vue
    - Verify node v16+, Run `npm install`, installed vitejs/plugin-vue
    - Darn... I'm just now seeing Laravel Breeze, which scaffolds Laravel, Vite, and Vue.  Oh well.
    - https://laravel.com/docs/10.x/frontend#using-vue-react
      - Lots to learn here! Installed inertia.  Let's see what happens!
    - https://inertiajs.com/pages





