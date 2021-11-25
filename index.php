<?php
    class WebService{
        function Mostrar(){
            $db = pg_connect("host=ec2-3-208-157-78.compute-1.amazonaws.com
            dbname=d36do3ba44vjh8 user=ajeuwikenhshrf password=0ba066351cd30338be16aa410a26cc3deb6459a9792c1bfede5a47f71624bd3e");
            $componentes = array();
            $datos = pg_query($db,"select sl.cod_solicitud,cl.dni,cl.nombres,concat_ws(' ', cl.ap_paterno,cl.ap_materno) 
            as apellidos,sl.fecha, sl.monto,sl.cuotas,sl.estado,cl.correo from clientes cl inner join
            solicitudes sl on cl.cod_cliente = sl.cod_cliente");
            $resultArray = pg_fetch_all($datos);
            echo json_encode($resultArray);
        }
    }
    $WS = new WebService;
    $WS->Mostrar();
?>
