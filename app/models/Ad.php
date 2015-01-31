<?php

class Ad extends Eloquent
{
	protected $fillable = ["ad_id", "user_id", "catagory_id", "segment_id", "subsegment_id", "district_id", "thana_id", "ad_title", "ad_description", "product_price", "ad_image", "ad_publish"];

	public function user()
	{
		return $this->belongsTo("User", "user_id", "id");
	}

	public function catagory()
	{
		return $this->belongsTo("Catagory", "catagory_id", "id");
	}

	public function segment()
	{
		return $this->belongsTo("Segment", "segment_id", "id");
	}

	public function subsegment()
	{
		return $this->belongsTo("Subsegment", "subsegment_id", "id");
	}

	public function district()
	{
		return $this->belongsTo("District", "district_id", "id");
	}

	public function thana()
	{
		return $this->belongsTo("Thana", "thana_id", "id");
	}
}