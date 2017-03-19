<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php 
        // Ex02 - Crie uma classe pessoa que possua os atributos nome e idade, toda pessoa 
            // faz aniversario (Mostra a nova idade)e toda pessoa podemudar de nome (mostre  na tela a mensagem 
            // nome antigo xxxx mudado para yyyy). crie uma forma para testar a classe pessoa 
            // usando as url com query string do metodo GET
        
            class Pessoa{
                public $nome, $idade;
                
                public function __construct($nome, $idade){
                    $this->nome = $nome;
                    $this->idade = $idade;
                }
                public function __call($m, $args){
                    echo "Método ou parâmetro invalido..";
                }
                public function fazAniversario(){
                    echo "Parabens pelos ".($this->idade + 1)." anos de idade!";
                }
                public function mudarNome($novoNome){
                    
                    echo "Nome antigo: ".$this->nome."<br> Nome novo: ".$this->nome = $novoNome;
                }
            }
            $teste = new Pessoa($_GET["nome"],$_GET["idade"]);
            $teste->$_GET["method"]($_GET["novoNome"]);
        ?>
    </body>
</html>