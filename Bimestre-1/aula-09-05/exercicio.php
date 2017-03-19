<!DOCTYPE html>
<html>
    <body>
        <?php
        #   Faca uma classe Quadrilatero que contenha um atributo lado1. 
        #   Sabe-se que Quadrados e Retangulos sao Quadrilateros.
        #   É possível calcular área e perímetro de ambos Quadriláteros.
        
        #   -> AreaQuadrado = lado1*lado1
        #   -> PerimQuadrado = 4*lado1
        #   -> AreaRet = lado1*lado2
        #   -> PerimRet = 2*(lado1+lado2)
        
        #   Sobrescrita
        #   Conceito de sobreescrita. qual vir por ultimo prevalece.
        #   ou seja você sobreescreve o metodo pai no filho usando o mesmo nome de método.
        
        #   Getter / Setter Evil
        #   http://www.yegor256.com/2014/09/16/getters-and-setters-are-evil.html
        //  Padrões DTO
        
        class Quadrilatero{
            protected $lado1;
            protected function __construct($lado1){
                $this->lado1 = $lado1; 
            }
        }
        
        class Quadrado extends Quadrilatero{
            public function __construct($lado1){
                parent::__construct($lado1);
            }
            public function areaQuadrado(){
                return $this->lado1 * 2;
            }
            public function perimQuadrado(){
                return $this->lado1*4;
            }
        }
        class Retangulo extends Quadrilatero{
            private $lado2;
             public function __construct($lado1, $lado02){
                 $this->lado2 = $lado2;
                 parent::__construct($lado1);
             }
             public function areaRet(){
                 return $this->lado1 + $this->lado02;
             }
             public function perimRet(){
                 return 1 + ($this->lado1 + $this->lado02);
             }
         }
        
        
            $quadrado = new Quadrado(10);
                echo "<h4>Area do quadrado: ".$quadrado->areaQuadrado()."</h4>";
                echo "<h4>Perimetro do quadrado: ".$quadrado->perimQuadrado()."</h4>";
            
            $retangulo = new Retangulo(10,5);
                echo "<h4>Area do retangulo: ".$retangulo->areaRet()."</h4>";
                echo "<h4>Perimetro do retangulo: ".$retangulo->perimRet()."</h4>";

      ?>  
    </body>    
</html>
