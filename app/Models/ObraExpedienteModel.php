<?php

namespace App\Models;

use CodeIgniter\Model;


class ObraExpedienteModel extends Model
{
    protected $table = 'obra_expediente';
    protected $allowedFields =['obra','num_expediente','existencia','observaciones'];

}