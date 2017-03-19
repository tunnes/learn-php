<?php
    class UsuarioDAO{
        private $conn;
        
        public function __construct(){
            $this->conn = Connection::getConn("127.0.0.1", "tunnes", "", "teste", 3306);
        }
        
        public function listar(){
            $st = $this->conn->prepare("SELECT * FROM usuario") or die("1".$conn->error);
            $st->execute() or die("2".$st->error);
            $st->bind_result($col0,$col1);
            while($st->fetch()){
                echo json_encode(array('cd_usuario' => $col0, 'nm_usuario' => $col1));
            }
        }
        public function editar($OBJ){
            $stmt = $this->conn->prepare("UPDATE usuario SET nm_usuario = ? WHERE cd_usuario = ?") or die("2".$conn->error);
            $stmt->bind_param("si", $OBJ->nm_usuario, $OBJ->cd_usuario) or die("3".$stmt->error);
            $stmt->execute() or die("4".$stmt->error);
        }
        public function cadastrar($OBJ){
            $stmt = $this->conn->prepare("INSERT INTO usuario(nm_usuario) VALUES(?)") or die("2".$conn->error);
            $stmt->bind_param("s",$OBJ->nm_usuario) or die("3".$stmt->error);
            $stmt->execute() or die("4".$stmt->error);
            return true;
        }
        public function remover($cd_usuario = 1){
            $stmt = $this->conn->prepare("DELETE FROM usuario WHERE cd_usuario = ?") or die("2".$conn->error);
            $stmt->bind_param("i", $cd_usuario) or die("3".$stmt->error);
            $stmt->execute() or die("4".$stmt->error);
        }
        public function consultar($cd_usuario = 1){
            $st = $this->conn->prepare("SELECT * FROM usuario WHERE cd_usuario = ?") or die("1".$conn->error);
        #   O Bind tem como função relacionar o tipo do parâmetro.
            $st->bind_param("i", $cd_usuario) or die("3".$stmt->error);
            $st->execute() or die("2 ".$st->error);
            $st->bind_result($col0, $col1);
            $st->fetch();
            return array('cd_usuario' => $col0, 'nm_usuario' => $col1);
        }
    }

?>