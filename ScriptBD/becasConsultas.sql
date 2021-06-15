

-- Consulta dado un departamento lista las areas
SELECT d.idDepartamento,d.nombre,a.idArea,a.nombre
FROM departamento d INNER JOIN area a
ON d.idDepartamento = a.idDepartamento
AND d.idDepartamento = 2; --2, 3, 4, 5, 6,7,8,10


-- Consulta, dada dos fecha mostrar quienes registraron sus entradas y salidas
SELECT * 
FROM registroEntradaSalida
WHERE fecha BETWEEN '2021-02-22' AND '2021-02-24';

-- Consulta para obtener la gestion actual
SELECT *
FROM gestion 
WHERE activo = 1;

-- Consulta para verificar que estudiantes estan en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;
-- consulta de estudiantes que no trabajan en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion != 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;
-- Consulta para verificar si un estudiante esta trabajando en la gestion actual
SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
AND e.idEstudiante = 1
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;

 
-- Consulta para verificar que personal de diferentes departamentos estan en la gestion actual
-- pueden estar personal activos e inactivos
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- Consulta para verificar si un personal trabaja en la gestion actual 
-- Personal Activo en la gestion actual
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 3 -- Personal Activo en la gestion actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- Personal Inactivo que esta en la gestion Actual
SELECT d.nombre Departamento, p.idPersonal,p.activo,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 7 -- Personal Inactivo que no esta en la gestion Actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;


-- Personal Inactivo que no esta en la gestion Actual
SELECT d.nombre Departamento, p.idPersonal,
       CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) Personal,
	   r.nombre Rol
FROM gestion g 
INNER JOIN personalDepartamento pd 
ON g.idGestion = 5 -- Gestion Actual
AND g.idGestion = pd.idGestion 
INNER JOIN personal p 
ON pd.idPersonal = p.idPersonal 
AND p.idPersonal = 6 -- Personal Inactivo que no esta en la gestion Actual
INNER JOIN  rol r
ON p.idRol = r.idRol
INNER JOIN  departamento d 
ON pd.idDepartamento = d.idDepartamento;

-- consulta para  listar departamento que trabaja el personal  esta bien ;

SELECT  CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) estudiante,
g.nombre as gestion,d.nombre as departamento,a.nombre as area,pre.precio as precio,CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) personal
FROM rol r INNER JOIN personal p 
ON r.idRol = P.idRol
INNER JOIN personalDepartamento pd 
ON p.idPersonal = pd.idPersonal 
INNER JOIN departamento d 
ON d.idDepartamento = pd.idDepartamento
INNER JOIN Area a 
ON d.idDepartamento = a.idDepartamento
INNER JOIN solicitudBecaInstitucional sbi 
ON a.idArea = sbi.idArea
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN  estudiante e 
on e.idEstudiante = abi.idEstudiante
AND e.idEstudiante = 1
INNER JOIN gestion g 
ON g.idGestion = sbi.idGestion
INNER JOIN precio pre 
ON pre.idPrecio = sbi.idPrecio;

SELECT g.nombre,d.nombre Departamento, a.nombre Area,
CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante, 
e.idEstudiante,e.ci
FROM gestion g
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante = e.idEstudiante
AND e.idEstudiante=1
INNER JOIN area a 
ON sbi.idArea = a.idArea 
INNER JOIN departamento d 
ON a.idDepartamento = d.idDepartamento;



SELECT abi.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante
FROM estudiante e INNER JOIN asignacionBecaInstitucional abi 
ON e.idEstudiante = abi.idEstudiante
INNER JOIN  solicitudBecaInstitucional sbi 
ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
INNER JOIN  area a 
ON sbi.idArea = a.idArea;


SELECT res.fecha
FROM solicitudBecaInstitucional sbi INNER JOIN asignacionBecaInstitucional abi 
ON sbi.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
INNER JOIN estudiante e 
ON e.idEstudiante = abi.idEstudiante
AND e.idEstudiante=1
INNER JOIN registroEntradaSalida res 
ON abi.idAsignacionBecaInstitucional = res.idAsignacionBecaInstitucional;

--- dada dos fechas
        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;


--
SELECT * 
FROM gestion g  
INNER JOIN solicitudBecaInstitucional sbi
ON g.idGestion = sbi.idGestion
AND g.idGestion = 5;
INNER JOIN 
ON 

--- 
SELECT p.primerNombre,d.nombre
FROM personal p INNER JOIN personalDepartamento pd 
ON p.idPersonal = pd.idPersonal
INNER JOIN departamento d 
ON d.idDepartamento = pd.idDepartamento
AND pd.idPersonal =4
;
--- consulta Mes reporte por asignacionbecainstitucional
        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha BETWEEN '2021-02-01'  AND  '2021-02-26'
         AND res.idAsignacionBecaInstitucional= 1
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio ;
--  consulta reporte diario por asignacionbecainstitucional

        SELECT res.fecha,res.idAsignacionBecaInstitucional,(res.totalHora*pre.precio) as Total
        ,CONCAT_WS(' ',es.apellidoPaterno,es.apellidoMaterno,es.primerNombre,es.segundoNombre) Estudiante
         FROM registroEntradaSalida res INNER JOIN asignacionBecaInstitucional abi 
         ON res.idAsignacionBecaInstitucional = abi.idAsignacionBecaInstitucional
         AND res.fecha ='2021-02-03'  
         INNER JOIN solicitudBecaInstitucional sbi 
         ON sbi.idSolicitudBecaInstitucional = abi.idSolicitudBecaInstitucional 
         INNER JOIN estudiante es 
         ON es.idEstudiante = abi.idEstudiante
         INNER JOIN precio pre 
         ON pre.idPrecio = sbi.idPrecio
         INNER JOIN Personal per 
         ON per. 
         ;

        SELECT CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) Estudiante,
        dep.nombre,a.nombre,res.fecha,res.horaInicio,res.horaFin,(res.totalHora*pre.precio) as Total
        FROM gestion g INNER JOIN solicitudBecaInstitucional sbi
        ON g.idgestion = sbi.idgestion
        INNER JOIN asignacionBecaInstitucional abi 
        ON abi.idSolicitudBecaInstitucional = sbi.idSolicitudBecaInstitucional
        AND abi.idAsignacionBecaInstitucional= 1
        INNER JOIN  estudiante e 
        ON e.idEstudiante = abi.idEstudiante
        INNER JOIN area a 
        ON sbi.idArea = a.idArea
        INNER JOIN departamento dep 
        ON a.idDepartamento = dep.idDepartamento
        INNER JOIN registroEntradaSalida res
        ON abi.idAsignacionBecaInstitucional= res.idAsignacionBecaInstitucional
        AND res.fecha= '2021-02-03'
        INNER JOIN precio pre 
        ON pre.idPrecio = sbi.idPrecio; 