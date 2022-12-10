How to Setup a Laravel Project:

1-Clone GitHub repo for this project locally
https://github.com/yacinsantos/RESTful-API-service-for-a-TODO-list-app.git

or download the zip folder

2-cd into this Todo-api project after you cloned it

3-Install Composer Dependencies this will add a composer.json file

composer install

4-Install NPM Dependencies this will add a packages.json file
npm install or yarn

5-Create a copy of your .env file

cp .env.example .env

6-Generate an app encryption key and add it to the .env file in the APP_KEY field
php artisan key:generate

7-Create an empty database for our application
in this project name it "todo_api_db"

8-In the .env file, add database information to allow Laravel to connect to the database by filling these filed:
(DB_HOST,DB_PORT,DB_DATABASE,DB_USERNAME,DB_PASSWORD)

9-Migrate the database
php artisan migrate

10- these are the api endpoints that you can use

* create new todo list
http://127.0.0.1:8000/api/todos (POST method)

* Adding a new TODO item
http://127.0.0.1:8000/api/todos/{todo_id}/items (POST method)

* Listing all TODO items
http://127.0.0.1:8000/api/todos/{todo_id} (GET method)

* Marking a TODO item as completed
http://127.0.0.1:8000/api/todoitems/{todo_item_id}/completed (PATCH method)

* Listing TODO items not completed yet
http://127.0.0.1:8000/api/todos/{todo_id}/notcompleted (GET method)

* TODO items are stored in a database
http://127.0.0.1:8000/api/todoitems (GET method)

Hosting the project
If you want to host this project on a web server, you will need to configure the web server to point to public directory. This will vary depending on the type of web server you are using (I suggest VPS web hosting) but you can find detailed instructions in the Laravel documentation.

and Hopefully that's all you need to start working on it.
