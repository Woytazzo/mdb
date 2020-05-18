<?php
require_once "navbar2.php";
if (!isset($_SESSION['logged_in']))
{
	header('Location: index.php');
	exit();
}
$user_id = $_SESSION['id'];
$any_rows=false;
$any_rows_2=false;

?>

	<article>
		<div class="container">	

			<div class="main-title">
			
				PRZEGLĄDAJ BILANS
			
			</div>
			
		<div class="period"> 
			<select id="chooseBalancePeriod" name="chooseBalancePeriod" class="chooseBalancePeriod" style="cursor: pointer;" onchange="choosingPeriod()" >
				<option value="1" 
				<?php if($_SESSION['value_period']==1) echo ' selected="selected" '; ?>
				>bieżący miesiąc</option>
				<option value="2" 
				<?php if($_SESSION['value_period']==2) echo ' selected="selected" '; ?>
				>poprzedni miesiąc</option>
				<option value="3"
				<?php if($_SESSION['value_period']==3) echo ' selected="selected" '; ?>
				>bieżący rok</option>
				<option value="4"
				<?php if($_SESSION['value_period']==4) echo ' selected="selected" '; ?>
				>niestandardowy</option>
			</select>
		</div>
		
		
			<?php
		if(isset($_SESSION['value_period']) && $_SESSION['value_period']==4){
	
		echo'<div class="col-12 ">';
			
				echo'<div class ="col-12">';
					echo '<div class="fieldsets inline "> ';
					echo '<fieldset class="field_set2 inline ">';
						echo '<legend><b>OD</b></legend>';
						echo '<input type="date" id="StartDate" name="startdate" class="inputAmountDate" onchange="choosingStart()" value= "';
							if(isset($_SESSION['start_date2'])) echo $_SESSION['start_date2'];
							else echo $today;
						echo '" />';
					echo '</fieldset>';
				echo '<fieldset class="field_set2 inline">';
						echo '<legend><b>DO</b></legend>';
						echo '<input type="date" id="EndDate" name="enddate" class="inputAmountDate" onchange="choosingEnd()" value= "';
							if(isset($_SESSION['end_date2'])) echo $_SESSION['end_date2'];
							else echo $today;
						echo '" />';
					echo '</fieldset>';
				
					echo '</div"> ';
				echo'</div>';
			
		echo '</div"> ';

			echo'<div class="row col-12">';
				echo '<div class="period-dates" id="period-dates-2 inline"> ';					
					
				echo '</div"> ';
			echo '</div>';
		}
		
		if($_SESSION['value_period']==4) {
			if(isset($_SESSION['start_date2']))
		$start_date_final = $_SESSION['start_date2'];

	if(isset($_SESSION['end_date2']))
		$end_date_final = $_SESSION['end_date2'];
		}		
		else{
			if(isset($_SESSION['start_date']))
			$start_date_final = $_SESSION['start_date'];

		if(isset($_SESSION['end_date']))
		$end_date_final = $_SESSION['end_date'];
		}
		
		
		if($end_date_final<$start_date_final)
			echo '<div style="color: red; text-align:center; margin:0 auto;"> WYBIERZ WŁAŚCIWY ZAKRES!</div>';
		
?>
			
			<div id="result"></div>
				<div class="row col-12">
				
					<div  class="table-transactions table col-md-6">
					
					<div class="title-of-category"> 
						<!--<h5>PRZYCHODY</h5>-->
				
						<input type="button" style="cursor: pointer;" name="view" data-toggle="modal3" data-target="#dataModal" value="PRZYCHODY" id="all_incomes" class="btn btn-secondary btn-lg btn-rounded view_allIncomes">
						
						
						
					</div>
					</br>
							
							<?php
							
							$sql=("SELECT name, SUM(amount) as amount FROM (SELECT c.name, i.amount FROM incomes_category_assigned_to_users AS c INNER JOIN incomes AS i ON c.id = i.income_category_assigned_to_user_id WHERE c.user_id='$user_id' AND i.date_of_income >= '$start_date_final' AND i.date_of_income <= '$end_date_final') AS t GROUP BY name;");
								
								
								if($result = mysqli_query($connection, $sql)){	
									if(mysqli_num_rows($result)>0){
										$any_rows=true;
										echo '<table class="table-with-modal">
							 <tr>
										<th>Kategoria</th>
										<th>Kwota</th> 
							</tr>';
										while ($row = mysqli_fetch_assoc($result))
										{
											
											echo '<tr   data-id='.$row["name"].' id="'.$row["name"].'" >';
											echo '<td width="50%"><input type="button" data-toggle="modal" data-target="#dataModal" style="cursor: pointer; width: 100%; background-color: none;" name="view" value="'.$row["name"].'" id="'.$row["name"].'" class="btn view_incomes"></td> ';
											echo ' <td width="50%">'.$row["amount"].'</td> ';
											
											echo "</tr>";
										
										}
									}
								}
							?>

							
							</table>
							
							<div class="balanceSum" style="color:black">
							
							<?php
							$sql=("SELECT SUM(amount) as sum FROM (SELECT name, SUM(amount) as amount FROM (SELECT c.name, i.amount FROM incomes_category_assigned_to_users AS c INNER JOIN incomes AS i ON c.id = i.income_category_assigned_to_user_id WHERE c.user_id='$user_id' AND i.date_of_income >= '$start_date_final' AND i.date_of_income <= '$end_date_final') AS t GROUP BY name) as PREV_TABLE;");
							
							$result = $connection->query($sql);
								if (!$result) throw new Exception($connection->error);
								
								if($result = mysqli_query($connection, $sql)){	
									
										$row = mysqli_fetch_assoc($result);
										if($any_rows==true) echo '<b>SUMA = '.$row["sum"].'</b>';
										$sum_of_incomes=$row["sum"];
									
								}
							?>
									
							</div>
							<?php if($any_rows==true) echo
							'<div id="piechart"></div>'; 
							else echo '<div style="margin: 0 auto; border: 5x black solid; padding: 40px; text-align: center;"> BRAK WYNIKÓW W TYM OKRESIE </div>';
							?>
							
					</div>
					
					<div class="table-transactions table col-md-6">
					
						<div class="title-of-category"> 
							<!--<h5>WYDATKI</h5>-->
							<input type="button" style="cursor: pointer;" name="view" data-toggle="modal4" data-target="#dataModal" value="WYDATKI" id="all_expenses" class="btn btn-secondary btn-lg btn-rounded view_allExpenses">
						</div>
						</br>
						
							
									  <?php
									  
									  
								$sql=("SELECT name, SUM(amount) as amount FROM (SELECT c.name, e.amount FROM expenses_category_assigned_to_users AS c INNER JOIN expenses AS e ON c.id = e.expense_category_assigned_to_user_id WHERE c.user_id='$user_id' AND e.date_of_expense >= '$start_date_final' AND e.date_of_expense <= '$end_date_final') AS t GROUP BY name;");
								$result = $connection->query($sql);
								if (!$result) throw new Exception($connection->error);
								
								if($result = mysqli_query($connection, $sql)){	
								if(mysqli_num_rows($result)>0){
										$any_rows_2=true;
										echo '<table class="table-with-modal">
							 <tr>
										<th>Kategoria</th>
										<th>Kwota</th> 
							</tr>';
								
									while ($row = mysqli_fetch_assoc($result))
									{
										echo '<tr   data-id='.$row["name"].' id="'.$row["name"].'" >';
										echo '<td width="50%"><input type="button" data-toggle="modal2" data-target="#dataModal" style="cursor: pointer; width: 100%; background-color: none;" name="view" value="'.$row["name"].'" id="'.$row["name"].'" class="btn view_expenses"></td> ';
										echo ' <td width="50%">'.$row["amount"].'</td> ';
										
										echo "</tr>";
	
									}
								}
								}

							?>
							</table>

							<div class="balanceSum" style="color:black">
									<?php
							$sql=("SELECT SUM(amount) as sum FROM (SELECT name, SUM(amount) as amount FROM (SELECT c.name, e.amount FROM expenses_category_assigned_to_users AS c INNER JOIN expenses AS e ON c.id = e.expense_category_assigned_to_user_id WHERE c.user_id='$user_id' AND e.date_of_expense >= '$start_date_final' AND e.date_of_expense <= '$end_date_final') AS t GROUP BY name) as PREV_TABLE;");
							
							$result = $connection->query($sql);
								if (!$result) throw new Exception($connection->error);
								
								if($result = mysqli_query($connection, $sql)){	
									
										$row = mysqli_fetch_assoc($result);
										if($any_rows_2==true) echo '<b>SUMA = '.$row["sum"].'</b>';
										$sum_of_expenses=$row["sum"];
									
								}
							?>
							</div>
							
							<?php if($any_rows_2==true) echo
							'<div id="piechart2"></div>'; 
							else echo '<div style="margin: 0 auto; border: 5x black solid; padding: 40px; text-align: center;"> BRAK WYNIKÓW W TYM OKRESIE </div>';
							?>
							
					</div>
					
				</div>
					<?php if($any_rows==true || $any_rows_2==true){
						echo '<div class="balanceSum col-12">
									<b>BILANS = ';
									$ballance=$sum_of_incomes-$sum_of_expenses;
									echo $ballance;  
									echo '</b>';
						echo '</div>';
								
						echo '<div class="balanceSum col-12">';
							
							if($ballance>2000 )
								echo "W tym czasie jesteś finansowym ninja! Tak trzymaj szefie!";
							if($ballance<=2000 && $ballance>0)
								echo "Jesteś tutaj na plusie, ale mogłoby być lepiej - stać Cię na lepszy wynik!";
							if($ballance>=-2000 && $ballance<=0 )
								echo "Nie wygląda to najlepiej - chyba korzystniej jest być na plusie...?";
							if($ballance<-2000)
								echo "Nooo nie, DRAMAAAT - jak Ci nie wstyd za taki wynik...?";
							
									
						echo'</div>';
					}?>
		</div>
	</article>
	
	<div id="dataModal" class="modal hide">  
       <div class="modal-dialog">
		<div class="modal-content">
           
                <div class="modal-header"  id="Category"></div>  
                <div class="modal-body" id="incomes_detail"></div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>  
                </div>  
           </div>
      </div>  
 </div>  
	
<div id="dataModal2" class="modal hide">  
     <div class="modal-dialog">
		<div class="modal-content">
           
                <div class="modal-header"  id="Category2"></div>  
                <div class="modal-body" id="expenses_detail"></div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>  
                </div>  
           </div>
      </div>  
 </div>  
 
 <div id="dataModal3" class="modal hide">  
     <div class="modal-dialog">
		<div class="modal-content">
           
                <div class="modal-header"  id="allIncomes"></div>  
                <div class="modal-body" id="allincomes_detail"></div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>  
                </div>  
           </div>
      </div>  
 </div>  
 
 <div id="dataModal4" class="modal hide">  
     <div class="modal-dialog">
		<div class="modal-content">
           
                <div class="modal-header"  id="allExpenses"></div>  
                <div class="modal-body" id="allexpenses_detail"></div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>  
                </div>  
           </div>
      </div>  
 </div>  
	
	

	<?php
	require_once "footer.html"
	
	?>
	
	
	
	
	
	