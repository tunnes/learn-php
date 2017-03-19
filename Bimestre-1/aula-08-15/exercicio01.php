<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <head>
    <body>
        <?php
            /*  Exercicio 01
                Faça uma classe chamada Pneu que possua um atributo de durabilidade
                (um inteiro). A classe carro possui uma marca e quatro Pneus como atributo.
                Um carro pode acelerar se todos os Pneus tiverem um valor de durabilidade 
                acima de 0. Cada vez que um carro acelera os quatro Pneus perdem 10 pontos 
                de durabilidade. Faça quatro métodos de troca de Pneu, um para cada posição. 
                Os construtores das classes também devem ser implementados assim como os testes.
            */
            /*
                
            */
            class Pneu{
                public $durabilidade;
                
                public function __construct($durabilidade){
                    $this->durabilidade = $durabilidade;
                }
                
                public function gastarPneu(){
                    $this->durabilidade = $this->durabilidade - 10;
                }
                public function mostrarDurabilidade(){
                    return $this->durabilidade;
                }
                public function boasCondicoes(){
                    return $this->durabilidade > 0 ? true : false;
                }
                public function trocarPneu($durabilidade){
                    $this->durabilidade = $durabilidade;
                }
            }
            
            class Carro{
                public $pneu01, $pneu02, $pneu03, $pneu04;
                public $marca;
                // TypeRint
                public function __construct($marca, Pneu $pneu01, Pneu $pneu02, Pneu $pneu03, Pneu $pneu04){
                    $this->marca = $marca;
                    $this->pneu01 = $pneu01;
                    $this->pneu02 = $pneu02;
                    $this->pneu03 = $pneu03;
                    $this->pneu04 = $pneu04;
                }
                
                public function acelerar(){
                    if($this->pneu01->boasCondicoes() && $this->pneu02->boasCondicoes() && 
                       $this->pneu03->boasCondicoes() && $this->pneu04->boasCondicoes()){
                        $this->pneu01->gastarPneu();
                        $this->pneu02->gastarPneu();
                        $this->pneu03->gastarPneu();
                        $this->pneu04->gastarPneu();
                        echo "Todos os pneus foram em 10 pontos!";
                    }else{
                       print("Vai com calma mano, é necessário trocar os pneus!"); 
                    }
                  
                } 
            }
            $p1 = new Pneu(10);
            $p2 = new Pneu(10);
            $p3 = new Pneu(10);
            $p4 = new Pneu(10);
            
            $uno= new Carro("Fiat", $p1, $p2, $p3, $p4);
            $uno->acelerar();
        ?>
    </body>
</html>
