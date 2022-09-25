	var pre = "</br>";
	var w = 455; //screen.width/4.0;
	var l = 0;
	var h = 655; //screen.height/1.4
	
	function popup(url) {
	  window.open(url, "", "left=" + l + ", width=" + w + ", height=" + h);
	  l+=w;
	}

	function getNowDateTimeStr(){
	 	var now = new Date();
	 	var hour = now.getHours() - (now.getHours() >= 12 ? 12 : 0);
		return [[AddZero(now.getDate()), AddZero(now.getMonth() + 1), now.getFullYear()].join("/"), [AddZero(hour), AddZero(now.getMinutes()), AddZero(now.getSeconds())].join(":"), now.getHours() >= 12 ? "PM" : "AM"].join(" ");
	}
	function AddZero(num) {
	    return (num >= 0 && num < 10) ? "0" + num : num + "";
	}
	function refresh() {
		var money = $("#money").text();
		var coin = $("#coin").text();
		$.ajax({
			type: 'GET',
			url: 'member.php',
			dataType : 'JSON',
			success:function(data) {
				console.log('\n' + data.available);
				var value = data.available - money;
				var value2 = data.total - coin;
				if (value > 0) {
					$("#money").text(data.available);
					$("#coin").text(data.total);
					$("#alert-status").fadeOut('slow', function() {
						$("#status" ).html('Bạn đã nhận được <b>' + value + '</b> đ');
						$("#alert-status").fadeIn('slow');	
					});	
					pre += getNowDateTimeStr() + ': Bạn đã nhận được <b>' + value2 + '</b> coin và <b>' + value + '</b> đ - Tổng là tiền của bạn là <b>' + data.available + '</b> đ</br></br>';
					$('#pre-1').html(pre);
				}
				setTimeout(refresh, 30000);
			}
		}); 
	}
	refresh();
	var clipboard = new Clipboard('.btn1');
	clipboard.on('success', function(e) {
		
	});
	var clipboard = new Clipboard('.btn');
	clipboard.on('success', function(e) {
		//if(!l) alert('Đã sao chép mã làm việc của bạn là: ' + $("#wallet").text() + '\nHãy dán vào ô "Your XRB account" để làm việc nhé!');
		popup("https://faucet.raiblockscommunity.net/form.php");
	});
	clipboard.on('error', function(e) {
	    //alert('Lỗi rùi!\nThử tự copy ở chỗ "Mã làm việc" lại xem nào!');
	    popup("https://faucet.raiblockscommunity.net/form.php");
	});
