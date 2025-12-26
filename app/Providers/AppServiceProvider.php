<?php

namespace App\Providers;

use App\Models\About;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ContactInfo;

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
        //
        // نمرّر المتغيّر $footer لملف الفوتر
        View::composer('layout.page-layout.footer', function ($view) {
            $contact = ContactInfo::orderByDesc('updated_at')->first();
            $about   = About::orderByDesc('updated_at')->first();

            $footer = [
                'site_name'       => config('app.name', 'Medical'),
                // فقرة عن الموقع من جدول about (fallback لجملة ثابتة)
                'about_paragraph' => $about?->paragraph
                    ?? 'Your trusted AI-powered health assistant for quick symptom checks and insights.',
                'contact' => $contact, // يحتوي address/email/phone
                // 'socials' => [
                //     'x'        => $contact->x        ?? null,
                //     'facebook' => $contact->facebook ?? null,
                //     'linkedin' => $contact->linkedin ?? null,
                //     'instagram'=> $contact->instagram?? null,
                // ],
            ];

            $view->with('footer', $footer);
        });
    }
}
