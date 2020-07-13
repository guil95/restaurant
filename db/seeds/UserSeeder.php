<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
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
                'name' => 'Juvenal',
                'email' => 'juvenal@email.com',
                'password' => password_hash(123, PASSWORD_ARGON2I),
                'merchant' => 1
            ],
            [
                'name' => 'Jeronimo',
                'email' => 'jeronimo@email.com',
                'password' => password_hash(123, PASSWORD_ARGON2I),
                'merchant' => 2
            ],
            [
                'name' => 'Juarez',
                'email' => 'juarez@email.com',
                'password' => password_hash(123, PASSWORD_ARGON2I),
                'merchant' => 3
            ]
        ];

        $this->table('users')
            ->insert($data)
            ->save();
    }
}
