# Laravel To-Do List Application

A simple and responsive **To-Do List web application** built with Laravel and PHP. The application allows users to create, edit, complete, and delete tasks while storing the data in a MySQL database.

## 🚀 Features

* Add new tasks
* Edit existing tasks
* Mark tasks as completed
* Delete tasks
* Display task completion status
* Responsive user interface

## 🛠️ Technologies Used

* **Laravel** – Backend framework
* **PHP** – Server-side programming
* **MySQL** – Database
* **Blade** – Laravel templating engine
* **Bootstrap** – UI and responsive design
* **JavaScript** – Client-side functionality
* **jQuery** – AJAX requests and DOM manipulation
* **AJAX** – Dynamic task editing without a full page refresh
* **Git & GitHub** – Version control

## 📂 Project Structure

Some of the main files used in the project:

```text
app/
├── Models/
│   └── ToDo.php
│
├── Http/
│   └── Controllers/
│       └── ToDoController.php

resources/
└── views/
    ├── pages/
    │   ├── index.blade.php
    │   └── edit.blade.php
    │
    └── layouts/
        └── app.blade.php

routes/
└── web.php

database/
└── migrations/
```

## ⚙️ Requirements

Before running the project, make sure you have:

* PHP 8.x or later
* Composer
* MySQL
* phpMyAdmin
* Node.js and npm
* Laravel

You can use **XAMPP** or another local PHP/MySQL development environment.

---

# 🔧 Installation

## 1. Clone the repository

```bash
git clone https://github.com/oshadaDev/To-Do-Web-App.git
```

Move into the project directory:

```bash
cd To-Do-Web-App
```

## 2. Install PHP dependencies

Run:

```bash
composer install
```

## 3. Install frontend dependencies

```bash
npm install
```

## 4. Create the `.env` file

Copy the example environment file:

```bash
cp .env.example .env
```

On Windows, you can also manually copy `.env.example` and rename the copy to:

```text
.env
```

## 5. Generate the Laravel application key

Run:

```bash
php artisan key:generate
```

---

# 🗄️ Setting Up MySQL Using phpMyAdmin

You can use **phpMyAdmin** to create the database required by the application.

### Step 1 — Start XAMPP

Open XAMPP and start:

* Apache
* MySQL

### Step 2 — Open phpMyAdmin

Open:

```text
http://localhost/phpmyadmin
```

### Step 3 — Create a database

Click **New** in phpMyAdmin and create a database, for example:

```text
todo_app
```

You don't need to manually create the `todos` table if you are using the Laravel migrations included with this project.

### Step 4 — Configure `.env`

Open the project's `.env` file and update the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=
```

If your MySQL installation has a password, replace the empty `DB_PASSWORD` value with your MySQL password.

For a default XAMPP installation, the username is commonly:

```text
root
```

and the password is commonly empty.

---

# 🏗️ Create the Database Tables

After configuring the `.env` file, run:

```bash
php artisan migrate
```

Laravel will create the required database tables automatically.

You should then be able to see the tables in:

```text
phpMyAdmin → todo_app
```

The Todo table will contain fields such as:

```text
id
title
done
created_at
updated_at
```

---

# ▶️ Run the Application

Start the Laravel development server:

```bash
php artisan serve
```

You should see something similar to:

```text
INFO  Server running on [http://127.0.0.1:8000].
```

Open the displayed URL in your browser:

```text
http://127.0.0.1:8000
```

You can now start adding tasks.

---

# 🎨 Running Frontend Assets

If the project uses Vite, run:

```bash
npm run dev
```

Keep this terminal running while developing.

You can then access the Laravel application through:

```text
http://127.0.0.1:8000
```

---

# 📝 How to Use

### Add a Task

Enter a task in the input field and click **Add**.

### Complete a Task

Click the green check button to mark the task as completed.

### Edit a Task

Click the blue edit button. The task information will be loaded into a Bootstrap modal using AJAX.

Update the task and click **Update**.

### Delete a Task

Click the red trash button to delete the task.

---

# 🔄 Application Flow

The application follows Laravel's MVC architecture:

```text
User
  ↓
Blade View
  ↓
Laravel Route
  ↓
Controller
  ↓
Eloquent Model
  ↓
MySQL Database
```

For the AJAX edit functionality:

```text
Edit Button
     ↓
JavaScript / jQuery
     ↓
AJAX Request
     ↓
Laravel Route
     ↓
Controller
     ↓
Blade Edit View
     ↓
AJAX Response
     ↓
Bootstrap Modal
```

---

# 🧠 What I Learned

Through this project, I gained practical experience with:

* Laravel MVC architecture
* Laravel routing
* Eloquent ORM
* MySQL database integration
* Blade templating
* CRUD operations
* Form handling and CSRF protection
* Bootstrap responsive UI
* JavaScript and jQuery
* AJAX requests
* Bootstrap modals
* Frontend-backend integration
* Debugging Laravel and PHP applications

The project also helped me improve my problem-solving skills by troubleshooting issues related to routing, Eloquent methods, database configuration, Blade layouts, JavaScript, and AJAX.

---

# 📸 Screenshots

You can add screenshots of the application here:

```markdown
![To-Do Application](screenshots/home.png)
```

Recommended screenshots:

<img width="1830" height="931" alt="4" src="https://github.com/user-attachments/assets/70803a58-d165-45b5-bb82-e89ece656d65" />


---
