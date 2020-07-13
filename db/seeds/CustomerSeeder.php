<?php


use Phinx\Seed\AbstractSeed;

class CustomerSeeder extends AbstractSeed
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
                'name' => 'Default'
            ],
            [
                'name' => 'Juvenal',
                'email' => 'juvencio@email.com',
                'age' => 30,
                'document' => '987.654.321.12'
            ]
        ];

        $this->table('customers')
            ->insert($data)
            ->save();
    }
}
