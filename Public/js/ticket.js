var lastAd = 1;
var nextAd = 2;

// 显示广告
function adShow(id) {
	if (id == null) id = nextAd;
	else clearInterval(adInterval);
	if (id == lastAd) return;

	for (var i = 1; i <= 5; i++) {
		$('#title'+i).removeClass('title_focus');
		$('#desc'+i).removeClass('desc_focus');
		$('#bg'+i).removeClass('bg_focus');
	}
	$('#title'+id).addClass('title_focus');
	$('#desc'+id).addClass('desc_focus');
	$('#bg'+id).addClass('bg_focus');
	
	for (var i = 1; i <= 5; i++) {
		$('#img'+i).hide();
		$('#img'+i).css('z-index', 1);
	}
	$('#img'+lastAd).css('z-index', 3);
	$('#img'+lastAd).show();
	$('#img'+id).css('z-index', 2);
	$('#img'+id).show();
	$('#img'+lastAd).fadeOut('1000');
	lastAd = id;
	nextAd = lastAd + 1;
	if (nextAd > 5) nextAd = 1;
}

var adInterval;
// 开启广告旋转
function startAd() {
	adInterval = setInterval('adShow()', 5000);
}
startAd();