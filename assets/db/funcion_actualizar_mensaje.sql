CREATE DEFINER=`root`@`localhost` FUNCTION `actualizar_mensaje`(`llave` INT) RETURNS varchar(1024) CHARSET utf8
BEGIN
    DECLARE mensaje VARCHAR(1024);
    
    SET mensaje = modificar_mensaje(llave); -- Llamar a la función y almacenar el resultado en la variable mensaje

    UPDATE `folios` 
    SET `Mensaje` = CONCAT('¡Querido usuario, se ha generado un encargo con éxito! ', mensaje) 
    WHERE `folios`.`IdFolios` = llave;

    RETURN mensaje;
END