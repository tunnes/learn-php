<html>
    <body>
        <?php
            //  Relacionamento entre classes 'HAS-A'.
            
            //  Has-A: Uma classe A tem B, quando a classe possui, alguma referencia B, em OOP temos 
            //  o nome de relação de agregação que é representado graficamente por uma seta com um 
            //  triangulo transparente na ponta. Possuimos diversos tipos de associação os mais comuns são:
            
            //      -> Agregação:   Quando a existencia de um objeto não depende excluisamente da existencia do outro.
            //                      Uma Gaveta pode conter Meias, mas a Gaveta não é feita de Meias. Ou seja, mesmo 
            //                      sem Meias a Gaveta ainda existirá.
            
            //      -> Composição:  Quanto a existencia de um objeto depende a existencia do outro objeto.
            //                      Um Computador é formado por seus componentes, como por exemplo placa-mãe, gabinete, hd, 
            //                      memória, placa de vídeo, etc. Sem todas essas peças não existe nosso Computador de acordo 
            //                      com a representação do diagrama. Logo, no nosso diagrama o Computador é um conceito, pois 
            //                      concretamente ele é composto por um conjunto diferentes componentes.
            
            //  Obs¹:   Ambos as definições são conceituais e relativas a modelagem UML, pois implementando os dois metodos são 
            //          exatamente iguais.
                
            
            class Endereco{
                public $logradouro, $cidade, $bairro;
                
                public function __construct($logradouro, $cidade, $bairro){
                    $this->logradouro = $logradouro;
                    $this->cidade = $cidade;
                    $this->bairro = $cidade;
                }
                
                public function mostrarDados(){
                    echo "<p> Logradouro: $this->logradouro </p>";
                    echo "<p> Cidade: $this->cidade </p>";
                    echo "<p> Bairro: $this->bairro </p>";
                }
            }
            class Aluno{
                public $nome, $endereco;
                
                //  Com injeção de dependencia Problemas com tipo e injeção de classes, 
                //  para evitar isso é necessario usar o "type hint" apenas usado em parametros,
                //  apartir do php 7 temos os tipos primitivos.
                public function __construct($nome, Endereco $endereco){
                    $this->nome = $nome;
                    $this->endereco = $endereco;
                }
                
                /* Sem injeção de dependencias Problemas mudanças na classe.
                public function __construct($nome, $logradouro, $bairro, $cidade){
                    $this->nome = $nome;
                    $this->endereco = new Endereco($logradouro, $bairro, $cidade);
                }*/
                public function mostrarDados(){
                    echo "<p> Nome: $this->nome </p>";
                    $this->endereco->mostrarDados();
                }
            }
            // Injeção de dependencia via contrutor..
            $ruaZero = new Endereco("Rua dos Bobos nº0","Seila","TbmNaoLembro");
            
            $galileu = new Aluno("Galileu", $ruaZero);
            $galileu->mostrarDados();
            
            //$galileu = new Aluno("Galileu","Rua dos Bobos nº0","Seila","TbmNaoLembro");
            //$galileu->mostrarDados();
        ?>
    </body>
</html>