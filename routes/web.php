<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventDataController;
use App\Http\Controllers\Admin\EventNewsController;
use App\Http\Controllers\Admin\EventsTypesController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\FederalDistrictController;
use App\Http\Controllers\Admin\GuestsController;
use App\Http\Controllers\Admin\HandbookController;
use App\Http\Controllers\Admin\MemberAdminController;
use App\Http\Controllers\Admin\MemberStatusController;
use App\Http\Controllers\Admin\ModeratorsController;
use App\Http\Controllers\Admin\TerritorialOrganizationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\MemberController;
use Illuminate\Support\Facades\Route;

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
Route::get('/test', function() {
    return 'test';
});

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/', [SiteController::class, 'index'])
        ->name('index');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::group(['middleware' => ['role:Admin']], function () {

            Route::resource('main', AdminController::class);

            Route::resource('handbook', HandbookController::class);

            Route::resource('events', EventController::class);

            Route::prefix('handbk')->group(function () {

                Route::resource('faq', FAQController::class);

                Route::resource('federaldistrict', FederalDistrictController::class);

                Route::resource('eventstypes', EventsTypesController::class);

                Route::resource('memberstatus', MemberStatusController::class);

                Route::resource('territorial_organizations', TerritorialOrganizationsController::class);

                Route::post('territorial_organizations', [TerritorialOrganizationsController::class, 'upload'])
                    ->name('territorial_organizations.upload');

            });

            Route::resource('event/{event}/data', EventDataController::class);

            Route::resource('event/{event}/news', EventNewsController::class);

            Route::resource('event/{event}/moderator', ModeratorsController::class);

            Route::resource('event/{event}/guest', GuestsController::class);

            Route::resource('members', MemberAdminController::class);

        });

//        Route::group(['middleware' => ['role:User']], function () {
        Route::resource('dashboard/{event}/member', MemberController::class);
//        });

        Route::get('/dashboard/', [IndexController::class, 'index'])
            ->name('dashboard.index');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
