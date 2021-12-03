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
    SELECT tabla oficial.nombre as nombre serie pelicula, clasificacion, puntuacion, ano, tabla oficial.pro id as id proveedor, 
    proveedor.nombre as nombre proveedor, costo as costo suscripcion
    FROM (
    SELECT nombre, clasificacion, puntuacion, ano, pro id
    FROM series, proveedores serie
    WHERE UPPER(series.nombre) LIKE UPPER(’titulo %’)
    AND proveedores serie.sid = series.sid
    UNION
    SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro id
    FROM peliculas, peliculas no arriendo
    WHERE UPPER(peliculas.titulo) LIKE UPPER(’titulo %’)
    AND peliculas no arriendo.pid = peliculas.pid
    UNION
    SELECT peliculas.titulo as nombre, clasificacion, puntuacion, ano, pro id
    FROM peliculas, peliculas en arriendo
    WHERE UPPER(peliculas.titulo) LIKE UPPER(’titulo %’)
    AND peliculas en arriendo.pid = peliculas.pid
    ) as tabla oficial, proveedor
    WHERE tabla oficial.pro id = proveedor.pro id;

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