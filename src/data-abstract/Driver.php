<?php
namespace DataAbstract

/**
 * Abstraction for Driver objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Driver
{
    protected $handler;
    protected $server;
    protected $database;

    public function __construct(Server $server, Database $database)
    {
        $this->setServer($server);
        $this->setDatabase($database);
    }

    /**
     * The connect method must set the handler.
     */
    abstract public function connect();
    abstract public function create();
    abstract public function retrieve();
    abstract public function update();
    abstract public function delete();
    abstract public function disconnect();

    public function getHandler()
    {
        return $this->handler;
    }

    public function getServer()
    {
        return $this->server;
    }

    public function getDatabase()
    {
        return $this->database;
    }

    public function setHandler($handler)
    {
        $this->handler = $handler;
    }

    public function setServer(Server $server)
    {
        $this->server = $server;
    }

    public function setDatabase(Database $database)
    {
        $this->database = $database;
    }
}
