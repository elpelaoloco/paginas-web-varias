SELECT peliculas.pid, titulo, duracion, clasificacion, ano, genero_p.genero 
FROM peliculas, genero_p, subgenero 
WHERE '$tipo' = subgenero.genero
AND subgenero.nombre_subgenero = genero_p.genero 
AND genero_p.pid = peliculas.pid 
UNION 
SELECT peliculas.pid, titulo, duracion, clasificacion, ano, genero_p.genero
FROM peliculas, genero_p
WHERE genero_p.genero = '$tipo'
AND peliculas.pid = genero_p.pid

SELECT DISTINCT genero FROM genero_p;



SELECT series.sid, nombre, duracion, clasificacion, ano, genero_s.genero
FROM series, genero_s
WHERE genero_s.genero = '$tipo'
AND series.sid = genero_s.sid
UNION
SELECT series.sid, nombre, duracion, clasificacion, ano, genero_s.genero 
FROM series, genero_s, subgenero
WHERE '$tipo' = subgenero.genero
AND subgenero.nombre_subgenero = genero_s.genero 
AND genero_s.sid = series.sid;

SELECT DISTINCT genero FROM genero_s;



SELECT id_videojuego, titulo, puntuacion, clasificacio, videojuegos.genero
FROM videojuegos, genero_subgenero 
WHERE '$tipo' = genero_subgenero.genero
AND genero_subgenero.nombre_subgenero = videojuegos.genero 
UNION 
SELECT id_videojuego, titulo, puntuacion, clasificacio, videojuegos.genero 
FROM videojuegos
WHERE videojuegos.genero = '$tipo'

SELECT DISTINCT genero FROM videojuegos