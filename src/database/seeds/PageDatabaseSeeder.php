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


      DB::table('row_layouts')->insert([
        'title' => 'One Column',
        'layout' => '',
        'rows'   => 1,
        'col1_class' => 'col-lg-12'
      ]);
      DB::table('row_layouts')->insert([
        'title' => 'Two Column',
        'layout' => '',
        'rows'   => 2,
        'col1_class' => 'col-lg-6',
        'col2_class' => 'col-lg-6'
      ]);
      DB::table('row_layouts')->insert([
        'title' => 'Three Column',
        'layout' => '',
        'rows'   => 3,
        'col1_class' => 'col-lg-4',
        'col2_class' => 'col-lg-4',
        'col3_class' => 'col-lg-4'
      ]);

      DB::table('widget_categories')->insert([
        'name' => 'Content',
      ]);
      DB::table('widget_categories')->insert([
        'name' => 'Social',
      ]);
      DB::table('widget_categories')->insert([
        'name' => 'Structure',
      ]);
    }
}
