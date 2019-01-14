<div id="contenido" >
    <h1>Info</h1>
    <p>
    <table border='2' class="ta">
    <tr>
            <td>ID: </td>
            <td>
                <?php
                    echo $project['idproject'];
                ?>
            </td>
        </tr>

        <tr>
            <td>Project's name: </td>
            <td>
                <?php
                    echo $project['ProName'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Type </td>
            <td>
                <?php
                    echo $project['ProType'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Desc: </td>
            <td>
                <?php
                    echo $project['ProDesc'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Ubicación: </td>
            <td>
                <?php
                    echo $project['Ubica'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Mail: </td>
            <td>
                <?php
                    echo $project['Mail'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Project ini date: </td>
            <td>
                <?php
                    echo $project['ProDateIni'];
                ?>
            </td>
            
        </tr>
        
        <tr>
            <td>Price: </td>
            <td>
                <?php
                    echo $project['ProPrice'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Currency: </td>
            <td>
                <?php
                    echo $project['Curr'];
                ?>
            </td>
        </tr>
        
        <tr>
            <td>Requisitos: </td>
            <td>
                <?php
                    echo $project['req'];
                ?>
            </td>
        </tr>
    </table>
    </p>
    <p><a href="index.php?page=controller_pro&op=list">Volver</a></p>
</div>