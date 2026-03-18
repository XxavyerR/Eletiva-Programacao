<?php
    $mapa1 = array("Joao","Maria",3);
    print_r($mapa1); //aqui mostra todos os itens da váriavel array
    echo "<p><p>";
    var_dump($mapa1); //além da posição ele mostra o tipo primário e quantidade de caracteres
    echo "<p> valor da posição 2".$mapa1[2]. "<p>";

    $mapa2[1] = "Vanessa";
    $mapa2[2] = "Guilherme";
    $mapa[3] = "Clara"; //cria o array ditando os valores e posições
    print_r($mapa2); //aqui mostra todos os itens da váriavel array
    echo "<p><p>";
    var_dump($mapa2); //além da posição ele mostra o tipo primário e quantidade de caracteres
    echo "<p> valor da posição 2: ".$mapa2[2]. "<p>";

    $contatos["Vanessa"] = "123456"; //atribui valores aos valores de um array
    $contatos["José"] = "098765";
    echo "<p></p>";
    print_r($contatos);

    foreach($contatos as $valor){
        echo "<p> Telefone: $valor</p>"; //ele pega o valor associado
    }
    foreach($contatos as $chave => $valor){
        //nesta solução ele não pega somente o valor, mas também a chave com uma associação
        echo "<p> Telefone de $chave: $valor <p>";
    }
    //unset apaga a posição
    unset($mapa1[2]);
    print_r($mapa1);

    //funções
    $qtde = count($mapa2); //mostra quantidade de elementos
    echo "<p> qtde de elementos mapa 2: $quantidade</p>";
    //ordenação de elementos
    asort($contatos); //ordenar pelo valor 
    ksort($contatos); //ordenar pela chave
?>