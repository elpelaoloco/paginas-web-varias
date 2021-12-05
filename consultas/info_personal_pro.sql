SELECT DISTINCT * FROM usuarios, proveedor, subscripciones, subs_por_pro, pagos_subs WHERE 
pagos_subs.uid = usuarios.id AND subscripciones.id = subs_por_pro.subs_id
AND subs_por_pro.pro_id = proveedor.pro_id AND usuarios.id = 1 AND pagos_subs.subs_id = subscripciones.id 
AND estado = 'activa' ORDER BY fecha;

