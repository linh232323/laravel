<?php namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class Currency extends Model {

	protected $table = 'currencies';
        
    protected $guarded = array('id');

	protected $fillable = ['title', 'code', 'symbol_left', 'symbol_right', 'decimal_place', 'value', 'status'];

    private $code;

    private $currencies = array();

    public static function langs(){
        $langs=array(
            'title.required'                =>  "You can't leave title empty !!",
            'code.required'                 =>  "You can't leave code empty !!",
            'value.required'                =>  "You can't leave value empty !!",
        );
        return $langs;
    }
    public static function rules(){
        $rules=array(
            'title'                 =>   'required',
            'value'                 =>   'required',
            'code'                  =>   'required',
        );
        return $rules;
    }
    public static function format($number, $currency = '', $value = '', $format = true) {
        $currency=DB::table('currencies')->where('id',Session::get('currency'))->first();
        if ($value) {
            $value = $value;
        } else {
            $value = $currency->value;
        }
        if ($value) {
            $value = (float)$number * $value;
        } else {
            $value = $number;
        }
        $string = '';
        if (($currency->symbol_left) && ($format)) {
            $string .= $currency->symbol_left." ";
        }
        if ($format) {
            $decimal_point = ',';
        } else {
            $decimal_point = '.';
        }
        if ($format) {
            $thousand_point = '.';
        } else {
            $thousand_point = '';
        }
        $string .= number_format(round($value, (int)$currency->decimal_place), (int)$currency->decimal_place, $decimal_point, $thousand_point);
        if (($currency->symbol_right) && ($format)) {
            $string .= " ".$currency->symbol_right;
        }
        return $string;
    }
}
