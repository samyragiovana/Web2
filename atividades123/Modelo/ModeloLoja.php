<?php
namespace Crud\Modelo;

use PDO;
use PDOException;

class ModeloLoja
{
    private $id;
    private $produto;
    private $fornecedor;
    private $cor;
    private $tamanho;
    private $marca;

    public function __construct($id = null, $produto, $fornecedor, $cor, $tamanho, $marca) {
        $this->id = $id;
        $this->produto = $produto;
        $this->fornecedor = $fornecedor;
        $this->cor = $cor;
        $this->tamanho = $tamanho;
        $this->marca = $marca;
    }

    public function getid() {
        return $this->id;
    }

    public function setid($id): self {
        $this->id = $id;
        return $this;
    }

    public function getproduto() {
        return $this->produto;
    }

    public function setproduto($produto): self {
        $this->produto = $produto;
        return $this;
    }

    public function getfornecedor() {
        return $this->fornecedor;
    }

    public function setfornecedor($fornecedor): self {
        $this->fornecedor = $fornecedor;
        return $this;
    }

    public function getcor() {
        return $this->cor;
    }

    public function setcor($cor): self {
        $this->cor = $cor;
        return $this;
    }

    public function gettamanho() {
        return $this->tamanho;
    }

    public function settamanho($tamanho): self {
        $this->tamanho = $tamanho;
        return $this;
    }

    public function getmarca() {
        return $this->marca;
    }

    public function setmarca($marca): self {
        $this->marca = $marca;
        return $this;
    }
}
