<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php
            // Variavel Variavel
            // interpola strings com os $'s
            class Calculadora{
                public $num1, $num2, $operation;
                public function __call($m, $args){
                    echo "O metodo $m não existe...";
                }
                public function __construct($num1, $num2, $operaion){
                    $this->num1 = $num1;
                    $this->num2 = $num2;
                    echo $this->$operaion();
                    echo "ta";
                }
                public function somar(){
                    echo "teste";
                    return $this->num1 + $this->num2;  
                }
                public function multiplicar(){
                    return $this->num1 * $this->num2;
                }
                public function dividir(){
                    return  $this->num2 != 0 ? $this->num1 / $this->num2 : "Erro";
                }
                public function subtrair(){
                    return $this->num1 - $this->num2;
                }
            }
            $teste = new Calculadora($_GET["numero01"], $_GET["numero02"], $_GET["operacao"]);
            
            // Ex02 - Crie uma classe pessoa que possua os atributos nome e idade, toda pessoa 
            // faz aniversario e toda pessoa podemudar de nome (mostre  na tela a mensagem 
            // nome antigo xxxx mudado para yyyy). crie uma forma para testar a classe pessoa 
            // usando as url com query string do metodo GET
            
        ?>
    </body>
</html>