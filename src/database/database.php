<?php
//Conexão com o Banco de dados respeitando o padrão de projeto Singleton

namespace App\Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    // Variável estática que armazenará a única instância da classe Database
    private static $instance = null;
    
    // Propriedade que armazenará a instância do gerenciador de conexões Capsule
    private $capsule;

    // Construtor privado impede que a classe seja instanciada diretamente
    private function __construct()
    {
        // Cria uma nova instância do gerenciador de conexões Capsule
        $this->capsule = new Capsule;

        // Configura a conexão com o banco de dados usando as configurações fornecidas
        $this->capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => '127.0.0.1',
            'database'  => 'sickstem',
            'username'  => 'root',
            'password'  => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        // Torna a instância do Capsule globalmente acessível através de métodos estáticos
        $this->capsule->setAsGlobal();

        // Configura o ORM Eloquent para ser usado
        $this->capsule->bootEloquent();
    }

    // Método estático que retorna a única instância da classe Database
    public static function getInstance()
    {
        // Verifica se a instância já foi criada
        if (self::$instance === null) {
            // Se ainda não foi criada, cria uma nova instância
            self::$instance = new Database();
        }

        // Retorna a instância única da classe Database
        return self::$instance;
    }

    // Método para obter a instância do Capsule, facilitando o acesso à conexão com o banco de dados
    public function getCapsule()
    {
        return $this->capsule;
    }
}
