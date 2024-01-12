<?php

namespace Database\Seeders;

use App\Models\Plans;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plans::insert([

            [
                'name' => 'Basic',
                'icon' => '',
                'descriptions'=>'Exercitation veniam consequat sunt nostrud amet.',
                'price'=>'983.78',
                'client_limit'=>'5',
                'features'=>'3 Presentations / month | 2,500 Character Input / Presentation'
            ],
           
            [
                'name' => 'Pro',
                'icon' => '',
                'descriptions'=>'Exercitation veniam consequat sunt nostrud amet.',
                'price'=>'983.78',
                'client_limit'=>'5',
                'features'=>'3 Presentations / month | 2,500 Character Input / Presentation'
            ],
            [
                'name' => 'Enterprise',
                'icon' => '',
                'descriptions'=>'Exercitation veniam consequat sunt nostrud amet.',
                'price'=>'983.78',
                'client_limit'=>'5',
                'features'=>'3 Presentations / month | 2,500 Character Input / Presentation'
            ],
           
        ]);
    }
}
