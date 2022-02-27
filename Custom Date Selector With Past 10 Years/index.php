<div>
<label>Month</label>
        <select id="month">
        <option value="">...</option>
<?php
		$firstYear = (int)date('Y') - 10;
		$lastYear = $firstYear + 10;
		for($i=$firstYear;$i<=$lastYear;$i++)
		{
			for($ii=1;$ii<=12;$ii++)
			{
			$monthnum="0".$ii;
			if($ii>9){$monthnum=$ii;}
			$monthdatenum=date($monthnum);
			$monthdatechar=date('M', strtotime('2022'.$monthnum.'22'));
			echo '<option value='.$i."-".$monthdatenum.'>'.$i."-".$monthdatechar.'</option>';
			}
		}
?>
</select>
</div>