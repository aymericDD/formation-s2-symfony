<?php
/**
 * Created by PhpStorm.
 * User: formation.invite
 * Date: 06/10/2015
 * Time: 15:17
 */

namespace ParkBundle\Command;


class Validator
{
    public static function validateFormat($format)
    {
        $format = strtolower($format);

        if (!in_array($format, array('enabled', 'disabled'))) {
            throw new \RuntimeException(sprintf('Format "%s" is not supported.', $format));
        }

        return $format;
    }
}