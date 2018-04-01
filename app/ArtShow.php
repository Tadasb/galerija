<?php

namespace App;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtShow extends Model implements HasMedia
{

    protected $casts = ['data' => 'object'];
    use HasMediaTrait;
    use SoftDeletes;
    
    public function getStartsAtDotAttribute($attr) {
    	
    	return Carbon::parse($this->starts_at)->format('Y.m.d');

    }

    public function getEndsAtDotAttribute($attr) {
    	if(Carbon::parse($this->starts_at)->diffInYears(Carbon::parse($this->ends_at)) == 0) {
    		return Carbon::parse($this->ends_at)->format('m.d');
    	}

    	return Carbon::parse($this->ends_at)->format('Y.m.d');
    	
    }

    public function getStartingTimeFormatedAttribute($attr) {
    	
    	return Carbon::parse($this->starting_time)->format('H:i');

    }
}
