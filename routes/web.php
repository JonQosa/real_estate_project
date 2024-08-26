<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route for the homepage
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Route to display all properties
Route::get('/home', [App\Http\Controllers\Props\PropertiesController::class, 'index'])->name('home');


//display contacts and about pages
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');



Route::group(['prefix' => 'props'], function(){
// Route to display single property details
Route::get('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'single'])->name('single.prop');

// Route to handle form submission for requests
Route::post('prop-details/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'insertRequest'])->name('insert.request');


//displaying properties by prices
Route::get('price-asc/', [App\Http\Controllers\Props\PropertiesController::class, 'priceAsc'])->name('price.asc.prop');
Route::get('price-desc/', [App\Http\Controllers\Props\PropertiesController::class, 'priceDesc'])->name('price.desc.prop');



//saving props
Route::post('save-props/{id}', [App\Http\Controllers\Props\PropertiesController::class, 'saveProps'])->name('save.prop');


//displaying props by rent and buy
Route::get('type/Buy', [App\Http\Controllers\Props\PropertiesController::class, 'PropsBuy'])->name('buy.prop');
Route::get('type/Rent', [App\Http\Controllers\Props\PropertiesController::class, 'propsRent'])->name('rent.prop');


//displaying properties by hometype
Route::get('home-type/{hometype}', [App\Http\Controllers\Props\PropertiesController::class, 'displayByHomeType'])->name('display.prop.hometype');

//searching props
Route::any('search', [App\Http\Controllers\Props\PropertiesController::class, 'searchProps'])->name('search.prop');

});



Route::group(['users' => 'props'], function(){
    //users pages
Route::get('all-requests/', [App\Http\Controllers\Users\UsersController::class, 'allRequests'])->name('all.requests');
Route::get('all-saved-props/', [App\Http\Controllers\Users\UsersController::class, 'allSavedProps'])->name('all.saved.props');
});

Route::post('admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'checkLogin'])->name('check.login');
// Route::post('logout', [App\Http\Controllers\Admins\AdminsController::class, 'logout'])->name('logout');
 Route::get('/admin/login', [App\Http\Controllers\Admins\AdminsController::class, 'viewLogin'])->name('view.login');


Route::middleware('auth:admin')->prefix('admin')->group(function() {
    Route::get('delete-hometypes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteHomeTypes'])->name('hometypes.delete');

    Route::get('index', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
    Route::get('all-admins', [App\Http\Controllers\Admins\AdminsController::class, 'allAdmins'])->name('admins.admins');

//create admins
Route::get('create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('admins.create');
Route::post('create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmins'])->name('admins.store');



Route::get('all-hometypes', [App\Http\Controllers\Admins\AdminsController::class, 'allHomeTypes'])->name('admins.hometypes');
Route::get('create-hometypes', [App\Http\Controllers\Admins\AdminsController::class, 'createHomeTypes'])->name('hometypes.create');
Route::post('create-hometypes', [App\Http\Controllers\Admins\AdminsController::class, 'storeHomeTypes'])->name('hometypes.store');


Route::get('edit-hometypes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'editHomeTypes'])->name('hometypes.edit');
Route::post('update-hometypes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateHomeTypes'])->name('hometypes.update');

// Route::delete('delete-hometypes/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteHomeTypes'])->name('hometypes.delete');
//requests

Route::get('all-requests', [App\Http\Controllers\Admins\AdminsController::class, 'Requests'])->name('requests.all');


Route::get('all-props', [App\Http\Controllers\Admins\AdminsController::class, 'allProps'])->name('props.all');
//props create
Route::get('create-props', [App\Http\Controllers\Admins\AdminsController::class, 'createProps'])->name('props.create');
Route::post('create-props', [App\Http\Controllers\Admins\AdminsController::class, 'storeProps'])->name('props.store');


//gallery create
Route::get('create-gallery', [App\Http\Controllers\Admins\AdminsController::class, 'createGallery'])->name('gallery.create');
Route::post('create-gallery', [App\Http\Controllers\Admins\AdminsController::class, 'storeGallery'])->name('gallery.store');



Route::get('delete-props/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteProps'])->name('props.delete');


Route::get('/properties/{id}/edit', [App\Http\Controllers\Admins\AdminsController::class, 'editProps'])
    ->name('props.edit');

// Route to handle the form submission for updating a property
Route::put('/properties/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateProps'])
    ->name('props.update');
});

