<?php

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::insert([
            [
                'name' => 'CEO',
                'description' => 'Has ultimate responsibility for the corporation\'s activities, and signs off on contracts and other legally-binding action on behalf of the corporation. The CEO reports to the corporation\'s board of directors.',
                'type' => 'executive',
                'level' => 10
            ],
            [
                'name' => 'COO',
                'description' => 'Charged with managing the corporation\'s day-to-day affairs, the COO usually reports directly to the CEO.',
                'type' => 'executive',
                'level' => 9
            ],
            [
                'name' => 'CFO',
                'description' => 'Responsible (directly or indirectly) for almost all of the corporation\'s financial matters.',
                'type' => 'executive',
                'level' => 9
            ],
            [
                'name' => 'Manager',
                'description' => 'Department manager.',
                'type' => 'manager',
                'level' => 7
            ],
            [
                'name' => 'Secretary',
                'description' => 'in charge of maintaining and keeping corporation\'s records, documents, and "minutes" from shareholder meetings.',
                'type' => 'operations',
                'level' => 5
            ],
            [
                'name' => 'Employee',
                'description' => '',
                'type' => 'operations',
                'level' => 2
            ],
        ]);
    }
}
