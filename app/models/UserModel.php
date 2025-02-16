<?php
class UserModel extends Model
{
    protected $allowedColumns = [

        'user_id',
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'role',
        'date_registered'

     ];

    function __construct()
    {
        $this->table = 'Users';
        $this->order_column = 'user_id';

    }

    public function validate($data)
    {
        $this->errors = [];

        if(empty($data['username']))
        {
            $this->errors['username'] = "Username is required";
        }//more  validation logic goes here!!



        if(empty($this->errors))
        {
            return true;
        }
        return false;
    }


}
