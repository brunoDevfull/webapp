<?php

require_once __DIR__ . '/BaseModel.php';

class ImagensModel extends BaseModel {

    public function __construct()
    {
        $this-> tabela = "imagens";
        parent::__construct();
    }

    public function salvar($imagem){
        $query = "INSERT INTO $this->tabela (nome, nome_original, caminho)
            VALUES (:nome, :nome_original, :caminho)";

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':nome' => $imagem['nome'],
            ':nome_original' => $imagem['nome_original'],
            ':caminho' => $imagem['caminho']
        ]);
    }

    public function criar($imagem){
        $query = "INSERT INTO $this->tabela (nome, nome_original, caminho) 
            VALUES (:nome, :nome_original, :caminho) ";

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':nome' => $imagem['nome'],
            ':nome_original' => $imagem['nome_original'],
            ':caminho' => $imagem['caminho']
        ]);
    }

    public function buscarTodas(){
        $query = "SELECT * FROM $this->tabela";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll();

    }
}