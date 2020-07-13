<?php


use Phinx\Seed\AbstractSeed;

class ProductSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'MerchantSeeder'
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
                'description' => 'Pop',
                'value' => 5.00,
                'merchant' => 1
            ],
            [
                'description' => 'Burguer',
                'value' => 25.00,
                'merchant' => 2
            ]
        ];

        $this->table('products')
            ->insert($data)
            ->save();
    }
}
