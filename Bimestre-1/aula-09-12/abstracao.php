<?php
    #   ABSTRAÇÃO
    
    #   Ato de esconder detalhes de implementação de classes usuárias.
    #   O foco e mostrar apenas o que objeto sabe fazer (E não como fazer).
    #   Representa tambem uma generalização de comportamentos esse conceito é obtido.
    #   Por dois meios :
    
    #   A - Classes abstratas (Pode possuir atributos e metodos concretos)
    
    #   B - Interfaces (Constantes + Assinaturas de método)
    #       Obs¹: Não pode possuir atributos ou metodos concretos.
    #       Obs²: Garcia recomenda usar sempre Interfaces.
    #       Obs³: Pode ser super-classe de varias sub-classes (Herança multipla).
    
    #   Obs¹: Tanto as classes abstratas quanto as interfaces não podem ser instanciadas.
    #   Métodos abstratos: É um método sem corpo de código.
    
    #   ======================================================================================================
    #   No type-hint, se uma classe A (Abstrata ou Interface) for marcada como type hint, exemplo:
    
    #   class Foo{
    #         public function metodo(A $a);
    #   }
    
    #   No java isto é chamado de polimorfismo de sup-tipos..
    #   E B, C e D são sub-classe de A, então é possivel fazer o seguinte:
    #       $foo = new Foo();
    #       $foo->metodo(new B);
    #       $foo->metodo(new C);
    #       $foo->metodo(new D);
    #   Não é permitido $foo->metodo(new A); pois, A eh abstrata.
    
    #   ====================================================================================================
    
    #   DUCK TYPE
    
    #   Se algo, grasna como um pato, voa como um pato e nada como um 
    #   pato então esta coisa é o Tim Maia o pato.
    
    #   Obs¹: Para implementação basta não utilizar o type-hint
    
?>