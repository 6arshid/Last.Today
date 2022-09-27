<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article; 
use Helper;
use Faker\Factory as Faker;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Article::truncate(); 
        // $faker = Faker::create();

        // $articles = [
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Congratulations to our program director',
        //         'article_content' => 'Congratulations to our program director Gregory Robinson for being named to the #TIME100! More: https://go.nasa.gov/3G9NYOm

        //             “Our teams orbit around Greg, because we trust him to ask questions and understand our concerns.” -Webb senior project scientist & Nobel laureate John Mather',
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Starlink now available for RVs, campers & other large vehicle users (note, antenna too big for cars)',
        //         'article_content' => 'Starlink now available for RVs, campers & other large vehicle users (note, antenna too big for cars)',
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Let yourself be whisked away by the Whirlpool Galaxys curving arms',
        //         'article_content' => 'Let yourself be whisked away by the Whirlpool Galaxys curving arms, pink star-forming regions, and brilliant blue strands of star clusters. Explore #GalaxiesGalore with 
        //         @NASAHubble
        //          on 
        //         @Tumblr
        //         : https://nasa.tumblr.com/post/684784785714020352/prepare-to-be-mesmerized',
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Artemis is more than going to the Moon',
        //         'article_content' => '#Artemis is more than going to the Moon. We’re learning to live & work on another world so we can explore more of the solar system, and we need your help. We’re extending the deadline to June 3 to get your feedback on 
        //         @NASA
        //         ’s draft Moon to Mars objectives: https://go.nasa.gov/3yRK7DM',
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Looks like a seagull hit the jackpot..🍕𓅮😅',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'Ever wondered how your snack was created? Mind Popping! What helps you stay in the game? #PringlesStayInTheGame',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'The Webex Room Bar is setting a new bar for video meetings.',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'We asked an expert all about space botany. Spoiler alert: it involves potatoes.',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'From successful experiments to future techniques to grow crops on the Moon and Mars, we cover it all in the latest episode of the #GravityAssist podcast. Listen or read along: https://nasa.gov/mediacast/gravity-assist-what-will-we-eat-on-mars',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        //     [
        //         'article_type' => 'blog',
        //         'article_title' => 'I am currently 17 hrs 58 mins 55 secs of light-travel time from Earth (2022:144:000000:2L)',
        //         'article_content' => $faker->text(),
        //         'article_slug' => uniqid(),
        //         'article_user_id' => 2,
        //         'article_lang' => 'en'
            
        //     ],
        // ];
        // foreach($articles as $article)
        // {
        //     Article::create([
        //         'article_type' => $article['article_type'],
        //         'article_title' => $article['article_title'],
        //         'article_content' => $article['article_content'],
        //         'article_slug' => encrypt($article['article_slug']),
        //         'article_user_id' => $article['article_user_id'],
        //         'article_lang' => $article['article_lang']

        //    ]);
        //  }
    }
}
