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

if ( !defined('EQDKP_INC') ){
	header('HTTP/1.0 404 Not Found'); exit;
  }
  
class mopclassicprogress_portal extends portal_generic {

// --- Raid metadata: raid order, phase, boss count ---
protected static $raid_info = [
	1 => ['lang_boss_title' => 'mop_classicprogress_f_boss1',
		'phase_key'       => 'mop_classic_phase1',
		'boss_count'      => 6],   // Mogu’shan Vaults
	2 => ['lang_boss_title' => 'mop_classicprogress_f_boss2',
		'phase_key'       => 'mop_classic_phase1',
		'boss_count'      => 6],   // Heart of Fear
	3 => ['lang_boss_title' => 'mop_classicprogress_f_boss3',
		'phase_key'       => 'mop_classic_phase1',
		'boss_count'      => 4],   // Terrace of Endless Spring
	4 => ['lang_boss_title' => 'mop_classicprogress_f_boss4',
		'phase_key'       => 'mop_classic_phase2',
		'boss_count'      => 13],  // Throne of Thunder (incl. heroic Ra-den)
	5 => ['lang_boss_title' => 'mop_classicprogress_f_boss5',
		'phase_key'       => 'mop_classic_phase3',
		'boss_count'      => 14],  // Siege of Orgrimmar
];

protected static $path    = 'mopclassicprogress';
protected static $data    = [
	'name'        => 'WoW MoP Classic Progress',
	'version'     => '1.0.0',
	'author'      => 'Adapted by MfG',
	'icon'        => 'fa-code',
	'description' => 'Shows raid progression (boss-count style)',
	'multiple'    => false,
	'lang_prefix' => 'mop_classicprogress_',
];
protected static $positions = ['left1', 'left2', 'right'];
protected static $install   = [
	'autoenable'     => '0',
	'defaultposition'=> 'left',
	'defaultnumber'  => '5',
];
protected static $apiLevel  = 20;

public function get_settings($state) {
	$settings = [];
	foreach (self::$raid_info as $idx => $raid) {
	$opt = [];
	// First: phase label option
	$opt["{$raid['phase_key']}"] = $this->user->lang($raid['phase_key']);

	// Next: 0 to N bosses done
	for ($i = 0; $i <= $raid['boss_count']-1; $i++) {
		$opt["mop_classic_{$i}_{$raid['boss_count']}"] = 
		$this->user->lang("mop_classic_{$i}_{$raid['boss_count']}");
	}

	// Finally: cleared shortcut
	$opt['mop_classic_clear'] = $this->user->lang('mop_classic_clear');

	$settings["boss{$idx}"] = [
		'type'    => 'dropdown',
		'class'   => 'js_reload',
		'options' => $opt,
	];
	}
	return $settings;
}

public function output() {
	$Imagepath = $this->server_path . "portal/mopclassicprogress/media/images/";
	$out       = "<table style='width:240px;'>\n";
	$idx       = 1;

	foreach (self::$raid_info as $raid) {
	$cfg = $this->config("boss{$idx}");
	if (!$cfg) { break; }  // stop if unset

	$boss_count = $raid['boss_count'];
	$down = '';
	// highlight phase
	if ($cfg === $raid['phase_key']) {
		$down = "<font color='red'>" .
				$this->user->lang($raid['phase_key']) .
				"</font>";
	}
	// if it's "0_N" boss format — red if zero, yellow if partial
	elseif (preg_match('/^mop_classic_(\d+)_'.$boss_count.'$/', $cfg, $m)) {
		$count_done = intval($m[1]);
		if ($count_done === 0) {
		$down = "<font color='red'>".$this->user->lang($cfg)."</font>";
		} elseif ($count_done < $boss_count) {
		$down = "<font color='yellow'>".$this->user->lang($cfg)."</font>";
		} else {
		$down = "<font color='lime'>".$this->user->lang($cfg)."</font>";
		}
	}
	elseif ($cfg === 'mop_classic_clear') {
		$down = "<font color='lime'>".$this->user->lang('mop_classic_clear')."</font>";
	} else {
		$down = $this->user->lang($cfg);
	}

	$out .= sprintf("
		<tr style='border-bottom:1px solid grey;
					background:#000 url(%s%d.jpg) center center / cover;'>
		<td style='white-space:nowrap; text-shadow:1px1px5px #000; color:#fff; line-height:30px;'>%s</td>
		<td style='text-align:center; text-shadow:1px1px5px #000; line-height:30px;'>%s</td>
		</tr>\n",
		$Imagepath, $idx,
		$this->user->lang($raid['lang_boss_title']),
		$down
	);

	$idx++;
	}

	$out .= "</table>";
	return $out;
}
}
  
?>
