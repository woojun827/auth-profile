<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

## Home Profile 정보
## 로그인후 사용자의 정보를 확인할 수 있는 home 화면 입니다.
Route::get('/home',[
    \Jiny\Profile\Http\Controllers\HomeController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');





Route::get('/home/profile/avata',[
    \Jiny\Profile\Http\Controllers\ProfileAvataController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');

Route::get('/home/profile/account',[
    \Jiny\Profile\Http\Controllers\ProfileAccountController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');

/*
Route::get('/home/profile/info',[
    \Jiny\Profile\Http\Controllers\ProfileInfoController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');
*/


Route::get('/home/profile/password',[
    \Jiny\Profile\Http\Controllers\ProfilePasswordController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');

Route::get('/home/profile/security',[
    \Jiny\Profile\Http\Controllers\ProfileSecurityController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');

Route::get('/home/profile/social',[
    \Jiny\Profile\Http\Controllers\ProfileSocialController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');

Route::get('/home/profile/logout',[
    \Jiny\Profile\Http\Controllers\ProfileLogoutController::class,
    'index'
])->middleware(['web', 'auth'])->name('home');






Route::middleware(['web','auth'])
->prefix('account')->group(function() {
    Route::get('/', [\Jiny\Profile\Http\Controllers\AccountHome::class, 'index']);

    Route::get('/setting', [\Jiny\Profile\Http\Controllers\AccountSetting::class, 'index']);

    Route::get('/profile', [\Jiny\Profile\Http\Controllers\Profile::class, 'index']);




    /*
    Route::get('profile', 'MypageController@p');
    Route::get('billing', 'MypageController@billing');
    Route::get('notifications', 'MypageController@notifications');
    */

});



/**
 * User Avata image
 */
//,'auth:sanctum'
Route::middleware(['web']) // , 'verified'
->prefix('account')->group(function() {

    // 사용자 아이디를 아바타 이미지 출력
    // 도메인/account/avata/{id?} 로 접속시 이미지 출력
    Route::get('avatas/{id?}', [
        \Jiny\Profile\Http\Controllers\Account\AccountAvataID::class,
        'index'])->where('id', '[0-9]+');

    // 파일명을 직접 지정하는 경우
    Route::get('avatas/{filename}', [
        \Jiny\Profile\Http\Controllers\Account\AccountAvataFile::class,
        'avata']);

    // 아바타 이미지 업로드
    Route::post('avatas/upload', [
        \Jiny\Profile\Http\Controllers\Account\AccountAvataUpload::class,
        'upload']);
});

