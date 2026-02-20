<?php
use App\Livewire\Admin\Event\Index as EventIndex;
use App\Livewire\Admin\Event\Create as EventCreate;
use App\Livewire\Admin\Event\Edit as EventEdit;
use App\Livewire\Admin\Quantity\Index as QuantityIndex;
use App\Livewire\Admin\Studyprogram\Index as StudyprogramIndex;
use App\Livewire\Admin\Lecturer\Index as LecturerIndex;
use App\Livewire\Admin\Lecturer\Create as LecturerCreate;
use App\Livewire\Admin\Lecturer\Edit as LecturerEdit;
use App\Livewire\Admin\Achievement\Index as AchievementIndex;
use App\Livewire\Admin\Achievement\Create as AchievementCreate;
use App\Livewire\Admin\Achievement\Edit as AchievementEdit;
use App\Livewire\Admin\Graduateprofile\Index as GraduateprofileIndex;
use App\Livewire\Admin\Graduateprofile\Create as GraduateprofileCreate;
use App\Livewire\Admin\Graduateprofile\Edit as GraduateprofileEdit;
use App\Livewire\Admin\Curriculum\Index as CurriculumIndex;
use App\Livewire\Admin\Curriculum\Create as CurriculumCreate;
use App\Livewire\Admin\Curriculum\Edit as CurriculumEdit;
use App\Livewire\Admin\Userinterface\Index as UserinterfaceIndex;
use App\Livewire\Admin\Socialmedia\Index as SocialmediaIndex;
use App\Livewire\Admin\Contact\Index as ContactIndex;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Public\Home;
use App\Livewire\Public\Event\Detail as EventDetail;
use App\Livewire\Public\Achievement\Detail as AchievementDetail;


Route::get('/', Home::class)->name('home');
Route::get('event/{event}', EventDetail::class)->name('event.detail');
Route::get('achievement/{achievement}', AchievementDetail::class)->name('achievement.detail');

Route::get('/dashboard', function () {
    return redirect()->route('admin.overview');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardadmin', StudyprogramIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboardadmin');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('profile.edit');
    Route::get('settings/password', Password::class)->name('user-password.edit');
    Route::get('settings/appearance', Appearance::class)->name('appearance.edit');

});



//#########################	
// Admin routes
//#####
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.overview');
        });
        Route::get('overview', AdminDashboard::class)->name('overview');
        Route::get('quantity', QuantityIndex::class)->name('quantity.index');
        Route::get('event', EventIndex::class)->name('event.index');
        Route::get('event/create', EventCreate::class)->name('event.create');
        Route::get('event/{event}/edit', EventEdit::class)->name('event.edit');
        Route::get('studyprogram', StudyprogramIndex::class)->name('studyprogram.index');
        Route::get('lecturer', LecturerIndex::class)->name('lecturer.index');
        Route::get('lecturer/create', LecturerCreate::class)->name('lecturer.create');
        Route::get('lecturer/{lecturer}/edit', LecturerEdit::class)->name('lecturer.edit');
        Route::get('achievement', AchievementIndex::class)->name('achievement.index');
        Route::get('achievement/create', AchievementCreate::class)->name('achievement.create');
        Route::get('achievement/{achievement}/edit', AchievementEdit::class)->name('achievement.edit');
        Route::get('graduateprofile', GraduateprofileIndex::class)->name('graduateprofile.index');
        Route::get('graduateprofile/create', GraduateprofileCreate::class)->name('graduateprofile.create');
        Route::get('graduateprofile/{graduateprofile}/edit', GraduateprofileEdit::class)->name('graduateprofile.edit');
        Route::get('curriculum', CurriculumIndex::class)->name('curriculum.index');
        Route::get('curriculum/create', CurriculumCreate::class)->name('curriculum.create');
        Route::get('curriculum/{curriculum}/edit', CurriculumEdit::class)->name('curriculum.edit');
        Route::get('userinterface', UserinterfaceIndex::class)->name('userinterface.index');
        Route::get('socialmedia', SocialmediaIndex::class)->name('socialmedia.index');
        Route::get('contact', ContactIndex::class)->name('contact.index');
    });
