# Event Management API

## Overview

The Event Management API is a RESTful service that allows users to manage events, including creating, retrieving, updating, and deleting event records. This API is built using PHP and MySQL, providing a lightweight solution for event organization.

## Features

- Create, read, update, and delete events
- Search and filter eventsa
- JSON format responses

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- postman
- XAMP

## Installation

1. **Clone the repository:**
 
   ```bash
   git clone https://github.com/yourusername/event-management-api.git
   cd event-management-api

2. **install postman:**
    download and install via the link https://www.postman.com/downloads/?utm_source=postman-home

2. **install XAMMP:**
    download and install via the link https://www.apachefriends.org
    after installing add to path on environmental varriables

3. **Setup database:**
    Create a mysql database named management.
    Import the provided SQLschema located in sql/database.sql.

4. **Configure database settings:**
<?php
return [
    'host' => 'localhost',
    'dbname' => 'event_management',
    'username' => 'your_username',
    'password' => 'your_password',
];
 
5. **start php server:**
open xammp control panel and start the msql and appache server.![alt text](<Screenshot 2024-09-23 230139.png>)


## API Endpoints
## Events
- GET /api/events - Retrieve a list of events
- GET /api/events/{id} - Retrieve a list of events
- POST /api/events - Create a new event
- PUT /api/events/{id} - Update an existing event
- DELETE /api/events/{id} - Delete an event