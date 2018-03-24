<?php

use Illuminate\Database\Seeder;
use App\State;
class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new State();
        $state->name = 'Pending';
        $state->save();
        $state = new State();
        $state->name = 'Approved';
        $state->save();
    }
}
