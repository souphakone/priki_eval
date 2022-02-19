<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function practices()
    {
        return $this->hasMany(Practice::class)->orderBy('publication_state_id');
    }

    /**
     * Get the practices of the domain ordered on the slug value of their state (for now)
     * @return mixed
     */
    public function practicesOrderedByState()
    {
        return $this->practices->sortBy(function($p) {
            return $p->publicationState->slug;
        });
    }

    public function publishedPractices()
    {
        return $this->practices()->whereHas('publicationState', function ($q) {
            $q->where('slug', 'PUB');
        })->get();
    }
}
