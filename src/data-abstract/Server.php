<?php
namespace galvao\DataAbstract;

/**
 * Abstraction for Server objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Server
{
    protected $address;
    protected $port;
    protected $databases;

    public function __construct($address, $port = null, array $databases = [])
    {
        $this->setAddress($address);
        $this->setPort($port);
        $this->setDatabases($databases);
    }

    public function addDatabase(Database $database)
    {
        $this->databases[] = $database;
    }

    public function getAdddress()
    {
        return $this->address;
    }

    public function getPort()
    {
        return $this->port;
    }

    public function getDatabases()
    {
        return $this->databases;
    }


    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setPort($port)
    {
        $this->port = $port;
    }

    public function setDatabases(array $databases)
    {
        $this->databases = [];

        foreach ($databases as $database) {
            $this->addDatabase($database);
        }
    }
}
