<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Child;
use App\Models\Donation;
use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        Child::factory(10)->create();

        $campaigns = Campaign::factory(5)->create()->each(function ($campaign) {
            $children = Child::inRandomOrder()->take(3)->pluck('id');
            $campaign->children()->attach($children);
        });

        // Create donations associated with campaigns/children
        foreach ($campaigns as $campaign) {
            Donation::factory(5)->create([
                'campaign_id' => $campaign->id,
                'paid_at' => now(),
            ]);
        }
    }
}
