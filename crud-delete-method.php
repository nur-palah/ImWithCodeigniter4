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

  public function delete($id)
    {
      $this->user->delete($id);
        
      return redirect()->to('/');
    }
?>
