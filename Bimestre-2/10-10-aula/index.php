<?php
    #   Boas praticas para webservice segundo o 'REST' e o Garcia
    #       GET     - Para consultas no banco de dados.
    #       POST    - Para inserir dados na base de dados.
    #       PUT     - Para realizar alteração na base de dados.
    #       DELETE  - Para remover registros da base de dados.
    #       OPTIONS - Visualizar métodos possiveis de uma determinada Rota.
    
    #   Exercicios: POST, OPTIONS, PUT, DELETE.

    
    require_once 'model/UsuarioDAO.php';
    require_once 'model/Connection.php';
    abstract class seila{
        public function __call($m, $args){
            header('HTTP/1.1 405 Method not allowed');
            echo "Metodo ou parametro invalido..";
        }
    }
    
    
    class UsuarioResourcePOST extends seila{
        public function cadastrar($cd_usuario = 0){
            $JSON = file_get_contents('php://input');
            $OBJ = json_decode($JSON);
            $userDAO = new UsuarioDAO();
            $userDAO->cadastrar($OBJ) ? header('HTTP/1.1 200 OK') : header('HTTP/1.1 400 Bad Request');
        }

    }
    class UsuarioResourceGET extends seila{
        public function consultar($cd_usuario = 1){
            $userDAO = new UsuarioDAO();
            header('HTTP/1.1 200 OK');
            echo json_encode($userDAO->consultar($cd_usuario));
        }
        public function listar(){
            $userDAO = new UsuarioDAO();
            header('HTTP/1.1 200 OK');
            header('Content-type: application/json');
            $userDAO->listar();
        }
    }
    class UsuarioResourcePUT extends seila{
        public function editar($cd_usuario = 1){
            $JSON = file_get_contents('php://input');
            $OBJ  = json_decode($JSON);
            $userDAO = new UsuarioDAO();
            $userDAO->editar($OBJ) ? header('HTTP/1.1 200 OK') : header('HTTP/1.1 400 Bad Request');        
        }
    }
    class UsuarioResourceOPTIONS extends seila{
        public function verificar(){
            header('HTTP/1.1 200 OK');
            header('Allow: OPTIONS, GET, POST, PUT, DELETE');
        }
    }
    class UsuarioResourceDELETE extends seila{
        public function remover($cd_usuario = 1){
            $userDAO = new UsuarioDAO();
            $userDAO->remover($cd_usuario) ? header('HTTP/1.1 200 OK') : header('HTTP/1.1 400 Bad Request');
        }        
    }
    
    
    $c = $_GET['class'];
    $m = $_GET['met'];
    $a = $_GET['args'];
    
    $r = $_SERVER["REQUEST_METHOD"];
  
    
    // echo '<br> cla '.$_GET['class'];
    // echo '<br> met '.$_GET['met'];
    // echo '<br> arg '.$_GET['args'];
    // echo '<br> req '.$_SERVER["REQUEST_METHOD"];
    
    // echo '<hr>';
    
    # SEMPRE PASSAR O IDENTIFICADOR PELA URL.
    # CRIAR OUTRO ELEMENTO PARA NÃO MOSTRAR INFORMAÇÕES DO BANCO PARA O USUARIO.. PESQUISAR POR 'HASHI'.
    
    $class = ucfirst($c .'Resource'. $r);
    if(class_exists($class)){
       $chamador = new $class(); 
       isset($a) ? $chamador->$m($a) : $chamador->$m();
    }else{
        header('HTTP/1.1 400 Bad Request');
        # echo "Alguma chamada de parametros ai deu ruim cara..";
    }
    
    #   curl -H "Content-Type: application/json" -X POST -d '{"nm_usuario":"Before2"}' https://learn-php-tunnes.c9users.io/um/cadastrarUsuario/0
    
    #   curl -X "DELETE" https://learn-php-tunnes.c9users.io/usuario/remover/3
    
    #   Ex: Criar um resource para contagem de pessoas sexo f e m, update.
    #   Dar uma olhada no q o Garcia fez. --'
?>