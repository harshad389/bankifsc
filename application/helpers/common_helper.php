<?php
    define("IV", 'fdsfds85435nfdft'); #Initialization vector for ecryption and decryption
    define("KEY", '89432hjfsd891786'); #key for encryption and decryption
	
	/*
	@Description	: Common Helper function to print the array in readable format
	@Author			: Bhagyesh Mistry
	@Input			: ARRAY
	@Output			: ARRAY PRINT
	@Date			: 03-03-2016
	*/
    
    function pr($array)
    {
        echo "<pre>"; print_r($array); echo "</pre>";
    }
	
	/*
	@Description	: Common Helper function to get the page title
	@Author			: Bhagyesh Mistry
	@Input			: Page Name
	@Output			: Fromated Page Name
	@Date			: 14-06-2016
	*/
    
    function get_page_title($page_title = NULL)
    {
		if($page_title != '')
		{
			$page_title = trim($page_title).PAGE_TITLE_POSTFIX;
		}
		else
		{
			$page_title = COMMON_PAGE_TITLE;
		}
		
		return $page_title;
    }
	
	/*
	@Description	: Common Helper function to get the current date & time for inserting inot database
	@Author			: Bhagyesh Mistry
	@Input			: 
	@Output			: date into Y-m-d H:i:s format
	@Date			: 03-03-2016
	*/
    
    function get_current_date_time()
    {
        return date('Y-m-d H:i:s');
    }

    /*
	@Description	: Common Helper function to get the converted date for display
	@Author			: Hiral Shukla
	@Input			: 
	@Output			: date into d M y format
	@Date			: 04-04-2016
	*/
    
    function get_display_date($date)
    {
        return date('d M y', strtotime($date));
    }

    /*
	@Description	: Common Helper function to get the converted date & time for display
	@Author			: Hiral Shukla
	@Input			: 
	@Output			: date into d M Y h:i a  format
	@Date			: 04-04-2016
	*/
    
    function get_display_date_time($date)
    {
        return date('d M y h:i a', strtotime($date));
    }

    /*
    @Description: Helper function for encrypt Script
    @Author: Tejash Bagadiya using code of Mehul Modh
    @Input: data
    @Output: encrypted data
    @Date: 08-03-2016
    */
	
	function helper_encrypt_url_key($string,$if_url_encode_string = TRUE)
	{
		$CI = &get_instance();

		$key = $CI->config->item('custom_encryption_key');

		$encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));

		if($if_url_encode_string)
		{
			$encrypted = urlencode($encrypted);
		}
		
		return $encrypted;
	}
	
	/*
	@Description: Helper function for decrypt Script
	@Author: Tejash Bagadiya using code of Mehul Modh
	@Input: encrypted data
	@Output: decrypted data
	@Date: 08-03-2016
	*/
	
	function helper_decrypt_url_key($string)
	{
		$CI = &get_instance();

		$key = $CI->config->item('custom_encryption_key');

		$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
		
		return $decrypted;
	}
        
	/*
	@Description: Helper function to get pagination html
	@Author: Mehul Modh
	@Input: Parameters
	@Output: Pagination html
	@Date: 25-02-2016
	*/

	function helper_get_pagination($base_url = '', $total_rows = 0, $per_page = 0, $uri_segment = 3,  $num_links = 2 , $suffix = '' )
	{
		$CI = &get_instance();

		$per_page = $per_page;
		
		$config['uri_segment'] 		= $uri_segment;
		
		$config['base_url'] 		= $base_url;
		$config['suffix']			= $suffix;
		$config['per_page'] 		= $per_page;
		$config['num_links'] 		= $num_links;
		$config['total_rows'] 		= $total_rows;
		$config['use_page_numbers'] = TRUE;
		
		$config['next_tag_open'] 	= '<li>';
		$config['next_tag_close'] 	= '</li>';
		$config['next_link'] 		= '&gt;';
		$config['last_link'] 		= '&gt;&gt;';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['prev_tag_open'] 	= '<li>';
		$config['prev_tag_close'] 	= '</li>';
		$config['prev_link'] 		= '&lt;';
		$config['first_link'] 		= '&lt;&lt;';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close']	= '</li>';
		$config['cur_tag_open'] 	= '<li class="active"><a>';
		$config['cur_tag_close'] 	= '</a></li>';
		
		$config['attributes'] = array('class' => 'pagination_link');
                
        $config['attributes']['rel'] = FALSE;
		
		$CI->load->library('pagination');

		$CI->pagination->initialize($config);

		return $CI->pagination->create_links();
	}

	/*
	@Description: Helper function to get how much time taken html
	@Author: Hiral Shukla
	@Input: Parameters
	@Output: Time html
	@Date: 25-02-2016
	*/

	function time_ago($time_ago)
    {
        $result = '';
        $cur_time   = time();
        $time_elapsed   = $cur_time - $time_ago;
        $seconds    = $time_elapsed ;
        $minutes    = round($time_elapsed / 60 );
        $hours      = round($time_elapsed / 3600);
        $days       = round($time_elapsed / 86400 );
        $weeks      = round($time_elapsed / 604800);
        $months     = round($time_elapsed / 2600640 );
        $years      = round($time_elapsed / 31207680 );
        // Seconds
        if($seconds <= 60){
            $result = "Just now ";
        }
        //Minutes
        else if($minutes <=60){
            if($minutes==1){
                $result = "1 minute ";
            }
            else{
                $result = "Just now " ;
            }
        }
        //Hours
        else if($hours <=24){
            if($hours==1){
                $result = "1 hour ";
            }else{
                $result = "$hours hours ";
            }
        }
        //Days
        else if($days <= 7){
            if($days==1){
                $result = "1 day ";
            }else{
                $result = "$days days ";
            }
        }
        //Weeks
        else if($weeks <= 4.3){
            if($weeks==1){
                $result = "1 week ";
            }else{
                $result = "$weeks weeks ";
            }
        }
        //Months
        else if($months <=12){
            if($months==1){
                $result = "1 month ago";
            }else{
                $result = "$months months ";
            }
        }
        //Years
        else{
            if($years==1){
                $result = "1 year ";
            }else{
                $result = "$years years ";
            }
        }
    
        return $result;
    } 

	/*
	@Description: Helper function to get random string
	@Author: Tejash Bagadiya
	@Input: Parameters
	@Output: generate random string
	@Date: 14-04-2016
	*/

    function randomString($length, $type = '') {
	  // Select which type of characters you want in your random string
	  switch($type) {
	    case 'num':
	      // Use only numbers
	      $salt = '1234567890';
	      break;
	    case 'lower':
	      // Use only lowercase letters
	      $salt = 'abcdefghijklmnopqrstuvwxyz';
	      break;
	    case 'upper':
	      // Use only uppercase letters
	      $salt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	      break;
	    case 'product':
	      // Use only for unique product name
	      $salt = 'abcdefghijklmnopqrstuvwxyz1234567890';
	      break;
	    default:
	      // Use uppercase, lowercase, numbers, and symbols
	      $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	      break;
	  }
	  $rand = '';
	  $i = 0;
	  while ($i < $length) { // Loop until you have met the length
	    $num = rand() % strlen($salt);
	    $tmp = substr($salt, $num, 1);
	    $rand = $rand . $tmp;
	    $i++;
	  }
	  return $rand; // Return the random string
	}

	/*
	@Description: Helper function to get country code and currency code from ip address
	@Author: Hiral Shukla
	@Input: Ip address of user
	@Output: Ip address of user
	@Date: 1-06-2016
	*/

	function getLocationInfoByIp()
	{
	    $client  = @$_SERVER['HTTP_CLIENT_IP'];

	    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

	    $remote  = @$_SERVER['REMOTE_ADDR'];
		$result =array();

	    if(filter_var($client, FILTER_VALIDATE_IP)){

	        $ip = $client;

	    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){

	        $ip = $forward;

	    }else{

	        $ip ="122.170.109.155";
	        //$ip = "109.177.56.225" ;
	        //$ip = "196.216.48.67";
	        // $ip = $remote;

	    }

	    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));    

	    if($ip_data && $ip_data->geoplugin_countryName != null){

		    $result = $ip_data;

	    }

	    return $result;
	}

    /*
	@Description: Helper function to formated price
	@Author: Hiral Shukla
	@Input: price and currency type
	@Output: amount
	@Date: 28-04-2016
	*/

	function format_price($amount,$currency)
    {
    	
    	$CI = & get_instance();
		$currency_session = $CI->session->userdata('currency_session');
		$CI->load->model('common_model');
		
		$where_data = array("type" => "from_currency","value" =>  $currency);

		$currencydata = $CI->common_model->select_query('currency_conversion_rate',$where_data);

		foreach ($currencydata as $key => $value) {		
			$con_rate = $value[$currency_session];
			$final_amount=round($amount * $con_rate);
			//$data[$value['id']] = $value['user_name'];				
		}
		
		return $final_amount;
    }

     /*
	@Description: Helper function to formated price
	@Author: Hiral Shukla
	@Input: price and currency type
	@Output: amount
	@Date: 28-04-2016
	*/

	function currency($final_amount)
    {
    	$currencySymbol="";
    	$CI = & get_instance();
    	$currency_session = $CI->session->currency['code'];
    	if($currency_session == 'AED')
		{
			$currencySymbol= 'د.إ';
		}
		if($currency_session == 'ARS')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'AUD')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'BRL')
		{
			$currencySymbol= 'R$';
		}
		if($currency_session == 'CAD')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'CNY')
		{
			$currencySymbol= '&#165;';
		}
		if($currency_session == 'EGP')
		{
			$currencySymbol= 'E£';
		}
		if($currency_session == 'EUR')
		{
			$currencySymbol= '&#8364;';
		}
		if($currency_session == 'GBP')
		{
			$currencySymbol= '&#163;';
		}
		if($currency_session == 'HKD')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'INR')
		{
			$currencySymbol= '&#8377;';
		}
		if($currency_session == 'JPY')
		{
			$currencySymbol= '&#165;';
		}
		if($currency_session == 'KRW')
		{
			$currencySymbol= '₩';
		}
		if($currency_session == 'MXN')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'MYR')
		{
			$currencySymbol= 'RM';
		}
		if($currency_session == 'RUB')
		{
			$currencySymbol= '₽';
		}
		if($currency_session == 'SAR')
		{
			$currencySymbol= 'ر.س';
		}
		if($currency_session == 'SGD')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'USD')
		{
			$currencySymbol= '&#36;';
		}
		if($currency_session == 'ZAR')
		{
			$currencySymbol= 'R';
		}
		// elseif(!$currencySymbol)
		// {
		// 	$currencySymbol= $currency_session;
		// }
			$final=$final_amount*$CI->session->currency['value'];
			$final=round($final,2);
		return $currencySymbol.$final;
    }

    /*
	@Description: Helper function to get unique url
	@Author: Sachin Koshti
	@Input: product name
	@Output: URL name
	@Date: 30-05-2016
	*/
	
	function create_unique_url($product_name)
	{
		$string = preg_replace('/[-]+/', '-', preg_replace('/[^a-zA-Z0-9_.]/', '-', strtolower(trim($product_name))));
		
		return ltrim(rtrim($string,'-'),'-');
	}


	/*
    @Description: Get filter printing ratio
    @Author: Vivek Patel
    @Input: $width = image_width, $height = image_height
    @Output: list of printing image size ratio
    @Date:25-05-2016
    */

    function list_of_image_ratio($width = 1, $height = 1)
    {
		$img_ratio = null;
		$min_filter_width = null;
		$min_filter_height = null;
    	$CI =& get_instance();
		$CI->load->model('printing_service_model');
		$CI->load->model('mypaintings_model');

        // get service code
        $service_code = get_printing_service_code(); 
        
        // fetch all ratio from pricing size
        foreach($service_code as $item) 
        {
            foreach($item as $value)
            {
                $data['service_code'.$value] = $CI->printing_service_model->get_ratio_for_printing_size($value);
            }
        }

        // calculate image_ratio
        if($width !=0 && $height !=0)
		{
			$min_filter_width = $width / MIN_PIXEL_PER_INCH;
			$min_filter_height = $height / MIN_PIXEL_PER_INCH;
			if ($width <= $height) {
				$img_ratio = $width / $height;
			} else {
				$img_ratio = $height / $width;
			}
		}

        // filter list of printing image size ratio
        foreach ($service_code as $item) 
        {
            foreach($item as $value)
            {
                $data1['filter_value'.$value] = $CI->printing_service_model->get_printing_ratio($min_filter_width, $min_filter_height, $img_ratio, $data['service_code'.$value]);        
            }
        }

        return $data1;
    }

	/*
    @Description: Get printing service code
    @Author: Vivek Patel
    @Output: array of printing service code
    @Date:25-05-2016
    */

    function get_printing_service_code()
    {
    	$CI =& get_instance();
        $service_code =  array('canvas', 'paper', 'translite');
        
        $data = $CI->printing_service_model->get_printing_service_option($service_code);
        
        return $data;
    }

     /*
	@Description: Helper function to get proper image name
	@Author: Sachin Koshti
	@Input: Image name, Unique SKU, Image Number
	@Output: Proper Image name
	@Date: 01-06-2016
	*/
	
	function create_image_name($image,$sku,$number)
	{
		$CI = &get_instance(); 
		$img_array = explode('.',$image);
		$ext = end($img_array);
		$image_name = $sku.'-'.$number.'.'.$ext;
		$temp_path = $CI->config->item('product_image_temp_path').check_and_create_temp_dir().'/';
		$number--;
		do {
			$number++;
			$image_name = $sku.'-'.$number.'.'.$ext;
		} while (file_exists($temp_path.$image_name));
		return $image_name;
	}
	
	/*
	@Description	: Function to convert the price in the given currency
	@Author			: Bhagyesh Mistry
	@Input			: Amount, From Currency, To Currency
	@Output			: Converted Amount
	@Date			: 02-06-2015
	*/
	
	function convert_currency($amount, $from_currency, $to_currency)
	{
		$CI = &get_instance();
		
		if(isset($CI->CURRENCY_CONVERSION_RATE) && count($CI->CURRENCY_CONVERSION_RATE) > 0)
		{
			if(isset($CI->CURRENCY_CONVERSION_RATE[$from_currency][$to_currency]))
			{
				$amount = $amount * $CI->CURRENCY_CONVERSION_RATE[$from_currency][$to_currency];
				
				$amount = round_number($amount);
			}
		}
		
		return $amount;
	}

	/*
	@Description	: Function to ceil, floor or round the given number
	@Author			: Bhagyesh Mistry
	@Input			: number (Double)
	@Output			: formatted number (Double)
	@Date			: 01-06-2015
	*/
	
	function ceil_number($amount, $precesion = 2)
	{
		return ceil($amount * pow(10, $precesion)) / pow(10, $precesion);
	}
	
	function floor_number($amount, $precesion = 2)
	{
		return floor($amount * pow(10, $precesion)) / pow(10, $precesion);
	}
	
	function round_number($amount, $precesion = 2)
	{
		return round($amount * pow(10, $precesion)) / pow(10, $precesion);
	}
	
	/*
	@Description	: Common Helper function to get the printing price for standard license by adding marketplacefees + royalty + shipping etc.
	@Author			: Bhagyesh Mistry
	@Input			: Original printing price (Double)
	@Output			: Final printing price with added fees (Double)
	@Date			: 01-06-2016
	*/
    
    function get_print_price_standard($price, $artist_royalty = NULL)
    {
		$CI = &get_instance();
		
		if(isset($CI->MARKETPLACE_FEE_CONFIG) && count($CI->MARKETPLACE_FEE_CONFIG) > 0)
		{
			$additional_price = 0;
			
			if(isset($CI->MARKETPLACE_FEE_CONFIG['marketplace_fee_print_standard_license']))
			{
				$additional_price += $price * $CI->MARKETPLACE_FEE_CONFIG['marketplace_fee_print_standard_license'] / 100;
			}
			
			if(isset($CI->MARKETPLACE_FEE_CONFIG['shipping_fee_print_standard_license']))
			{
				$additional_price += $price * $CI->MARKETPLACE_FEE_CONFIG['shipping_fee_print_standard_license'] / 100;
			}
			
			if($artist_royalty != '')
			{
				$additional_price += $price * $artist_royalty / 100;
			}
			else if(isset($CI->MARKETPLACE_FEE_CONFIG['artist_royalty_print_standard_license']))
			{
				$additional_price += $price * $CI->MARKETPLACE_FEE_CONFIG['artist_royalty_print_standard_license'] / 100;
			}
			
			$price += $additional_price;
			
			$price = round_number($price);
		}
		
		return $price;
    }
	
	/*
	@Description	: Common Helper function to get the printing price for limited license by adding marketplacefees + royalty + shipping etc.
	@Author			: Bhagyesh Mistry
	@Input			: Original printing price (Double)
	@Output			: Final printing price with added fees (Double)
	@Date			: 02-06-2016
	*/
    
    function get_print_price_limited($price, $price_currency, $original_price, $original_price_currency, $artist_royalty = NULL)
    {
		$CI = &get_instance();
		
		if(isset($CI->MARKETPLACE_FEE_CONFIG) && count($CI->MARKETPLACE_FEE_CONFIG) > 0)
		{
			$additional_price = 0;
			
			if(isset($CI->MARKETPLACE_FEE_CONFIG['marketplace_fee_print_limited_license']))
			{
				$additional_price += $price * $CI->MARKETPLACE_FEE_CONFIG['marketplace_fee_print_limited_license'] / 100;
			}
			
			if(isset($CI->MARKETPLACE_FEE_CONFIG['shipping_fee_print_limited_license']))
			{
				$additional_price += $price * $CI->MARKETPLACE_FEE_CONFIG['shipping_fee_print_limited_license'] / 100;
			}
			
			if($artist_royalty != '')
			{
				if($price_currency == $original_price_currency)
				{
					$additional_price += $original_price * $artist_royalty / 100;
				}
				else
				{
					$temp_price = $original_price * $artist_royalty / 100;
					
					$temp_price = convert_currency($temp_price, $original_price_currency, $price_currency);
					
					$additional_price += $temp_price;
				}
			}
			else if(isset($CI->MARKETPLACE_FEE_CONFIG['artist_royalty_print_limted_license']))
			{
				if($price_currency == $original_price_currency)
				{
					$additional_price += $original_price * $CI->MARKETPLACE_FEE_CONFIG['artist_royalty_print_limted_license'] / 100;
				}
				else
				{
					$temp_price = $original_price * $CI->MARKETPLACE_FEE_CONFIG['artist_royalty_print_limted_license'] / 100;
					
					$temp_price = convert_currency($temp_price, $original_price_currency, $price_currency);
					
					$additional_price += $temp_price;
				}
			}
			
			$price += $additional_price;
			
			$price = round_number($price);
		}
		
		return $price;
    }
	
	/*
	@Description	: Common Helper function to Crop Image from different angles using Imagick library.
	@Author			: Sachin Koshti
	@Input			: Image, New Required Height/width
	@Output			: Cropped Image
	@Date			: 10-06-2016
	*/	
	
	function crop_image($image, $new_w, $new_h, $focus = 'center')
	{
		$w = $image->getImageWidth();
		$h = $image->getImageHeight();

		if ($w > $h) {
			$resize_w = $w * $new_h / $h;
			$resize_h = $new_h;
		}
		else {
			$resize_w = $new_w;
			$resize_h = $h * $new_w / $w;
		}
		$image->resizeImage($resize_w, $resize_h, Imagick::FILTER_LANCZOS, 0.9);

		switch ($focus) {
			case 'northwest':
				$image->cropImage($new_w, $new_h, 0, 0);
				break;

			case 'center':
				$image->cropImage($new_w, $new_h, ($resize_w - $new_w) / 2, ($resize_h - $new_h) / 2);
				break;

			case 'northeast':
				$image->cropImage($new_w, $new_h, $resize_w - $new_w, 0);
				break;

			case 'southwest':
				$image->cropImage($new_w, $new_h, 0, $resize_h - $new_h);
				break;

			case 'southeast':
				$image->cropImage($new_w, $new_h, $resize_w - $new_w, $resize_h - $new_h);
				break;
		}
	}
	
	/*
	@Description	: Common Helper function to Resize Image using Imagick library.
	@Author			: Sachin Koshti
	@Input			: Image, New Required Height/width
	@Output			: Resized Image
	@Date			: 11-06-2016
	*/		
	
	function resize_image($image, $new_w, $new_h)
	{
		$image->resizeimage(
			$new_w,
			$new_h,
			\Imagick::FILTER_LANCZOS,
			1
		);
	}
	
	/*
	@Description	: Common Helper function to get zoom level of image.
	@Author			: Sachin Koshti
	@Input			: Zoom level & New width & height
	@Output			: New Width & Height
	@Date			: 15-06-2016
	*/		
	
	function get_zoom_level($level = 0,$width,$height)
	{
		$extra = $level * 50;
		$return['width'] = $width + $extra;
		$return['height'] = $height + $extra;
		return $return;
	}
	
	/*
	@Description	: Common Helper function to directory name based on ID.
	@Author			: Sachin Koshti
	@Input			: ProductID or UserID
	@Output			: Folder Name
	@Date			: 15-06-2016
	*/		
	
	function get_dir($id)
	{
		return ceil($id / 1000) * 1000;
	}
	
	/*
	@Description	: Common Helper function to check temp directory exists or not, If not then create new one
	@Author			: Sachin Koshti
	@Input			: None
	@Output			: Temp Directory Name
	@Date			: 15-06-2016
	*/

	function check_and_create_temp_dir()
	{
		$CI = &get_instance(); 
		$date = new DateTime(date('Y-m-d'));
		$temp_dir = $date->getTimestamp();
		$dir_path = $CI->config->item('product_image_temp_path').$temp_dir;
		if (!file_exists($dir_path) && !is_dir($dir_path)) 
		{
			mkdir($dir_path,0777);
			chmod($dir_path, 0777);
			$org_dir_path = $CI->config->item('product_image_temp_path').$temp_dir.'/original';
			mkdir($org_dir_path,0777);
			chmod($org_dir_path, 0777);
			copy($CI->config->item('product_image_temp_path').'index.html', $dir_path.'/index.html');
			copy($CI->config->item('product_image_temp_path').'index.html', $org_dir_path.'/index.html');
		}
		return $temp_dir;
	}
	
	/*
	@Description	: Common Helper function to check original Image directory exists or not, If not then create new one
	@Author			: Sachin Koshti
	@Input			: None
	@Output			: Temp Directory Name
	@Date			: 15-06-2016
	*/

	function check_and_create_original_image_dir($temp_dir)
	{
		$CI = &get_instance(); 
		$dir_path = $CI->config->item('original_image_temp_path').$temp_dir;
		if (!file_exists($dir_path) && !is_dir($dir_path)) 
		{
			mkdir($dir_path,0777);
			chmod($dir_path, 0777);
			copy($CI->config->item('original_image_temp_path').'index.html', $dir_path.'/index.html');
		}
		return $temp_dir;
	}	
	
	/*
	@Description            : Common Helper function to check Image exists or not on remote URL
	@Author			: Sachin Koshti
	@Input			: URL
	@Output			: true / false
	@Date			: 21-06-2016
	*/
	
	function url_exists($url)
	{
	   $headers=get_headers($url);
	   return stripos($headers[0],"200 OK")?true:false;
	}

	/*
	@Description	: Common Helper function to create gift code
	@Author			: Mehul Modh
	@Input			: 
	@Output			: Gift code
	@Date			: 30-06-2016
	*/
	
	function create_gift_code()
	{
		$CI = &get_instance(); 

	   	$length = 16;

		$gift_code = substr(str_shuffle("123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		
		$CI->load->model('gift_voucher_registration_model');

		$if_gift_code_exists = $CI->gift_voucher_registration_model->check_if_gift_code_exists($gift_code);

		if($if_gift_code_exists)
		{
			return create_gift_code();
		}

		return $gift_code;
	}
        
	/*
	@Description            : Common Helper function to create gift code for external vendor bookings
	@Author			: Shantanu
	@Input			: 
	@Output			: Gift code
	@Date			: 13-07-2016
	*/
	
	function create_external_vendor_gift_code()
	{
		$CI = &get_instance(); 

	   	$length = 16;

		$gift_code = substr(str_shuffle("123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
		
		$CI->load->model('api/nakshi_couponcode/coupon_code_model');

		$if_gift_code_exists = $CI->coupon_code_model->check_if_gift_code_exists($gift_code);

		if($if_gift_code_exists)
		{
			return create_external_vendor_gift_code();
		}

		return $gift_code;
	}

	/*
        @Description : Encryption - encrypt the string
        @Author      : Shantanu
        @Input       : link to be send in String
        @Output      : Encrypted binary to hex string
        @Date        : 04-07-2016
        */
        
        function encrypt($str) {  
            $iv = IV; 
            $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv); 
            mcrypt_generic_init($td, KEY, $iv);
            $encrypted = mcrypt_generic($td, $str); 
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td); 
            return bin2hex($encrypted);
        }
        
        /*
        @Description : Decryption - decrypt the encrypted string
        @Author      : Shantanu
        @Input       : Encrypted code
        @Output      : String
        @Date        : 04-07-2016
        */

        function decrypt($code) { 
            $code = helper_hex2bin($code);
            $iv = IV; 
            $td = mcrypt_module_open('rijndael-128', '', 'cbc', $iv); 
            mcrypt_generic_init($td, KEY, $iv);
            $decrypted = mdecrypt_generic($td, $code); 
            mcrypt_generic_deinit($td);
            mcrypt_module_close($td); 
            $ut =  utf8_encode(trim($decrypted)); 
            return $ut;
        }
        
        /*
        @Description : Hex2bin - convert hex data into binary
        @Author      : Shantanu
        @Input       : Hex code
        @Output      : Binary code
        @Date        : 04-03-2016
        */

        function helper_hex2bin($hexdata) {
            $bindata = ''; 
            for ($i = 0; $i < strlen($hexdata); $i += 2) {
                $bindata .= chr(hexdec(substr($hexdata, $i, 2)));
            } 
            return $bindata;
        } 

        /*
        @Description : Convert RGB color into hash color
        @Author      : Hiral SHukla
        @Input       : Hex color code
        @Output      : Hash color
        @Date        : 12-07-2016
        */

        function rgb2HEXhtml($r, $g=-1, $b=-1)
		{
		    if (is_array($r) && sizeof($r) == 3)
		         list($r, $g, $b) = $r;
		    $r = intval($r); $g = intval($g);
		    $b = intval($b);
		    $r = dechex($r<0?0:($r>255?255:$r));
		    $g = dechex($g<0?0:($g>255?255:$g));
		    $b = dechex($b<0?0:($b>255?255:$b));
		    $color = (strlen($r) < 2?'0':'').$r;
		    $color .= (strlen($g) < 2?'0':'').$g;
		    $color .= (strlen($b) < 2?'0':'').$b;
		    $color ='#'.$color;
		    return $color;
		}

	/*
	@Description	: Common Helper function to get column values from multidimentional array
	@Author			: Mehul Modh
	@Input			: Array
	@Output			: result
	@Date			: 22-02-2016
	*/
    
    function helper_array_column($input, $array_index_key = NULL , $array_value = NULL ) 
     {
        $result = array();

        if(count($input) > 0)
        {
            foreach( $input as $key => $value )
            {
                if(is_array($value))
                {
                    $result[is_null($array_index_key) ? $key : (string)$value[$array_index_key]] = is_null($array_value) ? $value : $value[$array_value];
                }
                else if(is_object($value))
                {
                    $result[is_null($array_index_key) ? $key : (string)$value->$array_index_key] = is_null($array_value) ? $value : $value->$array_value;
                }    
            }
        }    
            
        return $result;
    }

     function ordered_menu($array,$parent_id = 0)
    { 
        $temp_array = array();
       
        foreach($array as $element)
        {
            if($element['parent_id']==$parent_id)
            {
                $element['sub'] = ordered_menu($array,$element['id']);
                $temp_array[$element['catagory']] = $element;
            }
        }
       return $temp_array;
    }
	
	function get_currency(){

		$currency = array("AED"=>"Arab Emirates Dirham",
"ARS"=>"Argentine Peso",
"AUD"=>"Australian Dollar",
"BRL"=>"Brazilian Real",
"CAD"=>"Canadian Dollar", 
"CNY"=>"Yuan Renminbi",
"EGP"=>"Egyptian Pound",
"EUR"=>"Euro",  
"GBP"=>"Pound Sterling", 
"HKD"=>"Hong Kong Dollar",  
"INR"=>"Indian Rupee", 
"JPY"=>"Japanese Yen",  
"KRW"=>"Korean Won",
"MXN"=>"Mexican Nuevo Peso", 
"MYR"=>"Malaysian Ringgit",
"RUB"=>"Russian Ruble", 
"SAR"=>"Saudi Riyal",  
"SGD"=>"Singapore Dollar", 
"USD"=>"US Dollar",
"ZAR"=>"South African Rand");
return $currency;
	}

?>
         