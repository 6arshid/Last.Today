<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Token;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tokens = [
   
            // [
            //     'name' => 'TRON',
            //     'contract_address' => '__',
            //     'ticker' => 'TRX',
            //     'icon' => '/images/tokens/trx.png',
            //     'active' => 1
            // ],
            // [
            //     'name' => 'APENFT',
            //     'contract_address' => 'TFczxzPhnThNSqr5by8tvxsdCFRRz6cPNq',
            //     'ticker' => 'NFT',
            //     'icon' => '/images/tokens/nft.png',
            //     'active' => 1
            // ],
            [
                'name' => 'USD Tether',
                'contract_address' => 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
                'ticker' => 'USDT',
                'icon' => '/images/tokens/usdt.png',
                'active' => 1
            ],
            [
                'name' => 'USDC',
                'contract_address' => 'TEkxiTehnzSmSe2XqrBj4w32RUN966rdz8',
                'ticker' => 'USDC',
                'icon' => '/images/tokens/usdc.png',
                'active' => 1
            ]
        ];
        foreach ($tokens as $key => $value) {
            Token::create($value);
        }
    }
}
