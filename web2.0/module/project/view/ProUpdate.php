<div class="ajuste">
        <h1> Crear proyecto: </h1>
        <div class="DivForm">
            <form method="post" name="ProForm" id="ProForm">
                <table>
                    <tr>
                        <td><label for="ProName">Nombre del proyecto:</label></td>
                        <td><input name="ProName" id="ProName" type="text" placeholder="El nombre de tu nuevo proyecto." value="<?php echo $project['ProName'];?>"/></td>
                        <span id="e_ProName" class="styerror">
                            <?php
                                print_r($error['ProName']);
                            ?>
                        </span>
                    </tr>
                    <tr>
                        <td><label for="ProType">Orientación del proyecto:</label></td>
                        <td>
                            <?php
                           switch($project['ProType']){
                               case "game":
                               ?>
                               <input type="radio" name="ProType" id="game" value="game" checked>
                               <label for="game">Juegos</label>
       
                               <input type="radio" name="ProType" id="art" value="art">
                               <label for="art">Artistico</label>
       
                               <input type="radio" name="ProType" id="tecno" value="tecno">
                               <label for="tecno">Tecnologico</label>
                               <?php
                               break;
                               case "art"
                               ?>
                               <input type="radio" name="ProType" id="game" value="game" >
                               <label for="game">Juegos</label>
       
                               <input type="radio" name="ProType" id="art" value="art" checked>
                               <label for="art">Artistico</label>
       
                               <input type="radio" name="ProType" id="tecno" value="tecno">
                               <label for="tecno">Tecnologico</label>
                               <?php
                               break;
                               case "tecno"
                               ?>
                               <input type="radio" name="ProType" id="game" value="game" >
                               <label for="game">Juegos</label>
       
                               <input type="radio" name="ProType" id="art" value="art">
                               <label for="art">Artistico</label>
       
                               <input type="radio" name="ProType" id="tecno" value="tecno" checked>
                               <label for="tecno">Tecnologico</label>
                               <?php
                               break;
                           }
                        ?>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="ProDesc">Descripción del proyecto:</label></td>
                        <td><textarea name="ProDesc" rows="5" cols="25" id="ProDesc"> <?php echo $project['ProDesc'];?> </textarea></td>
                        <span id="e_ProDesc" class="styerror">
                            <?php
                                print_r($error['ProDesc']);
                            ?>
                        </span>
                    </tr>

                    <tr>
                        <td><label for="Ubica">Ubicación:</label></td>
                        <td><input name="Ubica" id="Ubica" type="text" placeholder="Ubicación" value="<?php echo $project['Ubica'];?>" /></td>
                        <span id="e_Ubica" class="styerror">
                            <?php
                                print_r($error['Ubica']);
                            ?>
                        </span>
                    </tr>

                    <tr>
                        <td><label for="Mail">Correo electronico:</label></td>
                        <td><input name="Mail" id="Mail" type="text" placeholder="Correo" value="<?php echo $project['Mail'];?>" /></td>
                        <span id="e_Mail" class="styerror">
                            <?php
                                print_r($error['Mail']);
                            ?>
                        </span>
                    </tr>

                    <tr>
                        <td><label for="ProDateIni">Día de inicio del proyecto:</label></td>
                        <td><input name="ProDateIni" id="date2" type="ProDateIni" value="<?php echo $project['ProDateIni'];?>"/></td>
                        <span id="e_ProDateIni" class="styerror">
                            <?php
                                print_r($error['ProDateIni']);
                            ?>
                        </span>
                    </tr>

                    <tr>
                        <td><label for="ProPrice">Subención minima del proyecto:</label></td>
                        <td calss="PriceCurr">
                        <input class="ProPrice" name="ProPrice" id="ProPrice" type="text" placeholder="Coste minimo." value="<?php echo $project['ProPrice'];?>"/>
                        <select class="Curr" name="Curr" id="Curr">
                            <option value="€">€</option>
                            <option value="$">$</option>
                            <option value="a">¥</option>
                        </select>
                        </td>
                        <span id="e_ProPrice" class="styerror">
                        <?php
                            print_r($error['ProPrice']);
		                ?>
                        </span>
                    </tr>
                    
                    <tr>
                        <td class="req1"><label for="req">Requisitos:</label></td>

                        <td class="req2">                
                        <input type="checkbox" id="a1" name="req[]" value="req1">
                        <label for="a1" >Tengo por lo menos 18 años.</label>                    
                        <br/>
                        <input type="checkbox" id="a2" name="req[]" value="req2">
                        <label for="a2">Tengo una cuenta bacaria y una edentificación oficial.</label>
                        <br/>
                        <input type="checkbox" id="a3" name="req[]" value="req3">
                        <label for="a3">Tengo una tarjeta de débito y/o crédito.</label>
                        <br/>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="ProImg">Adjuntar imagen:</label></td>
                        <td><input type="file" id="ProImg" name="ProImg" placeholder="carga tu boucher" required /></td>
                    </tr>
                    <td><input name="Submit" type="button" value="Enviar" onclick="validate_project()" /></td>
                </table>
            </form>
        </div>
    </div>