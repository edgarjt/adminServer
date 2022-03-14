<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'servers';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'host',
        'priority',
        'vips',
        'vlan',
        'so',
        'service',
        'port',
        'logic_cpu',
        'ram',
        'hd_local',
        'hd_external',
        'user_server',
        'id_user'
    ];

    /**
     * @var array
     */
    protected $hidden = [];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
