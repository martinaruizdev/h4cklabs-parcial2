<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttackTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attack_types')->insert([
            ['attack_type_id' => 1, 'name' => 'Remote Exploit (SMB)', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 2, 'name' => 'Web Exploit', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 3, 'name' => 'PrivEsc', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 4, 'name' => 'Service Exploit', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 5, 'name' => 'AD Enumeration', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 6, 'name' => 'Network', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 7, 'name' => 'Agent Exploit', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 8, 'name' => 'Reverse Eng', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 9, 'name' => 'GPP', 'created_at' => now(), 'updated_at' => now()],
            ['attack_type_id' => 10, 'name' => 'Kerberos Abuse', 'created_at' => now(), 'updated_at' => now()],
        ]);

            DB::table('machines_have_attacktypes')->insert([
                ['machine_fk'=>1, 'attack_type_fk'=>1],
                ['machine_fk'=>2, 'attack_type_fk'=>2],
                ['machine_fk'=>2, 'attack_type_fk'=>3],
                ['machine_fk'=>3, 'attack_type_fk'=>4],
                ['machine_fk'=>4, 'attack_type_fk'=>5],
                ['machine_fk'=>4, 'attack_type_fk'=>1],
                ['machine_fk'=>5, 'attack_type_fk'=>2],
                ['machine_fk'=>5, 'attack_type_fk'=>7],
                ['machine_fk'=>6, 'attack_type_fk'=>5],
                ['machine_fk'=>6, 'attack_type_fk'=>9],
                ['machine_fk'=>7, 'attack_type_fk'=>2],
                ['machine_fk'=>8, 'attack_type_fk'=>6],
                ['machine_fk'=>8, 'attack_type_fk'=>8],
                ['machine_fk'=>9, 'attack_type_fk'=>10],
                ['machine_fk'=>10, 'attack_type_fk'=>2],
        ]);
    }
}
