
<h3 class="text-center"> DATOS TRABAJADOR
    <div class="col-12 pt-3" style="font-size:25px">NOMBRE:<?= " " . utf8_encode($_SESSION['nombreCompletoTrabajador']) ?></div>
    <div class="col-12" style="font-size:25px">RUT: <?= $_SESSION['rutCompletoTrabajador'] ?></div>
    <div class="col-12" style="font-size:25px">EDAD: <?= $_SESSION['edadTrabajador']?></div>
    <div class="col-12" style="font-size:25px">CARGO: <?= $_SESSION['cargoTrabajador']?></div>
    <div class="col-12" style="font-size:25px">EMPRESA: <?= $_SESSION['nombreEmpresa']?></div>
    </h3>