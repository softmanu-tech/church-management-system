<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClusterController;
use App\Http\Controllers\AccountabilityController;
use App\Http\Controllers\ClusterAccountabilityController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\PastorController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\VisitorsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'PostReset']);





Route::get('admin/admin/list', function () {
    return view('admin.admin.list');
}); 


Route::group(['middleware' => 'admin'], function () {

  Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
  Route::get('admin/admin/list', [AdminController::class, 'list']);
  Route::get('admin/admin/add', [AdminController::class, 'add']);
  Route::post('admin/admin/add', [AdminController::class, 'insert']);
  Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
  Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
  Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);

//member url
Route::get('admin/members/list', [MemberController::class, 'list']);
Route::get('admin/members/add', [MemberController::class, 'add']);
Route::post('admin/members/add', [MemberController::class, 'insert']);
Route::get('admin/members/edit/{id}', [MemberController::class, 'edit']);
Route::post('admin/members/edit/{id}', [MemberController::class, 'update']);
Route::get('admin/members/delete/{id}', [MemberController::class, 'delete']);


//Leaders url
Route::get('admin/leaders/list', [LeaderController::class, 'list']);
Route::get('admin/leaders/add', [LeaderController::class, 'add']);
Route::post('admin/leaders/add', [LeaderController::class, 'insert']);
Route::get('admin/leaders/edit/{id}', [LeaderController::class, 'edit']);
Route::post('admin/leaders/edit/{id}', [LeaderController::class, 'update']);
Route::get('admin/leaders/delete/{id}', [LeaderController::class, 'delete']);

//Pastors
Route::get('admin/pastors/list', [PastorController::class, 'list']);
Route::get('admin/pastors/add', [PastorController::class, 'add']);
Route::post('admin/pastors/add', [PastorController::class, 'insert']);
Route::get('admin/pastors/edit/{id}', [PastorController::class, 'edit']);
Route::post('admin/pastors/edit/{id}', [PastorController::class, 'update']);
Route::get('admin/pastors/delete/{id}', [PastorController::class, 'delete']);

//visitors url
Route::post('admin/visitors/add', [VisitorsController::class, 'insert']);
Route::get('admin/visitors/edit/{id}', [VisitorsController::class, 'edit']);
Route::post('admin/visitors/edit/{id}', [VisitorsController::class, 'update']);
Route::get('admin/visitors/delete/{id}', [VisitorsController::class, 'delete']);



//cluster url
Route::get('admin/cluster/list', [ClusterController::class, 'list']);
Route::get('admin/cluster/add', [ClusterController::class, 'add']);
Route::post('admin/cluster/add', [ClusterController::class, 'insert']);
Route::get('admin/cluster/edit/{id}', [ClusterController::class, 'edit']);
Route::post('admin/cluster/edit/{id}', [ClusterController::class, 'update']);
Route::get('admin/cluster/delete/{id}', [ClusterController::class, 'delete']);

//accountability url
Route::get('admin/accountability/list', [AccountabilityController::class, 'list']);
Route::get('admin/accountability/add', [AccountabilityController::class, 'add']);
Route::post('admin/accountability/add', [AccountabilityController::class, 'insert']);
Route::get('admin/accountability/edit/{id}', [AccountabilityController::class, 'edit']);
Route::post('admin/accountability/edit/{id}', [AccountabilityController::class, 'update']);
Route::get('admin/accountability/delete/{id}', [AccountabilityController::class, 'delete']);

//visitors
//visitor url
Route::get('admin/visitor/list', [VisitorController::class, 'list']);
Route::get('admin/visitor/add', [VisitorController::class, 'add']);
Route::post('admin/visitor/add', [VisitorController::class, 'insert']);
Route::get('admin/visitor/edit/{id}', [VisitorController::class, 'edit']);
Route::post('admin/visitor/edit/{id}', [VisitorController::class, 'update']);
Route::get('admin/visitor/delete/{id}', [VisitorController::class, 'delete']);

//assign_accountability url
Route::get('admin/assign_accountability/list', [ClusterAccountabilityController::class, 'list']);
Route::get('admin/assign_accountability/add', [ClusterAccountabilityController::class, 'add']);
Route::post('admin/assign_accountability/add', [ClusterAccountabilityController::class, 'insert']);
Route::get('admin/assign_accountability/edit/{id}', [ClusterAccountabilityController::class, 'edit']);
Route::post('admin/assign_accountability/edit/{id}', [ClusterAccountabilityController::class, 'update']);
Route::get('admin/assign_accountability/delete/{id}', [ClusterAccountabilityController::class, 'delete']);
Route::get('admin/assign_accountability/edit_single/{id}', [ClusterAccountabilityController::class, 'edit_single']);
Route::post('admin/assign_accountability/edit_single/{id}', [ClusterAccountabilityController::class, 'update_single']);


//admin change password
Route::get('admin/change_password', [UserController::class, 'change_password']);
Route::post('admin/change_password', [UserController::class, 'update_change_password']);

}); 
  

Route::group(['middleware' => 'pastors'], function () {
  Route::get('pastors/dashboard', [DashboardController::class, 'dashboard']);  
  Route::get('pastors/change_password', [UserController::class, 'change_password']);
  Route::post('pastors/change_password', [UserController::class, 'update_change_password']);

  Route::get('pastors/account', [UserController::class, 'MyAccount']);
  Route::post('pastors/account', [UserController::class, 'UpdateMyAccount']);


}); 


Route::group(['middleware' => 'leaders'], function () {
  Route::get('leaders/dashboard', [DashboardController::class, 'dashboard']);
  Route::get('leaders/change_password', [UserController::class, 'change_password']);
  Route::post('leaders/change_password', [UserController::class, 'update_change_password']);
  Route::get('leaders/account', [UserController::class, 'MyAccount']);
  Route::post('leaders/account', [UserController::class, 'UpdateMyAccountLeader']);
});

Route::group(['middleware' => 'members'], function () {
  Route::get('members/dashboard', [DashboardController::class, 'dashboard']);
  Route::get('members/change_password', [UserController::class, 'change_password']);
  Route::post('members/change_password', [UserController::class, 'update_change_password']);

  Route::get('members/account', [UserController::class, 'MyAccount']);
  Route::post('members/account', [UserController::class, 'UpdateMyAccountMember']);

  Route::get('members/my_accountability', [AccountabilityController::class, 'MyAccountability']);

});