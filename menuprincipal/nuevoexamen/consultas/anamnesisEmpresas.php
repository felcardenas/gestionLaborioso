<?php include '../../global/conexion.php';

                $sql = 'SELECT ID_EMPRESA, NOMBRE_EMPRESA FROM EMPRESA';

                $resultado = mysqli_query($conexion,$sql);

                if (mysqli_num_rows($resultado) > 0) {
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                        <option value="<?=$row['ID_EMPRESA'];?>"><?= $row['NOMBRE_EMPRESA'] ?></option>
                        <?php
                    }
                }else{
                    ?><option>No hay empresas registradas</option><?php
                }
?>