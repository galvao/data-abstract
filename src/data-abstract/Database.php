<?php
namespace galvao\DataAbstract;

/**
 * Abstraction for Database objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Database
{
    protected $name;
    protected $entities;
    protected $user;
    protected $password;

    public function __construct($name, $user, $password, array $entities = [])
    {
        $this->setName($name);
        $this->setUser($user);
        $this->setPassword($password);
        $this->setEntities($entities);
    }

    public function addEntity(Entity $entity)
    {
        $this->entities[] = $entity;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEntities()
    {
        return $this->entities;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setEntities(array $entities)
    {
        $this->entities = [];

        foreach ($entities as $entity) {
            $this->addEntity($entity);
        }
    }
}
