<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\MasterUser\SectionModel;
use App\Models\MasterUser\DivisionModel;
use App\Models\MasterUser\PositionModel;
use Illuminate\Notifications\Notifiable;
use App\Models\MasterUser\DepartmentModel;
use App\Models\MasterUser\OrganizationModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'employee_name',
        'email',
        'password',
        'nik',
        'org_id',
        'div_id',
        'dept_id',
        'section_id',
        'position_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function organization ()
    {
        return $this->belongsTo(OrganizationModel::class, 'org_id', 'id_org');
    }
    public function division ()
    {
        return $this->belongsTo(DivisionModel::class, 'div_id', 'id_division');
    }
    public function department ()
    {
        return $this->belongsTo(DepartmentModel::class, 'dept_id', 'id_department');
    }
    public function section ()
    {
        return $this->belongsTo(SectionModel::class, 'section_id', 'id_section');
    }
    public function position ()
    {
        return $this->belongsTo(PositionModel::class, 'position_id', 'id_position');
    }

    private static function _query($dataFilter)
    {
        $data= self::select(
            'users.id as id',
            'users.name as name',
            'users.email as email',
            'users.department as department',
            'users.nik as nik',
            'users.email_verified_at',
            'users.created_at',
            'users.updated_at',
            'users.employee_name as employee_name',
            'organization.name as org_name',
            'division.name as div_name',
            'department.name as dept_name',
            'section.name as section_name',
            'position.name as position_name',
        );

        $data->leftJoin('organization', 'users.org_id', '=', 'organization.id_org');
        $data->leftJoin('division', 'users.div_id', '=', 'division.id_division');
        $data->leftJoin('department', 'users.dept_id', '=', 'department.id_department');
        $data->leftJoin('section', 'users.section_id', '=', 'section.id_section');
        $data->leftJoin('position', 'users.position_id', '=', 'position.id_position');

        if (isset($dataFilter['search'])) {
            $search = $dataFilter['search'];
            $data->where(function ($query) use ($search) {
                $query->where('users.employee_name', 'ILIKE', "%{$search}%")
                    ->orWhere('users.name', 'ILIKE', "%{$search}%")
                    ->orWhere('users.email', 'ILIKE', "%{$search}%")
                    ->orWhere('division.name', 'ILIKE', "%{$search}%")
                    ->orWhere('section.name', 'ILIKE', "%{$search}%")
                    ->orWhere('department.name', 'ILIKE', "%{$search}%");
            });
        }

        $result = $data;
        return $result;
    }
    public static function getData($dataFilter, $settings)
    {
        return self::_query($dataFilter)->offset($settings['start'])
            ->limit($settings['limit'])
            ->orderBy('created_at', 'DESC')
            ->get();
    }
    public static function countData($dataFilter)
    {
        return self::_query($dataFilter)->get()->count();
    }

}
