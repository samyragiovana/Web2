<?php
namespace Crud\Controle;
use \Crud\Modelo\ModeloLoja;
use \Crud\Database\DaoLoja;
use \Crud\Visao\VisaoLoja;
class ControleLoja
{
    public function lista()
    {
        $dao = new DaoLoja();
        $lista = $dao->select();
        $visao = new VisaoLoja();
        $visao->mostrarLista($lista);
    }
    function digitarNovo() {
        $visao = new VisaoLoja();
        $visao->mostrarFormCadastro();
    }
    public function novo()
    {
        $produto = filter_input(INPUT_POST, "input_produto", FILTER_SANITIZE_STRING);
        $fornecedor = filter_input(INPUT_POST, "input_fornecedor", FILTER_SANITIZE_STRING);
        $cor = filter_input(INPUT_POST, "input_cor", FILTER_SANITIZE_STRING);
        $tamanho = filter_input(INPUT_POST, "input_tamanho", FILTER_SANITIZE_STRING);
        $marca = filter_input(INPUT_POST, "input_marca", FILTER_SANITIZE_STRING);
        $v = new ModeloLoja(null,$produto, $fornecedor,$cor,$tamanho,$marca);
        $dao = new DaoLoja();
        $visao = new VisaoLoja();
        $mensagem = '';
        if ($dao->insert($v)) {
            $mensagem = 'Inclusão realizada!';
        } else {
            $mensagem = 'Erro ao realizar a inclusão!';
        }
        $visao->mostrarMensagem('Loja', 'Cadastro', $mensagem);
    }
    public function exclui()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $dao = new DaoLoja();
        $visao = new VisaoLoja();
        $mensagem = '';
        if ($dao->delete($id)) {
            $mensagem = 'Deleção realizada!';
        } else {
            $mensagem = 'Erro ao realizar a deleção!';
        }
        $visao->mostrarMensagem('Loja', 'Exclusão', $mensagem);
    }
    public function digitarEdicao()
    {
        $id = filter_input(INPUT_POST,"input_id",FILTER_SANITIZE_NUMBER_INT);
        $dao = new DaoLoja();
        $visao = new VisaoLoja();
        $dados = $dao->selectById($id);
        $visao->mostrarFormEdicao($dados);

    }
    public function altera()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $produto = filter_input(INPUT_POST, "input_produto", FILTER_SANITIZE_STRING);
        $fornecedor = filter_input(INPUT_POST, "input_fornecedor", FILTER_SANITIZE_STRING);
        $cor = filter_input(INPUT_POST, "input_cor", FILTER_SANITIZE_STRING);
        $tamanho = filter_input(INPUT_POST, "input_tamanho", FILTER_SANITIZE_STRING);
        $marca = filter_input(INPUT_POST, "input_marca", FILTER_SANITIZE_STRING);
        $v = new ModeloLoja($id,$produto, $fornecedor,$cor,$tamanho,$marca);
        $dao = new DaoLoja();
        $visao = new VisaoLoja();
        $mensagem = '';
        if ($dao->update($v)) {
            $mensagem = 'Edição realizada!';
        } else {
            $mensagem = 'Erro ao realizar a edição!';
        }
        $visao->mostrarMensagem('Loja', 'Edição', $mensagem);
    }
}