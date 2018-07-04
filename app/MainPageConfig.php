<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Content;

class MainPageConfig
{
	public function __get($name){
		$result = Content::where('name',$name)->first();
		if($result){
			return $result->value;
		}
		else{
			return "Null";
		}
	}
}