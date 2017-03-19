<!DOCTYPE html>
<html>
    <body>
        <?php
            class Pato{
                public function nadar(){
                    echo "Nadou como Pato";
                }
                public function voar(){
                    echo "Voou como Pato";
                }
                public function grasnar(){
                    echo "QUACK!!!!";
                }
            }
            
            class Humano{
                public function nadar(){
                    echo "Nadou como HUMANO";
                }
                public function voar(){
                    echo "Voou como HUMANO NO AVIAO";
                }
                public function grasnar(){
                    echo "IMITOU O PATO!!!!";
                }
            }
            
            class Floresta{
                
                public function acoes($p){
                    $p->grasnar();
                    $p->voar();
                    $p->nadar();
                }
                
            }
            
            class Foo{
                
            }
            //NAO HA NECESSIDADE DE TER HERANCA NA PASSAGEM (TYPE-HINT)
            //BASTA QUE O OBJETO PASSADO TENHA OS METODOS QUE SERAO
            //EXECUTADOS.
            $f = new Floresta();
            $f->acoes(new Humano);
            
        ?>
    </body>
</html>