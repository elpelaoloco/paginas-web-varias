CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
función ()

-- declaramos lo que retorna
RETURNS tipo de dato AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
variable1;
variable2;

-- definimos nuestra función
BEGIN
    --pelicula pago
    SELECT * FROM proveedor, peliculas, peliculas_en_arriendo WHERE peliculas.pid = peliculas_en_arriendo.pid 
    AND proveedor.pro_id = peliculas_en_arriendo.pro_id AND proveedor.pro_id = 1
    --peliculas no pago
    SELECT * FROM proveedor, peliculas, 
    peliculas_no_arriendo WHERE peliculas.pid = peliculas_no_arriendo.pid AND proveedor.pro_id = peliculas_no_arriendo.pro_id 
    AND proveedor.pro_id = 1;
    --serie
    SELECT * FROM proveedor, series, 
    proveedores_serie WHERE series.sid = proveedores_serie.sid AND proveedor.pro_id = proveedores_serie.pro_id 
    AND proveedor.pro_id = 1;
    --game
    SELECT * FROM proveedores, (SELECT * FROM proveedores_precios GROUP BY proveedores_precios.id, proveedores_precios.id_videojuego, 
    proveedores_precios.precio, proveedores_precios.precio_preorden) as pp, 
    videojuegos WHERE proveedores.id = pp.id AND pp.id_videojuego = videojuegos.id_videojuego AND proveedores.id = 1 AND pp.precio_preorden is NOT NULL;


    -- control de flujo
    IF condicion THEN
        pasa algo

    ELSE
        pasa otra cosa

    END IF;

    FOR condicion LOOP
        hacer cosas
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql