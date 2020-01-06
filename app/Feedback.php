<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $primaryKey = "feed_id";
    protected $table = "feedbacks";
}
