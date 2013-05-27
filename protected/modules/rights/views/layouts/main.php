<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="rights" class="body">
	<div class="body_resize">
		<div id="content">
			<?php if( $this->id!=='install' ): ?>

				<div id="menu">

					<?php $this->renderPartial('/_menu'); ?>

				</div>

			<?php endif; ?>

			<?php $this->renderPartial('/_flash'); ?>

			<?php echo $content; ?>

		</div><!-- content -->
	</div>
</div>

<?php $this->endContent(); ?>