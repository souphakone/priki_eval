<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Practice extends Model
{
    use HasFactory;

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    /**
     * The user who originally entered the practice in the system
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function submitter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function opinions()
    {
        return $this->hasMany(Opinion::class);
    }

    /**
     * Returns the opinion of the given user about this practice
     * @param User $user
     * @return Opinion
     */
    public function opinionOf (User $user) : ?Opinion
    {
        return $this->opinions()->where('user_id',$user->id)->first('description');
    }

    public function publicationState()
    {
        return $this->belongsTo(PublicationState::class);
    }

    /**
     * Selection of published practices
     * @return mixed
     */
    static function published()
    {
        return self::whereHas('publicationState', function ($q) {
            $q->where('slug', 'PUB');
        });
    }

    /**
     * Put the practice in published state
     */
    public function publish()
    {
        $this->publicationState()->associate(PublicationState::where('slug','PUB')->first());
        $this->save();
    }

    /**
     * All published practices
     * @return mixed
     */
    static function allPublished()
    {
        return self::published()->get();
    }

    /**
     * Returns all practices that have been modified within the last nbDays and that are in published state
     * @param $nbDays
     * @return mixed
     */
    static function publishedAndRecentlyUpdated($nbDays)
    {
        return self::published()->where('updated_at', '>=', Carbon::now()->subDays($nbDays))->get();
    }

}
