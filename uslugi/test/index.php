<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доставка");

?>









<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

<div class="video-container-tab">

<div class="video-conainer-tab-cont active" id="video-tab-0">
<video muted  id="video-0" poster="/local/templates/smart-module/images/video-n/1.jpg">
        <source type="video/mp4" src="/upload/video/1.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-1">
<video muted poster="/local/templates/smart-module/images/video-n/2.jpg" id="video-1">
        <source type="video/mp4" src="/upload/video/2.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-2">
<video muted poster="/local/templates/smart-module/images/video-n/3.jpg" id="video-2">
        <source type="video/mp4" src="/upload/video/3.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-3">
<video muted poster="/local/templates/smart-module/images/video-n/4.jpg" id="video-3">
        <source type="video/mp4" src="/upload/video/4.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-4">
<video muted poster="/local/templates/smart-module/images/video-n/5.jpg" id="video-4">
        <source type="video/mp4" src="/upload/video/5.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-5">
<video muted poster="/local/templates/smart-module/images/video-n/6.jpg" id="video-5">
        <source type="video/mp4" src="/upload/video/6.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-6">
<video muted poster="/local/templates/smart-module/images/video-n/7.jpg" id="video-6">
        <source type="video/mp4" src="/upload/video/7.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-7">
<video muted poster="/local/templates/smart-module/images/video-n/8.jpg" id="video-7">
        <source type="video/mp4" src="/upload/video/8.mp4">
 </video>
</div>

<div class="video-conainer-tab-cont" id="video-tab-8">
<video muted poster="/local/templates/smart-module/images/video-n/9.jpg" id="video-8">
        <source type="video/mp4" src="/upload/video/9.mp4">
 </video>
</div>


</div>




<div class="myprogress">

<section class="box">
<div class="progres-h1">Основу составляют легкие металоконструкции с обшивкой металлопрофилем или сендвич-панелями</div>
<ul class="video-tab">
<li data-id="video-tab-0" class="actives" style="padding-top: 10px;">Фасад<div></div><span></span></li>
<li data-id="video-tab-1" style="padding-top: 10px;">Фундамент<div></div><span></span></li>
<li data-id="video-tab-2" style="padding-top: 10px;">Опора<div></div><span></span></li>
<li data-id="video-tab-3">Силовой<br>каркас<div></div><span></span></li>
<li data-id="video-tab-4">Вторичный<br>каркас<div></div><span></span></li>
<li data-id="video-tab-5" style="padding-top: 10px;">Водоотлив<div></div><span></span></li>
<li data-id="video-tab-6">Стык<br>панелей<div></div><span></span></li>
<li data-id="video-tab-7" style="padding-top: 10px;">Окно<div></div><span></span></li>
<li data-id="video-tab-8" style="padding-top: 10px;">Ворота<div></div><span></span></li>
</ul>
</section>
<div class="myprogress-bar"></div>
</div>


<script>



function count_li_slider(){
	
	var it = 0;
$('.video-tab li').each(function(index, element) {
        if($(this).is('.actives')){
			return it;
		}
		it = it+1;
    });
	
	}
$('.video-tab li').on('click',function(){
 var index = $( ".video-tab li" ).index( this );
 	$this = this;
$('.video-tab li').removeClass('actives');
$('.video-tab li').removeClass('chose');
$('.video-conainer-tab-cont').removeClass('active');
  for ( i = 0; i <= index; i++) {
		if(index == 0){
			$($this).addClass('actives');
			
			$('#video-tab-'+index+'').addClass('active');
			$('video').get(index).load();
			$('#video-'+index+'').trigger('play');
		
			}
		else{
				if(i == index){
					$($this).addClass('actives');
					$('#video-tab-'+index+'').addClass('active');
					$('video').get(index).load();
					 $('#video-'+index+'').trigger('play');
					}
				else{
					$('.video-tab li:eq('+i+')').addClass('chose');
					}	
			}	
			
	}
  

/*		t=0;
	$('.video-tab li').each(function(index, element) {
		if(t === 0){
        if($(this).is('.actives')){
			$(this).removeClass('actives');
			$(this).addClass('chose');
		t = 1;	
		}}
    });
	id = $(this).attr('data-id');
	$(this).addClass('actives');
	$('.video-conainer-tab-cont').removeClass('active');
	$('#'+id+'').addClass('active');*/
	
	})











</script>