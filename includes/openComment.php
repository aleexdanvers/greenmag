<?php 
	echo "<div id='openCommentMarketing" . $row['ArticleID'] . "' class='w3-margin-bottom openCommentMarketing' style='margin-top:10px'>";
?>
	<hr class='no-margin-top'>
	<form method="post" action="updatecomment.php">
	<h4>Comment:</h4>
	<?php 
		if ($row['Comment'] == '') {
			echo "<textarea rows='4' class='w3-input w3-border w3-margin-bottom2 w3-twothird' type='text' name='commentText' placeholder='Add comment here' required></textarea>";
		} else {
			echo "<textarea rows='4' class='w3-input w3-border w3-margin-bottom2 w3-twothird' type='text' name='commentText' required>" . $row['Comment'] . "</textarea>";
		} 
	?>
	<div class='clearfix'></div>
	<h4>Status:</h4>
	<select class="w3-twothird" name="statusID" id="statusID" required>
			<option value="1">
					Approved
			</option>
			<option value="2">
					Pending
			</option>
			<option value="3">
					Rejected
			</option>
	</select>
	<?php echo "<input style='display:none;' name='articleID' value='" . $row['ArticleID'] . "'>"?>
	<div class='clearfix'></div>