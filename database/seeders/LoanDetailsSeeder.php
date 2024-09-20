<?php

namespace Database\Seeders;

use App\Models\LoanDetails;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LoanDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                "clientid" => 1001,
                "num_of_payment" => 12,
                "first_payment_date" => date('2018-06-29'),
                "last_payment_date" => date('2019-05-29'),
                "loan_amount" => 1550.00,
            ],
            [
                "clientid" => 1002,
                "num_of_payment" => 7,
                "first_payment_date" => date('2019-02-15'),
                "last_payment_date" => date('2019-08-15'),
                "loan_amount" => 6851.94,
            ],
            [
                "clientid" => 1005,
                "num_of_payment" => 17,
                "first_payment_date" => date('2017-11-09'),
                "last_payment_date" => date('2019-03-09'),
                "loan_amount" => 1800.01,
            ]
        ];


        foreach($data as $item){
            LoanDetails::updateOrCreate($item,$item);
        }

    }
}
