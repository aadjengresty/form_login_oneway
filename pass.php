<?php

    $options = [
        'cost' => 10
    ];

    echo password_hash("adjeng123", PASSWORD_DEFAULT, $options);

?>
