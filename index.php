<?php
session_start();

// Configuração do banco de dados
$host = 'localhost';
$dbname = 'loja_carros';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Se não conseguir conectar, redirecionar para instalação
    if ($e->getCode() == 1049) { // Database doesn't exist
        header('Location: install.php');
        exit;
    }
    die("Erro na conexão: " . $e->getMessage());
}

// Função para executar queries
function query($sql, $params = []) {
    global $pdo;
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

// Função para buscar dados
function fetchAll($sql, $params = []) {
    return query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar um registro
function fetchOne($sql, $params = []) {
    return query($sql, $params)->fetch(PDO::FETCH_ASSOC);
}

// Roteamento simples
$page = $_GET['page'] ?? 'home';

// Incluir header
include 'includes/header.php';

// Incluir página baseada na rota
switch($page) {
    case 'carros':
        include 'pages/carros.php';
        break;
    case 'marcas':
        include 'pages/marcas.php';
        break;
    case 'categorias':
        include 'pages/categorias.php';
        break;
    case 'clientes':
        include 'pages/clientes.php';
        break;
    case 'vendas':
        include 'pages/vendas.php';
        break;
    default:
        include 'pages/home.php';
        break;
}

// Incluir footer
include 'includes/footer.php';
?>
