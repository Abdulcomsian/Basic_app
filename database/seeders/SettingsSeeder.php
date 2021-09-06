<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = '/uploads/settings/';
        if(!File::exists(public_path().$path)) {
            File::makeDirectory(public_path().$path, 0775, true); //creates directory
        }
        Settings::create([
            'site_logo' => $path.'logo.png',
        ]);
    }
}
