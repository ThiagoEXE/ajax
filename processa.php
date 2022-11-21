<?php
include("config.php");

header("Access-Control-Allow-Origin: *");
header('Content-type: application/json');

global $config;

function insere_opcoes()
{

    $connect = conexao_banco();
    if (!$connect) {
        die("Falha na conexão! (" . $connect->connect_errno . ")" . $connect->connect_error);
    } else {
        $lista = $_POST['lista'];
        $lista_emails = array();
        foreach ($lista as $opcoes) {
            array_push($lista_emails, "'" . $opcoes["email"] . "'");
        }
        $email_in = implode(',', $lista_emails);
        $status = $_POST['status'];
        $sql = "UPDATE teste_php SET status ='" . $status . "' WHERE email IN(" . $email_in. ")";
        $result['sql'] = $sql;
        if (mysqli_query($connect, $sql)) {
            echo 'Alterado com Sucesso!';
        } else {
            echo 'Sua tentativa falhou!';
        }
    }
}


$config = load_config();
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
    insere_opcoes();
}else{
     echo "erro na requisição";
}
