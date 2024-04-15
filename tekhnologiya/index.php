<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Технология");
?>






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

$(document).ready(function() {
	var width = $(window).width();
	if(width <= 768){
	$('.video-tab').slick();
	}

$('.video-tab').on('afterChange', function(event, slick, currentSlide){
	$('.video-conainer-tab-cont').removeClass('active');
 	$('#video-tab-'+currentSlide+'').addClass('active');
					$('video').get(currentSlide).load();
					 $('#video-'+currentSlide+'').trigger('play');
});

	})









</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>