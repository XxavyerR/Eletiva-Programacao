<?php

    $dominio = "mysql:host=localhost;dbname=Projeto2026"; //qual sistema vou conectar
    $usuario = "root"; //onde esta o banco de dados
    $senha = "";

    try {
        $pdo = new PDO($dominio, $usuario,$senha);
    } catch (Exception $e){
        die("Erro ao conectar ao banco: ". $e->getMessage());
    }

