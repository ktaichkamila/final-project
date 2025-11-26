CREATE DATABASE mini_store;
use mini_store;
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    price DECIMAL 
);
Create Table orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    customer_email VARCHAR(255),
    order_date DATETIME,
    CONSTRAINT FOREIGN KEY (product_id) REFERENCES products(id) 
);

INSERT INTO products(product_name,price) 
VALUES
('Tint',15.00),('Brush',5.00),('LipStick',7.00),('BB Cream',10.00);

INSERT INTO orders(product_id,customer_email,order_date) 
VALUES
(1,'alice.doe@py.com','2025-10-22'),(1,'joe.doe@py.com','2025-10-22'),
(1,'kahn@py.com','2025-10-22'),(4,'ali.kt@py.com','2025-10-23'),(3,'jean@py.com','2025-10-23'),(3,'girly@py.com','2025-10-23'),
(1,'john.doe@py.com','2025-10-24'),(2,'alice.doe@py.com','2025-10-24'),(1,'nivin@py.com','2025-10-24'),
(1,'tala.doe@py.com','2025-10-24'),(1,'jasmin.doe@py.com','2025-10-24'),(2,'joe.doe@py.com','2025-10-25'),
(1,'sana@py.com','2025-10-25'),(1,'gigi@py.com','2025-10-25'),(1,'taline.doe@py.com','2025-10-25');