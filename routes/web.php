<?php

use App\Http\Controllers\CustomPackageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainAdminPanelController;
use App\Http\Controllers\MainAdminPanelEmailController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SecondAdminPanelController;
use App\Http\Controllers\VendorPackageController;
use App\Http\Controllers\VendorProfileController;
use App\Http\Controllers\VendorServiceController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// HomeContoller Routes
Route::get('/',[HomeController::class,'index']);


// RegisterController Routes
Route::get('/Signup',[RegisterController::class,'signup']);
Route::post('/store',[RegisterController::class,'store']);
Route::get('/BusinessRegister',[RegisterController::class,'businessregister']);
Route::post('/store2',[RegisterController::class,'store2']);

// LoginController Routes
Route::get('/Signin',[LoginController::class,'login']);
Route::post('/logindata', [LoginController::class, 'logindata']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// MainAdminPanel Routes
Route::get('/MainAdmin',[MainAdminPanelController::class,'index']);
Route::get('/ClientsDetail',[MainAdminPanelController::class,'clientsdetail']);
Route::get('/VendorsDetail',[MainAdminPanelController::class,'vendorsdetail']);
Route::get('/EventManagersDetail',[MainAdminPanelController::class,'emdetails']);
Route::get('/VendorsServicesDetail',[MainAdminPanelController::class,'vendorservicesdetail']);
Route::get('/VendorsPackagesDetail',[MainAdminPanelController::class,'vendorspackagesdetail']);


// Approved Status email and password sending Routes
Route::post('/vendors/send-password/{vendor_id}', [MainAdminPanelEmailController::class, 'sendPassword'])->name('vendors.sendPassword');
Route::post('/eventmanagers/send-password/{em_id}', [MainAdminPanelEmailController::class, 'sendPassword2'])->name('em.sendPassword');

//Blocking and Sending Email Routes
Route::post('/vendors/block/{vendor_id}', [MainAdminPanelEmailController::class, 'blockVendor'])->name('vendors.block');
Route::post('/eventmanager/block/{em_id}', [MainAdminPanelEmailController::class, 'blockEM'])->name('eventmanagers.block');

// Custom Package Routes

Route::get('/CustomPackage', [CustomPackageController::class, 'createPackage']);
// Route::post('/custom-package/add', [CustomPackageController::class, 'addToPackage'])->name('custom-package.add');
// Route::post('/custom-package/remove', [CustomPackageController::class, 'removeFromPackage'])->name('custom-package.remove');
// Route::post('/custom-package/store', [CustomPackageController::class, 'store'])->name('custom-package.store');
Route::get('/CustomPackageform', [CustomPackageController::class, 'custompackageform']);
Route::post('/get-services', [CustomPackageController::class, 'getServices'])->name('get.services');
Route::post('/get-packages', [CustomPackageController::class, 'getPackages'])->name('get.packages');
Route::post('/custompackagestore', [CustomPackageController::class, 'storedata']);

Route::get('/CustomPackageview', [CustomPackageController::class, 'viewPackage']);
Route::get('/CustomPackagetrash',[CustomPackageController::class,'custompackagetrash']);
Route::get('/Custompackage/edit/{id}',[CustomPackageController::class,'custompackageedit'])->name('custompackage.edit');
Route::post('/Custompackage/update/{id}',[CustomPackageController::class,'custompackageupdate'])->name('custompackage.update');
Route::get('/Custompackage/delete/{id}',[CustomPackageController::class,'custompackagedelete'])->name('custompackage.delete');
Route::get('/Custompackage/frocedelete/{id}',[CustomPackageController::class,'custompackageforcedelete'])->name('custompackage.forcedelete');
Route::get('/Custompackage/restore/{id}',[CustomPackageController::class,'custompackagerestore'])->name('custompackage.restore');


// Removing any servies or packages from build-in custompackage
Route::get('/remove-package/{adminPackageId}/{packageId}', [CustomPackageController::class,'removePackage'])->name('custompackage.removePackage');
Route::get('/remove-service/{adminPackageId}/{serviceId}', [CustomPackageController::class,'removeService'])->name('custompackage.removeService');


// SecondAdminPanel Routes
Route::get('/OtherAdmin',[SecondAdminPanelController::class,'index']);

// Vendors Profile Routes
Route::get('/ManageProfile',[VendorProfileController::class,'profile']);
Route::post('/editprofile', [VendorProfileController::class, 'update']);


// Vendor Services Routes
Route::get('/Services', [VendorServiceController::class, 'services']);
Route::get('/Serviceform', [VendorServiceController::class, 'servicesform']);
Route::post('/Serviceform2', [VendorServiceController::class, 'servicesform2']);
Route::get('/Servicetrash',[VendorServiceController::class,'servicestrash']);
Route::get('/service/edit/{id}',[VendorServiceController::class,'servicesedit'])->name('services.edit');
Route::post('/service/update/{id}',[VendorServiceController::class,'servicesupdate'])->name('services.update');
Route::get('/service/delete/{id}',[VendorServiceController::class,'servicesdelete'])->name('services.delete');
Route::get('/service/frocedelete/{id}',[VendorServiceController::class,'servicesforcedelete'])->name('services.forcedelete');
Route::get('/service/restore/{id}',[VendorServiceController::class,'servicesrestore'])->name('services.restore');


// Vendor Packages Routes
Route::get('/Packages', [VendorPackageController::class, 'packages']);
Route::get('/Packageform', [VendorPackageController::class, 'packagesform']);
Route::post('/Packageform2', [VendorPackageController::class, 'packagesform2']);
Route::get('/Packagetrash',[VendorPackageController::class,'packagestrash']);
Route::get('/package/edit/{id}',[VendorPackageController::class,'packagesedit'])->name('packages.edit');
Route::post('/package/update/{id}',[VendorPackageController::class,'packagesupdate'])->name('packages.update');
Route::get('/package/delete/{id}',[VendorPackageController::class,'packagesdelete'])->name('packages.delete');
Route::get('/package/frocedelete/{id}',[VendorPackageController::class,'packagesforcedelete'])->name('packages.forcedelete');
Route::get('/package/restore/{id}',[VendorPackageController::class,'packagesrestore'])->name('packages.restore');
