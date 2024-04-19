<?php

namespace App\Models;

use CodeIgniter\Model;

class SubCategory extends Model
{
    protected $table = 'tbl_subcategories';

    protected $primaryKey = 'subcategory_id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = true;

    protected $protectFields = true;

    protected $allowedFields = [];

    protected bool $allowEmptyInserts = false;

    protected bool $updateOnlyChanged = true;

    protected array $casts = [];

    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;

    protected $dateFormat = 'datetime';

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';

    protected $deletedField = 'is_deleted';

    // Validation
    protected $validationRules = [];

    protected $validationMessages = [];

    protected $skipValidation = false;

    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;

    protected $beforeInsert = [];

    protected $afterInsert = [];

    protected $beforeUpdate = [];

    protected $afterUpdate = [];

    protected $beforeFind = [];

    protected $afterFind = [];

    protected $beforeDelete = [];

    protected $afterDelete = [];
}
