# KVP-Backend

Travis CI build state: [![Build Status](https://travis-ci.org/HHS-Development/KVP-Backend.svg?branch=master)](https://travis-ci.org/HHS-Development/KVP-Backend)
## Setup
1. Checkout the repository
2. Run composer install
3. Run php app/console doctrine:database:create
4. Run php app/console doctrine:schema:create
5. Run php app/console cache:warmup
6. Configure your web server to point to the web directory of the project

## Restful routes

### Ticket routes
* GET /tickets Get all tickets
* POST /tickets 


* GET /tickets/{id}
* PUT /tickets/{id}
* DELETE /tickets/{id}


* POST /tickets/{id}/vote
* DELETE /tickets/{id}/vote


* POST /tickets/{id}/comment
* PUT /tickets/{id}/comment/{id}
* DELETE /tickets/{id}/comment/{id}


* PUT /tickets/{id}/state

### User management routes




