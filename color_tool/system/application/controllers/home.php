<?php

class Home extends Controller {

	function index()
	{ 
	   $data = array();

		$data['html1'] = '';			
		$data['html2'] = '';

		$data['red1'] = '';			
		$data['green1'] = '';			
		$data['blue1'] = '';			

		$data['red2'] = '';			
		$data['green2'] = '';			
		$data['blue2'] = '';			

		$data['color_difference'] = '';
		$data['color_brightness_difference'] = '';


		$type = $this->input->post('type');		
		if($type != '')
		{
			if($type == 'html')
			{
				$html1 = $this->input->post('html1');
				$html2 = $this->input->post('html2');

				$red1 = hexdec(substr($html1, 0, 2));
				$green1 = hexdec(substr($html1, 2, 2));
				$blue1 = hexdec(substr($html1, 4, 2));

				$red2 = hexdec(substr($html2, 0, 2));
				$green2 = hexdec(substr($html2, 2, 2));
				$blue2 = hexdec(substr($html2, 4, 2));			
			}

			else if($type == 'rgb')
			{
				$red1 = $this->input->post('red1');
				$green1 = $this->input->post('green1');
				$blue1 = $this->input->post('blue1');

				$red2 = $this->input->post('red2');
				$green2 = $this->input->post('green2');
				$blue2 = $this->input->post('blue2');

				$html1 = dechex($red1) . dechex($green1) . dechex($blue1);
				$html2 = dechex($red2) . dechex($green2) . dechex($blue2);
			}

			$color_difference = 0;
			$color_difference += max($red1, $red2) - min($red1, $red2);
			$color_difference += max($green1, $green2) - min($green1, $green2);
			$color_difference += max($blue1, $blue2) - min($blue1, $blue2);

			$color_brightness1 = round(($red1 * 299 + $green1 * 587 + $blue1 * 114) / 1000);
			$color_brightness2 = round(($red2 * 299 + $green2 * 587 + $blue2 * 114) / 1000);

			$color_brightness_difference = max($color_brightness1, $color_brightness2) - min($color_brightness1, $color_brightness2);

			// for view
			$data['html1'] = $html1;			
			$data['html2'] = $html2;

			$data['red1'] = $red1;			
			$data['green1'] = $green1;			
			$data['blue1'] = $blue1;			

			$data['red2'] = $red2;			
			$data['green2'] = $green2;			
			$data['blue2'] = $blue2;			

			$data['color_difference'] = $color_difference;
			$data['color_brightness_difference'] = $color_brightness_difference;
		}

		$this->load->view('home', $data);        
	}
}

/* End of file */
