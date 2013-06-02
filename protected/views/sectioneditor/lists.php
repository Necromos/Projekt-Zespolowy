 <ul>
	<p>The waiting list of articles:</p>
	<?php foreach ($articles as $article): ?>
		<li>
			Title: <?php echo $article->title; ?>,
			Author: <?php echo $article->author0->username; ?>,  
			Create date: <?php echo $article->create_date; ?>
		</li>
		<?php endforeach; ?>
		</ul>
	<ul>
		<p>List of editors for assignment:</p>
	<?php $users = User::model()->findAll(); ?>
	  <?php foreach($users as $user): ?>
  		<?php if(Yii::app()->getAuthManager()->isAssigned('Editor', $user->id)): ?>
   		<li> 
   			Username: <?php echo $user->username; ?>,
       		Email: <?php echo $user->email; ?>
   		</li>
  		<?php endif; ?>
    <?php endforeach; ?>
	</ul>