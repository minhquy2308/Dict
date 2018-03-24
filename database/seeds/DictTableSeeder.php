<?php

use Illuminate\Database\Seeder;
use App\Dictionary;
class DictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dict = new Dictionary();
        $dict->name = 'Việt-Lào';
        $dict->code = 'V-L';
        $dict->save();
        $dict = new Dictionary();
        $dict->name = 'Lào-Việt';
        $dict->code = 'L-V';
        $dict->save();
    }
}
