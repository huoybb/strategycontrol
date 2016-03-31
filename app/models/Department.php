<?php

class Department extends myModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $headCount;

    /**
     *
     * @var integer
     */
    public $total_budget;

    /**
     *
     * @var integer
     */
    public $total_contract_amount;

    /**
     *
     * @var integer
     */
    public $total_income;

    /**
     *
     * @var integer
     */
    public $total_expense;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'department';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Department[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Department
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
