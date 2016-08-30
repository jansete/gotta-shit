<?php

namespace PokemonBuddy\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth as Auth;

class PlaceComment extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'place_comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'place_id', 'comment'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    protected $dates = ['deleted_at'];

    /**
     * A Comment belongs to User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('PokemonBuddy\Entities\User');
    }

    /**
     * A Comment belongs to Place.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function place()
    {
        return $this->belongsTo('PokemonBuddy\Entities\Place');
    }

    public function getIsAuthorAttribute()
    {
        $isAuthor = false;
        if (Auth::check()) {
            if ($this->user_id == Auth::user()->id) {
                $isAuthor = true;
            }
        }

        return $isAuthor;
    }

    public function getPublicationDateAttribute()
    {
        if($this->created_at->diffInDays() >= 1) {
            return ucfirst($this->created_at->formatLocalized('%A %d %B %Y %H:%M'));
        } else {
            return $this->created_at->diffForHumans();
        }
    }
}
