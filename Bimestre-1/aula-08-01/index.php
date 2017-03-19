<!DOCTYPE>
<html>
    <head>
    </head>
    <body>
        <?php
        /*  Conteúdo
            -> Programação Orientada a Objetos
               - Conceitos Básicos.
               - Contrutores.
               - Encapsulamento.
               - Herança.
               - Abstração.
               - Sobrescrita.
            -> Servidores
               - Métodos.
               - Request / Response.
               - Header.
            -> Conexão com Banco de Dados.
            -> WebService.
            -> Arquitetura MVC (Model View Controller). 
            
            Conceitos Básicos OOP =======================================================================
            
            "Classe" 
            É um espaçõ onde defini-se comportamentos e caracteristicas dos objetos. Computacionalmente
            é representado por um programa sem o método "main".
            
            "Objeto"
            É uma instancia de classe. Possui caracteristicas e comportamentos definidos na classe é 
            representado computacionalmente por um espaço na memoria criado de acordo com as especificações 
            da definidas em sua classe.
            
            "Atributos"
            São as caracteristicas dos objetos definidos na classe.
            
            "Métodos"
            São ações dos objetos definidos na classe, computacionalmente representeado por uma função.
            
            "Estado"
            São os valores assumidos pelos atributos. Existem estados imutaveis e estados mutaveis.
            
            "$this"
            Significa que o objeto chamador é atribuido em uma classe, em um exemplo mais práico o $this assume o 
            objeto no momento que em que o método é executado.
        */
        //  Exemplo:
            class Cachorro{
                public $raca, $nome;
                public function latir(){
                    echo $this -> nome.": Au Au!";
                }
                public function mostrarRaca(){
                    echo $this -> raca;
                }
            }
            $dog = new Cachorro();
            $dog -> nome = "Eros";
            $dog -> raca = "Vira-lata Belga";
            $dog -> latir();
        
        //  Exercicio 01
        //  Queremos modelar um revolver sendo que, todo revolver possui uma quantidade de 
        //  munição e uma quantidade maxima. Todo revolver pode atirar se houver balas e 
        //  pode recaregar uma bala se houver um disparo.
        
        //  Métodos: exibir, atirar e recaregar.
        
            class Revolver{
                public $carregador = 0;
                public function exibir(){
                    echo "Carregador: ".$this -> carregador;
                }
                public function atirar(){
                    $this -> carregador > 0 ?  $this -> carregador-- :  print("Carregador Vazio!");
                }
                public function recarregar(){
                    $this -> carregador < 6 ? $this -> carregador = 6 : print("Carregador Cheio!");
                }
                
            //  Obs: O print() foi necessário pois o echo precisa 
            //       ficar no inicio na expressão.. 
            }
            $desertEagle = new Revolver();
            $desertEagle -> recarregar();
            $desertEagle -> atirar();
            $desertEagle -> exibir();
        ?>
    </body>
</html>