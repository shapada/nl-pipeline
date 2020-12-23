<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Loan;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for( $i = 0; $i < 50; $i++ ) {
            Loan::create([
                'address' => $faker->address,
                'appraisal_ordered' => $faker->boolean,
                'approval_documents_signed' => $faker->boolean,
                'contact_info' => $faker->phoneNumber,
                'contract_price' => $faker->randomFloat(2, 0, 1000000),
                'closing_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'closing_location' => $faker->word,
                'closing_time' => $faker->time($format = 'Y-m-d H:i:s', $max = 'now'),
                'customer' => $faker->company,
                'flood_ordered' => $faker->boolean,
                'interest_rate' => $faker->randomFloat(2, 0, 20),
                'interest_rate_locked' => $faker->boolean,
                'interest_rate_expiration' => $faker->date($format = 'Y-m-d', $min = 'now' ),
                'lender' => $faker->name,
                'loan_number' => $faker->ean8,
                'loan_amount' => $faker->randomFloat(2, 0, 1000000),
                'notes' => $faker->text,
                'processor' => $faker->name,
                'title_company' => $faker->company,
                'title_ordered' => $faker->boolean,
                'escrow' => $faker->boolean
            ]);
        }
    }
}
