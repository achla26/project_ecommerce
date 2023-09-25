<?php
    
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\SectionController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\AttributeSetController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\TaxController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;

Route::get('update-password',[AdminController::class,'updatePassword']);
Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[AdminController::class,'index'])->name('backend.login');
    Route::post('auth',[AdminController::class,'login'])->name('backend.auth');
});
Route::group(['middleware'=>'admin'],function(){
    
    Route::as('backend.')->group(function(){       
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);
           
        Route::get('logout',[AdminController::class,'logout'])->name('logout');

        Route::resource('sections', SectionController::class);
        Route::post('section/status',[SectionController::class,'status'])->name('sections.status');

        Route::resource('category', CategoryController::class);
        Route::post('category/status',[CategoryController::class,'status'])->name('category.status');
        Route::post('category/append-categories',[CategoryController::class,'appendCategories'])->name('category.append-categories');

        Route::resource('brand', BrandController::class);
        Route::post('brand/status',[BrandController::class,'status'])->name('brand.status');

        Route::resource('tax', TaxController::class);
        Route::post('tax/status',[TaxController::class,'status'])->name('tax.status');

        Route::resource('coupon', CouponController::class);
        Route::post('coupon/status',[CouponController::class,'status'])->name('coupon.status');

        Route::resource('country', CountryController::class);
        Route::post('country/status',[CountryController::class,'status'])->name('country.status');

        Route::resource('state', StateController::class);
        Route::post('state/status',[StateController::class,'status'])->name('state.status');

        Route::resource('slider', SliderController::class);
        Route::post('slider/status',[SliderController::class,'status'])->name('slider.status');

        Route::resource('banner', BannerController::class);
        Route::post('banner/status',[BannerController::class,'status'])->name('banner.status');

        Route::resource('city', CityController::class);
        Route::post('city/status',[CityController::class,'status'])->name('city.status');
        Route::post('city/append-states',[CityController::class,'appendStates'])->name('city.append-state');

        Route::get('setting',[SettingController::class,'index'])->name('setting.index');
        Route::put('setting/update',[SettingController::class,'update'])->name('setting.update');

        Route::resource('product', ProductController::class);
        Route::post('product/status',[ProductController::class,'status'])->name('product.status');
        Route::post('product/get-varients',[ProductController::class,'getVarients'])->name('product.get-varients');
        Route::post('product/get-combinations',[ProductController::class,'getCombinations'])->name('product.get-combinations');
        Route::post('product/append-categories',[ProductController::class,'appendCategories'])->name('product.append-categories');

        Route::resource('attribute-set', AttributeSetController::class);

        
        
        Route::resource('attribute', AttributeController::class);
        Route::get('attribute/{attribute}/destroy',[AttributeController::class,'destroy'])->name('attribute.destroy');
        Route::get('attribute/{attribute}/create',[AttributeController::class,'create'])->name('attribute.create');
        Route::post('attribute/append-attribute-value',[AttributeController::class,'appendAttributeValue'])->name('attribute.append-attribute-value');

        Route::post('product/append-image-div',[ProductController::class,'appendImageDiv'])->name('product.append-image-div');
        Route::post('product/append-accordion-div',[ProductController::class,'appendAccordionDiv'])->name('product.append-accordion-div');

        Route::get('product/remove-image/{image}',[ProductController::class,'removeImage'])->name('product.remove-image');

        Route::get('product/remove-varient/{varient}',[ProductController::class,'removeVarient'])->name('product.remove-varient');

        Route::get('product/remove-accordion/{accordion}',[ProductController::class,'removeAccordion'])->name('product.remove-accordion');

        Route::resource('user', UserController::class);
        Route::post('user/status',[UserController::class,'status'])->name('user.status');
    });
});