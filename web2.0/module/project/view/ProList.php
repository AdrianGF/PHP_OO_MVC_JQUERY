<div id="contenido">
    <div class="container">
    	<div class="row">
    			<h3>PROJECT'S LIST</h3>
    	</div>
    	<div class="row">

                <script type="text/javascript">
                    $(document).ready(function () {
                    $('#list').DataTable();
                    $('.dataTables_length').addClass('bs-select');
                    });
                </script>

            <p><a class="btn" href="index.php?page=controller_pro&op=create"><i class="fas fa-plus" style="color:#212529;"></i></a></p>
    		<table id="list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <td width=125><b>ID</b>
                        <td width=125><b>Project Name</b>
                        <td width=125><b>Address</b>
                        <th width=350><b>Operations</b>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($rdo->num_rows === 0){
                            echo '<tr>';
                            echo '<td align="center"  colspan="3">NO HAY NINGUN USUARIO</td>';
                            echo '</tr>';
                        }else{
                            foreach ($rdo as $row) {
                                echo '<tr>';
                                echo '<td width=125>'. $row['idproject'] . '</td>';
                                echo '<td width=125>'. $row['ProName'] . '</td>';
                                echo '<td width=125>'. $row['Mail'] . '</td>';
                                echo '<td id="td_crud" width=350>';
                                print ("<a class='Pro btn btn-primary' id='".$row['idproject']."'>Read</a>");
                                //echo '<a class="btn Pro" href="index.php?page=controller_pro&op=read&id='.$row['idproject'].'"><i class="fas fa-address-card"></i></a>';
                                echo '&nbsp;';
                                echo '<a class="btn" href="index.php?page=controller_pro&op=update&id='.$row['idproject'].'"><i class="fas fa-edit"></i></a>';
                                echo '&nbsp;';
                                echo '<a class="btn" href="index.php?page=controller_pro&op=delete&id='.$row['idproject'].'&ProName='.$row['ProName'].'"><i class="fas fa-trash"></i></a>';
                                echo '</td>';
                                echo '</tr>';
                                
                            }
                        }
                    ?>
                </tbody>
            </table>
            <p><a class="btn" href="index.php?page=controller_pro&op=deleteAll"><i class="fas fa-trash" style="color:red;"></i></a></p>
    	</div>
    </div>
</div>


<!-- modal window -->
<section id="project_modal">
    <div id="details_project" hidden>
        <div id="details">
            <div id="container">
                ID: <div id="idproject"></div></br>
                NombreProyecto: <div id="ProName"></div></br>
                Tipo: <div id="ProType"></div></br>
                Descripcion: <div id="ProDesc"></div></br>
                Ubicacion: <div id="Ubica"></div></br>
                Correo: <div id="Mail"></div></br>
                FechaInicio: <div id="ProDateIni"></div></br>
                Precio: <div id="ProPrice"></div></br>
                Moneda: <div id="Curr"></div></br>
                Requisitos: <div id="req"></div></br>
            </div>
        </div>
    </div>
</section>