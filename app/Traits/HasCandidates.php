<?php

namespace App\Traits;

trait HasCandidates
{

    public function candidates()
    {
        return $this->belongsToMany('App\Models\User', 'my_candidates', 'user_id', 'candidate_id')->withTimestamps()->orderBy('name');
    }

    public function hasCandidate($candidateId)
    {
        return $this->candidates()->where('candidate_id', $candidateId)->exists();
    }

    public function addCandidate($candidateId)
    {
        $this->candidates()->attach($candidateId);
    }

    public function removeCandidate($candidateId)
    {
        $this->candidates()->detach($candidateId);
    }

}
