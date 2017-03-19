<?php
    #   Mais uma vez a matemática esfregando sua utilidade na minha latinha.. Bom
    #   para calcular a distancia entre duas coordenadas geograficas tive que entender 
    #   e utilizar a formula de Haversine, segue abaixo explicações mais aprofundadas:
    
    function distancia($lat1, $lon1, $lat2, $lon2) {
    
    #   Primeiro é necessario converter todas as coordenadas
    #   para graus em radianos:
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $lon1 = deg2rad($lon1);
        $lon2 = deg2rad($lon2);
    
    #   Formula de Haversine tendo o raio esferico da terra 6371 
    #   ou algo proximo disso.    
        $dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
    
    #   A função 'number_format' deixa escapar 2 numeros apartir 
    #   do primeiro numero real, seperando por virgula:  
        $dist = number_format($dist, 2, '.', '');
        return $dist;
    }
    
    echo distancia(-23.97915736,-46.31190878, -23.98154798,-46.45915708) . " Km<br />";
    
    // 0.92 Km

?>
