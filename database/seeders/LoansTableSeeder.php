<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $loans = [
            [
                'id'            => 1,
                'user_id'       => 2,
                'book_id'       => 3,
                'loan_date'     => '2022-12-20',
                'return_date'   => '2022-12-27',
                'status'        => 1,
            ],
            [
                'id'            => 2,
                'user_id'       => 2,
                'book_id'       => 4,
                'loan_date'     => '2022-12-20',
                'return_date'   => '2022-12-27',
                'status'        => 1,
            ],
            [
                'id'            => 3,
                'user_id'       => 2,
                'book_id'       => 5,
                'loan_date'     => '2022-12-20',
                'return_date'   => '2022-12-27',
                'status'        => 1,
            ],
        ];

        Loan::insert($loans);
    }
}
