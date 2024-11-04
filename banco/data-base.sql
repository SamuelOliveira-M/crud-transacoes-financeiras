CREATE DATABASE laravel;
USE financias;

CREATE TABLE Categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) UNIQUE NOT NULL
);

CREATE TABLE Transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo ENUM('receita', 'despesa') NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    data DATE DEFAULT (CURRENT_DATE),
    categoria_id INT,
    FOREIGN KEY (categoria_id) REFERENCES Categorias(id) ON DELETE SET NULL
);
