<?php

use App\Http\Controllers\Admin\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BottomSectionHomeController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConsumableController;
use App\Http\Controllers\Admin\ConsumableProductController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\OurServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\ServicePageSectionController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Spatie\Permission\Models\Permission;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

define('PAGINATION_COUNT', 11);
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {



    Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        /*         start  update login admin                 */
        Route::get('/admin/edit/{id}', [LoginController::class, 'editlogin'])->name('admin.login.edit');
        Route::post('/admin/update/{id}', [LoginController::class, 'updatelogin'])->name('admin.login.update');
        /*         end  update login admin                */

        /// Role and permission
        Route::resource('employee', 'App\Http\Controllers\Admin\EmployeeController', ['as' => 'admin']);
        Route::get('role', 'App\Http\Controllers\Admin\RoleController@index')->name('admin.role.index');
        Route::get('role/create', 'App\Http\Controllers\Admin\RoleController@create')->name('admin.role.create');
        Route::get('role/{id}/edit', 'App\Http\Controllers\Admin\RoleController@edit')->name('admin.role.edit');
        Route::patch('role/{id}', 'App\Http\Controllers\Admin\RoleController@update')->name('admin.role.update');
        Route::post('role', 'App\Http\Controllers\Admin\RoleController@store')->name('admin.role.store');
        Route::delete('admin/role/delete/{id}', 'App\Http\Controllers\Admin\RoleController@delete')->name('admin.role.delete');

        Route::get('/permissions/{guard_name}', function ($guard_name) {
            return response()->json(Permission::where('guard_name', $guard_name)->get());
        });

        Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
        Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

     

        Route::resource('users', UserController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('settings', SettingController::class);
        Route::resource('pages', PageController::class);
        Route::resource('bottomSectionHomes', BottomSectionHomeController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('brands', BrandController::class);
        Route::resource('abouts', AboutController::class);
        Route::resource('consumables', ConsumableController::class);
        Route::resource('consumable_products', ConsumableProductController::class);
        Route::resource('service-pages', ServicePageController::class);
        Route::resource('service-page-sections', ServicePageSectionController::class);
        Route::resource('news', NewsController::class);

        Route::resource('careers', CareerController::class);

        Route::name('admin.')->group(function () {
            // Category Routes
            Route::resource('categories', CategoryController::class);
            // Product Routes
            Route::resource('products', ProductController::class);
        });

        // Available Positions inside career
        Route::post('careers/{career}/positions', [CareerController::class,'storePosition'])->name('careers.positions.store');
        Route::put('positions/{position}', [CareerController::class,'updatePosition'])->name('positions.update');
        Route::delete('positions/{position}', [CareerController::class,'destroyPosition'])->name('positions.destroy');


      
    });
});



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', [LoginController::class, 'show_login_view'])->name('admin.showlogin');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
});