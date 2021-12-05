CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
función (title)

-- declaramos lo que retorna
RETURNS str AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE
title STR;

-- definimos nuestra función
BEGIN
    SELECT tabla_oficial.nombre as nombre_serie_pelicula, clasificacion, puntuacion, ano, tabla oficial.pro_id as id_proveedor, 
    proveedor.nombre as nombre_proveedor, costo as costo_suscripcion
    FROM (
    SELECT nombre, clasificacion, puntuacion, ano, pro_id
    FROM series, proveedores_serie
    WHERE UPPER(series.nombre) LIKE UPPER(’titulo %’)
    AND proveedores_serie.sid = series.sid
    UNION
    SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro_id
    FROM peliculas, peliculas no arriendo
    WHERE UPPER(peliculas.titulo) LIKE UPPER(’titulo %’)
    AND peliculas no arriendo.pid = peliculas.pid
    UNION
    SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro_id
    FROM peliculas, peliculas_en_arriendo
    WHERE UPPER(peliculas.titulo) LIKE UPPER(’titulo %’)
    AND peliculas_en_arriendo.pid = peliculas.pid
    ) as tabla_oficial, proveedor
    WHERE tabla_oficial.pro_id = proveedor.pro_id;

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