<?php

class Thana extends Eloquent
{
	protected $fillable = ["thana_name", "district_id"];

	public function district()
	{
		return $this->belongsTo("District", "district_id", "id");
	}
}