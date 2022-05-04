<?php
error_reporting(E_ALL);
$cipher = "aes-128-gcm";

$key = "caa44j90#$;ajsgfF;;JFIO564645635464686363HGBDFVSDFVfsdghgs5456eb4885g5458458tffst54df5g4858645858646y58v55485dfaFffgGD8JkAsDf$@!"; 
$iv = "aSdF_jKl;_45";

function encrypt_with_params($text) {  
    global $cipher;
    $ciphertext = "";
    if (in_array($cipher, openssl_get_cipher_methods()))
    {      
        $ciphertext = openssl_encrypt($text, $cipher, $GLOBALS['key'],
                            $options=0, $GLOBALS['iv'], $tag);
    } else {
        trigger_error("aes-128-gcm is not one of the available chipher methods",
                      E_ERROR );
    }
    return array('ciphertext' => $ciphertext, 'tag' => base64_encode($tag));
}

function decrypt_with_params($chipertext, $tag) {
    return openssl_decrypt($chipertext, $GLOBALS['cipher'],
                $GLOBALS['key'], $options=0, $GLOBALS['iv'], 
                                        base64_decode($tag));
}