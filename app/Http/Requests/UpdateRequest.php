<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    protected function getSegmentFromEnd($position_from_end = 1)
    {
        $segments = $this->segments();
        return $segments[sizeof($segments) - $position_from_end];
    }
}
