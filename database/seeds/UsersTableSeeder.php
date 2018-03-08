<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         /*factory(\App\Models\User::class,10)->create();*/
        //生成各种账号格10个
        $count = 10;
        $phone = 18800000000;
        \Illuminate\Support\Facades\DB::transaction(function() use($phone,$count){
                for($j=0;$j<$count;$j++)
                {
                    $tmp = ['phone'=>$phone +$j,'password'=>bcrypt('123456')];
                        \App\Models\User::create($tmp);
                }
        });
    }
}
