<ul>
	<p>List of articles assigned:</p>
		<li>
		</li>
		</ul>
	<ul>
		<p>List of reviewers for assignment:</p>
	<?php $users = User::model()->findAll(); ?>
	  <?php foreach($users as $user): ?>
  		<?php if(Yii::app()->getAuthManager()->isAssigned('Reviewer', $user->id)): ?>
   		<li> 
   			Username: <?php echo $user->username; ?>,
        	Email: <?php echo $user->email; ?>
   		</li>
  		<?php endif; ?>
    <?php endforeach; ?>
	</ul>