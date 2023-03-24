DELIMITER //
CREATE TRIGGER `tr_updStockCompra` AFTER INSERT ON `purchase_details`
    FOR EACH ROW BEGIN
    UPDATE products SET stock = stock + NEW.quantity
    WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;


DELIMITER //

CREATE TRIGGER `tr_updStockCompraAnular` AFTER UPDATE ON `purchases`
FOR EACH ROW 
BEGIN
    UPDATE products p
    JOIN purchase_details di
        ON di.product_id = p.id
        AND di.purchase_id = new.id
    SET p.stock = 
        IF(new.status = 'VALID', p.stock + di.quantity, 
            IF(new.status = 'CANCELED', p.stock - di.quantity, p.stock));
END;

//

DELIMITER ;



DELIMITER //
CREATE TRIGGER `tr_updStockVenta` AFTER INSERT ON `sale_details`
    FOR EACH ROW BEGIN
    UPDATE products SET stock = stock - NEW.quantity
    WHERE products.id = NEW.product_id;
END;
//
DELIMITER ;


DELIMITER //

CREATE TRIGGER `tr_updStockVentaAnular` AFTER UPDATE ON `sales`
FOR EACH ROW 
BEGIN
    UPDATE products p
    JOIN sale_details di
        ON di.product_id = p.id
        AND di.sale_id = new.id
    SET p.stock = 
        IF(new.status = 'VALID', p.stock - di.quantity, 
            IF(new.status = 'CANCELED', p.stock + di.quantity, p.stock));
END;

//

DELIMITER ;
