<?php
namespace DataAbstract;

/**
 * Abstraction for Data objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Data
{
    private $type;
    private $value;

    public function __construct($desiredType = false, $value)
    {
        try {
            $this->setType($desiredType, $value);
        } catch(\Exception $e) {
            die($e->getMessage());
        }

        $this->setValue($value);
    }

    public function getType()
    {
        return $this->type;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setType($desiredType, $value)
    {
        if ($desiredType) {
            $fault = false;

            switch($desiredType) {
                case 'int':
                case 'integer':
                    if (!preg_match('/^\d+$/', $value)) {
                        $fault = true;
                    }

                    break;

                case 'float':
                case 'double':
                    if (!preg_match('/^\d+(\.?\d*)$/', $value)) {
                        $fault = true;
                    }

                    break;

                case 'boolean':
                    if (!in_array($value, array('true', 'false', 0, 1))) {
                        $fault = true;
                    }

                    break;
            }

            if ($fault) {
                throw new \Exception("Can't convert >$value< to $desiredType");
            }

            settype($value, $desiredType);
        }

        $this->type = gettype($value);
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}
