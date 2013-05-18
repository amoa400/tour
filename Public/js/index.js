var lastDetailId = 0;

// 显示详情
function showDetail(id) {
	if (id == 0) id = lastDetailId;
	lastDetailId = id;
	$('#detail'+id).show();
	$('#block'+id).show();
	$('.product_ad').show();
	
}
// 隐藏详情
function hideDetail(id) {
	if (id == 0) id = lastDetailId;
	lastDetailId = id;
	$('#detail'+id).hide();
	$('#block'+id).hide();
	$('.product_ad').hide();
}

var nextAdId = 2;
var adInterval;
// 显示广告
function showAd(id) {
	if (id == null) id = nextAdId;
	else clearInterval(adInterval);
	for (var i = 1; i <= 4; i++) {
		$('#ad'+i).hide();
		$('#adli'+i).removeClass('hover');
	}
	$('#ad'+id).show();
	$('#adli'+id).addClass('hover');
	nextAdId = id+1;
	if (nextAdId > 4) nextAdId = 1;
}
// 开启广告旋转
function startAd() {
	adInterval = setInterval('showAd()', 4000);
}
startAd();

// 获取主题推荐线路
function getTLine(z, typeId) {
	$('#search .navi li').removeClass('selected');
	$('#type'+typeId).addClass('selected');
	//$('#search .result').html('<br>努力加载中...');
	$.post(
		getTLinePostUrl, 
		{z:z,type_id:typeId},
		function(data) {
			var template = $('#itemTemplate').html();
			$('#search .result').html('');
			if (data == null)
				$('#search .result').html('<br>暂无相应线路');
			else {
				for (var i = 0; i < data.length; i++) {
					var t = template;
					t = t.replace(/@@line.id/g, data[i].id);
					t = t.replace(/@@line.id/g, data[i].id);
					t = t.replace(/@@line.name/g, data[i].name);
					t = t.replace(/@@line.character/g, data[i].character);
					var flag = false;
					var point_type = '';
					for(var key in data[i].point_type) {
						if (flag) point_type += '、';
						else flag = true;
						point_type += data[i].point_type[key].name;
					}
					t = t.replace(/@@line.point_type/g, point_type);
					t = t.replace(/@@line.satisfaction/g, data[i].satisfaction);
					t = t.replace(/@@line.sell_count/g, data[i].sell_count);
					t = t.replace(/@@line.comment_count/g, data[i].comment_count);
					var schedule = '';
					if (z != 4) {
						var flag = false;
						for(var key in data[i].schedule) {
							if (flag) schedule += '、';
							else flag = true;
							schedule += data[i].schedule[key].date2;
						}
					} else {
						schedule = '根据您的定制，每天均可发团，接受线路调整，路线定制';
						t = t.replace(/更多团期/g, '');
					}
					t = t.replace(/@@line.schedule/g, schedule);
					t = t.replace(/@@line.price/g, data[i].price);
					t = t.replace(/@@line.di_price/g, data[i].di_price);
					t = t.replace(/@@line.song_price/g, data[i].di_price*4);
					$('#search .result').append(t);
				}
				var typeName = $('#type'+typeId).html();
				typeName = typeName.replace(/\n/g, '');
				typeName = typeName.replace(/\t/g, '');
				$('#search .result').append('<div class="more"><a href="'+typeUrl[typeId]+'" target="_blank">更多'+typeName+'路线>></div>');
			}
		}
	);
}
