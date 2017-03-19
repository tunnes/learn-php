<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
    </head>
    <body>
        <?php
            #   Herança
            
            #   Relação hierárquica entre classes uma classe A acima de uma classe B é chamada de superclasse, 
            #   enquanto B é chamada de subclasse. Todos os membros (Menos os modificadores de acesso) de A são 
            #   visiveis e acessiveis em B.
            
            #   Obs¹: Modificadores de acesso 'poublic', 'private' e 'protecded'
            #   Obs²: A classe B só tera acesso caso os modificadores de acesso sejam publicos.
            
            #   Para indicar uma herança utiliza-se o 'extends'
            #       ->  Ao contrario do Java, no PHP não é obrigatorio fazer o construtor, porem deve-se 
            #           fazer mesmo assim exemplo:
            #           public function __construct($variavel){
            #               Parent::__construct($a);
            #           }
            
            #   Diamante mortal da morte: 
            #   http://www.devmedia.com.br/heranca-conceitos-e-o-problema-diamante-parte-i/2697
            
            class Pokemon{
                public $força, $hp, $tipo;
                public function __construct($forca, $hp){
                    $this->forca = $forca;
                    $this->hp = $hp;
                }
                public function mostrarStatus(){
                    echo "<p> Força: $this->forca </p>";
                    echo "<p> HP: $this->hp </p>";
                    echo "<p> TIPO: $this->tipo </p>";
                }
                public function estaVivo(){
                    return $this->hp > 0;
                }
                public function tomarDano($dano){
                    $this->hp = $this->hp - $dano;
                }
                public function comprarItem(Potion $potion){
                    $this->item = $potion;
                }
                public function usarItem(){
                    if($this->item == null){
                        return "Sem itens";
                    }else{
                        $this->item->uso($this);
                    }
                }
                
            }
            class Squirtle extends Pokemon{
                public function __construct($forca, $hp){
                    $this->tipo = $tipo;
                    parent::__construct($hp,$forca);
                }
                public function jatoDagua(Pokemon $p){
                    if(!$p->estaVivo()){
                        return "Pokemon esta faint";
                    }
                    if($p->tipo === 'Fogo'){
                        $p->tomarDano(2*$this->forca);
                    }else{
                        $p->tomarDano(0.5*$this->forca);
                    }
                }
            }
            class Charmander extends Pokemon{
                public function __construct($forca, $hp){
                    parent::__construct($forca, $hp);
                    $this->tipo = "Fogo";
                }  
                public function chama(Pokemon $inimigo){
                    if(!$inimigo->estaVivo()){
                        return "Pokemon esta faint";
                    }
                    if($inimigo->tipo === "Grama"){
                        $inimigo->tomarDano($this->forca*2);
                    }else{
                        $inimigo->tomarDano($this->forca*0.5);
                    }
                    
                } 
            }
            class Bubasalro extends Pokemon{
                public function __construct($forca, $hp){
                    parent::__construct($forca, $hp);
                    $this->tipo = "Grama";
                }  
                public function folhas(Pokemon $inimigo){
                    if(!$inimigo->estaVivo()){
                        return "Pokemon esta faint";
                    }
                    if($inimigo->tipo === "Agua"){
                        $inimigo->tomarDano($this->forca*2);
                    }else{
                        $inimigo->tomarDano($this->forca*0.5);
                    }
                    
                } 
            }
            class Potion{
                public function __construct(){
                    $this->tipo = "hp";
                }
                public function uso(Pokemon $pokemon){
                    $pokemon->tomarDano(-10);
                }
            }
            #   Teste01 ---------------------------------
                $pokemon01 = new Squirtle(10,100);
                $pokemon02 = new Bubasalro(10,100);
                $pokemon03 = new Charmander(10,100);
                
                $pokemon01->jatoDagua($pokemon02);
                $pokemon02->mostrarStatus();
            #   -----------------------------------------
        ?> 
    </body>
</html>