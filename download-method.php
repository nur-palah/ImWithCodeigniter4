<?php

namespace App\Controllers;

use App\Models\dataModel;

class Crud extends BaseController
{
  protected $data;

  public function __construct()
    {
      $this->data = new dataModel();
    }

  public function download($id)
    {
      $file = $this->data->find($id);

      return $this->response->download('directory/' . $file['file_name'], null);
    }
?>
