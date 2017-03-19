<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        #   Não fazer uso de acomplamento alto.
        #   Relação de 01 classe com N objetos de outra classe.
        #   No exemplo 01 Treinador tem N Pokebolas e 01 Pokebola tem 01 Pokemon.
        
        class Pokemon{
            public $nome;
            public $tipo;
            public $numero;
            
            public function __construct($nome, $tipo, $numero){
                $this->nome = $nome;
                $this->tipo = $tipo;
                $this->numero = $numero;
            }
            public function status(){
                echo "Pokemon: ".    $this->nome 
                    ."<br>Numero: ". $this->tipo 
                    ."<br>Tipo: ".   $this->numero 
                    ."<hr>";
            }
        }
        
        class Pokebola{
            public $pokemon;
            
            public function guardarPokemon(Pokemon $pokemon){
                $this->pokemon = $pokemon;
            }
        }
        
        class Treinador{
            public $nome;
            public $pokeBag;
            
            public function __construct($nome){
                $this->nome = $nome;
                $this->pokeBag = array();
            }
            public function capturar($novoPokemon){
                foreach ($this->pokeBag as $pokebola){
                    if($pokebola->pokemon == null){
                        $pokebola->guardarPokemon($novoPokemon);
                        break;
                    }
                    
                }
                
            }
            public function listarPokemons(){
                foreach($this->pokeBag as $pokebola){
                    if($pokebola->pokemon != null){
                        $pokebola->pokemon->status();    
                    }
                }
            }
            public function ganharPokebola(){
                $this->pokeBag[] = new Pokebola();
            }
            public function mostrarPokebolasVazias(){
                foreach ($this->pokeBag as $pokebola){
                    if($pokebola == null){
                        print("Pokebola vazia <br>");    
                    }else{
                        print("Pokebola ocupada <br>");    
                    }
                }
            }
        }
        
        #   Testar aplicação: 01 Treinador, 03 Pokebolas, 02 Pokemons capturados;
        
        $umCarinha  = new Treinador("João");
        $umCarinha->ganharPokebola();
        $umCarinha->ganharPokebola();
        $umCarinha->ganharPokebola();
        
        $umCarinha->ganharPokebola();

        $treecko   = new Pokemon("Treecko", 001, "Grass");
        $cyndaquil = new Pokemon("Cyndaquil", 022, "Fire");
        
        $umCarinha->capturar($treecko);
        $umCarinha->capturar($cyndaquil);

        $umCarinha->listarPokemons();
        $umCarinha->mostrarPokebolasVazias();
        
        ?>
    </body>
</html>