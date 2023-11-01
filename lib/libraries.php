<?php

    require ( 'sql.class.php' );

    require ( 'sql.helper.class.php' );

    require ( 'string.class.php' );

    require ( 'helper.class.php' );

    require ( 'hash.crypt.class.php' );




    $db = new db(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

    $sql_helper = new SQLHelper(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

    $string = new Strings(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

    $helper = new Helpers(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST);

    $crypt = new hash_encryption(ENCRYPT_KEY);


?>