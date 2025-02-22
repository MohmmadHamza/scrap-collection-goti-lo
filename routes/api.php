<?php

use App\Http\Controllers\API\V1\Auth\SocialLoginController;
use App\Http\Controllers\API\V1\BrandController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\CityController;
use App\Http\Controllers\API\V1\CountryController;

use App\Http\Controllers\API\V1\InquiryAssignedController;
use App\Http\Controllers\API\V1\InquiryController;
use App\Http\Controllers\API\V1\InquiryQuestionAnswerController;
use App\Http\Controllers\API\V1\InquiryQuestionsController;
use App\Http\Controllers\API\V1\LoginController;
use App\Http\Controllers\API\V1\ProductController;
use App\Http\Controllers\API\V1\ProductQuestionAnswerController;
use App\Http\Controllers\API\V1\ProductQuestionController;
use App\Http\Controllers\API\V1\StateController;
use App\Http\Controllers\API\V1\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {



    /// send login otp
    Route::post('/send_otp', [LoginController::class, 'send_otp'])->name('send_otp');
    /// verify login otp
    Route::post('/verify_otp', [LoginController::class, 'verify_otp'])->name('verify_otp');


    //Social Lgin
    Route::get('auth/{provider}', [SocialLoginController::class, 'redirectToProvider']);
    Route::get('auth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback']);



    Route::middleware('auth:sanctum')->group(function () {
        /// category module crud
        Route::apiResource('category', CategoryController::class);


        Route::apiResource('sub_category', SubcategoryController::class);

        Route::apiResource('country', CountryController::class);

        Route::apiResource('state', StateController::class);


        Route::apiResource('city', CityController::class);

        Route::apiResource('brand', BrandController::class);


        Route::apiResource('inquiry-question', InquiryQuestionsController::class);


        Route::apiResource('inquiry', InquiryController::class);


        Route::apiResource('inquiry-question-answer', InquiryQuestionAnswerController::class);


        Route::apiResource('product', ProductController::class);


        Route::apiResource('product-question', ProductQuestionController::class);

        Route::apiResource('product-question-answer', ProductQuestionAnswerController::class);


      

        
    });
});
