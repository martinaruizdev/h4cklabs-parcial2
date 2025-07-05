<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            [
                'new_id' => 1,
                'title' => 'Nuevo Curso: Explotación de Vulnerabilidades en APIs REST',
                'subtitle' => 'Aprende a identificar y explotar fallos comunes en APIs modernas',
                'author' => 'María López',
                'release_date' => '2025-04-07',
                'description' => 'Este curso intensivo de 6 semanas te sumergirá en el mundo de la seguridad de APIs REST, donde exploraremos vulnerabilidades críticas como Broken Object Level Authorization (BOLA), Inyección SQL a través de GraphQL, y ataques de mass assignment. A través de nuestro laboratorio virtual interactivo, que replica entornos reales de empresas Fortune 500 (con su consentimiento), los estudiantes podrán practicar técnicas avanzadas como JWT hijacking mediante weaknesses en algoritmos de firma, explotación de documentación Swagger expuesta, y bypass de rate limiting. El curso incluye 15 máquinas virtuales progresivas, desde configuraciones básicas mal aseguradas hasta sistemas con WAFs empresariales. Como proyecto final, deberás comprometer una API bancaria simulada que implementa OAuth 2.0 con vulnerabilidades intencionales. Los mejores proyectos serán invitados a nuestro programa privado de bug bounty con partners de la industria',
                'tag' => 'curso, web, exploit, pentesting',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 2,
                'title' => 'Máquina DarkLair añadida al Laboratorio: Nivel Avanzado',
                'subtitle' => 'Una máquina basada en técnicas de pivoting y exfiltración de datos',
                'author' => 'Carlos Ruiz',
                'release_date' => '2025-04-12',
                'description' => 'DarkLair representa nuestro desafío más complejo hasta la fecha, simulando una red corporativa multinacional comprometida con 8 sistemas interconectados (3 Windows Server 2019, 2 Linux servers, y 3 dispositivos IoT). El escenario requiere avanzadas técnicas de pivoting a través de sistemas comprometidos, incluyendo el uso de Chisel para tunneling, abuso de servicios Kerberos mal configurados, y explotación de vulnerabilidades zero-day simuladas en sistemas SCADA. Particularmente desafiante es la fase de exfiltración de datos, donde deberás evadir sistemas DLP (Data Loss Prevention) mediante técnicas de steganography en tráfico DNS y covert channels a través de protocolos ICMP. Solo el 3% de los participantes ha logrado dominio completo en menos de 12 horas. La máquina incluye un manual de 50 páginas con análisis forense detallado para administradores de sistemas.',
                'tag' => 'máquina, red-team, pivoting, pentesting',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 3,
                'title' => 'Alerta de Seguridad: Critical RCE en Apache Log4j',
                'subtitle' => 'Cómo afecta y prácticas para mitigarla en nuestro laboratorio.',
                'author' => 'Equipo de Investigación de la Academia',
                'release_date' => '2025-04-17',
                'description' => 'Hemos desarrollado un entorno de laboratorio completo para estudiar la vulnerabilidad Log4Shell (CVE-2021-44228) en profundidad. Nuestro setup incluye 8 escenarios diferentes que muestran la evolución de los vectores de ataque, desde la explotación inicial mediante JNDI lookup hasta variantes avanzadas que bypassan parches temporales. Los estudiantes podrán practicar: 1) Explotación básica en servidores Tomcat, 2) Bypass de mitigaciones mediante vectores alternativos como ${ctx}, 3) Técnicas de detección mediante análisis de tráfico de red, y 4) Análisis forense post-explotación usando Elasticsearch y Volatility. El laboratorio incluye muestras reales (sanitizadas) de malware que aprovechó esta vulnerabilidad, incluyendo variantes de ransomware como Conti y LockBit. Como valor añadido, hemos incluido un módulo especial sobre técnicas de patch management a escala empresarial',
                'tag' => 'alerta, exploit, labs, vulnerabilidad',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 4,
                'title' => 'Resultados del CTF Interno: ¡Felicidades a los Ganadores!',
                'subtitle' => 'El equipo "RootKings777" se llevó el primer lugar del CTF anual',
                'author' => 'David Mendoza',
                'release_date' => '2025-04-21',
                'description' => 'El CTF anual de 48 horas batió récords con 142 equipos compitiendo en 27 desafíos distribuidos en 5 categorías: Web Exploitation (incluyendo un reto de SSRF en WebSockets), Binary Exploitation (con un driver de kernel vulnerable), Cryptography (implementación defectuosa de FHE), Reversing (malware que usaba Process Hollowing), y un innovador track de Hardware Hacking usando FPGAs. El equipo ganador "RootKings777" resolvió el desafío estrella: una cadena de explotación que combinaba un XSS almacenado en una aplicación Vue.js con un CSRF que permitía RCE a través de una API interna mal configurada. Publicaremos todos los write-ups técnicos, incluyendo la solución al reto más difícil (solo resuelto por 3 equipos) que involucraba abuso de WebAssembly y memory corruption en un motor JavaScript custom. La próxima edición incluirá desafíos de cloud security targeting AWS Lambda y Azure Functions',
                'tag' => 'CTF, evento, comunidad, desafio',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 5,
                'title' => 'Alerta: Aumento de Ataques Ransomware a PyMEs en LATAM',
                'subtitle' => 'Cómo protegerte y practicar en nuestro laboratorio de análisis forense.',
                'author' => 'Equipo de Threat Intelligence',
                'release_date' => '2025-04-26',
                'description' => 'Nuestro equipo de investigación ha analizado 47 ataques recientes del ransomware ViperLocker en Latinoamérica, identificando un nuevo modus operandi: 1) Compromiso inicial mediante phishing con documentos Office que explotan CVE-2023-21716, 2) Movimiento lateral usando herramientas legítimas como AnyDesk modificado, y 3) Doble extorsión combinando cifrado AES-256 con filtración de datos a través de Tor. Hemos recreado este escenario en nuestro laboratorio con 3 niveles de dificultad, incluyendo: a) Análisis estático del malware usando Ghidra, b) Recuperación de archivos mediante análisis de shadow copies, y c) Técnicas de negociación con los atacantes (simulados). El material incluye un playbook de 30 páginas con indicadores de compromiso (IOCs), reglas YARA, y configuraciones recomendadas para backups a prueba de ransomware. Próximamente añadiremos un módulo sobre recuperación de sistemas ESXi afectados.',
                'tag' => 'alerta, ransomware, forense, LATAM',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 6,
                'title' => 'Conferencia: Ética en el Hacking con Invitados de la NSA',
                'subtitle' => 'Debate abierto sobre los límites del pentesting y la privacidad',
                'author' => 'Laura Gómez',
                'release_date' => '2025-05-02',
                'description' => 'En este evento exclusivo, contaremos con la participación de tres exmiembros del equipo TAO (Tailored Access Operations) de la NSA, quienes revelarán: 1) Casos reales de operaciones éticas contra infraestructuras terroristas, incluyendo el análisis del ataque a un sistema de comunicaciones encriptadas que utilizaba una implementación vulnerable de RSA-1024; 2) El proceso de toma de decisiones cuando se descubren vulnerabilidades zero-day en sistemas críticos, con un estudio de caso sobre una backdoor en equipos de telecomunicaciones; y 3) Una demostración en vivo de un ataque a un sistema SCADA industrial (en entorno aislado) usando técnicas de Man-in-the-Middle a través de modificaciones en firmware de routers. El panel de discusión incluirá representantes de la EFF (Electronic Frontier Foundation) para debatir sobre el marco legal del Artículo 5 de la Convención de Budapest aplicado a operaciones de ciberdefensa. Los asistentes recibirán un whitepaper con 10 escenarios éticos controversiales y su análisis jurídico.',
                'tag' => 'evento, ética, conferencia, NSA',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 7,
                'title' => 'Nueva Herramienta: PacketNinja para Análisis de Tráfico',
                'subtitle' => 'Desarrollada por estudiantes de la academia, ahora open-source.',
                'author' => 'Daniel Torres',
                'release_date' => '2025-05-10',
                'description' => 'PacketNinja es una suite avanzada de análisis de red escrita en Rust y Python 3.10, diseñada para detectar: 1) Tráfico malicioso encriptado mediante análisis heurístico de metadatos TLS; 2) Patrones de exfiltración de datos usando algoritmos de entropía aplicados a protocolos DNS/ICMP; y 3) Anomalías en tráfico industrial (Modbus, DNP3) mediante modelos de machine learning entrenados con 15TB de datos de tráfico real. La herramienta incluye módulos especializados para: a) Reconstrucción de sesiones HTTP/2 con capacidad de detectar desincronización de streams (CVE-2023-44487); b) Análisis forense de ataques QUIC; y c) Detección de beaconing en tráfico IPv6. El repositorio GitHub incluye 12 plugins preconfigurados para integración con Suricata y Zeek, además de un laboratorio virtual con 8 escenarios de ataques avanzados (desde APT-style lateral movement hasta ataques a sistemas 5G). Los contribuidores más activos tendrán acceso a nuestro dataset privado de 1.2 millones de muestras de tráfico malicioso etiquetado.',
                'tag' => 'herramienta, Python, redes, open-source',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'new_id' => 8,
                'title' => 'Taller Práctico: Crea Tu Propio Ransomware (Ético)',
                'subtitle' => 'Entiende cómo funcionan estos ataques para defenderte mejor.',
                'author' => 'Miguel Ángel Castro',
                'release_date' => '2025-05-15',
                'description' => 'Este taller de 8 horas guiará a los participantes en el desarrollo controlado de un ransomware con capacidades avanzadas: 1) Cifrado hibrido (RSA-2048 + ChaCha20) con clave por víctima; 2) Persistencia mediante servicios Windows/LaunchAgents; 3) Técnicas de evasión de EDR (API unhooking, direct syscalls); y 4) Comando y control mediante Tor hidden services. Usaremos C++20 con las bibliotecas Crypto++ y libsodium, implementando buenas prácticas para evitar ejecución accidental (killswitch mediante argumentos). Cada participante recibirá: a) Una VM Linux con toolchain configurado; b) 10 objetivos de prueba (Windows 10/11 con diferentes EDRs); y c) Un playbook de mitigaciones con 25 técnicas ATT&CK mapeadas. El taller incluye un módulo especial sobre análisis forense del ransomware creado, enseñando a extraer claves de memoria, analizar logs de cifrado, y recuperar archivos mediante técnicas de side-channel attacks. Todo el código se ejecutará en un entorno aislado sin conexión a internet, con supervisiones constantes del equipo docente.',
                'tag' => 'taller, malware, C++, educación',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
