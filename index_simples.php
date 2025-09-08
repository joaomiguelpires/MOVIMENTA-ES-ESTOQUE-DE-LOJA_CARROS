<?php
session_start();

// Função para carregar dados do arquivo JSON
function carregarDados($arquivo) {
    if (file_exists($arquivo)) {
        $conteudo = file_get_contents($arquivo);
        return json_decode($conteudo, true) ?: [];
    }
    return [];
}

// Função para salvar dados no arquivo JSON
function salvarDados($arquivo, $dados) {
    return file_put_contents($arquivo, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}

// Carregar dados existentes ou usar dados padrão
$carros = carregarDados('dados/carros.json');
if (empty($carros)) {
    $carros = [
        ['id' => 1, 'modelo' => 'Civic', 'marca' => 'Honda', 'categoria' => 'Sedan', 'ano' => 2020, 'preco' => 85000, 'cor' => 'Prata', 'disponivel' => true],
        ['id' => 2, 'modelo' => 'Corolla', 'marca' => 'Toyota', 'categoria' => 'Sedan', 'ano' => 2019, 'preco' => 78000, 'cor' => 'Branco', 'disponivel' => true],
        ['id' => 3, 'modelo' => 'Golf', 'marca' => 'Volkswagen', 'categoria' => 'Hatchback', 'ano' => 2021, 'preco' => 95000, 'cor' => 'Preto', 'disponivel' => false],
        ['id' => 4, 'modelo' => 'Focus', 'marca' => 'Ford', 'categoria' => 'Hatchback', 'ano' => 2018, 'preco' => 65000, 'cor' => 'Azul', 'disponivel' => true],
        ['id' => 5, 'modelo' => 'Cruze', 'marca' => 'Chevrolet', 'categoria' => 'Sedan', 'ano' => 2020, 'preco' => 72000, 'cor' => 'Vermelho', 'disponivel' => true]
    ];
    // Criar diretório se não existir
    if (!is_dir('dados')) {
        mkdir('dados', 0777, true);
    }
    salvarDados('dados/carros.json', $carros);
}

// Processar formulários
if ($_POST) {
    $page = $_GET['page'] ?? 'home';
    $action = $_GET['action'] ?? 'list';
    
    if ($page == 'carros' && $action == 'create') {
        // Adicionar novo carro
        $novoCarro = [
            'id' => count($carros) > 0 ? max(array_column($carros, 'id')) + 1 : 1,
            'modelo' => $_POST['modelo'],
            'marca' => $_POST['marca_id'],
            'categoria' => $_POST['categoria_id'],
            'ano' => (int)$_POST['ano'],
            'preco' => (float)$_POST['preco'],
            'cor' => $_POST['cor'],
            'quilometragem' => (int)($_POST['quilometragem'] ?? 0),
            'descricao' => $_POST['descricao'] ?? '',
            'disponivel' => isset($_POST['disponivel'])
        ];
        $carros[] = $novoCarro;
        salvarDados('dados/carros.json', $carros);
        $_SESSION['success'] = 'Carro adicionado com sucesso!';
        header('Location: ?page=carros');
        exit;
    }
    
    if ($page == 'carros' && $action == 'update') {
        // Atualizar carro existente
        $carro_id = (int)($_GET['id'] ?? 0);
        $carros = array_map(function($carro) use ($carro_id) {
            if ($carro['id'] == $carro_id) {
                return [
                    'id' => $carro_id,
                    'modelo' => $_POST['modelo'],
                    'marca' => $_POST['marca_id'],
                    'categoria' => $_POST['categoria_id'],
                    'ano' => (int)$_POST['ano'],
                    'preco' => (float)$_POST['preco'],
                    'cor' => $_POST['cor'],
                    'quilometragem' => (int)($_POST['quilometragem'] ?? 0),
                    'descricao' => $_POST['descricao'] ?? '',
                    'disponivel' => isset($_POST['disponivel'])
                ];
            }
            return $carro;
        }, $carros);
        salvarDados('dados/carros.json', $carros);
        $_SESSION['success'] = 'Carro atualizado com sucesso!';
        header('Location: ?page=carros&action=view&id=' . $carro_id);
        exit;
    }
    
    if ($page == 'marcas' && $action == 'create') {
        // Adicionar nova marca
        $novaMarca = [
            'id' => count($marcas) > 0 ? max(array_column($marcas, 'id')) + 1 : 1,
            'nome' => $_POST['nome'],
            'pais_origem' => $_POST['pais_origem']
        ];
        $marcas[] = $novaMarca;
        salvarDados('dados/marcas.json', $marcas);
        $_SESSION['success'] = 'Marca adicionada com sucesso!';
        header('Location: ?page=marcas');
        exit;
    }
    
    if ($page == 'marcas' && $action == 'update') {
        // Atualizar marca existente
        $marca_id = (int)($_GET['id'] ?? 0);
        $marcas = array_map(function($marca) use ($marca_id) {
            if ($marca['id'] == $marca_id) {
                return [
                    'id' => $marca_id,
                    'nome' => $_POST['nome'],
                    'pais_origem' => $_POST['pais_origem']
                ];
            }
            return $marca;
        }, $marcas);
        salvarDados('dados/marcas.json', $marcas);
        $_SESSION['success'] = 'Marca atualizada com sucesso!';
        header('Location: ?page=marcas&action=view&id=' . $marca_id);
        exit;
    }
    
    if ($page == 'categorias' && $action == 'create') {
        // Adicionar nova categoria
        $novaCategoria = [
            'id' => count($categorias) > 0 ? max(array_column($categorias, 'id')) + 1 : 1,
            'nome' => $_POST['nome']
        ];
        $categorias[] = $novaCategoria;
        salvarDados('dados/categorias.json', $categorias);
        $_SESSION['success'] = 'Categoria adicionada com sucesso!';
        header('Location: ?page=categorias');
        exit;
    }
    
    if ($page == 'clientes' && $action == 'create') {
        // Adicionar novo cliente
        $novoCliente = [
            'id' => count($clientes) > 0 ? max(array_column($clientes, 'id')) + 1 : 1,
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'telefone' => $_POST['telefone'],
            'endereco' => $_POST['endereco']
        ];
        $clientes[] = $novoCliente;
        salvarDados('dados/clientes.json', $clientes);
        $_SESSION['success'] = 'Cliente adicionado com sucesso!';
        header('Location: ?page=clientes');
        exit;
    }
    
    if ($page == 'vendas' && $action == 'create') {
        // Adicionar nova venda
        $carroId = (int)$_POST['carro_id'];
        $carro = array_filter($carros, fn($c) => $c['id'] == $carroId)[0] ?? null;
        
        if ($carro) {
            $clienteId = (int)$_POST['cliente_id'];
            $cliente = array_filter($clientes, fn($c) => $c['id'] == $clienteId)[0] ?? null;
            
            if ($cliente) {
                $novaVenda = [
                    'id' => count($vendas) > 0 ? max(array_column($vendas, 'id')) + 1 : 1,
                    'carro' => $carro['modelo'],
                    'cliente' => $cliente['nome'],
                    'data' => $_POST['data_venda'],
                    'valor' => (float)$_POST['valor'],
                    'pagamento' => $_POST['forma_pagamento']
                ];
                $vendas[] = $novaVenda;
                salvarDados('dados/vendas.json', $vendas);
                
                // Marcar carro como vendido
                $carros = array_map(function($c) use ($carroId) {
                    if ($c['id'] == $carroId) {
                        $c['disponivel'] = false;
                    }
                    return $c;
                }, $carros);
                salvarDados('dados/carros.json', $carros);
                
                $_SESSION['success'] = 'Venda registrada com sucesso!';
                header('Location: ?page=vendas');
                exit;
            }
        }
    }
}

// Processar exclusões
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $page = $_GET['page'] ?? 'home';
    $id = (int)($_GET['id'] ?? 0);
    
    if ($page == 'carros' && $id > 0) {
        $carros = array_filter($carros, fn($c) => $c['id'] != $id);
        salvarDados('dados/carros.json', $carros);
        $_SESSION['success'] = 'Carro excluído com sucesso!';
        header('Location: ?page=carros');
        exit;
    }
    
    if ($page == 'marcas' && $id > 0) {
        $marcas = array_filter($marcas, fn($m) => $m['id'] != $id);
        salvarDados('dados/marcas.json', $marcas);
        $_SESSION['success'] = 'Marca excluída com sucesso!';
        header('Location: ?page=marcas');
        exit;
    }
    
    if ($page == 'categorias' && $id > 0) {
        $categorias = array_filter($categorias, fn($c) => $c['id'] != $id);
        salvarDados('dados/categorias.json', $categorias);
        $_SESSION['success'] = 'Categoria excluída com sucesso!';
        header('Location: ?page=categorias');
        exit;
    }
    
    if ($page == 'clientes' && $id > 0) {
        $clientes = array_filter($clientes, fn($c) => $c['id'] != $id);
        salvarDados('dados/clientes.json', $clientes);
        $_SESSION['success'] = 'Cliente excluído com sucesso!';
        header('Location: ?page=clientes');
        exit;
    }
    
    if ($page == 'vendas' && $id > 0) {
        $vendas = array_filter($vendas, fn($v) => $v['id'] != $id);
        salvarDados('dados/vendas.json', $vendas);
        $_SESSION['success'] = 'Venda cancelada com sucesso!';
        header('Location: ?page=vendas');
        exit;
    }
}

// Carregar dados de todas as entidades
$marcas = carregarDados('dados/marcas.json');
if (empty($marcas)) {
    $marcas = [
        ['id' => 1, 'nome' => 'Toyota', 'pais_origem' => 'Japão'],
        ['id' => 2, 'nome' => 'Honda', 'pais_origem' => 'Japão'],
        ['id' => 3, 'nome' => 'Ford', 'pais_origem' => 'Estados Unidos'],
        ['id' => 4, 'nome' => 'Chevrolet', 'pais_origem' => 'Estados Unidos'],
        ['id' => 5, 'nome' => 'Volkswagen', 'pais_origem' => 'Alemanha']
    ];
    salvarDados('dados/marcas.json', $marcas);
}

$categorias = carregarDados('dados/categorias.json');
if (empty($categorias)) {
    $categorias = [
        ['id' => 1, 'nome' => 'Sedan'],
        ['id' => 2, 'nome' => 'Hatchback'],
        ['id' => 3, 'nome' => 'SUV'],
        ['id' => 4, 'nome' => 'Pickup']
    ];
    salvarDados('dados/categorias.json', $categorias);
}

$clientes = carregarDados('dados/clientes.json');
if (empty($clientes)) {
    $clientes = [
        ['id' => 1, 'nome' => 'João Silva', 'email' => 'joao@email.com', 'telefone' => '(11) 99999-9999'],
        ['id' => 2, 'nome' => 'Maria Santos', 'email' => 'maria@email.com', 'telefone' => '(11) 88888-8888'],
        ['id' => 3, 'nome' => 'Pedro Oliveira', 'email' => 'pedro@email.com', 'telefone' => '(11) 77777-7777']
    ];
    salvarDados('dados/clientes.json', $clientes);
}

$vendas = carregarDados('dados/vendas.json');
if (empty($vendas)) {
    $vendas = [
        ['id' => 1, 'carro' => 'Golf', 'cliente' => 'João Silva', 'data' => '2024-01-15', 'valor' => 95000, 'pagamento' => 'À vista'],
        ['id' => 2, 'carro' => 'Civic', 'cliente' => 'Maria Santos', 'data' => '2024-01-20', 'valor' => 85000, 'pagamento' => 'Financiamento']
    ];
    salvarDados('dados/vendas.json', $vendas);
}

// Funções auxiliares
function getCarrosDisponiveis($carros) {
    return array_filter($carros, function($carro) {
        return $carro['disponivel'];
    });
}

function getTotalVendas($vendas) {
    return array_sum(array_column($vendas, 'valor'));
}

$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? 'list';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Carros - Sistema de Gerenciamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --info-color: #17a2b8;
            --dark-color: #2c3e50;
            --light-color: #f8f9fa;
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-success: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            --gradient-warning: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
            --gradient-danger: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
            --gradient-info: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
            --shadow-sm: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            --shadow-md: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            --shadow-lg: 0 1rem 3rem rgba(0, 0, 0, 0.175);
            --border-radius: 0.75rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.75rem;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            font-weight: 500;
            color: var(--dark-color) !important;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
            transform: translateY(-1px);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: var(--gradient-primary);
            transition: var(--transition);
            transform: translateX(-50%);
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
        }

        .card:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-8px) scale(1.02);
        }

        .card-header {
            background: var(--gradient-primary);
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            border: none;
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 700;
            margin: 0;
        }

        .btn {
            border-radius: var(--border-radius);
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            transition: var(--transition);
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .btn-primary {
            background: var(--gradient-primary);
            color: white;
        }

        .btn-success {
            background: var(--gradient-success);
            color: white;
        }

        .btn-warning {
            background: var(--gradient-warning);
            color: white;
        }

        .btn-danger {
            background: var(--gradient-danger);
            color: white;
        }

        .btn-info {
            background: var(--gradient-info);
            color: white;
        }

        .hero-section { 
            background: var(--gradient-primary);
            color: white;
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="0,100 1000,0 1000,100"/></svg>');
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .stats-card { 
            background: var(--gradient-primary);
            color: white;
            border-radius: var(--border-radius);
            padding: 2rem;
            position: relative;
            overflow: hidden;
            transition: var(--transition);
        }

        .stats-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }

        .stats-card:hover::before {
            transform: scale(1.5);
        }

        .stats-card:hover { 
            transform: translateY(-8px) scale(1.05);
            box-shadow: var(--shadow-lg);
        }

        .stats-icon { 
            width: 60px; 
            height: 60px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.5rem;
            position: absolute;
            top: 1rem;
            right: 1rem;
            opacity: 0.3;
        }

        .action-card { 
            transition: var(--transition);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .action-card:hover { 
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .action-icon { 
            width: 50px; 
            height: 50px; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.2rem;
            background: var(--gradient-primary);
            color: white;
            border-radius: 50%;
        }

        .car-card { 
            transition: var(--transition);
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .car-card:hover { 
            transform: translateY(-8px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .bg-gradient { 
            background: var(--gradient-primary);
        }

        .form-control, .form-select {
            border-radius: var(--border-radius);
            border: 2px solid #e9ecef;
            transition: var(--transition);
            padding: 0.75rem 1rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .badge {
            border-radius: 50px;
            padding: 0.5rem 1rem;
            font-weight: 600;
        }

        .alert {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-sm);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .slide-in {
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .container-fluid {
            padding: 2rem;
        }

        .main-content {
            min-height: calc(100vh - 200px);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="?page=home">
                <i class="fas fa-car me-2"></i>Loja de Carros
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'carros') ? 'active' : '' ?>" href="?page=carros">
                            <i class="fas fa-car me-1"></i>Carros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'marcas') ? 'active' : '' ?>" href="?page=marcas">
                            <i class="fas fa-tags me-1"></i>Marcas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'categorias') ? 'active' : '' ?>" href="?page=categorias">
                            <i class="fas fa-list me-1"></i>Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'clientes') ? 'active' : '' ?>" href="?page=clientes">
                            <i class="fas fa-users me-1"></i>Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= ($page == 'vendas') ? 'active' : '' ?>" href="?page=vendas">
                            <i class="fas fa-shopping-cart me-1"></i>Vendas
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <a href="?page=carros&action=create" class="btn btn-light btn-sm me-2">
                        <i class="fas fa-plus me-1"></i>Novo Carro
                    </a>
                    <a href="?page=vendas&action=create" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-shopping-cart me-1"></i>Nova Venda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4 fade-in">
        <div class="container">
            <?php if(isset($_SESSION['success'])): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-check-circle me-2"></i>
                    <?= $_SESSION['success'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <?= $_SESSION['error'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php
            // Incluir página baseada na rota
            switch($page) {
                case 'carros':
                    if ($action === 'view') {
                        include 'pages_simples/carros_view.php';
                    } elseif ($action === 'edit') {
                        include 'pages_simples/carros_edit.php';
                    } elseif ($action === 'create') {
                        include 'pages_simples/carros_create.php';
                    } else {
                        include 'pages_simples/carros.php';
                    }
                    break;
                case 'marcas':
                    if ($action === 'view') {
                        include 'pages_simples/marcas_view.php';
                    } elseif ($action === 'edit') {
                        include 'pages_simples/marcas_edit.php';
                    } elseif ($action === 'create') {
                        include 'pages_simples/marcas_create.php';
                    } else {
                        include 'pages_simples/marcas.php';
                    }
                    break;
                case 'categorias':
                    include 'pages_simples/categorias.php';
                    break;
                case 'clientes':
                    include 'pages_simples/clientes.php';
                    break;
                case 'vendas':
                    include 'pages_simples/vendas.php';
                    break;
                default:
                    include 'pages_simples/home.php';
                    break;
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="fw-bold mb-2">
                        <i class="fas fa-car me-2"></i>Loja de Carros
                    </h6>
                    <p class="text-muted small mb-0">Sistema completo para gerenciamento automotivo</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="text-muted small mb-0">
                        <i class="fas fa-code me-1"></i>
                        Desenvolvido com PHP & Bootstrap
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
