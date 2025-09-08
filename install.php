<?php
// Script de instalação do banco de dados
$host = 'localhost';
$username = 'root';
$password = '';

try {
    // Conectar sem especificar banco
    $pdo = new PDO("mysql:host=$host;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h2>🚀 Instalando Sistema Loja de Carros</h2>";
    
    // Criar banco de dados
    $pdo->exec("CREATE DATABASE IF NOT EXISTS loja_carros");
    $pdo->exec("USE loja_carros");
    echo "✅ Banco de dados 'loja_carros' criado com sucesso!<br>";
    
    // Criar tabela marcas
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS marcas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            pais_origem VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Tabela 'marcas' criada com sucesso!<br>";
    
    // Criar tabela categorias
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS categorias (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Tabela 'categorias' criada com sucesso!<br>";
    
    // Criar tabela clientes
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS clientes (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE NOT NULL,
            telefone VARCHAR(20) NOT NULL,
            endereco TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
    ");
    echo "✅ Tabela 'clientes' criada com sucesso!<br>";
    
    // Criar tabela carros
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS carros (
            id INT AUTO_INCREMENT PRIMARY KEY,
            modelo VARCHAR(255) NOT NULL,
            marca_id INT NOT NULL,
            categoria_id INT NOT NULL,
            ano INT NOT NULL,
            preco DECIMAL(10,2) NOT NULL,
            cor VARCHAR(100) NOT NULL,
            quilometragem INT NOT NULL,
            descricao TEXT,
            disponivel BOOLEAN DEFAULT TRUE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (marca_id) REFERENCES marcas(id) ON DELETE CASCADE,
            FOREIGN KEY (categoria_id) REFERENCES categorias(id) ON DELETE CASCADE
        )
    ");
    echo "✅ Tabela 'carros' criada com sucesso!<br>";
    
    // Criar tabela vendas
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS vendas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            carro_id INT NOT NULL,
            cliente_id INT NOT NULL,
            data_venda DATE NOT NULL,
            valor DECIMAL(10,2) NOT NULL,
            forma_pagamento VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (carro_id) REFERENCES carros(id) ON DELETE CASCADE,
            FOREIGN KEY (cliente_id) REFERENCES clientes(id) ON DELETE CASCADE
        )
    ");
    echo "✅ Tabela 'vendas' criada com sucesso!<br>";
    
    // Inserir dados iniciais - Marcas
    $marcas = [
        ['Toyota', 'Japão'],
        ['Honda', 'Japão'],
        ['Ford', 'Estados Unidos'],
        ['Chevrolet', 'Estados Unidos'],
        ['Volkswagen', 'Alemanha'],
        ['BMW', 'Alemanha'],
        ['Mercedes-Benz', 'Alemanha'],
        ['Fiat', 'Itália'],
        ['Renault', 'França'],
        ['Hyundai', 'Coreia do Sul']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO marcas (nome, pais_origem) VALUES (?, ?)");
    foreach ($marcas as $marca) {
        $stmt->execute($marca);
    }
    echo "✅ Dados iniciais de marcas inseridos!<br>";
    
    // Inserir dados iniciais - Categorias
    $categorias = ['Sedan', 'Hatchback', 'SUV', 'Pickup', 'Coupé', 'Convertible', 'Wagon', 'Minivan'];
    $stmt = $pdo->prepare("INSERT INTO categorias (nome) VALUES (?)");
    foreach ($categorias as $categoria) {
        $stmt->execute([$categoria]);
    }
    echo "✅ Dados iniciais de categorias inseridos!<br>";
    
    // Inserir dados iniciais - Clientes
    $clientes = [
        ['João Silva', 'joao@email.com', '(11) 99999-9999', 'Rua das Flores, 123 - São Paulo/SP'],
        ['Maria Santos', 'maria@email.com', '(11) 88888-8888', 'Av. Paulista, 456 - São Paulo/SP'],
        ['Pedro Oliveira', 'pedro@email.com', '(11) 77777-7777', 'Rua Augusta, 789 - São Paulo/SP']
    ];
    
    $stmt = $pdo->prepare("INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)");
    foreach ($clientes as $cliente) {
        $stmt->execute($cliente);
    }
    echo "✅ Dados iniciais de clientes inseridos!<br>";
    
    // Inserir dados iniciais - Carros
    $carros = [
        ['Civic', 2, 1, 2020, 85000.00, 'Prata', 45000, 'Carro em excelente estado, único dono', 1],
        ['Corolla', 1, 1, 2019, 78000.00, 'Branco', 52000, 'Bem conservado, revisões em dia', 1],
        ['Golf', 5, 2, 2021, 95000.00, 'Preto', 30000, 'Semi-novo, com garantia', 1],
        ['Focus', 3, 2, 2018, 65000.00, 'Azul', 68000, 'Carro confiável, histórico completo', 1],
        ['Cruze', 4, 1, 2020, 72000.00, 'Vermelho', 41000, 'Bem equipado, ar condicionado', 1]
    ];
    
    $stmt = $pdo->prepare("INSERT INTO carros (modelo, marca_id, categoria_id, ano, preco, cor, quilometragem, descricao, disponivel) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($carros as $carro) {
        $stmt->execute($carro);
    }
    echo "✅ Dados iniciais de carros inseridos!<br>";
    
    echo "<br><h3>🎉 Instalação concluída com sucesso!</h3>";
    echo "<p><a href='index.php' class='btn btn-primary'>Acessar Sistema</a></p>";
    
} catch(PDOException $e) {
    echo "<h3>❌ Erro na instalação:</h3>";
    echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
    echo "<p>Verifique se o MySQL está rodando no XAMPP.</p>";
}
?>

<style>
body { font-family: Arial, sans-serif; padding: 20px; background-color: #f8f9fa; }
h2 { color: #333; }
h3 { color: #28a745; }
.btn { padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px; }
.btn:hover { background-color: #0056b3; }
</style>
