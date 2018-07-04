<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use Validator;
use Carbon\Carbon;

class Discount extends Model
{
    protected $fillable = ['amount','one_time_only','days_covered','is_valid', 'valid_till_date'];
    private $errorsMessages;

	public function isValid($discount){
		$discount['valid_till_date'] = str_replace('T', ' ', $discount['valid_till_date']);
		$validatorDiscount = Validator::make($discount,  [
			'amount' => 'numeric|min:0|max:100',
			'days_covered' => 'required|max:255',
			'one_time_only' => 'boolean',
			'is_valid' => 'boolean',
			'valid_till_date' => 'date_format:Y-m-d H:i'
        ]);

        if ($validatorDiscount->fails()){
            return false;
        }
        return true;
	}

	public function generatePromocode(){
	    $chars = "0123456789QWERTYUIOPASDFGHJKLZXCVBNM";
        $max = 8;
        $size = StrLen($chars)-1;

        $result=null;

        for($j=1; $j<=$max; $j++){
            $result.=$chars[rand(0, $size)];
        }         
        return $result;
	}
	
	public function isCorrect(){
		$now = Carbon::now();
		return $this->is_valid && $now < $this->valid_till_date;
	}

	public static function scopeByCode($query, $code){
	    return $query->where('identifier', $code);
    }

    public static function scopeIsActive($query){

        return $query->where('is_valid',1);

    }
}
