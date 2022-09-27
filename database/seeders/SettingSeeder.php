<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = "login,register,contact,contactus,about,aboutus,peloton,netflix,amazon,apple,nike,google,spotify,lego,microsoft,instagram,linkedin,playstation,starbucks,honda,audi,redbull,mercedes,mercedesbenz,porsche,pinterest,shopify,crocs,gucci,cocacola,national-geographic,nationalgeographic,adidas,sephora,hbo,mars,americanexpress,puma,versace,visa,adobe,square,unilever,usaa,cisco,bungie,youtube,lvmh,riotgames,airbnb,marriott,ubisoft,zoominfo,toyota,tommyhilfiger,hilton,mcdonalds,the-home-depot,thehomedepot,baskin-robbins,baskinrobbins,mastercard,visacard,johnson-johnson,johnsonjohnson,uber,twitter,procter-gamble,proctergamble,7-eleven,7eleven,coinbase,fedex,3m,nordstrom,philips,bose,foot-locker,footlocker,facebook,reddit,wikipedia,britannica,linktree,archive,admin,weather,dailymail,nytimes,nationalpost,independent,newyorker,aljazeera,soundcloud,netflix,fiverr,duckduckgo,yandex,ecosia,qwant,pinterest,tumblr,dribbble,giphy,imgur,pexels,istockphoto,dwell,github,stackexchange,stackoverflow,codepen,sourceforge,quora,whatsapp,wechat,telegram";
        DB::table('settings')->insert([
            'settings_unregistered_names' => $names,
            'destination_address' => 'TLVgu5Sa5jEbJPbbut3LsLFqXDdgtSgZHj',
            "created_at" =>  \Carbon\Carbon::now(), 
            "updated_at" => \Carbon\Carbon::now()
        ]);

      
        
    }
}
