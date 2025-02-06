Laravel Authentication with Role-Based Registration

Setup latest laravel and fresh mysql database.
Create two registration page, customer registration and admin registration with following fields.

First Name
Last Name
Email
Password

If user is registered with customer registration page, he will be assigned customer role.
If user is registered with admin registration page, he will be assigned admin role.
Default auth feature of email verification should be there for both registration page.
If user is trying to login without verification prevent the user and show the message that “You need to verify your account before login”.
And this needs to be done before the login process. Do not block the user after login.
Create another page for admin login with following fields.

Email
Password

This page will allow admin to login.
If users registered with customer registration page tries to login, app should show an error message "You are not allowed to login from here".


Some step of project to how to download and setup in to your local system

1.Clone the Repository
git clone https://github.com/Parthb2424/tech-practical
cd tech-practical

2. Install Dependencies
composer install
npm install && npm run dev

3.Set Up Environment Variables
Copy the .env.example file to .env
create the Database with "techpractical" name

4.Run Migrations
php artisan migrate

5.Start the Laravel Server
php artisan serve

----------------------------------------------------
Authentication Features
----------------------------------------------------
Customer 
->Registration
/customer/register

Role Assigned: customer
------------------------------------------------------
Admin 

->Registration
/admin/register

Role Assigned: admin

->Login
/admin/login
