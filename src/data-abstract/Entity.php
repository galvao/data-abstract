<?php
namespace DataAbstract

/**
 * Abstraction for Entity objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Entity
{
    protected $name;
    protected $records;

    public function __construct($name, array $records = [])
    {
        $this->setName($name);
        $this->setRecords($records);
    }

    public function addRecord(Record $record)
    {
        $this->records[] = $record;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRecords()
    {
        return $this->records;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRecords(array $records)
    {
        $this->records = [];

        foreach ($records as $record) {
            $this->addRecord($record);
        }
    }
}
