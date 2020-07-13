<?php


use Phinx\Seed\AbstractSeed;

class OrderSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'CustomerSeeder',
            'BoardSeeder',
            'UserSeeder',
            'MerchantSeeder',
        ];
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'board' => 1,
                'customer' => 1,
                'user' => 1,
                'merchant' => 1,
                'status' => 'PENDING'
            ]
        ];

        $this->table('orders')
            ->insert($data)
            ->save();
    }
}
