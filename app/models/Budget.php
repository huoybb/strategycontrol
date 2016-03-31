<?php

class Budget extends myModel
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $customer_id;

    /**
     *
     * @var string
     */
    public $fiscal_year;

    /**
     *
     * @var integer
     */
    public $amount;

    /**
     *
     * @var string
     */
    public $note;

    /**
     *
     * @var integer
     */
    public $department_id;

    /**
     *
     * @var integer
     */
    public $user_id;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     *
     * @var integer
     */
    public $parent_id;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'budget';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Budget[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Budget
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
