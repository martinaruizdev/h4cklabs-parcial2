<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('machines')->insert([
             [
                'machine_id' => 1,
                'name' => 'BlueLegacy',
                'description' => 'Explotación de EternalBlue en un entorno Windows 7 mal parcheado. Perfecto para principiantes que usan Metasploit o manual exploitation con scripts de SMB.',
                'difficulty_fk' => 1,
                'attack_type' => 'Remote Exploit (SMB)',
                'os' => 'Windows',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 2,
                'name' => 'RootMe',
                'description' => 'Linux vulnerable con Apache mal configurado y escalada de privilegios local usando un kernel exploit. Ideal para aprender el ciclo completo de explotación.',
                'difficulty_fk' => 1,
                'attack_type' => 'Web Exploit + PrivEsc',
                'os' => 'Linux',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 3,
                'name' => 'PostMan',
                'description' => 'Servicio Redis expuesto sin autenticación. Combinación de ataque a la infraestructura y uso de credenciales hardcodeadas en scripts internos.',
                'difficulty_fk' => 2,
                'attack_type' => 'Service Exploit',
                'os' => 'Linux',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 4,
                'name' => 'Active',
                'description' => 'Entorno Windows Server 2016 con Active Directory. Explotación basada en LDAP enumeration, SMB shares y Kerberoasting.',
                'difficulty_fk' => 2,
                'attack_type' => 'AD Enumeration + Token Abuse',
                'os' => 'Windows',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 5,
                'name' => 'Monitors',
                'description' => 'Entorno de monitoreo con Zabbix vulnerable. El atacante debe explotar la interfaz web, obtener RCE y escalar privilegios mediante el demonio agentd.',
                'difficulty_fk' => 3,
                'attack_type' => 'Web + Agent Exploit',
                'os' => 'Linux',
                'status' => 'Inactiva',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 6,
                'name' => 'Timelapse',
                'description' => 'Windows moderno con políticas de grupo expuestas y archivos LAPS mal protegidos. Se requiere acceso al sistema de archivos remoto y técnicas de password spraying.',
                'difficulty_fk' => 4,
                'attack_type' => 'AD Exploit + GPP',
                'os' => 'Windows',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 7,
                'name' => 'LazyAdmin',
                'description' => 'Sitio CMS hecho a medida con múltiples vulnerabilidades web, incluyendo directory traversal y file upload sin validación.',
                'difficulty_fk' => 1,
                'attack_type' => 'Web Exploitation',
                'os' => 'Linux',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 8,
                'name' => 'Backdoor',
                'description' => 'Máquina con backdoor SSH embebido y contraseñas hardcodeadas. Ideal para practicar escaneo de puertos no estándar y reverse engineering básico.',
                'difficulty_fk' => 2,
                'attack_type' => 'Network + Reverse Eng',
                'os' => 'Linux',
                'status' => 'Inactiva',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 9,
                'name' => 'Control',
                'description' => 'Máquina basada en red corporativa simulada con Kerberos mal configurado y posibilidad de realizar ataques de pass-the-ticket.',
                'difficulty_fk' => 4,
                'attack_type' => 'Kerberos Abuse',
                'os' => 'Windows',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'machine_id' => 10,
                'name' => 'WebTech',
                'description' => 'Ambiente web con múltiples tecnologías: Node.js, PHP y SQLite. Ideal para practicar ataques multi-vector como SSTI, Inyección SQL y SSRF.',
                'difficulty_fk' => 2,
                'attack_type' => 'Full-stack Web Exploitation',
                'os' => 'Linux',
                'status' => 'Activa',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}