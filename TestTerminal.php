<?php
    include 'Empresa.php';
    include 'Responsable.php';
    include 'Terminal.php';
    include 'Viaje.php';

    $r1=new Responsable("Pepe","Perez","1111","Calle 1","email1","11111");
    $r2=new Responsable("Juan","Arias","2222","Calle 2","email2","22222");
    $r3=new Responsable("Sofia","Rodriguez","3333","Calle 3","email3","33333");
    $r4=new Responsable("Julia","Fernandez","4444","Calle 4","email4","44444");

    $v1= new Viaje("Neuquen","12","13","1","100","01-01-22",10,10,$r1);
    $v2= new Viaje("Centenario","13","15","2","200","01-01-22",10,10,$r2);
    $v3= new Viaje("Cipolletti","00","03","3","50","01-01-22",10,10,$r3);
    $v4= new Viaje("Plottier","05","07","4","80","01-01-22",10,10,$r4);
    $colViajes1=[$v1,$v2];
    $colViajes2=[$v3,$v4];
    
    
    $emp1=new Empresa("E1","Seabourn Cruise Line",$colViajes1);
    $emp2=new Empresa("E2","Princess Cruises",$colViajes2);
    $colEmpresas=[$emp1,$emp2];

    $terminal=new Terminal("La Terminal","LA CALLE 121212",$colEmpresas);

    
    echo $terminal->empresaMayorRecaudacion();
    echo "Responsbale del Viaje: ".$terminal->responsableViaje(3);

?>