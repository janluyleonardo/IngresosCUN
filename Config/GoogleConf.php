
<?php
  
    $google_client = new Google_Client();
    $google_client->setClientId('952870611237-9iaflr2pspta4rn4g15g55e3latn5mqn.apps.googleusercontent.com');
	$google_client->setClientSecret('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');
	$google_client->setRedirectUri('http://localhost/ingresosCUN/Registro/ingreso');
	// $google_client->setRedirectUri('https://ingreso.cunapp.pro/Registro/ingreso');
	$google_client->addScope('email');
	$google_client->addScope('profile');

    ?>
