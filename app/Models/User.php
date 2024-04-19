<?php

namespace App\Models;

use AllowDynamicProperties;
use App\Enums\Role;
use CodeIgniter\Model;
use Faker\Generator;

#[AllowDynamicProperties]
class User extends Model
{
    protected $table = 'tbl_users';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $useSoftDeletes = false;

    protected $protectFields = true;

    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'role',
    ];

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

    protected $beforeUpdate = ['setUpdatedAtColumn'];

    protected $afterUpdate = [];

    protected $beforeFind = [];

    protected $afterFind = [];

    protected $beforeDelete = [];

    protected $afterDelete = [];

    public function fake(Generator &$faker): array
    {
        $gender = ['male', 'female'][rand(0, 1)];

        return [
            'first_name' => $faker->firstName($gender),
            'last_name' => $faker->lastName($gender),
            'email' => $faker->email(),
            'password' => password_hash('password', PASSWORD_BCRYPT),
            'gender' => $gender,
            'role' => Role::seedForUsers(Role::USER),
        ];
    }

    protected function hashPassword(array $data): array
    {
        if (!isset($data['data']['password'])) {
            return $data;
        }

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password']);

        return $data;
    }

    protected function setUpdatedAtColumn(array $data): array
    {
        $data['data'][$this->updatedField] ?? $data[$this->updatedField] = date('Y-m-d H:i:s');

        return $data;
    }
}
