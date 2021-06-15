--- 1. Dada una gestion y estudiante mostrar en que departamento y area trabaja asi como tambien 
 ---  los horarios en el cual trabaja.
select d.nombre as departamento ,a.nombre as area ,e.idPersona as estudiante,g.nombre as gestion,h.hora
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join area a 
on bi.idArea= a.idArea
inner join departamento d  
on a.idDepartamento= d.idDepartamento 
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora;


select d.nombre as departamento ,a.nombre as area ,e.idPersona as estudiante,g.nombre as gestion,h.hora
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
and g.idGestion = 1
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
and e.idEstudiante=1
inner join area a 
on bi.idArea= a.idArea
inner join departamento d  
on a.idDepartamento= d.idDepartamento 
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora;


-- 2. Dada una gestion, estudiante, dos fechas (inicio y final). 
-- Mostrar un reporte donde muestre en que departamento y area trabaja, quien es su encargado,
-- su total de horas trabajadas por cada fecha y el total de horas 
-- que realizo dadas esas fechas asi como el total que se le pagara por el total de horas que trabajo. 


--3. Dada una gestion y estudiante mostrar un reporte donde liste por mes, la cantidad de horas que trabajo en cada mes como asi 
--   los montos que realizo cada mes.
  select e.idPersona as estudiante,g.nombre as gestion,sum(h.hora) as hora,p.precio
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join precio p 
on p.idPrecio=bi.idPrecio
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora
group by e.idEstudiante;


-- 4. Dada una gestion, estudiante y mes: mostrar un reporte donde liste por semana las horas totales que 
-- trabajo, cantidad que realizo por semana.
  select e.primerNombre as estudiante,g.nombre as gestion,count(h.hora) as hora,p.precio
from gestion g INNER JOIN becaInstitucional bi  
on g.idGestion = bi.idGestion
inner join precio p 
on p.idPrecio=bi.idPrecio
inner join estudiante e 
on bi.idEstudiante= e.idEstudiante
inner join horarioTrabajo ht 
on bi.idBecaInstitucional=ht.idBecaInstitucional 
inner join hora h 
on ht.idHora= h.idHora;
-------------------------------------------- seleccionar area dado un departamento------------------------------
SELECT  d.nombre, a.nombre
FROM departamento d inner join area a
on a.idDepartamento=d.idDepartamento
and d.idDepartamento=4;
---------------------------------------- sacar el personal de que departamento es ----------------------------------
SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,d.nombre as departamento,a.nombre
FROM departamento d inner join personalDepartamento dp
on dp.idDepartamento = d.idDepartamento
INNER JOIN personal p
on dp.idPersonal=p.idPersonal
inner join area a
on a.idDepartamento=d.idDepartamento
and dp.idPersonal=3;
--------------------solicitudes por areas -------------------------------
SELECT  bi.idBecaInstitucional,a.nombre as area, p.precio,count(a.idArea) as cantidad
   from area a INNER JOIN becaInstitucional bi
   ON a.idArea = bi.idArea
   INNER JOIN precio p
   ON p.idPrecio=bi.idPrecio
   WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional)
   group by a.idArea;

----------------------------horario de solicitudes---------------------------------
    SELECT bi.idBecaInstitucional, ht.idHoraInicio,ht.idHorafin,ht.idDia,di.dia
    FROM personal p INNER JOIN personalDepartamento pd
    ON p.idPersonal=pd.idPersonal
    INNER JOIN departamento d
    ON d.idDepartamento=pd.idDepartamento
    INNER JOIN area a 
    ON d.idDepartamento= a.idDepartamento
    INNER JOIN becaInstitucional bi 
    ON a.idArea= bi.idArea
    INNER JOIN  horarioTrabajo ht 
    ON ht.idBecaInstitucional=bi.idBecaInstitucional
    AND ht.idBecaInstitucional=1
    INNER JOIN dia di 
    ON di.idDia = ht.idDia;
----------------------------------------------ultimo beca institucional----------------------
SELECT  bi.idBecaInstitucional,a.nombre as area, p.precio
   from area a INNER JOIN becaInstitucional bi
   ON a.idArea = bi.idArea
   INNER JOIN precio p
   ON p.idPrecio=bi.idPrecio
   WHERE bi.idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becaInstitucional);

-----------------------------------------registroentrada salida ---------------------------------------------------
SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreUsuario,d.nombre as departamento 
FROM personal p inner join personalDepartamento dp
on dp.idDepartamento = d.idDepartamento
AND p.usuario=lalarcon
INNER join  departamento d
on dp.idDepartamento = d.idDepartamento;
-------------------------------------horariotrabajo
SELECT 

----------------------------------------------registroEntradaSalida---------------------------------------
SELECT  ab.idAsignacionBecaInstitucional,a.nombre,CONCAT_WS(' ',e.primerNombre,e.segundoNombre,e.apellidoPaterno,e.apellidoMaterno) AS nombreUsuario
FROM estudiante e INNER JOIN  asignacionBecaInstitucional ab
ON e.idEstudiante = ab.idEstudiante
AND e.ci=123
INNER JOIN registroEntradaSalida re
ON ab.idAsignacionBecaInstitucional= re.idAsignacionBecaInstitucional
INNER JOIN becaInstitucional bi 
ON bi.idBecaInstitucional=ab.idBecaInstitucional
INNER JOIN area a
ON a.idArea=bi.idArea
group by ab.idAsignacionBecaInstitucional;
-------------------------------------------------------------------------------------
INSERT INTO horariotrabajo  VALUES (4,5, '07:25:15','15:25:15');
--------------------------------------------------------------------------------------------
-- Realice dada una fecha mostrar un reporte de entradas y salida con su cantidad de horas trabajadas.
SELECT re.horaInicio,re.horaFin,re.totalhora,CONCAT_WS(' ',e.primerNombre,e.segundoNombre,e.apellidoPaterno,e.apellidoMaterno) AS nombreUsuario
FROM gestion g INNER JOIN becaInstitucional bi
ON g.idGestion=bi.idGestion
INNER JOIN asignacionBecaInstitucional abi
ON bi.idBecaInstitucional=abi.idBecaInstitucional
INNER JOIN estudiante e 
ON e.idEstudiante=abi.idEstudiante
INNER JOIN registroEntradaSalida re 
ON abi.idAsignacionBecaInstitucional=re.idAsignacionBecaInstitucional
and re.fecha="2021-04-16";


<?php
require_once("../Logica/LNPersonalBusqueda.php");
require_once("../Logica/LNBusquedaGestion.php");
$objLNEstudianteBusqueda = new LNPersonalBusqueda();
$objGestion = new LNGestionBusqueda();
$listaEstudiante = $objLNEstudianteBusqueda->buscarCIEstudiante($_REQUEST['ci']);
$gestionActiva = $objGestion->gestionActiva();
if($gestionActiva){

gestion
solicitud beca institucional
asignacionbeca Institucional
estudiante

SELECT abi.idAsignacionBecaInstitucional
FROM gestion g
INNER JOIN becaInstitucional sbi
on g.idGestion = 6 
AND g.IdGestion= sbi.idGestion
INNER JOIN asignacionBecaInstitucional abi
ON sbi.idBecaInstitucional=abi.idBecaInstitucional
INNER JOIN estudiante e
ON abi.idEstudiante=e.idEstudiante 
and e.idEstudiante=

            SELECT CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreUsuario,d.nombre as departamento
            FROM departamento d inner join personalDepartamento dp
            on dp.idDepartamento = d.idDepartamento
            INNER JOIN personal p
            on dp.idPersonal=p.idPersonal
            and p.usuario= 'lperez'
            inner join area a
            on a.idDepartamento=d.idDepartamento;



}
?>



--------------------------------------------------------------------------------------
   SELECT  bi.idBecaInstitucional,a.nombre as area, p.precio,count(a.idArea) as cantidad,d.nombre
   from area a INNER JOIN becaInstitucional bi
   ON a.idArea = bi.idArea
   INNER JOIN departamento d 
   ON d.idDepartamento=a.idDepartamento
   INNER JOIN  personalDepartamento pd 
   ON d.idDepartamento=pd.idDepartamento
   INNER JOIN Personal pe
   ON pe.idPersonal=pd.idPersonal
   AND pe.idPersonal=11
   INNER JOIN precio p
   ON p.idPrecio=bi.idPrecio
   WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional)
   group by a.idArea;

   SELECT *,CONCAT_WS(' ',p.primerNombre,p.segundoNombre,p.apellidoPaterno,p.apellidoMaterno) AS nombreUsuario,
   p.idPersonal,d.nombre as departamento
    FROM departamento d inner join personalDepartamento dp
    on dp.idDepartamento = d.idDepartamento
    INNER JOIN personal p
    on dp.idPersonal=p.idPersonal
    and p.idPersonal=14
    inner join area a
    on a.idDepartamento=d.idDepartamento;
-----------------------------------
SELECT CONCAT_WS(' ',p.primerNombre,p.segundoNombre,p.apellidoPaterno,p.apellidoMaterno) AS nombreUsuario,p.idPersonal,d.nombre 
FROM departamento d inner join personalDepartamento dp
                            on dp.idDepartamento = d.idDepartamento
                            INNER JOIN personal p
                            on dp.idPersonal=p.idPersonal
                            inner join area a
                            on a.idDepartamento=d.idDepartamento
                            where p.usuario=:usuario;

SELECT  CONCAT_WS(' ',p.apellidoPaterno,p.apellidoMaterno,p.primerNombre,p.segundoNombre) AS nombreCompleto,d.nombre as departamento,a.nombre
                            FROM departamento d inner join personalDepartamento dp
                            on dp.idDepartamento = d.idDepartamento
                            INNER JOIN personal p
                            on dp.idPersonal=p.idPersonal
                            inner join area a
                            on a.idDepartamento=d.idDepartamento
                            and dp.idPersonal=:idPersonal;
---------------------------------------------------------------------------------------
SELECT MAX(bi.idBecaInstitucional) AS id, a.nombre as area
FROM area a INNER join becaInstitucional bi
on a.idArea =bi.idArea;

SELECT * FROM becainstitucional bi INNER JOIN area a 
 ON bi.idArea = a.idArea 
 WHERE idBecaInstitucional=MAX(bi.idBecaInstitucional);

SELECT a.nombre, FROM becainstitucional bi INNER JOIN area a  ON bi.idArea = a.idArea 
WHERE idBecaInstitucional = (SELECT MAX(idBecaInstitucional) as maxid FROM becainstitucional);


SELECT a.nombre ,g.nombre,p.precio
FROM solicitudBecainstitucional bi INNER JOIN area a 
 ON bi.idArea = a.idArea 
 INNER join gestion g 
 on bi.idGestion=g.idGestion
 INNER JOIN precio p
 on bi.idPrecio=p.idPrecio
 WHERE idSolicitudBecaInstitucional = (SELECT MAX(idSolicitudBecaInstitucional) as maxid FROM solicitudBecainstitucional);

   SELECT  bi.idSolicitudBecaInstitucional,a.nombre as area, p.precio,count(a.idArea) as cantidad,d.nombre
       from area a INNER JOIN solicitudBecaInstitucional bi
       ON a.idArea = bi.idArea
       INNER JOIN departamento d 
       ON d.idDepartamento=a.idDepartamento
       INNER JOIN  personalDepartamento pd 
       ON d.idDepartamento=pd.idDepartamento
       INNER JOIN Personal pe
       ON pe.idPersonal=pd.idPersonal
       AND pe.idPersonal=11
       INNER JOIN precio p
       ON p.idPrecio=bi.idPrecio
       WHERE bi.idSolicitudBecaInstitucional NOT IN (SELECT idSolicitudBecaInstitucional FROM asignacionBecaInstitucional)
       group by a.idArea;

 SELECT  bi.idBecaInstitucional,count(a.idArea) as area ,a.nombre, p.precio
  from area a INNER JOIN becaInstitucional bi
  ON a.idArea = bi.idArea
  INNER JOIN precio p
  ON p.idPrecio=bi.idPrecio
  WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional)
  group by a.idArea
  having area>0;

SELECT  bi.idBecaInstitucional,a.nombre, p.precio
from area a INNER JOIN becaInstitucional bi
ON a.idArea = bi.idArea
INNER JOIN precio p
ON p.idPrecio=bi.idPrecio
WHERE bi.idBecaInstitucional NOT IN (SELECT idBecaInstitucional FROM asignacionBecaInstitucional);




 SELECT CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) AS nombreCompleto,idPersonal
 FROM personal
 WHERE idPersonal = (SELECT MAX(idPersonal) as maxid FROM personal);




----------------------------------------------------------------------------------------------------------------------------------------------
$(function(){
            $('#adicional').on('click',function(){
               $('#tabla tbody tr:eq(0)').clone().removeClass('fila-fija').appendTo('#tabla');
            });
            $(document).on('click','.eliminar',function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });
logica vista aumentar tabls

<table class="table" id="tabla">
                                       


                                        <tr class="fila-fija">
                                            <td>
                                                <select name="asesor[]" id="asesor" class="custom-select" placeholder="Asesor" required>
                                                    <option value="" selected disabled>Asesor</option>
                                                    <?php foreach($asesores as $asesor){?>
                                                        <option value="<?php echo $asesor["idPersonalTesis"]?>"><?php echo $asesor["nombreCompleto"]?></option>
                                                    <?php }?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="roles[]" id="roles" class="custom-select" required>
                                                    <op


<button type="button" id="adicional" name="adicional" class="btn btn-success">Nuevo Asesor +</button>


crear un servidor local en


select * from personal where activo=0;

--------------------------------------- busqueda estudiante
        SELECT  CONCAT_WS(' ',e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre) AS nombreCompleto,e.ci,e.fechaNacimiento,
                                    IF(p.activo=1,'Si','No') AS activo, e.idEstudiante
                                    FROM rol r INNER JOIN estudiante e
                                    ON r.idRol = e.idrol
                                    WHERE e.primerNombre LIKE '%".$primerNombre."%'
                                    AND e.segundoNombre LIKE '%".$segundoNombre."%'
                                       AND e.apellidoPaterno LIKE '%".$apellidoPaterno."%'
                                    AND e.apellidoMaterno LIKE '%".$apellidoMaterno."%'
                                    AND e.ci LIKE '%".$ci."%'
                                    AND e.fechaNacimiento LIKE '%".$fechaNacimiento."%'
                                    AND e.activo = ".$activo."
                                    GROUP BY e.idEstudiante
                                    ORDER BY e.apellidoPaterno,e.apellidoMaterno,e.primerNombre,e.segundoNombre;

-----------------------------------------------------------------------------------------------------------------------
SELECT *,CONCAT_WS(' ',primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) 
AS nombreUsuario,idPersonal FROM personal 
where usuario=:usuario;