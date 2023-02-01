<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class  User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = false;
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friendsOfMine(){
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id', 'friend_id');
    }

    public function friendOf(){
        return $this->belongsToMany('App\Models\User', 'friends', 'friend_id', 'user_id');
    }
    //вывод друзей
    public function friends(){
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()
            ->merge( $this->friendOf()->wherePivot('accepted', true)->get() );
    }
    //запрос в друзья
    public function friendRequests(){
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }
    //запрос на ожидание добавления в друзья
    public  function friendRequestsPending(){
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }
    //есть запрос на добовление в друзья
    public function hasFriendRequestsPending(User $user){
        return (bool) $this->friendRequestsPending()->where('id', $user->id)->count();
    }
    //получил запрос в друзья
    public function hasFriendRequestsReceived(User $user){
        return (bool) $this->friendRequests()->where('id', $user->id)->count();
    }
    //добавить друга
    public function addFriend(User $user){
        $this->friendOf()->attach($user->id);
    }
    //принять запрос на дружбу
    public function acceptFriendRequests(User $user){
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update([
            'accepted'=> true
        ]);
    }
    //пользователь уже в друзьях
    public function isFriendWith(User $user){
        return (bool) $this->friends()->where('id', $user->id)->count();
    }
    //удалить друга
    public function deleteFriend(User $user){
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }
    //пользователю принадлежит новость
    public function statuses(){
        return $this->hasMany('App\Models\News', 'user_id');
    }
    public function categoryes(){
        return $this->hasMany('App\Models\Category', 'id');
    }
    public function postes(){
        return $this->hasMany('App\Models\Post', 'user_id');
    }
    public function tidings(){
        return $this->hasMany('App\Models\Tiding', 'user_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment', 'user_id');
    }
}
