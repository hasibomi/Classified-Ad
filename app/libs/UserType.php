<?php

class UserType
{
	public static function user()
	{
		if(Auth::user()->is_admin == 0)
		{
			return 0;
		}
	}

	public static function supadmin()
	{
		if(Auth::user()->is_admin == 1)
		{
			return 1;
		}
	}

	public static function classadmin()
	{
		if(Auth::user()->is_admin == 2)
		{
			return 2;
		}
	}
}