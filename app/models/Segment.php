<?php

class Segment extends Eloquent
{
	protected $fillable = ["segment_name", "catagory_id"];

	public function catagory()
	{
		return $this->belongsTo("Catagory", "catagory_id", "id");
	}
}