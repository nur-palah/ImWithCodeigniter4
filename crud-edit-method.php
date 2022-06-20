<?php

namespace App\Controllers;

use App\Models\userModel;

class Crud extends BaseController
{
  protected $user;
  
  public function __construct()
    {
      $this->user = new userModel();
    }

  public function save($id)
    {
      $this->user->save([
        'id' => $id,
        'name' => $this->request->getVar('name'),
        'email' => $this->request->getVar('email')
      ]);
        
      return redirect()->to('/');
    }
?>
