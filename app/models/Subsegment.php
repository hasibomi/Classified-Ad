<?php

class Subsegment extends Eloquent
{
	protected $fillable = ["catagory_id", "subsegment_name", "segment_id"];

	public function catagory()
	{
		return $this->belongsTo("Catagory", "catagory_id", "id");
	}

	public function segment()
	{
		return $this->belongsTo("Segment", "segment_id", "id");
	}
}