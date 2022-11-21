<?php
global $array_config;
function conexao_banco(){
    global $config;
    $server = $config['ACESSO_MYSQL']['server'];
    $user = $config['ACESSO_MYSQL']['user'];
    $password = $config['ACESSO_MYSQL']['password'];
    $dbname = $config['ACESSO_MYSQL']['db_name'];
    $connect =  mysqli_connect($server, $user, $password, $dbname);
    return $connect;
}
function load_config() {
    if (file_exists('.env')) {
      $array_config = parse_ini_file(".env",true);
    } else {
      echo "erro de configuração";
    }
    return $array_config;
  }