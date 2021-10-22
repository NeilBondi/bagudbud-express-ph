<?php

namespace App\Models;

use CodeIgniter\BaseModel;
use CodeIgniter\Model;

class Apply extends Model{

    protected $table = 'dp_applications';
    protected $primaryKey = 'apply_ID';
    protected $DBGroup = 'default';
    protected $allowedFields = ['delP_ID'];

}