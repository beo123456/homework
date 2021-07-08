<?php

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
        $this->call(category::class);
        $this->call(order::class);
        $this->call(product_order::class);
        $this->call(product::class);
        $this->call(users::class);
    }
}
