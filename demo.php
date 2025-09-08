<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Carros - Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .hero-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .stats-card { transition: transform 0.3s ease; }
        .stats-card:hover { transform: translateY(-5px); }
        .stats-icon { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; }
        .action-card { transition: all 0.3s ease; }
        .action-card:hover { transform: translateY(-3px); box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important; }
        .action-icon { width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; }
        .car-card { transition: all 0.3s ease; }
        .car-card:hover { transform: translateY(-2px); box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .bg-gradient { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-gradient shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-car me-2"></i>Loja de Carros
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-car me-1"></i>Carros
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tags me-1"></i>Marcas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-list me-1"></i>Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users me-1"></i>Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-shopping-cart me-1"></i>Vendas
                        </a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <a href="#" class="btn btn-light btn-sm me-2">
                        <i class="fas fa-plus me-1"></i>Novo Carro
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm">
                        <i class="fas fa-shopping-cart me-1"></i>Nova Venda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            <!-- Hero Section -->
            <div class="hero-section text-white py-5 mb-5 rounded-3 shadow">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="display-4 fw-bold mb-3">🚗 Loja de Carros</h1>
                            <p class="lead mb-4">Sistema completo para gerenciamento de veículos, clientes e vendas. Controle total do seu negócio automotivo.</p>
                            <div class="d-flex gap-3">
                                <a href="#" class="btn btn-light btn-lg px-4">
                                    <i class="fas fa-plus me-2"></i>Adicionar Carro
                                </a>
                                <a href="#" class="btn btn-outline-light btn-lg px-4">
                                    <i class="fas fa-list me-2"></i>Ver Estoque
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 text-center">
                            <i class="fas fa-car-side" style="font-size: 8rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Estatísticas -->
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="stats-icon bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-car"></i>
                            </div>
                            <h3 class="fw-bold text-primary mb-1">15</h3>
                            <p class="text-muted mb-0">Carros Cadastrados</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="stats-icon bg-success text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-tags"></i>
                            </div>
                            <h3 class="fw-bold text-success mb-1">10</h3>
                            <p class="text-muted mb-0">Marcas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="stats-icon bg-warning text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-users"></i>
                            </div>
                            <h3 class="fw-bold text-warning mb-1">8</h3>
                            <p class="text-muted mb-0">Clientes</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card stats-card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="stats-icon bg-info text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h3 class="fw-bold text-info mb-1">12</h3>
                            <p class="text-muted mb-0">Vendas Realizadas</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ações Rápidas -->
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="fw-bold mb-4">⚡ Ações Rápidas</h3>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card action-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="action-icon bg-primary text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Adicionar Carro</h5>
                            <p class="text-muted small mb-3">Cadastre um novo veículo no estoque</p>
                            <a href="#" class="btn btn-primary btn-sm">Começar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card action-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="action-icon bg-success text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Novo Cliente</h5>
                            <p class="text-muted small mb-3">Cadastre um novo cliente</p>
                            <a href="#" class="btn btn-success btn-sm">Começar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card action-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="action-icon bg-warning text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Nova Venda</h5>
                            <p class="text-muted small mb-3">Registre uma venda</p>
                            <a href="#" class="btn btn-warning btn-sm">Começar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card action-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="action-icon bg-info text-white rounded-circle mx-auto mb-3">
                                <i class="fas fa-cog"></i>
                            </div>
                            <h5 class="fw-bold mb-2">Configurações</h5>
                            <p class="text-muted small mb-3">Gerencie marcas e categorias</p>
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-outline-info">Marcas</a>
                                <a href="#" class="btn btn-outline-info">Categorias</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carros Recentes -->
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-0 py-3">
                            <h5 class="fw-bold mb-0">🚗 Carros Recentes</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <div class="card car-card border-0 h-100">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="fw-bold mb-0">Civic</h6>
                                                <span class="badge bg-success">Disponível</span>
                                            </div>
                                            <p class="text-muted small mb-2">Honda • Sedan</p>
                                            <p class="fw-bold text-primary mb-2">R$ 85.000,00</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2020</small>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <div class="card car-card border-0 h-100">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="fw-bold mb-0">Corolla</h6>
                                                <span class="badge bg-success">Disponível</span>
                                            </div>
                                            <p class="text-muted small mb-2">Toyota • Sedan</p>
                                            <p class="fw-bold text-primary mb-2">R$ 78.000,00</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2019</small>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <div class="card car-card border-0 h-100">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="fw-bold mb-0">Golf</h6>
                                                <span class="badge bg-danger">Vendido</span>
                                            </div>
                                            <p class="text-muted small mb-2">Volkswagen • Hatchback</p>
                                            <p class="fw-bold text-primary mb-2">R$ 95.000,00</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2021</small>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <div class="card car-card border-0 h-100">
                                        <div class="card-body p-3">
                                            <div class="d-flex justify-content-between align-items-start mb-2">
                                                <h6 class="fw-bold mb-0">Focus</h6>
                                                <span class="badge bg-success">Disponível</span>
                                            </div>
                                            <p class="text-muted small mb-2">Ford • Hatchback</p>
                                            <p class="fw-bold text-primary mb-2">R$ 65.000,00</p>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">2018</small>
                                                <a href="#" class="btn btn-outline-primary btn-sm">Ver</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="btn btn-outline-primary">Ver Todos os Carros</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4 mt-5">
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
