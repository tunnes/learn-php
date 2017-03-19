<?php
    abstract class Produto{
        protected $preco, $qtEstoque, $percentPromo;
        
        public function serVendido($qtVendido){
            if($this->qtEstoque >= $qtVendido){
                $this->qtEstoque = $this->qtEstoque - $qtVendido;
                echo "Compra realizada com sucesso!";
            }else{
                echo "Estoque insuficiente!";
            }
        }
        public function entrarEmPromocao(){
            $this->preco = $this->preco + ($this->preco*$this->percentPromo)/100;
            echo "Promocao: ".$this->preco;
        }
        public function ajusteTributario($novoPreco){
            $this->preco = $novoPreco;
            echo "Novo preco: ".$this->preco;
        }
    }
    class Eletrodomestico extends Produto{
        public function __construct($preco, $qtEstoque){
        #   Se torna uma constante por motivos de segurança.
            $this->percentPromo = 20; 
            $this->preco = $preco;
            $this->qtEstoque = $qtEstoque;
        }
    }
    
    $pc = new Eletrodomestico(100.00, 5);
    $pc->serVendido(1);
    $pc->entrarEmPromocao();
    $pc->ajusteTributario(200.00);
    $pc->serVendido(10);
    
    
    

?>