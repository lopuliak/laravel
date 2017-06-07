<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i = 1; $i <= 10; $i++){
        DB::table('articles')->insert([
            'title' => 'Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне',
            'slug' => str_random(100),
            'summary' =>str_random(130),
            'content' =>'Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.',
            'seo_title' =>str_random(10),
            'seo_key' =>str_random(25),
            'seo_desc' =>str_random(100),
        ]);
      }
    }
}
