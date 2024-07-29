<?php
class ControleVeiculo
{
    public function lista()
    {
        $dao = new DaoVeiculo();
        $lista = $dao->select();
        $visao = new VisaoVeiculo();
        $visao->mostrarLista($lista);
    }
    function digitarNovo() {
        $visao = new VisaoVeiculo();
        $visao->mostrarFormCadastro();
    }
    public function novo()
    {
        $fabricante = filter_input(INPUT_POST, "input_fabricante", FILTER_SANITIZE_STRING);
        $modelo = filter_input(INPUT_POST, "input_modelo", FILTER_SANITIZE_STRING);
        $v = new ModeloVeiculo($fabricante, $modelo);
        $dao = new DaoVeiculo();
        $visao = new VisaoVeiculo();
        $mensagem = '';
        if ($dao->insert($v)) {
            $mensagem = 'Inclusão realizada!';
        } else {
            $mensagem = 'Erro ao realizar a inclusão!';
        }
        $visao->mostrarMensagem('Veiculos', 'Cadastro', $mensagem);
    }
    public function exclui()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $dao = new DaoVeiculo();
        $visao = new VisaoVeiculo();
        $mensagem = '';
        if ($dao->delete($id)) {
            $mensagem = 'Deleção realizada!';
        } else {
            $mensagem = 'Erro ao realizar a deleção!';
        }
        $visao->mostrarMensagem('Veiculos', 'Exclusão', $mensagem);
    }
    public function digitarEdicao()
    {
        $id = filter_input(INPUT_POST,"input_id",FILTER_SANITIZE_NUMBER_INT);
        $dao = new DaoVeiculo();
        $visao = new VisaoVeiculo();
        $dados = $dao->selectById($id);
        $visao->mostrarFormEdicao($dados);

    }
    public function altera()
    {
        $id = filter_input(INPUT_POST, "input_id", FILTER_SANITIZE_NUMBER_INT);
        $fabricante = filter_input(INPUT_POST, "input_fabricante", FILTER_SANITIZE_STRING);
        $modelo = filter_input(INPUT_POST, "input_modelo", FILTER_SANITIZE_STRING);
        $v = new ModeloVeiculo($fabricante, $modelo, $id);
        $dao = new DaoVeiculo();
        $visao = new VisaoVeiculo();
        $mensagem = '';
        if ($dao->update($v)) {
            $mensagem = 'Edição realizada!';
        } else {
            $mensagem = 'Erro ao realizar a edição!';
        }
        $visao->mostrarMensagem('Veiculos', 'Edição', $mensagem);
    }
}