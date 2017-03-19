<!DOCTYPE html>
<html>
    <body>
        <?php
            #   Modificadores de acesso.
            #       Public:     Acesso a todas as classes.
            #       Private:    Acesso apenas a propria classe.
            #       Protected:  Acesso apenas as sub-classes.
        
            #   Niveis de Acesso:
            #       Escrita: Atribuição 
            #           $objeto->atributo = 5; 
            #       Leitura Argumento, uso em expressoes:
            #           echo $objeto->atributo;
            #           $variavel = $objeto->atributo + 1;
            
            #   Métodos:
            #       Get -> É um método para liberar o acesso de leitura de um atributo.
            #       Set -> É um método para liberar o acesso de escrita de um atributo.
            
            #   Exemplo:
            
            class Trainer{
                public function algumAlgoritmo(Pokemon $p){
                    $p->setAtk(50);
                    $p->setTipo("Grama");
                    $p->setHp(100);
                }
            }
            
            class Pokemon{
                private $hp, $atk, $nome;
                public function __construct($hp, $atk, $nome, $tipo){
                    $this->atk = $atk;
                    $this->hp = $hp;
                    $this->nome = $nome;
                    $this->tipo = $tipo;
                }
                
                public function levelUp(){
                    $this->hp += 20;
                    $this->atk += 5;
                }
                
                public function setAtk($novoAtk){
                    $this->atk = $novoAtk;
                }
                
                public function setHp($novoHp){
                    $this->hp = $novoHp;
                }
                
                public function setTipo($novoTipo){
                    $this->tipo = $novoTipo;
                }
                
                public function mostrar(){
                    echo "<p> $this->nome </p>";
                    echo "<p> $this->tipo </p>";
                    echo "<p> $this->hp </p>";
                    echo "<p> $this->atk </p>";
                }
                
            }
            
            $pkmnCertinho = new Pokemon(200,50,"Pikachu","Eletrico");
            $pkmnCertinho->levelUp();
            $pkmnCertinho->mostrar();
            $pkmn = new Pokemon(200,50,"Pikachu","Eletrico");
            $pkmn->setHp(-90);
            $pkmn->setAtk(7000000);
            $pkmn->setTipo("Ghost");
            $pkmn->mostrar();
            $t = new Trainer();
            $t->algumAlgoritmo($pkmn);
            $pkmn->mostrar();
        ?>
    </body>
</html>