<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ResumeTemplate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class TemplateSeeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    use HasFactory;
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        ResumeTemplate::truncate();

        $templates = [
            ['name' => 'template1'],
            ['name' => 'template2'],
            ['name' => 'template3'],
            ['name' => 'template4'],
            ['name' => 'template5'],
            ['name' => 'template6'],
        ];

        ResumeTemplate::insert($templates);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
