<? global $isNew; ?>

<? if ($isNew) : ?>
	<a href="https://vk.com/smart_module" class="h-social__link">
		<img src="/upload/new-image/vk-logo.svg" alt="">
	</a>
<? else : ?>
	<a href="https://vk.com/smart_module" class="h-social__link">
		<i class="fa fa-vk" aria-hidden="true"></i>
	</a>
<? endif; ?>