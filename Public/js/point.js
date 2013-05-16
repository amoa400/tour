var completeList = Array();
var totComplete = 0;

function showDetail(id) {
	for (var i = 0; i < totComplete; i++) {
		if (completeList[i] == id) return;
	}
	$('#tt'+id).html('<img src="'+loadingPic+'">');

	$.post(
		postUrl, 
		{ticket_id:id},
		function(data) {
			var tot = data.length;
			$('#calendar'+id).fullCalendar({
				header: {
					left: 'none',
					center: 'title',
					right: 'prev,next'
				},
				firstDay:1,
				monthNames:['一月','二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月'],
				dayNamesShort:['日', '一', '二', '三', '四', '五', '六'],
				eventClick: function(event) {
					var id = event.id;
					var year = (1900+event.start.getYear());
					var month = ''+(event.start.getMonth()+1);
					if (month.length == 1) month = '0'+month;
					var day = ''+event.start.getDate();
					var weekArr = Array('星期日','星期一','星期二','星期三','星期四','星期五','星期六');
					var week = weekArr[event.start.getDay()];
					if (day.length == 1) day = '0'+day;
					var date = year+'-'+month+'-'+day;
					var ticket_id = event.color;
					//$('#departure_date').val(date+'，'+week+'，'+money+'/成人');
					//$('#departure_date2').val(id);
					showOrder(point_id, date, ticket_id);
				},
			});
			var source = new Array();
			for (var i = 0; i < tot; i++) {
				source[i] = new Array();
				source[i]['id'] = data[i].id;
				source[i]['title'] = data[i].price+'元';
				source[i]['start'] = data[i].date;
				source[i]['color'] = data[i].ticket_id;
				
			}
			$('#calendar'+id).fullCalendar('addEventSource', source);
			//setTimeout("$('#calendar"+id+"').fullCalendar('prev');", 100);
			//setTimeout("$('#calendar"+id+"').fullCalendar('next');", 150);
			completeList[totComplete] = id;
			totComplete++;
			$('#tt'+id).html('出行价格表');
		}
	);

}

function inverseDetail(id) {
	if ($('#detail'+id).css('display') == 'none') {
		$('#detail'+id).show('fast');
		setTimeout("showDetail("+id+")", 100);
	}
	else {
		$('#detail'+id).hide('fast');
	}
}

function showOrder(point_id, date, ticket_id) {
	$('#orderDiv').css('display', 'block');
	$("#grey").css('display', 'block');
	$('#grey').css('height', document.body.clientHeight+'px');
	var top = parseInt(($(window).height() - $('#orderDiv').outerHeight())/2 + $(document).scrollTop());
	var left = parseInt(($(window).width() - $('#orderDiv').outerWidth())/2);
	$('#orderDiv').css('top', top+'px');
	$('#orderDiv').css('left', left+'px');
	
	// 抓取内容
	$.post(
		postUrl2,
		{
			point_id: point_id,
			date: date
		},
		function(data) {
			var tot = data.length;
			var s = "";
			for (var i = 0; i < tot; i++) {
				s += "<div class='item'>";
				s += "<span class='tt'>"+data[i].ticket.name_abb+"：</span>";
				s += "<span class='ct'>";
				s += "<i class='icon icon_dec' onclick='decCount("+data[i].ticket_id+")'></i>&nbsp;";
				if (data[i].ticket_id != ticket_id)
					s += "<input name='ticket_"+data[i].ticket_id+"' id='count"+data[i].ticket_id+"' class='count' type='text' value='0'/>&nbsp;";
				else
					s += "<input name='ticket_"+data[i].ticket_id+"' id='count"+data[i].ticket_id+"' class='count' type='text' value='1'/>&nbsp;";
				s += "<i class='icon icon_inc' onclick='incCount("+data[i].ticket_id+")'></i>&nbsp;";
				s += "</span>";
				s += "<span class='price'>¥"+data[i].price+"</span>";
				s += "<span>&nbsp;/ 份</span>";
				s += "</div>";
			}
			//alert(s);
			$('#orderDiv .content .date').html(date)
			$('#date').val(date);;
			$('#itemList').html(s);
		}
	);
}

function hideOrder() {
	$('#orderDiv').css('display', 'none');
	$("#grey").css('display', 'none');
}

function decCount(id) {
	var t = parseInt($('#count'+id).val());
	t--;
	if (t < 0 ) t = 0;
	$('#count'+id).val(t);
}

function incCount(id) {
	var t = parseInt($('#count'+id).val());
	t++;
	$('#count'+id).val(t);
}