# 🚗 Loja de Carros - Sistema de Gerenciamento

Sistema completo para gerenciamento de veículos, clientes e vendas desenvolvido em PHP.

## ✨ Funcionalidades

- **Dashboard interativo** com estatísticas em tempo real
- **Gestão de carros** com busca e filtros avançados
- **Cadastro de marcas** e categorias
- **Gestão de clientes**
- **Sistema de vendas**
- **Interface moderna** e responsiva
- **Design profissional** com Bootstrap 5

## 🚀 Como Executar

### Pré-requisitos
- XAMPP instalado e rodando
- PHP 8.0+
- MySQL/MariaDB

### Passo a Passo

1. **Inicie o XAMPP**
   - Abra o XAMPP Control Panel
   - Inicie o Apache e MySQL

2. **Configure o Banco de Dados**
   - Acesse http://localhost/phpmyadmin
   - Importe o arquivo `database.sql` para criar o banco e as tabelas

3. **Acesse o Sistema**
   - Abra seu navegador
   - Acesse: http://localhost/Loja_carro

## 📁 Estrutura do Projeto

```
Loja_carro/
├── index.php              # Arquivo principal
├── database.sql           # Script do banco de dados
├── includes/
│   ├── header.php         # Cabeçalho das páginas
│   └── footer.php         # Rodapé das páginas
├── pages/
│   ├── home.php          # Dashboard principal
│   ├── carros.php        # Gestão de carros
│   ├── marcas.php        # Gestão de marcas
│   ├── categorias.php    # Gestão de categorias
│   ├── clientes.php      # Gestão de clientes
│   └── vendas.php        # Gestão de vendas
└── README.md             # Este arquivo
```

## 🎯 Funcionalidades Principais

### Dashboard
- Estatísticas em tempo real
- Ações rápidas
- Carros recentes
- Interface moderna

### Gestão de Carros
- Cadastro completo de veículos
- Busca por modelo, marca, cor
- Filtros por marca, categoria e status
- Validação de dados
- Interface responsiva

### Sistema de Vendas
- Registro de vendas
- Controle de disponibilidade
- Relatórios básicos

## 🛠️ Tecnologias Utilizadas

- **PHP 8.2+** - Backend
- **MySQL** - Banco de dados
- **Bootstrap 5.3** - Framework CSS
- **Font Awesome 6** - Ícones
- **JavaScript** - Interatividade

## 📱 Responsividade

O sistema é totalmente responsivo e funciona perfeitamente em:
- Desktop
- Tablet
- Smartphone

## 🎨 Design

- Interface moderna e limpa
- Cores profissionais
- Animações suaves
- Cards com efeitos hover
- Gradientes e sombras

## 🔧 Configuração do Banco

O arquivo `database.sql` inclui:
- Criação do banco `loja_carros`
- Criação de todas as tabelas
- Dados iniciais (marcas, categorias, clientes, carros)
- Relacionamentos entre tabelas

## 📊 Dados Iniciais

O sistema já vem com dados de exemplo:
- 10 marcas (Toyota, Honda, Ford, etc.)
- 8 categorias (Sedan, SUV, Hatchback, etc.)
- 3 clientes de exemplo
- 5 carros de exemplo

## 🚀 Próximos Passos

Para usar o sistema:
1. Acesse o dashboard
2. Cadastre marcas e categorias se necessário
3. Adicione carros ao estoque
4. Cadastre clientes
5. Registre vendas

## 📞 Suporte

Se tiver problemas:
1. Verifique se o XAMPP está rodando
2. Confirme se o banco foi importado corretamente
3. Verifique as permissões dos arquivos

---

**Desenvolvido com ❤️ para gerenciamento automotivo**
