<?php

namespace Database\Seeders;

use App\Models\Alert;
use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alerts = Alert::all();
        $customers = Customer::all();
        Tag::factory(10)
            ->create()
            ->each(function (Tag $tag) use ($alerts, $customers) {
                $tag->alerts()->attach($alerts->random(3));
                $tag->customers()->attach($customers->random(2));
            });
    }
}
