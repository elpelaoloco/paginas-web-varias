SELECT usuarios.id, SUM(peliculas.duracion) FROM usuarios, visualizaciones_pelicula, peliculas 
WHERE usuarios.id = visualizaciones_pelicula.uid 
AND usuarios.id = 1 AND visualizaciones_pelicula.pid = peliculas.pid GROUP BY usuarios.id;

SELECT usuarios.id, SUM(capitulo.duracion) FROM usuarios, visualizaciones_capitulo, capitulo 
WHERE usuarios.id = visualizaciones_capitulo.uid AND usuarios.id = 1 AND visualizaciones_capitulo.cid = capitulo.cid 
GROUP BY usuarios.id;