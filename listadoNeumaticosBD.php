<?php
require_once "./clases/neumaticoBD.php";
use LunaMilagros\NeumaticoBd;

$mostar = isset($_GET["tabla"]) ? $_GET["tabla"] : "sin tabla"; 
$retorno = NeumaticoBd::traer();
if($mostar == "mostrar"){
    echo "<style>
    table {
      border-collapse: collapse; 
      width: 80%; 
      padding: 10px;
      margin: 50px auto;
      text-align: center;
    }
    td, th {
      border: 1px solid black;
      padding: 8px; 
      text-align: center;
    }
    </style>";
    echo "
    <table >
        <thead>
            <tr>
                <th>ID</th>
                <th>MARCA</th>
                <th>MEDIDAS</th>
                <th>PRECIO</th>
                <th>PATH</th>
                <th>Foto</th>
            </tr>
        </thead>"; 
    foreach($retorno as $neumatico)
    {
        echo "<tr>";
            echo "<td>" . $neumatico->Id() . "</td>";
            echo "<td>" . $neumatico->Marca() . "</td>";
            echo "<td>" . $neumatico->Medidas() . "</td>";
            echo "<td>" . $neumatico->Precio() . "</td>";
            echo "<td>" . $neumatico->Pathfoto() . "</td>";
            echo "<td>";
            if($neumatico->Pathfoto() != "sin foto")
            {
                //if(file_exists("/PRIMERPARCIAL/neumaticos/imagenes/".$neumatico->Pathfoto())) {
                echo '<img src= /PRIMERPARCIAL/neumaticos/imagenes/'.$neumatico->Pathfoto().' alt='.$neumatico->Pathfoto() . ' height="100px" width="100px">'; 
                //}else{
                  //  echo 'No hay imagen guardada en '. $neumatico->Pathfoto(); 
                //}
            }else{
                echo "Sin datos //";
            }
            echo "</td>";
           
        echo "</tr>";
    }
    echo "</table>";
}else{
var_dump($retorno);
}

