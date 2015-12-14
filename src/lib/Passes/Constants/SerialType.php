<?php

namespace PassApp\Lib\Passes\Constants;

/**
 * Pass QR serial types
 *
 * @author  Alaa Attya <alaa.attya91@gmail.com>
 */

Class SerialType {
    
    /**
     * @const QR
     */
    const QR = 'qr_code';
    
    /**
     * @const EAN13
     */
    const EAN13 = 'ean_13';
       
    /**
     * @var array   array of the allowed serial types
     */
    public static $types = array(
        self::EAN13,
        self::QR
    );
}