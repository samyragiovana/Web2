<?php
namespace Crud\Visao;
final class VisaoLoja
{
    function mostrarLista($lista) {
        $titulo = 'Loja';
        $subtitulo = 'Listagem';
        $dadosPraTabela = '';
        foreach ($lista as $linha) {
            $dadosPraTabela .= '<tr>';
            
            $dadosPraTabela .= '<td>' . $linha['id'] . '</td>';
            $dadosPraTabela .= '<td>' . $linha['produto'] . '</td>'; 
            $dadosPraTabela .= '<td>' . $linha['fornecedor'] . '</td>'; 
            $dadosPraTabela .= '<td>' . $linha['cor'] . '</td>'; 
            $dadosPraTabela .= '<td>' . $linha['tamanho'] . '</td>'; 
            $dadosPraTabela .= '<td>' . $linha['marca'] . '</td>'; 
            
            $dadosPraTabela .= '<td>';
            $dadosPraTabela .= '<form action="/loja/exclui" method="post">';
            $dadosPraTabela .= '<input type="hidden" name="input_id" value="' . $linha['id'] . '">'; 
            $dadosPraTabela .= '<button>Excluir</button>';
            $dadosPraTabela .= '</form>';
            $dadosPraTabela .= '</td>';
    
            $dadosPraTabela .= '<td>';
            $dadosPraTabela .= '<form action="/loja/digitarEdicao" method="post">';
            $dadosPraTabela .= '<input type="hidden" name="input_id" value="' . $linha['id'] . '">'; 
            $dadosPraTabela .= '<button>Editar</button>';
            $dadosPraTabela .= '</form>';
            $dadosPraTabela .= '</td>';
    
            $dadosPraTabela .= '</tr>';
        }
        $fragmento = file_get_contents(__DIR__ . '/templates/fragmentos/tabela.html');
        $conteudo = str_replace('{{tbody}}', $dadosPraTabela, $fragmento);
        require_once __DIR__ . '/templates/main.php';
    }
    

    function mostrarFormCadastro()  {
        $titulo = 'Produtos';
        $subtitulo = 'Cadastro';
        $form = file_get_contents(__DIR__ . '/templates/fragmentos/form.html');
        $form = str_replace(
            ['{{act}}', '{{id}}', '{{produto}}', '{{fornecedor}}', '{{cor}}', '{{tamanho}}', '{{marca}}'],
            ['/loja/novo'],
            $form
        );
        $conteudo = $form;
        require_once __DIR__ . '/templates/main.php';
    } 
    function mostrarFormEdicao($dados)  {
        $titulo = 'Produtos';
        $subtitulo = 'Edição';
        $form = file_get_contents(__DIR__ . '/templates/fragmentos/form.html');
        $form = str_replace(
            ['{{act}}', '{{id}}', '{{produto}}', '{{fornecedor}}', '{{cor}}', '{{tamanho}}', '{{marca}}'],
            ['/loja/altera',
            $dados['id'],
            $dados['produto'],
            $dados['fornecedor'],
            $dados['cor'],
            $dados['tamanho'],
            $dados['marca'],
        ],
            $form
        );
        $conteudo = $form;
        require_once __DIR__ . '/templates/main.php';
    }

    function mostrarMensagem($tit, $sub, $msg) {
        $titulo = $tit;
        $subtitulo = $sub;
        $conteudo = $msg;
        require_once __DIR__ . '/templates/main.php';
    }
}
