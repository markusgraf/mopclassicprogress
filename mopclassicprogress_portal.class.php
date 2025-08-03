<?php
/*	Project:			EQdkp-Plus
 *	Package:			classic Progress Module - Portal
 *	CreatorsLink:		https://www.therisingphoenix.eu
 *	Usagelink:			https://www.therisingphoenix.eu
 *
 *	Copyright (C) 2019 Motrish	
 *
 */

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found');exit;
}

class cataclassicprogress_portal extends portal_generic {

	protected static $path		= 'cataclassicprogress';
	protected static $data		= array(
		'name'			=> 'WoW Cataclysm Classic Progress',
		'version'		=> '1.1.2',
		'author'		=> 'Motrish / modified by MG',
		'icon'			=> 'fa-code',
		'description'	=> 'Shows the actual progress of the classic Raid',
		'multiple'		=> false,
		'lang_prefix'	=> 'cata_classicprogress_'
	);

	protected static $positions = array( 'left1', 'left2', 'right');
	public function get_settings($state){
		$settings	= array(
				#Bastion of Twilight
			'boss1'	=> array(
				'type'		=> 'dropdown',
				'class'		=> 'js_reload',
				'options'	=> array(
					'cata_classic_phase1'	=> $this->user->lang('cata_classic_phase1'),
					'cata_classic_0_5'	=> $this->user->lang('cata_classic_0_5'),
					'cata_classic_1_5'	=> $this->user->lang('cata_classic_1_5'),
					'cata_classic_2_5'	=> $this->user->lang('cata_classic_2_5'),
					'cata_classic_3_5'	=> $this->user->lang('cata_classic_3_5'),
					'cata_classic_4_5'	=> $this->user->lang('cata_classic_4_5'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),
					
				),
			),
						
				#Blackwing Descent
			'boss2'	=> array(
				'type'		=> 'dropdown',	
				'class'		=> 'js_reload',			
				'options'	=> array(
					'cata_classic_phase1'	=> $this->user->lang('cata_classic_phase1'),					
					'cata_classic_0_6'	=> $this->user->lang('cata_classic_0_6'),
					'cata_classic_1_6'	=> $this->user->lang('cata_classic_1_6'),
					'cata_classic_2_6'	=> $this->user->lang('cata_classic_2_6'),
					'cata_classic_3_6'	=> $this->user->lang('cata_classic_3_6'),
					'cata_classic_4_6'	=> $this->user->lang('cata_classic_4_6'),
					'cata_classic_5_6'	=> $this->user->lang('cata_classic_5_6'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),

				),
			),
			#Throne of the Four Winds
			'boss3'	=> array(
				'type'		=> 'dropdown',
				'class'		=> 'js_reload',			
				'options'	=> array(
					'cata_classic_phase1'	=> $this->user->lang('cata_classic_phase1'),
					'cata_classic_0_2'	=> $this->user->lang('cata_classic_0_2'),
					'cata_classic_1_2'	=> $this->user->lang('cata_classic_1_2'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),
				),
			),	
			#Baradinfestung
			'boss4'	=> array(
				'type'		=> 'dropdown',		
				'class'		=> 'js_reload',
				'options'	=> array(
					'cata_classic_phase1'	=> $this->user->lang('cata_classic_phase1'),					
					'cata_classic_0_3'	=> $this->user->lang('cata_classic_0_3'),
					'cata_classic_1_3'	=> $this->user->lang('cata_classic_1_3'),
					'cata_classic_2_3'	=> $this->user->lang('cata_classic_2_3'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),
				),
			),

				#Feuerlande
			'boss5'	=> array(
				'type'		=> 'dropdown',	
				'class'		=> 'js_reload',			
				'options'	=> array(
					'cata_classic_phase3'	=> $this->user->lang('cata_classic_phase3'),
					'cata_classic_0_7'	=> $this->user->lang('cata_classic_0_7'),
					'cata_classic_1_7'	=> $this->user->lang('cata_classic_1_7'),
					'cata_classic_2_7'	=> $this->user->lang('cata_classic_2_7'),
					'cata_classic_3_7'	=> $this->user->lang('cata_classic_3_7'),
					'cata_classic_4_7'	=> $this->user->lang('cata_classic_4_7'),
					'cata_classic_5_7'	=> $this->user->lang('cata_classic_5_7'),
					'cata_classic_6_7'	=> $this->user->lang('cata_classic_6_7'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),

				),
			),
			#Drachenseele
			'boss6'	=> array(
				'type'		=> 'dropdown',	
				'class'		=> 'js_reload',			
				'options'	=> array(
					'cata_classic_phase4'	=> $this->user->lang('cata_classic_phase4'),
					'cata_classic_0_8'	=> $this->user->lang('cata_classic_0_8'),
					'cata_classic_1_8'	=> $this->user->lang('cata_classic_1_8'),
					'cata_classic_2_8'	=> $this->user->lang('cata_classic_2_8'),
					'cata_classic_3_8'	=> $this->user->lang('cata_classic_3_8'),
					'cata_classic_4_8'	=> $this->user->lang('cata_classic_4_8'),
					'cata_classic_5_8'	=> $this->user->lang('cata_classic_5_8'),
					'cata_classic_6_8'	=> $this->user->lang('cata_classic_6_8'),
					'cata_classic_7_8'	=> $this->user->lang('cata_classic_7_8'),
					'cata_classic_clear'	=> $this->user->lang('cata_classic_clear'),
				),
			)
		);
		
		return $settings;
	}
	protected static $install	= array(
		'autoenable'		=> '0',
		'defaultposition'	=> 'left',
		'defaultnumber'		=> '8',
	);
	
	protected static $apiLevel = 20;

	public function output() {
		$Imagepath=$this->server_path."portal/cataclassicprogress/media/images/";
		$arrSettingsArray=array();
		$out="<table style='width:240px;'>";
		$actualBoss=1;		
		while($this->config('boss'.$actualBoss)){
			$arrSettingsArray .= $this->config('boss'.$actualBoss);
			if($this->config('boss'.$actualBoss) == "cata_classic_phase1"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase1')."</font>";}	
			if($this->config('boss'.$actualBoss) == "cata_classic_phase2"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase2')."</font>";}	
			if($this->config('boss'.$actualBoss) == "cata_classic_phase3"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase3')."</font>";}	
			if($this->config('boss'.$actualBoss) == "cata_classic_phase4"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase4')."</font>";}	
			//if($this->config('boss'.$actualBoss) == "cata_classic_phase5"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase5')."</font>";}
			//if($this->config('boss'.$actualBoss) == "cata_classic_phase6"){$Down="<font color='red'>".$this->user->lang('cata_classic_phase6')."</font>";}		
						
			if($this->config('boss'.$actualBoss) == "cata_classic_clear"){$Down="<font color='lime'>".$this->user->lang('cata_classic_clear')."</font>";}				

			if($this->config('boss'.$actualBoss) == "cata_classic_0_1"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_1')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_2"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_2')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_2"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_2')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_3"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_3')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_3"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_3')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_3"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_3')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_4"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_4')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_4"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_4')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_4"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_4')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_4"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_4')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_5"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_5')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_1_5"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_5')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_2_5"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_5')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_3_5"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_5')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_4_5"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_5')."</font>";}					

			if($this->config('boss'.$actualBoss) == "cata_classic_0_6"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_6')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_1_6"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_6')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_2_6"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_6')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_3_6"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_6')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_4_6"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_6')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_5_6"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_6')."</font>";}					

			if($this->config('boss'.$actualBoss) == "cata_classic_0_7"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_1_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_2_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_3_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_4_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_5_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_7')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_6_7"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_7')."</font>";}					

			if($this->config('boss'.$actualBoss) == "cata_classic_0_8"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_8')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_8')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_2_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_8')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_3_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_8')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_4_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_8')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_5_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_8')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_6_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_8')."</font>";}
			if($this->config('boss'.$actualBoss) == "cata_classic_7_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_8')."</font>";}				
			if($this->config('boss'.$actualBoss) == "cata_classic_8_8"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_8')."</font>";}					

			if($this->config('boss'.$actualBoss) == "cata_classic_0_9"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_9')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_9"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_10')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_10"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_10')."</font>";}					
			if($this->config('boss'.$actualBoss) == "cata_classic_1_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_10')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_10"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_10')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_11"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_11')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_10_11"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_10_11')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_12"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_10_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_10_12')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_11_12"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_11_12')."</font>";}					 

			if($this->config('boss'.$actualBoss) == "cata_classic_0_13"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_10_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_10_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_11_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_11_13')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_12_13"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_12_13')."</font>";}					

			if($this->config('boss'.$actualBoss) == "cata_classic_0_14"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_10_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_10_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_11_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_11_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_12_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_12_14')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_13_14"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_13_14')."</font>";}	

			if($this->config('boss'.$actualBoss) == "cata_classic_0_15"){$Down="<font color='red'>".$this->user->lang('cata_classic_0_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_1_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_1_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_2_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_2_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_3_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_3_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_4_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_4_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_5_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_5_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_6_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_6_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_7_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_7_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_8_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_8_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_9_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_9_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_10_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_10_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_11_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_11_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_12_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_12_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_13_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_13_15')."</font>";}					 
			if($this->config('boss'.$actualBoss) == "cata_classic_14_15"){$Down="<font color='yellow'>".$this->user->lang('cata_classic_14_15')."</font>";}	



			$out.="<tr style='border-bottom: 1px solid grey;background:url(".$Imagepath."".$actualBoss.".jpg);background-size:cover;'>
			<td style='text-shadow:1px 1px 5px black;line-height:30px'>
			<font color='white'>
			".$this->user->lang("cata_classicprogress_f_boss".$actualBoss)."
			</font>
			</td>
			<td style='text-shadow:1px 1px 5px black;line-height:30px;align=center'>
			".$Down."
			</td>
			</tr>";
			$actualBoss++;
		}		
		$out.="</table>";
		return $out;
	}
}
?>
