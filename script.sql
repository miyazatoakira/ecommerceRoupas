CREATE DATABASE LojaRoupas CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE LojaRoupas;
-- drop database LojaRoupas;


-- Criação da tabela Cliente
CREATE TABLE Cliente (
    IDcliente INT AUTO_INCREMENT PRIMARY KEY,
    User_name VARCHAR(20) NOT NULL,
    Primeiro_nome VARCHAR(10) NOT NULL, 
    Sobrebome VARCHAR(10) NOT NULL,
    Sexo BOOLEAN,
    Telefone CHAR(11) NOT NULL UNIQUE,
    CPF CHAR(11) NOT NULL UNIQUE,
    Email VARCHAR(40) NOT NULL UNIQUE,
    Senha VARCHAR(225) NOT NULL,
    Numero_residencial INT NOT NULL,
    Obs VARCHAR(35)
);

-- Criação da tabela Endereco
CREATE TABLE Endereco (
    IDendereco INT AUTO_INCREMENT PRIMARY KEY,
    CEP CHAR(8) NOT NULL,
    Rua VARCHAR(20) NOT NULL,
    Cidade VARCHAR(20) NOT NULL,
    UF CHAR(2) NOT NULL,
    Complemento VARCHAR(15)
);

-- Tabela de relacionamento Cliente_Endereco
CREATE TABLE Cliente_Endereco (
    IDcliente INT,
    IDendereco INT,
    PRIMARY KEY (IDcliente, IDendereco),
    CONSTRAINT fk_cliente FOREIGN KEY (IDcliente) REFERENCES Cliente(IDcliente),
    CONSTRAINT fk_endereco FOREIGN KEY (IDendereco) REFERENCES Endereco(IDendereco)
);

-- Criação da tabela Produto
CREATE TABLE Produto (
    IDproduto INT AUTO_INCREMENT PRIMARY KEY,
    Cor VARCHAR(15) NOT NULL,
    Nome VARCHAR(20) NOT NULL,
    Marca VARCHAR(20) NOT NULL,
    Tecido VARCHAR(15) NOT NULL,
    CONSTRAINT Nome_Marca UNIQUE (Nome, Marca)
);

-- Criação da tabela Tamanho
CREATE TABLE Tamanho (
    IDtamanho INT AUTO_INCREMENT PRIMARY KEY,
    sigla ENUM('PP','P', 'M', 'G', 'GG', 'XGG', 'XXG') NOT NULL
);

-- Tabela de relacionamento Tamanho_Produto
CREATE TABLE Tamanho_Produto (
    IDproduto INT,
    IDtamanho INT,
    PRIMARY KEY (IDproduto, IDtamanho),
    CONSTRAINT fk_produto FOREIGN KEY (IDproduto) REFERENCES Produto(IDproduto),
    CONSTRAINT fk_tamanho FOREIGN KEY (IDtamanho) REFERENCES Tamanho(IDtamanho)
);

-- Criação da tabela Estoque
CREATE TABLE Estoque (
    IDestoque INT AUTO_INCREMENT PRIMARY KEY,
    Lote INT NOT NULL,
    Quantidade INT NOT NULL,
    Data_estoque DATE NOT NULL,
    Pcusto DECIMAL(5,2) NOT NULL,
    Pvenda DECIMAL(5,2) NOT NULL,
    IDproduto INT,
    CONSTRAINT fk_produto_estoque FOREIGN KEY (IDproduto) REFERENCES Produto(IDproduto)
);

-- Criação da tabela Venda
CREATE TABLE Venda (
    Nota_fiscal INT AUTO_INCREMENT PRIMARY KEY,
    IDcliente INT,
    Data_venda DATE NOT NULL,
    CONSTRAINT fk_venda_cliente FOREIGN KEY (IDcliente) REFERENCES Cliente(IDcliente)
);

-- Criação da tabela Venda_Item
CREATE TABLE Venda_Item (
    IDvenda_item INT AUTO_INCREMENT PRIMARY KEY,
    Quantidade INT NOT NULL,
    Valor_unidade DECIMAL(5,2) NOT NULL,
    Nota_fiscal INT,
    IDproduto INT,
    CONSTRAINT fk_venda_item_venda FOREIGN KEY (Nota_fiscal) REFERENCES Venda(Nota_fiscal),
    CONSTRAINT fk_venda_item_produto FOREIGN KEY (IDproduto) REFERENCES Produto(IDproduto),
    CONSTRAINT Nota_IDproduto UNIQUE (Nota_fiscal, IDproduto)
);