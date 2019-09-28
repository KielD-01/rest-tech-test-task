<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserTenant
 * @package App\Models
 * @property integer id
 * @property integer user_id
 * @property string host
 * @property string database
 * @property string db_user
 * @property string db_password
 * @property User user
 * @property array config
 */
class UserTenant extends Model
{
    protected $fillable = [
        'user_id',
        'host',
        'database',
        'db_user',
        'db_password',
    ];

    protected $appends = [
        'config'
    ];

    protected $casts = [
        'user_id' => 'int'
    ];

    /**
     * @return BelongsTo|User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return array
     */
    public function getConfigAttribute()
    {
        return [
            'host' => $this->host,
            'database' => $this->database,
            'username' => $this->db_user,
            'password' => $this->db_password
        ];
    }
}
