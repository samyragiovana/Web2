<?php
namespace Crud\Database;
use \Crud\Modelo\ModeloLoja;
use PDO;
class DaoLoja
{
    public function select()
    {
        $sql = "select * from Loja;";
        $pst = Conexao::getPrepareStatement($sql);
        if (!$pst) {
            exit("Erro ao preparar");
        }
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function selectById($id)
    {
        $sql = "select * from Loja where id = ?;";
        $pst = Conexao::getPrepareStatement($sql);
        if (!$pst) {
            exit("Erro ao preparar");
        }
        $pst->bindValue(1, $id);
        $pst->execute();
        $result = $pst->fetchAll(PDO::FETCH_ASSOC)[0];
        return $result;
    }

    public function insert(ModeloLoja $v)
    {
        $sql = "insert into Loja (produto, fornecedor, cor, tamanho, marca) values (?,?,?,?,?);";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $v->getproduto(), PDO::PARAM_STR);
        $pst->bindValue(2, $v->getfornecedor(), PDO::PARAM_STR);
        $pst->bindValue(3, $v->getcor(), PDO::PARAM_STR);
        $pst->bindValue(4, $v->gettamanho(), PDO::PARAM_STR);
        $pst->bindValue(5, $v->getmarca(), PDO::PARAM_STR);
        if ($pst->execute()) {
            // echo $pst->errorInfo();
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $sql = "delete from Loja where id = ?;";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $id, PDO::PARAM_INT);
        if ($pst->execute()) {
            return true;
        }
        return false;
    }

    public function update(ModeloLoja $v)
    {
        $sql = "update Loja set produto = ?, fornecedor = ?,cor = ?,tamanho = ?,marca = ? where id = ?;";
        $pst = Conexao::getConnection()->prepare($sql);
        $pst->bindValue(1, $v->getproduto(), PDO::PARAM_STR);
        $pst->bindValue(2, $v->getfornecedor(), PDO::PARAM_STR);
        $pst->bindValue(3, $v->getcor(), PDO::PARAM_STR);
        $pst->bindValue(4, $v->gettamanho(), PDO::PARAM_STR);
        $pst->bindValue(5, $v->gettamanho(), PDO::PARAM_STR);
        $pst->bindValue(6, $v->getid(), PDO::PARAM_STR);
        if ($pst->execute()) {
            return true;
        }
        return false;
    }
}
