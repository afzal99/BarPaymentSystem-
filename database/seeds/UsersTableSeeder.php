<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= new User;
        
        $user->fname = "Sujar Ahmed";
        $user->lname = "Monjur";        
        $user->email = "monjur@example.com";
        $user->password = "$2y$10\$HWd2s4fDYggouzmU2KcuyuAhYoJt1d8CmylP/VzNtt/rUlyDizFBu";
        $user->contact = "1111111";
        $user->nfc = "";
        $user->secret = "";

        $user->save();

        $user= new User;
        
        $user->fname = "Ajay";
        $user->lname = "Sing";        
        $user->email = "ajay@example.com";
        $user->password = "$2y$10\$HWd2s4fDYggouzmU2KcuyuAhYoJt1d8CmylP/VzNtt/rUlyDizFBu";
        $user->contact = "1111111";
        $user->nfc = "";
        $user->secret = "";

        $user->save();
        

        

        
    }
}
