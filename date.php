<?php 
class Date
{
	var $days = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi','Dimanche');
	var $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mais', 'Juin','Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
	
	function getAll($year)
	{
		$r=array();
		/*
		$date = strtotime($year.'-01-01');
		while ( date('Y',$date)<= $year) {
			
		
		$y= date('Y',$date);
		$m=date('n',$date);
		$d= date('j',$date);
		$w= str_replace('0', '7', date('w',$date));
		$r[$y][$m][$d] = $w;
		$date = $date+24*(3600);
	}*/
		$date = new DateTime($year.'-01-01');
		while ( $date->format('Y')<= $year) {
		$y= $date->format('Y');
		$m=$date->format('n');
		$d= $date->format('j');
		$w= str_replace('0', '7', $date->format('w'));
		$r[$y][$m][$d] = $w;
		$date->add(new dateInterval('P1D'));
	}
		return $r;
	}
}

 ?>