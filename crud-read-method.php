// IN YOUR CONTROLLER
<?php

namespace App\Controllers;

// if you use the model with __construct function
use App\Models\userModel;

class Crud extends BaseController
{
  protected $user;
  
  public function __construct()
    {
      $this->user = new userModel();
    }

  public function index()
    {
      $data = [
        'dataUser' => $this->user->findAll();
      ];
        
      return view('/',$data);
    }
  
// if you use the query builder
class Crud extends BaseController
{

  public function index()
    {
      $db      = \Config\Database::connect();
      $builder = $db->table('users');
      $query   = $builder->get();
      
      $data = [
        'dataUser' => $query->getResult();
      ];
        
      return view('/',$data);
    }
  
?>

// IN YOUR FILE VIEW / index.php
<html>
  <body>
    
    // if you use the model with __construct function
    <?php foreach ($dataUser as $data_user) : ?>
      <ul>
        <li>Name : <?= $data_user['name']; ?></li>
        <li>Email : <?= $data_user['email']; ?></li>
      </ul>
    <?php endforeach; ?>
    
    // if you use the query builder
    <?php foreach ($dataUser as $data_user) : ?>
      <ul>
        <li>Name : <?= $data_user->name; ?></li>
        <li>Email : <?= $data_user->email; ?></li>
      </ul>
    <?php endforeach; ?>
    
  </body>
</html>
