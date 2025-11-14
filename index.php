<?php
ini_set("display_errors", 1);
header('Content-Type: text/html; charset=UTF-8');

// Exibe versão do PHP
echo 'Versão atual do PHP: ' . phpversion() . '<br><br>';

// Credenciais lidas via variáveis de ambiente (mais seguro)
$servername = getenv('DB_HOST');
$username  = getenv('DB_USER');
$password  = getenv('DB_PASS');
$database  = getenv('DB_NAME');

// Criar conexão
$link = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($link->connect_error) {
    die("Erro de conexão: " . $link->connect_error);
}

// Valores de teste
$valor_rand1 = rand(1, 999);
$valor_rand2 = strtoupper(substr(bin2hex(random_bytes(4)), 1));
$host_name = gethostname();

// Query preparada (melhor prática simples)
$stmt = $link->prepare("INSERT INTO dados (Nome, Sobrenome, Endereco, Cidade, Host) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $valor_rand2, $valor_rand2, $valo_
