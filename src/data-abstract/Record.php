<?php
namespace galvao\DataAbstract;

/**
 * Abstraction for Row objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Record
{
    protected $id;
    protected $number;
    protected $columns;

    public function __construct($RecordID = 0, array $columns = [])
    {
        if ($RecordID) {
            $this->setId($RecordID);
        }

        $this->setColumns($columns);
    }

    protected function addColumn(Column $column)
    {
        $ths->columns[] = $column;
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setColumns(array $columns)
    {
        $this->columns = [];

        foreach ($columns as $column) {
            $this->addColumn($column);
        }
    }

    public function setId($id)
    {
        $this->id = (int)$id;
    }
}
