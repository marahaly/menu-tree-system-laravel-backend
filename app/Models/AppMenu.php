<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppMenu extends Model
{
    protected $table = 'app_menu';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'id', 'menu_title', 'menu_no', 'menu_parent_no', 'depth',
        'is_delete', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];
}
