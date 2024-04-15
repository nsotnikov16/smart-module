<? global $isNew; ?>

<? if ($isNew) : ?>
	<a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w/" class="h-social__link">
		<img src="/upload/new-image/youtube.svg" alt="">
	</a>
<? else : ?>
	<a href="https://www.youtube.com/channel/UCe0MhLxBpNUuyEXD-G28J6w/" class="h-social__link">
		<i class="fa fa-youtube-play" aria-hidden="true"></i>
	</a>
<? endif; ?>