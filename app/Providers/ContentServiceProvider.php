<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Section;
class ContentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public $setting , $sections , $products;

    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->setting = collect(Setting::all())->pluck('value','key')->toArray();
        
        $this->sections = Section::query()
            ->where('status','active')
            ->latest()
            ->get();
        
       

        view()->composer('frontend.layout', function($view) {
            $view->with([
                'content' => $this->setting,
                'sections' => $this->sections,
            ]);
        });
    }
}
