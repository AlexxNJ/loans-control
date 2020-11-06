<?php

use App\Wallet;
use App\Loan;
use App\User;
use App\Income;
use App\Expense;
use App\Payment;
use App\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        
        Wallet::truncate();
        Customer::truncate();
        Expense::truncate();
        Income::truncate();
        Loan::truncate();
        Payment::truncate();
        User::truncate();

        User::create([
            'name'=>'Alejandro',
            'email'=>'alex@gmail.com',
            'password'=> bcrypt('secret')
        ]);

        Customer::create([
            'name'=>'Yuliana Solano Hernandez',
            'phone_number'=>'7228895761',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Maria de jesus silva',
            'phone_number'=>'7228895761',
            'user_id'=>1
        ]);

        Payment::create([
            'date'=>'2020-11-04',
            'amount'=>500,
            'status'=>'atrasado',
            'notes'=>'Entrego su pago despues de tiempo',
            'customer_id'=>1
        ]);
        Payment::create([
            'date'=>'2020-11-04',
            'amount'=>400,
            'status'=>'atrasado',
            'customer_id'=>2
        ]);

        Loan::create([
            'amount'=>4500,
            'interest_percentage'=>10,
            'date'=>'2020-11-04',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 5000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>10000,
            'interest_percentage'=>10,
            'date'=>'2020-11-04',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 5000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1000,
            'interest_percentage'=>10,
            'date'=>'2020-11-04',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 5000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);

        Wallet::create([
            'quantity'=>45000,
            'user_id'=>1
        ]);

        Income::create([
            'date'=>'2020-11-04',
            'amount'=>200,
            'description'=>'Pago por ayudar a mi papa',
            'user_id'=>1
        ]);
        Income::create([
            'date'=>'2020-11-04',
            'amount'=>200,
            'description'=>'Pago por ayudar a mi papa',
            'user_id'=>1
        ]);
        Income::create([
            'date'=>'2020-11-04',
            'amount'=>200,
            'description'=>'Pago por ayudar a mi papa',
            'user_id'=>1
        ]);
        
        Expense::create([
            'date'=>'2020-11-04',
            'amount'=>25,
            'description'=>'Comprar papas y refresco',
            'user_id'=>1
        ]);
        Expense::create([
            'date'=>'2020-11-04',
            'amount'=>25,
            'description'=>'Comprar papas y refresco',
            'user_id'=>1
        ]);
    }
}
