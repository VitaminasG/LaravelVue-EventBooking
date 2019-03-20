# Laravel & Vue - Event Booking Application

A small application for users to register/login and book the event on the personal 
Calendar dashboard. Additional functionality's to remove or update existing event. The Laravel and VueJS is the 
main frameworks to work as Back-end and Front-end. I used
[richardtallent/Vue-simple-calendar](https://github.com/richardtallent/vue-simple-calendar) component for displaying
a calendar and my own controller to get data from calendar and pass data to serve with axios for GET, POST, PATCH and
DELETE requests. Also, I done some Gate Policies and light Token request on the Back-End to authenticate the user. The
main middleware was generated with Laravel **_artisan make:auth_** command to get all files to serve **_Guest_** user.

Link to [Live demo page](https://eventbooking.gediminaspalsys.uk/).

## Back-End

You will find migrations seeders prepared for testing the interface inside folders:

* [Factory - Event/User](https://github.com/VitaminasG/LaravelVue-EventBooking/tree/master/database/factories)
* [Seeder's - Event/User](https://github.com/VitaminasG/LaravelVue-EventBooking/tree/master/database/seeds)

Password will be hashed with password - **12345678**:

`'password' => Hash::make('12345678'),`

Use artisan commands below to populate the DB:

`php artisan db:seed`

**or**

`php artisan db:seed --class=UsersTableSeeder`

Also you will find Two Resources Class'es with relationship to generate a Json object for User events.

* [Resources - Event/User ](https://github.com/VitaminasG/LaravelVue-EventBooking/tree/master/app/Http/Resources)

## Front-End

The Blade templating engine was used as main containers for VueJs components to be executed. Styling for the application
was left as on the default setup - Bootstrap. However, I removed **jQuery** and all related JavaScript libraries to a
Bootstrap just to keep the files minimal as possible. Also, I added AsyncComponent method to components to be
synchronised with the server response. Also need to make small adjustment to Laravel-mix for be able to use Async method.

`npm install @babel/plugin-syntax-dynamic-import`

and

`mix.webpackConfig({
     output: {
         chunkFilename: "chunks/[name].[chunkhash].js",
         publicPath: "/",
     }, 
});  mix.js("...`

For more information please read official documentation.

* [VueJS - Dynamic & Async Components](https://vuejs.org/v2/guide/components-dynamic-async.html)

## Documentation and the Links

* [Laravel-docs/5.8](https://laravel.com/docs/5.8)
* [richardtallent/vue-simple-calendar](https://github.com/richardtallent/vue-simple-calendar)
* [richardtallent/vue-simple-calendar-sample](https://github.com/richardtallent/vue-simple-calendar-sample)