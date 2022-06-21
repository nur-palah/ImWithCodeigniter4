<?php

// IN YOUR MODEL / userModel.php
namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'email'
    ];
        
    // if you want to add search on your page
    public function search($keyword)
    {
        return $this->table('users')->like('name', $keyword); // organize keywords by name
    }

}

// IN YOUR CONTROLLER crud.php

namespace App\Controllers;

use App\Models\userModel;

class Crud extends BaseController
{
  protected $user;
  
  public function __construct()
    {
      $this->user = new userModel();
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->user->search($keyword);
        } else {
            $this->user;
        }

        $data = [
            'dataUser' => $this->user->findAll()
        ];

        return view('/search', $data);
    }
    
?>
