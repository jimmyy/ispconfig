<?php

class IspconfigClient extends SoapClient {

    private $client;

    public function __construct($location, $uri) {
        try {
            $wsdl = NULL;
            $options = array('location' => $location,'uri' => $uri);
            parent::__construct($wsdl, $options);
        } catch (SoapFault $e) {
            echo 'SOAP Error: '.$e->getMessage();
            echo 'Error, please contact the server administator';
        }
    }

    /*
	 * Utils function for generate random password
	 */
    public function generatePassword($max = 15) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
        $i    = 0;
        $salt = '';
        $cpt  = strlen($characterList);
        for ( $i=0; $i < $max; $i++ ) {
            $salt .= $characterList{mt_rand(0, ($cpt - 1))};
        }
        return $salt;
    }

}