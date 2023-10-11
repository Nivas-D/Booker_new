<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable{
    use Notifiable, HasFactory,HasRoles;

    protected $guard = 'admin';
    // protected $fillable = ['name', 'email', 'password', 'picture' ,'role_id'];
    protected $fillable = ['name','first_name', 'last_name','email', 'password', 'picture' ,'role_id','role'];
    protected $hidden = ['password', 'remember_token'];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function profilePicture(){
        if ($this->picture) {
            return "/{$this->picture}";
        }
        return 'http://i.pravatar.cc/200';
    }

    public function isAdmin(){
        return $this->role_id == 1;
    }

    public function isCreator(){
        return $this->role_id == 2;
    }

    public function isMember(){
        return $this->role_id == 3;
    }
}
