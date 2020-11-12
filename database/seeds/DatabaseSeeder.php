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
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Guadalupe Santiago Mendoza',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Grupo prestamo',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Hermana monce',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Señora',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Mamá de isaac',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Señora',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Chica Tanda',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Maria de jesus silva',
            'user_id'=>1
        ]);
        Customer::create([
            'name'=>'Mamá',
            'user_id'=>1
        ]);

        Loan::create([
            'amount'=>4000,
            'interest_percentage'=>0.10,
            'date'=>'2020-08-27',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 5000',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>1,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1000,
            'interest_percentage'=>0.10,
            'date'=>'2020-08-27',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 5000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>1,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>8000,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-12',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 10000',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1000,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-01',
            'scheme'=>'semanal',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>4000,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-02',
            'scheme'=>'semanal',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>2,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>27000,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-05',
            'scheme'=>'mensual',
            'notes'=>'Pagara intereses de 30000',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>3,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>500,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-14',
            'scheme'=>'N/A',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>4,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1000,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-15',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 3000',
            'type_of_loan'=>'billetera',
            'status'=>'activo',
            'customer_id'=>5,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1700,
            'interest_percentage'=>0.10,
            'date'=>'2020-09-15',
            'scheme'=>'semanal',
            'notes'=>'Pagara intereses de 3000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>5,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1500,
            'interest_percentage'=>0.10,
            'date'=>'2020-11-03',
            'scheme'=>'mensual',
            'notes'=>'Pagara intereses de 2000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>6,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>2000,
            'interest_percentage'=>0.10,
            'date'=>'2020-10-05',
            'scheme'=>'semanal',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>7,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>1700,
            'interest_percentage'=>0.10,
            'date'=>'2020-10-27',
            'scheme'=>'mensual',
            'notes'=>'Pagara intereses de 2000',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>8,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>3600,
            'interest_percentage'=>0.10,
            'date'=>'2020-10-29',
            'scheme'=>'unico pago',
            'notes'=>'Pagara intereses de 4000',
            'type_of_loan'=>'intereses',
            'status'=>'pagado',
            'customer_id'=>9,
            'user_id'=>1
        ]);
        Loan::create([
            'amount'=>4000,
            'interest_percentage'=>0.10,
            'date'=>'2020-11-03',
            'scheme'=>'N/A',
            'type_of_loan'=>'intereses',
            'status'=>'activo',
            'customer_id'=>10,
            'user_id'=>1
        ]);

        Payment::create(['date'=>'2020-09-15','amount'=>2500,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-15','amount'=>200,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-16','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-17','amount'=>300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-21','amount'=>300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-22','amount'=>200,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-23','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-29','amount'=>100,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-29','amount'=>300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-09-01','amount'=>500,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-02','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-05','amount'=>1000,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-05','amount'=>100,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-06','amount'=>300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-07','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-08','amount'=>500,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-16','amount'=>1000,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-16','amount'=>1500,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-17','amount'=>1000,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-20','amount'=>200,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-22','amount'=>1000,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-26','amount'=>1300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-27','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-29','amount'=>1100,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-10-29','amount'=>400,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-11-02','amount'=>1000,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-11-03','amount'=>300,'user_id'=>1]);
        PAYMENT::create(['date'=>'2020-11-05','amount'=>500,'user_id'=>1]);



        
        Wallet::create([
            'quantity'=>45000,
            'user_id'=>1
        ]);

        Income::create([
            'date'=>'2020-09-27',
            'amount'=>200,
            'description'=>'Trabajo con mi papa',
            'user_id'=>1
        ]);
        Income::create([
            'date'=>'2020-10-04',
            'amount'=>500,
            'description'=>'Pago prestamo miguel',
            'user_id'=>1
        ]);
        
        Expense::create([
            'date'=>'2020-11-06',
            'amount'=>4058,
            'description'=>'Total salidas',
            'user_id'=>1
        ]);
    }
}
