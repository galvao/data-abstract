<?php
namespace galvao\DataAbstract;

/**
 * Abstraction for Column objects
 * @package DataAbstract
 * @author Er Galvão Abbott <galvao@galvao.eti.br>
 */

abstract class Column
{
    protected $constraints = [
        'key' => [
            'primary' => false,
            'foreign' => [
                'entity' => Entity $relatedEntity,
                'column' => Column $relatedColumn
            ],
            'unique'  => false,
        ],
        'null' => true,
    ];
    protected $data;
    protected $name;
    protected $type;
    protected $value;

    public function __construct(
        $name,
        $type,
        Data $data = null,
        array $constraints = []
    ) {
        $this->setName($name);
        $this->setType($type);
        $this->setConstraints($constraints);

        /**
         * The following check is necessary due to the fact that this Column object may be initialized without data,
         * which is different than initializing it with data that has a null value.
         */

        if (!is_null($data)) {
            $this->setData($data);
        }
    }

    public function addConstraint($key, $value)
    {
        /**
         * @ToDo: refactor to a more elegant, less repetitive solution.
         */

        if ($key == 'foreign') {
            foreach ($value as $fKey => $fValue) {
                if (!in_array($fKey, array_keys($this->constraints[$key]))) {
                    throw new \Exception('Invalid constraint: ' . $fKey);
                }

                $this->constraints[$key][$fKey] = $fValue;
            }
        } else {
            if (!in_array($key, array_keys($this->constraints))) {
                throw new \Exception('Invalid constraint: ' . $key);
            }

            $this->constraints[$key] = $value;
        }
    }

    /**
     * Check constraints to see if data value doesn't violate them
     */
    abstract function checkConstraints();

    /**
     * Check if data tyoe is consistent with column type
     */
    abstract function checkType();

    public function getConstraints()
    {
        return $this->constraints;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setConstraints(array $constraints)
    {
        foreach ($constraints as $key => $value) {
            try {
                $this->addConstraint($key, $value);
            } catch(\Exception $e) {
                die($e->getMessage());
            }
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setData()
    {
        if (!$this->checkType()) {
            throw new \Exception('Data type is not compatible with column type.');
        }

        if (!$this->checkConstraints()) {
            throw new \Exception('Data violates a constraint.');
        }

        $this->data = $data;
    }
}
