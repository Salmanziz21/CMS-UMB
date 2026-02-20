<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Studyprogram;
use App\Models\Socialmedia;
use App\Models\Contact;
use App\Models\Userinterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.public.navbar', function ($view) {
            $programStudy = Studyprogram::first();
            $userinterface = Userinterface::first();

            $homeUrl = route('home');
            $onHomePage = request()->routeIs('home');
            $sectionUrl = static function (string $hash) use ($homeUrl, $onHomePage) {
                $hash = ltrim($hash, '#');
                return $onHomePage ? "#{$hash}" : "{$homeUrl}#{$hash}";
            };

            $sectionIds = [
                'home',
                'about',
                'visimisi',
                'history',
                'dosen',
                'graduateprofile',
                'prestasi',
                'kurikulum',
                'event',
                'contact',
            ];

            $sectionUrls = [];
            foreach ($sectionIds as $id) {
                $sectionUrls[$id] = $sectionUrl($id);
            }

            $profilLinks = [
                ['label' => 'Tentang Kami', 'href' => $sectionUrls['about']],
                ['label' => 'Visi Misi', 'href' => $sectionUrls['visimisi']],
                ['label' => 'Sejarah', 'href' => $sectionUrls['history']],
                ['label' => 'Daftar Dosen', 'href' => $sectionUrls['dosen']],
                ['label' => 'Profil Lulusan', 'href' => $sectionUrls['graduateprofile']],
            ];

            $mahasiswaLinks = [
                ['label' => 'Karya dan Prestasi', 'href' => $sectionUrls['prestasi']],
                ['label' => 'Kurikulum', 'href' => $sectionUrls['kurikulum']],
                ['label' => 'Tracer Study', 'href' => 'https://tracerstudy.umb.ac.id/'],
            ];

            $mainLinks = [
                ['label' => 'Home', 'href' => $sectionUrls['home']],
                ['label' => 'Kegiatan', 'href' => $sectionUrls['event']],
                ['label' => 'Kontak', 'href' => $sectionUrls['contact']],
            ];

            $navbarLogo = $userinterface?->image_logo
                ? asset('storage/' . $userinterface->image_logo)
                : asset('images/LogoUmb.png');

            $view->with([
                'programStudy' => $programStudy,
                'userinterface' => $userinterface,
                'navbarLogo' => $navbarLogo,
                'sectionUrls' => $sectionUrls,
                'profilLinks' => $profilLinks,
                'mahasiswaLinks' => $mahasiswaLinks,
                'mainLinks' => $mainLinks,
            ]);
        });

        View::composer('components.public.footer', function ($view) {
            $programStudy = Studyprogram::first();
            $userinterface = Userinterface::first();
            $socialmedias = Socialmedia::all();
            $contacts = Contact::first();

            $homeUrl = route('home');
            $onHomePage = request()->routeIs('home');
            $sectionUrl = static function (string $hash) use ($homeUrl, $onHomePage) {
                $hash = ltrim($hash, '#');
                return $onHomePage ? "#{$hash}" : "{$homeUrl}#{$hash}";
            };

            $socialConfigs = [
                ['label' => 'Instagram', 'icon' => 'fa-instagram', 'color' => 'from-pink-500 to-pink-600', 'name_app' => 'Instagram'],
                ['label' => 'Facebook', 'icon' => 'fa-facebook', 'color' => 'from-blue-600 to-blue-700', 'name_app' => 'Facebook'],
                ['label' => 'X (Twitter)', 'icon' => 'fa-x-twitter', 'color' => 'from-slate-700 to-slate-800', 'name_app' => 'X (Twitter)'],
                ['label' => 'YouTube', 'icon' => 'fa-youtube', 'color' => 'from-red-600 to-red-700', 'name_app' => 'YouTube'],
                ['label' => 'WhatsApp', 'icon' => 'fa-whatsapp', 'color' => 'from-green-600 to-green-700', 'name_app' => 'WhatsApp'],
            ];

            $socialLinks = collect($socialConfigs)->map(function ($config) use ($socialmedias) {
                $url = optional($socialmedias->firstWhere('name_app', $config['name_app']))->url ?? '#';
                return [
                    'label' => $config['label'],
                    'icon' => $config['icon'],
                    'color' => $config['color'],
                    'url' => $url,
                ];
            })->all();

            $footerLogo = $userinterface?->image_logo
                ? asset('storage/' . $userinterface->image_logo)
                : asset('images/LogoUmb.png');

            $view->with([
                'programStudy' => $programStudy,
                'userinterface' => $userinterface,
                'socialmedias' => $socialmedias,
                'contacts' => $contacts,
                'footerLogo' => $footerLogo,
                'socialLinks' => $socialLinks,
                'backToTopUrl' => $sectionUrl('home'),
            ]);
        });

        View::composer(['partials.head', 'components.layouts.app.sidebar'], function ($view) {
            $userinterface = Userinterface::first();
            $studyprogram = Studyprogram::first();

            $sidebarLogoUrl = null;
            if ($userinterface?->image_logo && \Illuminate\Support\Facades\Storage::disk('public')->exists($userinterface->image_logo)) {
                $sidebarLogoUrl = asset('storage/' . $userinterface->image_logo);
            }

            $view->with([
                'userinterface'   => $userinterface,
                'studyprogram'    => $studyprogram,
                'sidebarLogoUrl'  => $sidebarLogoUrl,
            ]);
        });
    }
}
