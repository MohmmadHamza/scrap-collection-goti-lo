<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CatagoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\InquiryAnswerController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\InquiryFollowupController;
use App\Http\Controllers\Admin\InquiryPickupController;
use App\Http\Controllers\Admin\InquiryQuestionAnswerController;
use App\Http\Controllers\Admin\InquiryQuestionsController;
use App\Http\Controllers\Admin\InquiryValuationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductQuestionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialLoginController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('auth/{provider}', [SocialLoginController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);





Route::get('/dashboard', function () {
    return view('admin.dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    /***** User *****/
    Route::resource('users', UserController::class);
    Route::get('/get-cities/{stateId}', [UserController::class, 'getCities']);
    Route::post('/user/data', [UserController::class, 'list'])->name('users.list');
    Route::post('/user/delete', [UserController::class, 'destroyMany'])->name('users.delete');
    /***** User *****/


    /***** Role *****/
    Route::resource('role', RoleController::class);
    /***** Role *****/


    /***** Permission *****/
    Route::resource('permission', PermissionController::class);
    Route::post('/permission/data', [PermissionController::class, 'list'])->name('permission.list');
    Route::post('/permission/delete', [PermissionController::class, 'destroyMany'])->name('permission.delete');
    /***** Permission *****/


    /***** Category *****/
    Route::resource('category', CatagoryController::class);
    Route::post('/category/data', [CatagoryController::class, 'list'])->name('category.list');
    Route::post('/category/delete', [CatagoryController::class, 'destroyMany'])->name('category.delete');
    /***** Category *****/


    /***** Sub Category *****/
    Route::resource('subcategory', SubcategoryController::class);
    Route::post('/subcategory/data', [SubcategoryController::class, 'list'])->name('subcategory.list');
    Route::post('/subcategory/delete', [SubcategoryController::class, 'destroyMany'])->name('subcategory.delete');
    /***** Sub Category *****/
    

    /***** Country *****/
    Route::resource('country', CountryController::class);
    Route::post('/country/data', [CountryController::class, 'list'])->name('country.list');
    Route::post('/country/delete', [CountryController::class, 'destroyMany'])->name('country.delete');
    /***** Country *****/

    
    /***** State *****/
    Route::resource('state', StateController::class);
    Route::post('/state/data', [StateController::class, 'list'])->name('state.list');
    Route::post('/state/delete', [StateController::class, 'destroyMany'])->name('state.delete');
    /***** State *****/


    /***** City *****/
    Route::resource('city', CityController::class);
    Route::get('get-states', [CityController::class, 'getStates'])->name('get.states');
    Route::post('/city/data', [CityController::class, 'list'])->name('city.list');
    Route::post('/city/delete', [CityController::class, 'destroyMany'])->name('city.delete');
    /***** City *****/



    /***** Brand *****/
    Route::resource('brand', BrandController::class);
    Route::post('/brand/data', [BrandController::class, 'list'])->name('brand.list');
    Route::post('/brand/delete', [BrandController::class, 'destroyMany'])->name('brand.delete');
    /***** Brand *****/
    

    /***** Inquery Question *****/
    Route::resource('inquery-question', InquiryQuestionsController::class);
    Route::post('/inquery-question/data', [InquiryQuestionsController::class, 'list'])->name('inquery-question.list');
    Route::post('/inquery-question/delete', [InquiryQuestionsController::class, 'destroyMany'])->name('inquery-question.delete');
    /***** Inquery Question *****/
    

    /***** Inquiry *****/
    Route::resource('inquiry', InquiryController::class);
    Route::get('/subcategories/{categoryId}', [InquiryController::class, 'getSubcategories']);
    Route::post('/inquiry/data', [InquiryController::class, 'list'])->name('inquiry.list');
    Route::post('/inquiry/delete', [InquiryController::class, 'destroyMany'])->name('inquiry.delete');
    /***** Inquiry *****/
    
    


    /***** Product *****/
    Route::resource('product', ProductController::class);
    Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);
    Route::post('/product/data', [ProductController::class, 'list'])->name('product.list');
    Route::post('/product/delete', [ProductController::class, 'destroyMany'])->name('product.delete');
    /***** Product *****/


    /***** Product Question *****/
    Route::resource('product-question', ProductQuestionController::class);
    Route::post('/product-question/data', [ProductQuestionController::class, 'list'])->name('product-question.list');
    Route::post('/product-question/delete', [ProductQuestionController::class, 'destroyMany'])->name('product-question.delete');
    /***** Product Question *****/


    /***** Inquiry Followup *****/
    Route::resource('inquiry-followup', InquiryFollowupController::class);
    /***** Inquiry Followup *****/


    /***** Inquiry Valuation *****/
    Route::resource('inquiry-valuation', InquiryValuationController::class);
    /***** Inquiry Valuation *****/

    /***** Inquiry Pickup *****/
    Route::resource('inquiry-pickup', InquiryPickupController::class);
    /***** Inquiry Pickup *****/
});

require __DIR__.'/auth.php';
