<div id="contenido">
    <form autocomplete="on" method="post" name="ProDeleteAll" id="ProDeleteAll" acction="index.php?page=controller_pro&op=deleteAll">
        <table border='0'>
            <tr>

                <td align="center"  colspan="2"><h3>¿Desea seguro borrar todos los proyectos?</h3></td>
                <?php
                    var_dump($_GET);
                ?>
                
            </tr>
            <tr>
                <td align="center"><button type="submit" class="Button_green" name="deleteAll" id="deleteAll">Aceptar</button></td>
                <td align="center"><a class="Button_red" href="index.php?page=controller_pro&op=list">Cancelar</a></td>
            </tr>
        </table>
    </form>
</div>