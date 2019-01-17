<?php
function validate_project() {
    $error = array();
    $valido = true;

    $filter = array(
        'ProName' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_.-]*$/')
        ),
        'ProDesc' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_ .-]*$/')
        ),
        'Ubica' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]*$/')
        ),
        'Mail' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$/')
        ),
        'ProPrice' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/[0-9]/')
        )
    );
    $resultado = filter_input_array(INPUT_POST, $filter);

    if (($resultado != null) && ($resultado)) {
        if ($resultado['ProName']) {
            $daoproject = new DAOProject();
            $rdo = $daoproject->valida_ProName($resultado);

            if ($rdo->num_rows === 0) {
                $error['ProName'] = '';
            }else {

                $error['ProName'] = "El Proyecto $resultado[ProName] ya está registrado en la base de datos o contiene caractres especiales.";
                $valido = false;
            }
        }

        if (!$resultado['ProDesc']){
            $error['ProDesc'] = "La descripción tiene que contener solo letras y números.";
            $valido = false;
        }

        if (!$resultado['Ubica']){
            $error['Ubica'] = "La ubicación tiene que contener solo letras.";
            $valido = false;
        }

        if (!$resultado['Mail']){
            $error['Mail'] = "El correo tiene que ser un correo valido.";
            $valido = false;
        }

        if (!$resultado['ProPrice']){
            $error['ProPrice'] = "El precio solo puede contener números.";
            $valido = false;
        }

    } else {
        $valido = false;
    };
    
    return $return = array('resultado' => $valido, 
                            'error' => $error, 
                            'datos' => $resultado);
}
