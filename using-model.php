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
    
    // if you want to collect results based on the selected id
    public function getId($id)
    {
        // if the id you are looking for does not exist then all will be displayed
        if ($id == false) {
            return $this->findAll();
        }

        // returns the first row in the result set
        return $this->where(['id' => $id])->first();
    }
    
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

  public function index($id)
    {
      $data = [
        'dataUser' => $this->user->getId($id);
      ];
        
      return view('/',$data);
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
