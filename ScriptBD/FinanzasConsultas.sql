SELECT es.primerNombre
FROM facultad f  INNER JOIN carrera c 
ON f.idFacultad = c.idFacultad
INNER JOIN contrato con 
ON c.idCarrera = con.idCarrera
INNER JOIN saldo s 
ON s.idContrato =  con.idContrato
INNER JOIN estudiante es 
ON es.idEstudiante= con.idEstudiante
AND es.codigoEstudiante='10';


SELECT f.nombre,ca.nombre,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial,c.idContrato
FROM estudiante e INNER JOIN contrato c 
ON c.idEstudiante = e.idEstudiante
AND c.idContrato = 1
INNER JOIN saldo s 
ON s.idContrato=c.idContrato
INNER JOIN carrera ca 
ON ca.idCarrera=c.idCarrera
INNER JOIN facultad f 
ON f.idFacultad=ca.idFacultad;

         SELECT f.nombre as facultad,ca.nombre as carrera ,c.montoTotal,c.saldo,s.fecha,s.tipoPago,s.montoParcial
            FROM estudiante e INNER JOIN contrato c 
            ON c.idEstudiante = e.idEstudiante
            INNER JOIN saldo s 
            ON s.idContrato=c.idContrato
            AND c.idContrato=1
            INNER JOIN carrera ca 
            ON ca.idCarrera=c.idCarrera
            INNER JOIN facultad f 
            ON f.idFacultad=ca.idFacultad;


          