create database cadastro_usuarios;
use cadastro_usuarios;
select * from usuarios;

create table Usuarios(
usuario_id int unsigned auto_increment primary key ,
nome_usuario varchar(25) not null,
CPF char(11) not null unique,
genero ENUM('Masculino','Feminino','Não Binário','Prefiro não dizer')Not null, -- o enum serve para limitar as opções de escolha
logradouro  varchar(150) not null,
bairro varchar(100) not null,
Cidade varchar(100) not null,
estado char(2) not null,
cep char(8) not null,

-- peso decimal(4,2) not null  esse aqui vai para o matheus e alexander fazerem
email_usuario varchar(30) not null unique ,
senha_usuario varchar(12) not null,
data_de_nasc date
);


insert into Usuarios(nome_usuario,CPF,genero,logradouro,bairro,Cidade,estado,cep,email_usuario,senha_usuario,data_de_nasc) values('Marcos',1223343,'Masculino', 'Rua das Alamedas 12','Vale dos Lírios','São Paulo','SP','01753252','marcos@gmail.com','1234567','1985-02-09');

truncate Usuarios; -- truncate serve para apagar os registros do banco de dados sem alterar a estrutura
select * from Usuarios;
drop table usuarios;
alter table Usuarios drop peso;

CREATE TABLE categorias (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);

INSERT INTO categorias (nome) VALUES
('Medicamentos'),
('Vitaminas'),
('Higiene'),
('Infantil'),
('Beleza');

CREATE TABLE produtos (
    id_produto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10,2) NOT NULL,
    estoque INT NOT NULL,
    fabricante VARCHAR(100),
    data_validade DATE,
    precisa_receita BOOLEAN,
    categoria_id INT,
    imagem varchar(255),
    FOREIGN KEY (categoria_id) REFERENCES categorias(id_categoria)
);

INSERT INTO produtos 
(nome, descricao, preco, estoque, fabricante, data_validade, precisa_receita,categoria_id,imagem)
VALUES
('Paracetamol ', 'Analgésico e antitérmico', 12.90, 50, 'EMS', '2027-05-10', false, 1,null),
('Dipirona ', 'Analgésico e antitérmico', 8.50, 40, 'Neo Química', '2026-11-15', false, 1,null),
('Vitamina C ', 'Suplemento vitamínico', 25.00, 30, 'Cimed', '2027-03-20', false, 2,null),
('Shampoo Infantil', 'Shampoo suave para crianças', 18.90, 20, 'Johnson', '2028-01-01', false, 4,null),
('Fraldas Pampers Pants G', 'Fralda descartável', 129.99, 69, 'Pampers', '2027-12-10', false,4,'frauda.png' ),
('Dorflex', 'Analgésico e Relaxante Muscular', 12.49, 40, 'Opella', '2027-02-10', false,1,'dorflex.png' ),
('Protetor Solar PS-01 ', 'Protetor Solar FPS 60 ', 42.00, 20, 'Principia', '2028-03-20', false,5,'protetor-principia.png'),
('Cálcio Vitamina D ', 'Suplemento vitamínico', 119.30, 30, 'Sanofi-Aventis', '2027-10-30', false, 2,'calcio.png'),
('Cimegripe', 'Alívio de sintomas de gripes e resfriados 20 cápsulas', 9.69, 100, 'Cimed', '2027-12-01', false, 1,'cinegripe.png'),
('Listerine Cool Mint', 'Antisséptico bucal refrescância intensa 1 Litro', 25.50, 45, 'Johnson & Johnson', '2028-08-15', false, 3,'listerine.png'),
('Expec Xarope', 'Expectorante para tosse sabor framboesa 120ml', 26.58, 35, 'Legrand', '2027-10-10', false,1, 'expec.png'),
('Sabonete Granado Bebê', 'Sabonete líquido de glicerina suave 250ml', 29.99, 20, 'Granado', '2028-05-20', false, 4,'sabonte-liquido.png');





truncate produtos;

SELECT * FROM produtos;
