<?php

// namespace Mcc\Laravelcms\Database\Seeds;

use Illuminate\Database\Seeder;

class PageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('block_layouts')->insert([
        'name' => 'first block layout',
        'file' => ''
      ]);
      DB::table('block_layouts')->insert([
        'name' => 'second block layout',
        'file' => ''
      ]);
      DB::table('block_layouts')->insert([
        'name' => 'third block layout',
        'file' => ''
      ]);

      DB::table('page_layouts')->insert([
        'name' => 'one column',
        'file' => 'laravelcms::cms.pages.layouts.one-column'
      ]);
      DB::table('page_layouts')->insert([
        'name' => 'two column',
        'file' => 'laravelcms::cms.pages.layouts.two-column'
      ]);
      DB::table('page_layouts')->insert([
        'name' => 'three column',
        'file' => 'laravelcms::cms.pages.layouts.three-column'
      ]);
    }
}
