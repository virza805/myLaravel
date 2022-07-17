<?php 
/*
https://www.artofcse.com/learning/project-analysis-and-database-design

13:47s/51:24s => https://www.youtube.com/watch?v=VqrDeV-Hu1Y&list=PLjZmR8YqVGMfc--70MPn_MyI2uPW5mFrn&index=15

Database design  | => https://drawsql.app/home

|--------------------------------------------------------------------------
|You Can user project_login_logout.zip with Breeze ---> https://github.com/1mdalamin1/Laravel/tree/project
|--------------------------------------------------------------------------
|
|||||| This may be last project only laravel :) https://www.youtube.com/watch?v=HaHV1_wrjhs&list=PLhPBqF--77ImGEZE6xSS62UVegQOIgP4g&index=3

i wont to use laravel only backend api & frontend vue.js|react.js 

*/

/*
php artisan optimize | for remove cash

https://www.facebook.com/aristrocratbuffetlounge/

24:43s/29:48s => https://www.youtube.com/watch?v=_SolfIYN0a0&list=PLnhrpn1DBwx6MadqSAvKIae1nx0PC-kiH&index=37

php artisan = pa

36 | Project Planning | => https://drawsql.app/vir-za/diagrams/project#
___________________________________________________________
composer create-project laravel/laravel:^8.0 project
 
cd project
 
php artisan serve
php artisan make:model Admin -m

php artisan migrate
php artisan migrate:fresh --seed
composer require laravel/breeze --dev => https://laravel.com/docs/8.x/starter-kits
php artisan breeze:install

[{(
    php artisan breeze:install
    
    npm install
    npm run dev
    php artisan migrate
)}]

php artisan make:request AdminAuthRequest

##########  Class 37 | Project | Category CRUD with Axios #########

php artisan make:model Category -m || => https://drawsql.app/vir-za/diagrams/project
php artisan make:controller Admin/CategoryController -r
php artisan make:controller Admin/SubCategoryController -r
php artisan make:model SubCategory -m


php artisan migrate

php artisan make:request CategoryRequest
php artisan make:request CategoryUpdateRequest

======================need CRUD Color & Size later now use create seeder=================== 

Real Project must be use fileable not guarded | cause fileable succerut more then guarded

php artisan make:model Color -ms
php artisan make:model Size -ms
php artisan make:controller Admin/SizeController 
php artisan make:controller Admin/ColorController 

php artisan migrate:fresh --seed

php artisan make:model Product -mf
php artisan make:controller Admin/ProductController  




php artisan make:seeder CategorySeeder
php artisan make:seeder SubCategorySeeder


php artisan migrate:fresh --seed

php artisan make:request ProductRequest
php artisan make:model ProductSlider -m
php artisan storage:link

php artisan route:list

php artisan make:factory ProductFactory
php artisan migrate:fresh --seed

php artisan make:model Customer -m
php artisan make:controller Frontend/CustomerController
php artisan make:controller Frontend/CartController
php artisan make:controller Frontend/ProductController
php artisan make:controller Frontend/HomeController
php artisan make:controller Frontend/OrderController

php artisan migrate
php artisan optimize

php artisan make:request CustomerLoginRequest
php artisan make:model Cart -m
php artisan make:controller Frontend/CartController
php artisan migrate

#### Product Order ####

php artisan make:model Shipping -m
php artisan make:model Payment -m
php artisan make:model Order -m
php artisan make:model OrderDetails -m
php artisan migrate
php artisan make:controller Frontend/OrderController
php artisan make:middleware PreventEmptyOrder


php artisan make:controller Backend/OrderController



php artisan make:migration update_payment_and_receipt_note || php artisan migrate

must be install for update migration table => composer require doctrine/dbal

php artisan make:migration add_note_to_sales_and_purchase_table || if wont to rollback php artisan migrate::rollback

php artisan make:controller CategoryController -r || -r = resource


Sorce Code = https://github.com/AR-Shahin/Web-Development-With-Laravel_batch_2






testimonial-custom {
    transform: skew(-20deg,0deg);
}
.testimonial-custom {
    clip-path: polygon(25% 0%, 100% 0%, 100% 100%, 0% 100%);
}

php artisan optimize:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear

https://www.freepik.com/premium-vector/simple-id-card-design_2623288.htm#query=school%20id%20card%20simple&position=25&from_view=search

https://www.freepik.com/premium-psd/professional-resume-template_3036231.htm#query=school%20id%20card%20simple&position=22&from_view=search


*/
   # Group Routers
// Route::prefix('order')->name('order.')->controller(OrderController::class)->group(function () {

//     Route::get('/', 'index')->name('index');
//     Route::get('/details/{order}', 'details')->name('details');
//     Route::post('/status/{order}', 'status')->name('status');
// });

 //Route::resource('users', UsersController::class, ['except' => ['show'] ]); // except -> create route without show
    //Route::resource('users', UsersController::class, ['only' => ['show', 'destroy'] ]); // only -> create route only show , destroy

    /*
    7 in 1 This Route::resource('users', UsersController::class); in blow
    Route::get('users', [UsersController::class, 'index']);
    Route::POST('users', [UsersController::class, 'store']);
    Route::POST('users/create', [UsersController::class, 'create']);
    Route::POST('users/{user}', [UsersController::class, 'show']);
    Route::POST('users/{user}', [UsersController::class, 'update']);
    Route::POST('users/{user}', [UsersController::class, 'destroy']);
    Route::POST('users/{user}/edit', [UsersController::class, 'edit']);
    */
