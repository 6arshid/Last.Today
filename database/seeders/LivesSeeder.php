<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Live; 
use Helper;
class LivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Live::truncate(); 
        $lives = [
            [
                'live_user_id' => 1,
                'live_title' => 'LIVE: Watch TRTWORLD',
                'live_content' => 'https://www.youtube.com/embed/CV5Fooi8YJA',
                'live_image' => '/images/lives/TRT World.jpg',
                'live_source_name' => 'TRT World',
                'live_source_url' => "https://www.youtube.com/watch?v=CV5Fooi8YJA"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'Earth Views: Earth From Space Seen From The ISS',
                'live_content' => 'https://www.youtube.com/embed/DDU-rZs-Ic4',              
                'live_image' => '/images/lives/SPACE (Official).jpeg',
                'live_source_name' => 'SPACE (Official)',
                'live_source_url' => "https://www.youtube.com/channel/UCIR_LPmEQ9QHR0yB2lxgaxQ"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => '🔴 Al Jazeera English | Live',
                'live_content' => 'https://www.youtube.com/embed/F-POY4Q0QSI',
                'live_image' => '/images/lives/Al Jazeera.jpg',
                'live_source_name' => 'Al Jazeera',
                'live_source_url' => "https://www.youtube.com/watch?v=F-POY4Q0QSI"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'LIVE: Latest News Headlines and Events l ABC News Live',
                'live_content' => 'https://www.youtube.com/embed/w_Ma8oQLmSM',
                'live_image' => '/images/lives/ABC News .jpg',
                'live_source_name' => 'ABC News',
                'live_source_url' => "https://www.youtube.com/watch?v=w_Ma8oQLmSM"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'LIVE: NBC News NOW',
                'live_content' => 'https://www.youtube.com/embed/b774cFaEkTo',
                'live_image' => '/images/lives/NBC News.jpg',
                'live_source_name' => 'ABC News',
                'live_source_url' => "https://www.youtube.com/watch?v=w_Ma8oQLmSM"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'Watch Sky News live',
                'live_content' => 'https://www.youtube.com/embed/9Auq9mYxFEE',
                'live_image' => '/images/lives/channels4_profile.jpeg',
                'live_source_name' => 'Sky News',
                'live_source_url' => "https://www.youtube.com/watch?v=9Auq9mYxFEE"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'FRANCE 24 English – LIVE – International Breaking News & Top stories - 24/7 stream',
                'live_content' => 'https://www.youtube.com/embed/h3MuIUNCCzI',            
                'live_image' => '/images/lives/FRANCE 24 English.jpeg',
                'live_source_name' => 'FRANCE 24 English',
                'live_source_url' => "https://www.youtube.com/watch?v=h3MuIUNCCzI"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'KTN News Live - Streaming Kenya, Africa and World news and programmes 24/7',
                'live_content' => 'https://www.youtube.com/embed/A6ML3GCR6j8',
                'live_image' => '/images/lives/KTN News Kenya.jpg',
                'live_source_name' => 'KTN News Kenya',
                'live_source_url' => "https://www.youtube.com/watch?v=A6ML3GCR6j8"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'Euronews English Live',
                'live_content' => 'https://www.youtube.com/embed/sPgqEHsONK8',
                'live_image' => '/images/lives/Euronews English Live.jpg',
                'live_source_name' => 'Euro News',
                'live_source_url' => "https://www.youtube.com/watch?v=sPgqEHsONK8"
            
            ],

            [
                'live_user_id' => 1,
                'live_title' => 'Watch ABC News Australia live | ABC News',
                'live_content' => 'https://www.youtube.com/embed/vOTiJkg1voo',
                'live_image' => '/images/lives/ABC News (Australia).jpg',
                'live_source_name' => 'ABC News (Australia)',
                'live_source_url' => "https://www.youtube.com/watch?v=vOTiJkg1voo"
            
            ],
            [
                'live_user_id' => 1,
                'live_title' => 'Russia invades Ukraine LIVE | DW News livestream | Headline news from around the world',
                'live_content' => 'https://www.youtube.com/embed/GE_SfNVNyqk',               
                'live_image' => '/images/lives/DW News.jpeg',
                'live_source_name' => 'DW News',
                'live_source_url' => "https://www.youtube.com/watch?v=GE_SfNVNyqk"
            
            ]
        ];


        foreach($lives as $live)
        {
            Live::create([
                'live_user_id' => $live['live_user_id'],
                'live_title' => $live['live_title'],
                'live_content' => $live['live_content'],
                'live_image' => $live['live_image'],
                'live_source_name' => $live['live_source_name'],
                'live_slug' => Helper::gen_uuid($len=16)

           ]);
         }

       
    }
}
