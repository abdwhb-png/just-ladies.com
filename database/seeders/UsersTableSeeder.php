<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        // $escortRole = Role::where('name', 'escort')->first();
        $memberRole = Role::where('name', 'member')->first();
        // $girls_names_json = json_decode(file_get_contents(public_path("storage/ressources/girls_names.json"), true));
        // foreach ($girls_names_json as $key => $value) {
        //     DB::table('girls_name')->insert([
        //         'Name' => $value->name,
        //         'Gender' => $value->gender,
        //     ]);
        // }
        // $prenoms_json = json_decode(file_get_contents(public_path("storage/ressources/prenoms.json"), true));
        // foreach ($prenoms_json as $key => $value) {
        //     DB::table('prenoms')->insert([
        //         'Name' => $value->name,
        //         'Gender' => $value->gender,
        //     ]);
        // }

        // $admin = User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'role_id' => $adminRole->id
        // ]);
        // $author = User::create([
        //     'name' => 'author',
        //     'email' => 'author@author.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'role_id' => $authorRole->id
        // ]);
        for($i=0; $i<200; $i++){
            $prenom = DB::table('prenoms')
                        ->Where('Gender', 'M')
                        ->inRandomOrder()
                        ->select('Name')
                        ->whereNotIn('Name', function ($query) {
                            $query->select('name')
                                ->from('users')
                                ->get();
                        })
                        ->first();
            $prenom->Name = Str::replace(' ', '-', Str::lower($prenom->Name));
            $member = User::create([
                'name' => $prenom->Name,
                'email' => $prenom->Name.'@gmail.com',
                'password' => Hash::make('password'),
                'role_id' => $memberRole->id
            ]);
        }

        // $escort = User::create([
        //     'name' => Str::random(8),
        //     'email' => 'escort'.$i.'@escort.com',
        //     'password' => Hash::make('password'),
        //     'role_id' => $escortRole->id
        // ]);

    }
}
