 <ul>
	<p>Lista oczekujących artykułów:</p>
	<?php foreach ($articles as $article): ?>
		<li>
			Tytuł: <?php echo $article->title; ?>,
			Autor: <?php echo $article->author0->username; ?>,  
			Data Utworzenia: <?php echo $article->create_date; ?>
		</li>
		<?php endforeach; ?>
		</ul>
	<ul>
		<p>Lista edytorów do przydzielenia:</p>
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