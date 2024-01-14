
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="cal.css">
	<title></title>
</head>
<body>
<?php 
require('date.php');
$date = new Date();
$year = date('Y');
$dates = $date->getAll($year);
 ?>
 <div class="periode">
 	<div class="year">
 		<?php echo $year; ?>
 	</div>
 	<div class="months">
 		<?php foreach ($date->months as $id=>$n):?>
 			<ul>
 			<li><a href="#" id="linkmonth<?php echo($id+1); ?>"><?php echo  substr(utf8_decode($n),0,3) ; ?></a></li></ul>
 		<?php endforeach; ?>
 	</div>	
 	<?php $dates = current($dates); ?>
 	<?php foreach ($dates as $n => $days): ?>
 	  <div class="month" id="month<?php echo($n);?>">
 	  	<table>
 	  		<thead>
 	  			<tr>
 	  				<?php foreach ($date->days as $d):?>
 	  					<th>
 	  						<?php echo substr($d,0,3); ?>
 	  					</th>
 	  				<?php endforeach; ?>
 	  			</tr>
 	  		</thead>
 	  		<tbody>
 	  			<tr>
 	  				<?php $end = end($days);
 	  				foreach ($days as $d => $w):?>
 	  					<?php if ($d==1): ?>
 	  						<td colspan="<?php echo $w-1;?>"></td>
 	  					<?php endif; ?>
 	  				<td><?php echo $d; ?></td>
 	  				<?php if ($w==7): ?>
 	  				</tr><tr>
 	  				<?php endif; ?>
 	  			<?php endforeach; ?>
 	  			<?php if ($end != 7):?>
 	  				<td colspan="<?php echo 7-$end
 	  				;?>"></td>
 	  			<?php endif; ?>
 	  			</tr>
 	  		</tbody>
 	  	</table>

 	  </div>
 	 <?php endforeach; ?>
 </div>
 <pre> <?php print_r($dates); ?></pre>
  <script src="jquery-3.4.1.js"></script>
	 <script type="text/javascript">
	 	jquery(function($)
	 	 {
	 		$('.month').hide();
	 		$('.month:first').show();
	 		$('months a:first').addClass('active');
	 		var current = 1;
	 		$('months a').click(function()
	 		{
	 			var month = $(this).attr('id').replace('linkmonth','');
	 			alert(month);
	 			return false;
	 		});
	 	});
	 </script>
</body>
</html>
