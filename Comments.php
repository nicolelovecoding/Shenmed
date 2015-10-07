<?php
 require_once "Database.php";
 $sql="select * from patient";
 $result=mysql_query($sql,$link); 
 if (count($result) > 0) {
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="comments-grid"><thead><tr>
	    <th>PatientID</th>
        <th>Comments</th>
	</tr></thead>';
	 echo '<tbody>';
	 $i = 1;
	 while($row = mysql_fetch_array($result)) {
	 
	    $sql="select comments from Comments where PatientID = ".$i;  //print_r($sql);   
	    $val=mysql_query($sql,$link); 
		$commentsRow = mysql_fetch_array($val);
	    echo '<tr>'; 
		echo '<td>'.$row['PatientID'].'</td>';
		echo '<td><input id ='.$i.' size = 180 type="text" value="'.$commentsRow['comments'].'"  onchange="ChangeFunc(this.id)"></td>';
		echo '</tr>';
		$i = $i + 1;
	 }
	 echo '</tbody></table>';
 }
 if (isset($_POST["Pid"]) && isset($_POST["Comm"])) {
     $Pid = $_POST["Pid"];
	 $cts = $_POST["Comm"];
	 $sql="select * from Comments where PatientID = ".$Pid; 
	 $exist=mysql_query($sql,$link); 
     $exist=mysql_fetch_array($exist);	 
	 if (!$exist)  {
        $sql = "insert into Comments(PatientID, comments)
		        VALUES(".$Pid.",'".$cts."')";  echo $sql;}
     else 
        $sql = "UPDATE Comments SET comments = '".$cts."' WHERE PatientID = ".$Pid;
     $retval = mysql_query($sql,$link);	
	 if(! $retval )
	 {
	   die('Could not process the action: '.mysql_error());
	 }	 
 }
 mysql_close($link);
?>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(id) {
        $('#comments-grid').DataTable();
    });
	function ChangeFunc(id) {
		    var content = document.getElementById(id).value;
			var id = id;
			$.post( "Comments.php",
			        {"Pid" : id,
					 "Comm" : content}
			);
			$.post("Patient.php", 
			       {"reload": true} , function(data){alert(data);}
			);
	}
</script>