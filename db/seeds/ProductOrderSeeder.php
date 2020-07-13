<?php


use Phinx\Seed\AbstractSeed;

class ProductOrderSeeder extends AbstractSeed
{
    public function getDependencies()
    {
        return [
            'OrderSeeder',
            'ProductSeeder'
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
                'product' => 1,
                'order' => 1,
                'quantity' => 3
            ]
        ];

        $this->table('products_order')
            ->insert($data)
            ->save();
    }
}
