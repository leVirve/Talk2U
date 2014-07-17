$(function () {

	window.onload=function list_msg() {
		$.ajax({
			url: 'index.php',
			data: 'model=article&action=list',
			type : 'GET',
			dataType: 'json',
			success:function(msg) {
				for (var i = 0; i < msg['articleCount']; ++i) {
					$('#message').append(message_entry(msg.article[i], msg));
					$('#')
				}
			},
			error:function(xhr) {
				alert('發生錯誤');
			}
		});
	}

	$('body').on('click', '.b', function() {
		$.ajax({
			url: 'index.php',
			data: 'model=article&action=value' + 
				  '&opinion=' + $(this).attr('opi') + 
				  '&mid=' + $(this).attr('mid'),
			type : "GET",
			success:function(msg) {
				location.reload();
			},
			error:function(xhr) {
				console.log('發生錯誤');
			}
		});
		return false;
	});

	$('body').on('click', '.reply_submit', function() {
		$.ajax({
			url: 'index.php',
			data: 'model=article&action=reply' + 
				  '&content=' + $(this).prev().val() + 
				  '&mid=' + $(this).attr('mid'),
			type : "GET",
			success:function(msg) {
				location.reload();
			},
			error:function(xhr) {
				console.log('發生錯誤');
			}
		});
		return false;
	});
})

function message_entry (data, rawdata) {
	console.log(data);
	var poser = "<span><a href=index.php?user=" + data.account + ">" + data.account + "</a> 提議: </span>";
	var content = "<div class='msg_content'>" + data.content + '<br></div>';
	var bar = "<div  class='opinion'> 同意: " + data.agree + " / 反對: " +  data.oppose + "</div>";
	var opnion_bar = "<span><input type='button' class='b' opi='1' value='同意' name='agree' mid=" + data.id + ">" + 
					"<input type='button' class='b' opi='0' value='反對' name='oppose' mid=" + data.id + "></span>";
	var reply_bar = "<div><input type='text' class='reply_input' style='width: 300px;'>" + 
					"<input type='button' class='reply_submit' value='回覆' name='reply' mid=" + data.id + "></div>";
	return '<div class="msg">' + poser + content + bar + "<div class='btn'>" + opnion_bar + "</div>"
			 + '<div class="reply_block">' + reply_message(rawdata, data.id) + reply_bar + '</div></div>';
}

function reply_message(rawdata, id) {
	var string = "";
	console.log("reply" + rawdata['replyCount']);
	for(var i = 0; i < rawdata['replyCount']; ++i) {
		var obj = rawdata.reply[i];
		if(id == obj.reply_id) {
			string += '<div class="reply"><a href=index.php?user=' + obj.account+ '>' + obj.account + '</a>' +
			' : ' + obj.content + '</div>';
		}
	}
	return string;
}