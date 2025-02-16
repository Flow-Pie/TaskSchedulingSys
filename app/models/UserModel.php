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


}
