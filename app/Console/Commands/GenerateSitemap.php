<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap.xml file';

    public function handle()
    {
        $this->info('Starting sitemap generation...');
        
        try {
            // Get base URL from config
            $baseUrl = config('app.url');
            
            // Create sitemap using the Spatie package
            $sitemap = \Spatie\Sitemap\Sitemap::create();
            
            // Add home page
            $sitemap->add($baseUrl);
            
            // Add blogs
            if (class_exists('\App\Models\Blog')) {
                $this->info('Adding blogs to sitemap...');
                $blogs = \App\Models\Blog::all();
                foreach ($blogs as $blog) {
                    $sitemap->add(url("/blogs/{$blog->id}"));
                }
            }
            
            // Add investment opportunities
            if (class_exists('\App\Models\InvestmentOpportunity')) {
                $this->info('Adding investment opportunities to sitemap...');
                $opportunities = \App\Models\InvestmentOpportunity::all();
                foreach ($opportunities as $opportunity) {
                    $sitemap->add(url("/investment-opportunities/{$opportunity->id}"));
                }
            }
            
            // Add other important pages
            $sitemap->add(url('/about'));
            $sitemap->add(url('/contact'));
            $sitemap->add(url('/services'));
            
            // Write sitemap to file
            $sitemap->writeToFile(public_path('sitemap.xml'));
            
            $this->info('Sitemap generated successfully!');
            $this->info('Sitemap location: ' . public_path('sitemap.xml'));
        } catch (\Exception $e) {
            $this->error("Error generating sitemap: {$e->getMessage()}");
            return 1;
        }
        
        return 0;
    }
}
