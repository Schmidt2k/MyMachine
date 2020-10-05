<?php //conexao.php
    class Conexao{
        private static $dbHost = 'localhost';
        private static $dbNome = 'mymachine';
        private static $dbUsuario = 'root';
        private static $dbSenha = '';

        private static $cont=null;

        public function __construct(){
            die("A Função init não é permitida");
        }

        public static function conectar(){
            if(self::$cont == null){
                try{
                    self::$cont = new PDO(
                    "mysql: host=". self::$dbHost .
                    "; dbname=". self::$dbNome, 
                    self::$dbUsuario, self::$dbSenha);
                }
                catch(PDOException $exception){
                    die($exception->getMessage('Sucesso'));
                }
            }
            return self::$cont;
        }
        
        public static function desconectar(){
            self::$cont=null;
        }
    }

?>