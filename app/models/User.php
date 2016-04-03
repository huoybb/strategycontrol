<?php

class User extends myModel
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
     * @var string
     */
    public $mobile;

    /**
     *
     * @var string
     */
    public $position;

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
     * @var string
     */
    public $role;
    /**
     *
     * @var string
     */
    public $status;
    /**
     *
     * @var string
     */
    public $email;
    /**
     *
     * @var string
     */
    public $password;
    /**
     *
     * @var string
     */
    public $remember_token;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * @param array $cookie
     * @return User
     */
    public static function findByCookieAuth(array $cookie)
    {
        return static::query()
            ->where('email = :email:', ['email' => $cookie['email']])
            ->andWhere('remember_token = :token:', ['token' => $cookie['token']])
            ->execute()->getFirst();
    }

}
