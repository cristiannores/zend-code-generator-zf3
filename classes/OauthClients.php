<?php

class OauthClients
{

    /**
     * Property id
     */
    public $id = null;

    /**
     * Property user_id
     */
    public $user_id = null;

    /**
     * Property name
     */
    public $name = null;

    /**
     * Property secret
     */
    public $secret = null;

    /**
     * Property redirect
     */
    public $redirect = null;

    /**
     * Property personal_access_client
     */
    public $personal_access_client = null;

    /**
     * Property password_client
     */
    public $password_client = null;

    /**
     * Property revoked
     */
    public $revoked = null;

    /**
     * Property created_at
     */
    public $created_at = null;

    /**
     * Property updated_at
     */
    public $updated_at = null;

    public function __construct()
    {
        $this->exchangeArray([]);
    }

    /**
     * Method exchange array
     *
     * Pass data from hydrator to object
     */
    public function exchangeArray($data)
    {
        $this->id = (!empty($data['id'])) ? $data['id']:null; //   int
        $this->user_id = (!empty($data['user_id'])) ? $data['user_id']:null; //   int
        $this->name = (!empty($data['name'])) ? $data['name']:null; //   varchar
        $this->secret = (!empty($data['secret'])) ? $data['secret']:null; //   varchar
        $this->redirect = (!empty($data['redirect'])) ? $data['redirect']:null; //   text
        $this->personal_access_client = (!empty($data['personal_access_client'])) ? $data['personal_access_client']:null; //   tinyint
        $this->password_client = (!empty($data['password_client'])) ? $data['password_client']:null; //   tinyint
        $this->revoked = (!empty($data['revoked'])) ? $data['revoked']:null; //   tinyint
        $this->created_at = (!empty($data['created_at'])) ? $data['created_at']:null; //   timestamp
        $this->updated_at = (!empty($data['updated_at'])) ? $data['updated_at']:null; //   timestamp
    }

    /**
     * Method get array copy
     *
     * Get a copy of this object
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    /**
     * Method to validate data object
     */
    public function isValid($data = null)
    {
        if ( $data ) {
        	$data = $this->exchangeArray($data);
        }

        if ($this->id) {
        	$validator = new Zend\Validator\ValidatorChain();
        	$validator->attach(new Zend\Validator\Digits());
        	if (!$validator->isValid($this->id)) { 
        		return false;
        	}
        }
        return true;
    }


}

