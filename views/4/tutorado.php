<?php 
require('models/mTutorado.php');
$obj=  new mTutorado();
$data=$obj->getTutoradosActivos(); 
$data2=$obj->getTutoradosInactivos(); 
$n=1;
$i=1;
if(isset($_GET['idInhabilitar']))
{
    $obj->inhabilitarTutorado($_GET['idInhabilitar']);
}
if(isset($_GET['idHabilitar']))
{
    $obj->habilitarTutorado($_GET['idHabilitar']);
}
?>
<div class="row">
    <div class="card-panel">
        <span class="card-title"><h4>Tutorados</h4></span>
        <table class="highlight ">
            <thead>
                <tr>
                    <th data-field="#">#</th>
                    <th data-field="nombre">Nombre</th>
                    <th data-field="carrera">Carrera</th>
                    <th data-field="semestre">Semestre</th>
                    <th data-field="acciones">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?> 
                <tr>
                    <td><?php echo $n++; ?></td>
                    <td><a href="?sec=datosTutorado&id=<?php echo $row['idPersona'] ?>"><?php echo $row['nombre']." ".$row['appaterno']." ".$row['apmaterno']; ?></a></td>
                    <td><?php echo $row['carrera'];?></td>
                    <td><?php echo $row['semestre'];?></td>
                    <td>
                        <a class="waves-effect waves-light btn green" href="?sec=mensaje&id=<?php echo $row["idPersona"];?>"><i class="tiny material-icons">contact_mail</i></a>
                        <a class="waves-effect waves-light btn green" href="?sec=citar&id=<?php echo $row["idPersona"]; ?>"><i class="tiny material-icons">book</i></a>
                        <a class="waves-effect waves-light btn green" href="?sec=citarDepartamentoApoyo&id=<?php echo $row["idPersona"]; ?>"><i class="tiny material-icons">collections_bookmark</i></a>  
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>