<?php


use Phinx\Seed\AbstractSeed;

class MerchantSeeder extends AbstractSeed
{
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
                'description' => 'MERCHANT1',
                'code' => 'f071d2d2-0bd1-4d1a-9210-d2669e2ad23c',
                'status' => 'ACTIVE',
            ],
            [
                'description' => 'MERCHANT2',
                'code' => '586c6e05-165e-4270-ae51-8d8282ad2a63',
                'status' => 'INACTIVE'
            ],
            [
                'description' => 'MERCHANT3',
                'code' => '2091ffeb-cde5-452b-8f19-302cb0dd8343',
                'status' => 'ACTIVE'
            ]
        ];

        $this->table('merchants')
            ->insert($data)
            ->save();
    }
}
