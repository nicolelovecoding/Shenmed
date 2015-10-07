<?php
 require_once "Database.php";
 $sql="select patient.first_name, patient.last_name, patient.email, patient.phoneNO,
       patient.Description, patient.DOB, Comments.comments 
      from patient
      LEFT JOIN Comments
      ON patient.PatientID = Comments.PatientID";
 $result=mysql_query($sql,$link); 
 if (count($result) > 0) {
    echo '<table cellpadding="0" cellspacing="0" border="0" class="display" id="patient-grid"><thead><tr>
	    <th>first_name</th>
        <th>last_name</th>
        <th>email</th>
	    <th>phoneNO</th>
        <th>DOB</th>
        <th>Description</th>
		<th>Comments</th>
	</tr></thead>
	<tfoot><tr>
	    <th>first_name</th>
        <th>last_name</th>
        <th>email</th>
	    <th>phoneNO</th>
        <th>DOB</th>
        <th>Description</th>
		<th>Comments</th>
	</tr></tfoot>';
	 echo '<tbody>';
	 while($row = mysql_fetch_array($result)) {
	    echo '<tr>';
		echo '<td>'.$row['first_name'].'</td>';
		echo '<td>'.$row['last_name'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['phoneNO'].'</td>';
		echo '<td>'.$row['DOB'].'</td>';
		echo '<td>'.$row['Description'].'</td>';
		echo '<td>'.$row['comments'].'</td></tr>';
	 }
	 echo '</tbody></table>';
	 if (isset($_POST["reload"])) {
	    echo '<script type="text/javascript">location.reload(true);</script>';
	 }
 }   

 ?> 
 
<script type="text/javascript" language="javascript" >
    $(document).ready(function() {
		 $('#patient-grid tfoot th').each( function () {
			var title = $('#patient-grid thead th').eq( $(this).index() ).text();
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		} );
	  
        var table = $('#patient-grid').DataTable({
		   "bPaginate": true, //change page
           "bLengthChange": true, //change number of rows displayed
           "bFilter": true, //filter
           "bSort": false, //sort
           "bInfo": true,//footer info
           "bAutoWidth": true// auto width 
        });
		
		table.columns().every( function () {
			var that = this;
			$( 'input', this.footer() ).on( 'keyup change', function () {
				that
					.search( this.value )
					.draw();
			} );
		} );	  
    });
</script>
