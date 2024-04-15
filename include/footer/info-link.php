<? global $isNew; ?>

<? if ($isNew) : ?>
	<a href="/o-kompanii/" class="f-info__link">
		О компании
		<img src="/upload/new-image/arrow-right-blue.svg" alt="">
	</a>
<? else : ?>
	<a href="/o-kompanii/" class="f-info__link">
		О компании
		<ion-icon name="arrow-round-forward"></ion-icon>
	</a>
<? endif; ?>