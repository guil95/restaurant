<?php


use Phinx\Seed\AbstractSeed;

class BoardSeeder extends AbstractSeed
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
                'number' => 1,
                'status' => 'FREE',
                'merchant' => 1
            ],
            [
                'number' => 2,
                'status' => 'BUSY',
                'merchant' => 2
            ]
        ];

        $this->table('boards')
            ->insert($data)
            ->save();
    }
}
