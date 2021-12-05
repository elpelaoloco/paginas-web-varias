CREATE OR REPLACE FUNCTION

-- declaramos la función y sus argumentos
top3 (pro_id)

-- declaramos lo que retorna
RETURNS string AS $$

-- declaramos las variables a utilizar si es que es necesario
DECLARE

pro_id INT;
-- definimos nuestra función
BEGIN
    -- PELICULAS
    SELECT * FROM (SELECT peliculas.pid, COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_en_arriendo, 
    proveedor WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_en_arriendo.pid = peliculas.pid 
    AND peliculas_en_arriendo.pro_id = proveedor.pro_id AND proveedor.pro_id=1 GROUP BY peliculas.pid UNION SELECT peliculas.pid, 
    COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_no_arriendo, proveedor 
    WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_no_arriendo.pid = peliculas.pid 
    AND peliculas_no_arriendo.pro_id = proveedor.pro_id AND proveedor.pro_id=1 GROUP BY peliculas.pid) as p ORDER BY -cuenta LIMIT 3;
    -- SERIE
    SELECT * FROM (SELECT peliculas.pid, COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_en_arriendo, 
    proveedor WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_en_arriendo.pid = peliculas.pid 
    AND peliculas_en_arriendo.pro_id = proveedor.pro_id AND proveedor.pro_id=1 GROUP BY peliculas.pid UNION SELECT peliculas.pid, 
    COUNT(peliculas.pid) as cuenta FROM visualizaciones_pelicula, peliculas, peliculas_no_arriendo, proveedor 
    WHERE visualizaciones_pelicula.pid = peliculas.pid AND peliculas_no_arriendo.pid = peliculas.pid 
    AND peliculas_no_arriendo.pro_id = proveedor.pro_id AND proveedor.pro_id=1 GROUP BY peliculas.pid) as p ORDER BY -cuenta LIMIT 3;

    SELECT * FROM (SELECT series.sid, series.nombre, COUNT(series.sid) as cuenta FROM (SELECT capitulo_serie.sid, 
    visualizaciones_capitulo.uid FROM visualizaciones_capitulo, capitulo, capitulo_serie WHERE 
    visualizaciones_capitulo.cid=capitulo.cid AND capitulo.cid=capitulo_serie.cid GROUP BY capitulo_serie.sid, 
    visualizaciones_capitulo.uid) as c, series, proveedores_serie, proveedor WHERE c.sid=series.sid AND 
    series.sid = proveedores_serie.sid 
    AND proveedores_serie.pro_id = proveedor.pro_id AND proveedor.pro_id = 1 GROUP BY series.sid) as s ORDER BY -cuenta LIMIT 3;



    FOR asd LOOP
        
    END LOOP;



-- -- finalizamos la definición de la función y declaramos el lenguaje
END
$$ language plpgsql