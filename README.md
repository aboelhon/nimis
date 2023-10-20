"# nimis" 

https://youtu.be/G2GbHf4EQJI


INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `birthdate`, `address`, `phone`, `photo`, `role`, `status`, `by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hany Sabry', 'admin', 'hany@msn.com', '$2y$10$61lXEtKGFYsZNGAm0IUgT.ozCtiLNhozsv1odfQoc.M/A67ctctFy', '0000-00-00', 'Giza - Egypt', '010000000000', 'admin/admin-photo/zqM8Mx0SGKa4PyKt8dLMkI61G50YszILySBw6yzL.jpg', 'admin', 'active', 'admin', NULL, '2023-08-15 01:11:10', '2023-08-15 01:11:10');



INSERT INTO `categories` (`id`, `name`, `description`, `by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Pants', 'All Classic & Casual & Sports Men\'s Pants', 'admin', NULL, '2023-08-14 23:44:09', '2023-08-14 23:50:34'),
(2, 'Men\'s T-shirt', 'All Classic & Casual & Sports Men\'s T-shirt', 'admin', NULL, '2023-08-14 23:45:29', '2023-08-14 23:56:01'),
(3, 'Men\'s Shoes', 'All Classic & Casual & Sports Men\'s Shoes', 'admin', NULL, '2023-08-14 23:57:24', '2023-08-14 23:57:24'),
(4, 'Women\'s Pants', 'All Classic & Casual & Sports Women\'s Pants', 'admin', NULL, '2023-08-15 00:27:27', '2023-08-15 00:27:27'),
(5, 'Women\'s T-shirt', 'All Classic & Casual & Sports Women\'s T-shirt', 'admin', NULL, '2023-08-15 00:42:12', '2023-08-15 00:42:12'),
(6, 'Women\'s Shoes', 'All Classic & Casual & Sports Women\'s Shoes', 'admin', NULL, '2023-08-15 00:42:58', '2023-08-15 00:42:58'),
(7, 'Kid\'s Pants', 'All Classic & Casual & Sports Kids\'s Pants', 'admin', NULL, '2023-08-15 01:09:05', '2023-08-15 01:09:41'),
(8, 'Kid\'s T-shirt', 'All Classic & Casual & Sports Kid\'s T-shirt', 'admin', NULL, '2023-08-15 01:10:42', '2023-08-15 01:10:42'),
(9, 'Kid\'s Shoes', 'All Classic & Casual & Sports Kid\'s Shoes', 'admin', NULL, '2023-08-15 01:11:10', '2023-08-15 01:11:10');


##################################
Because I didn't design the template [I'm not a Frontend developer].
 I had to display specific categories with a specific name
You can modify or customize the entire project as you wish
feel free to contact me
FB.COM/HANYMSA
##################################


1- create new .env file with database name "laravel" you can edit it later

2- composer update   wait for about 2 min

3- create .env file

4- php artisan key:generate

5- php artisan migrate

6- comment this line before migrate then uncomment it 
app\Providers\AppServiceProvider.php
View::share('all_cats', Category::all());

7- php artisan storage:link

8- Now add these Quaries

9- go to admin page   /admin/login
Email hany@msn.com
password 123456


NOTES
*** you need to know if you want to use register page you need to create smpt from you cpanel to avoid any problems or add user directly from admin panel 
*** I did not translat the whole website i just translated some element tag without using any package
*** The goal of that repo is to see some cruds in laravel/livewire and improve your skills 
*** YOU ARE NOT ALLOWED TO SELL THAT REPO TO ANYONE 

finally feel free to contact me anytime <3
 