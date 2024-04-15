
<style>
.curent-city{
	padding: .4em 1em;
    display: inline-block;
    position: relative;
    line-height: normal;
    margin-right: .1em;
    cursor: pointer;
    vertical-align: middle;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    overflow: visible;
	text-align: left;
    white-space: nowrap;
    width: 14em;
	    padding: 0;
    margin: 0;
    width: auto;
    border: none;
    border-radius: 0;
    position: relative;
    top: 2px;
	}
.curent-city span{
display: block;
    margin-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    padding-top: 0 !important;
    font-size: 12px;
    color: #000;
    letter-spacing: .07em;
    margin-right: 40px;
    padding-bottom: 10px !important;
    /* overflow: hidden; */
    z-index: 9999999 !important;
    padding-top: 0px !important;
    padding-left: 15px !important;}	
.curent-city::after {
    content: "\f0d7";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    display: block;
    position: absolute;
    right: -10px;
    top: 0;
    color: #000;
    font-size: 13px;
	right: 10px !important;
    top: 15px !important;
	 top: 0 !important;
}	
</style>
<? if ($arResult["FAVORITES_CITIES"]): ?>
<div class="curent-city h-callback-map" href="#select-city-fo-map" onClick="setTimeout(start_map, 50);" ><span><?=$arResult["CURRENT_CITY"]["NAME"] ?></span></div>
    
<? endif ?>

