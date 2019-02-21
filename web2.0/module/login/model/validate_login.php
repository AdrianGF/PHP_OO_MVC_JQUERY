<?php
function validate_register() {
    $error = array();
    $valido = true;

    $filter = array(
        'user' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9_.-]*$/')
        )
    );
    $resultado = filter_input_array(INPUT_POST, $filter);

    if (($resultado != null) && ($resultado)) {
        if ($resultado['user']) {
            $daologin = new DAOLogin();
            $rdo = $daologin->UQ_user($resultado);

            if ($rdo->num_rows === 0) {
                $error['user'] = '';
            }else {
                $error['user'] = 'El usuario ya existe.';
                $valido = false;
            }
        }

    }else {
        $valido = false;
    };

    return $return = array('valido' => $valido, 
    'error' => $error, 
    'resultado' => $resultado);
}
