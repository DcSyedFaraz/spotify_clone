<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $basicPlan = Plan::create([
            'name' => 'Basic',
            'slug' => 'basic',
            'stripe_plan' => 'stripe_basic_id',
            'price' => 29,
            'description' => 'Basic plan description.',
            'duration' => 'mon',
            'subtitle' => 'FOR INDIVIDUALS & SMALL BUSINESSES',
            'offer_text' => 'Get Your First 3 Months For $1/Mo',
            'included_title' => "What's Included On Basic",
        ]);

        $basicPlan->features()->createMany([
            ['feature' => 'Basic reports'],
            ['feature' => 'Up to 1,000 inventory locations'],
            ['feature' => '2 staff accounts'],
        ]);
        $PremiumPlan = Plan::create([
            'name' => 'Premium',
            'slug' => 'Premium',
            'stripe_plan' => 'stripe_Premium_id',
            'price' => 290,
            'description' => 'Premium plan description.',
            'duration' => 'yr',
            'subtitle' => 'FOR INDIVIDUALS & SMALL BUSINESSES',
            'offer_text' => 'Get Your First 3 Months For $1/Mo',
            'included_title' => "What's Included On Premium",
        ]);

        $PremiumPlan->features()->createMany([
            ['feature' => 'Premium reports'],
            ['feature' => 'Up to 1,000 inventory locations'],
            ['feature' => '2 staff accounts'],
        ]);
    }
}
