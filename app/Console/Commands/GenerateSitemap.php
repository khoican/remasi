<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Recipe;
use App\Models\Categories;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating Sitemap.....');

        $recipes = Recipe::all();
        $categories = Categories::all();
        $sitemap = Sitemap::create();

        $sitemap->add(Url::create(route('home.index'))->setLastModificationDate(Carbon::now()));

        foreach ($recipes as $recipe) {
            $sitemap->add(
                Url::create(route('resep-show', $recipe->slug))
                    ->setLastModificationDate($recipe->updated_at)
                    ->setPriority(0.8)
            );
        }

        foreach ($categories as $category) {
            $sitemap->add(
                Url::create(route('resep-category', $category->slug))
                    ->setLastModificationDate($category->updated_at)
                    ->setPriority(0.8)
            );
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Generate Sitemap Successfully');
    }
}
