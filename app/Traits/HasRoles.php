<?php

namespace App\Traits;

use App\Models\Role;

trait HasRoles
{

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role)
    {
        if (is_string($role)) {
            $role = Role::firstOrCreate(['name' => $role]);
            $this->roles()->sync($role, false);
        }
    }

    public function hasRole($role)
    {
        return $this->roles->contains('name', $role);
    }

    public function removeRole($role)
    {
        $role = Role::whereName($role)->first();

        if ($role) {
            $this->roles()->detach($role->id);
        }
    }

    public function removeRoles()
    {
        $this->roles()->detach();
    }

    public function scopeIsAdmin($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'admin');
        });
    }

}
