<?php

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


function prx($arr){
    echo "<pre>";
    print_r($arr);
    die();
}

function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

function thousandsCurrencyFormat($num) {

    if($num>1000) {

          $x = round($num);
          $x_number_format = number_format($x);
          $x_array = explode(',', $x_number_format);
          $x_parts = array('k', 'm', 'b', 't');
          $x_count_parts = count($x_array) - 1;
          $x_display = $x;
          $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');

          $x_display .= $x_count_parts > 0 ? $x_parts[$x_count_parts - 1] : 0;


          return $x_display;

    }

    return $num;
  }

if (! function_exists('single_price')) {
    function single_price($product)
    {
	    $data=Product::find($product);
		$first_price=$data->productProductVariations()->where('primary_variation',1)->first()->single_sales_price;
        return $first_price;
    }
}

function getCheckProduct($id){
  $result= DB::table('products')
         ->where(function($query) use ($id){
              $query->orWhere('category_id', '=', $id)
              ->orWhere('sub_category_id', '=', $id)
              ->orWhere('sub_category_child_id', '=', $id);
          })
          ->count();
            
  return $result;
}


function getNav(){
  $result= DB::table('categories')
            ->where(['status'=>1])
            ->where('deleted_at', NULL)
            ->get();
            $arr=[];
  foreach($result as $row){
    $id = $row->id;

      $arr[$row->id]['name']=$row->name;
      $arr[$row->id]['parent_id']=$row->parent_id;
      $arr[$row->id]['slug']=$row->slug;
	   $arr[$row->id]['id']=$row->id;
  }
  $str=buildTreeView($arr,0);
  return $str;
}

$html='';

function buildTreeView($arr,$parent,$level=0,$prelevel= -1){
	global $html;
	foreach($arr as $id=>$data){
		if($parent==$data['parent_id']){
			if($level>$prelevel){
				if($html==''){
					$html.='<ul>';
				}else{
					$html.='<ul>';
				}

			}
			if($level==$prelevel){
				$html.='<li>';
			}
			$url=route("suggestion.search",$data['id']);

			if($level>$prelevel){
        $html.='<li ><a class="menu2" href="'.$url.'">'.$data['name'].'</a>';
				$prelevel=$level;
			}else{
        $html.='<li ><a class="menu1" href="'.$url.'">'.$data['name'].'</a>';
      }
			$level++;
			buildTreeView($arr,$id,$level,$prelevel);
			$level--;
		}
	}
	if($level==$prelevel){
		$html.='</li></ul>';
	}
	return $html;
}

function get_sku($n = 8) {
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    $randomString = $randomString;

    return $randomString;
}

function generateNumericOTP($n) {
    $generator = "1357902468";
    $result = "";
    for ($i = 1; $i <= $n; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
    }
    return $result;
}

function create_slug($name){
    $title = strtolower($name);
    $slug = str_replace(' ', '-', $title);
    $product = Product::where('slug', $slug)->first();
    return $product !== null ? $slug .'-1' : $slug;
}

function dunamic_meta_title(Request $request){

}
?>
