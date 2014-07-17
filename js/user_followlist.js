$(function () {

	window.onload=function list_msg() {
		$.ajax({
			url: 'index.php',
			data: 'model=article&action=follow',
			type : 'GET',
			dataType: 'json',
			success:function(data) {
				for (var i = 0; i < data['rowsCount']; ++i) {
					for(var j = 0; j < data['articlesCount']; ++j) {
						if(data.rows[i].postid == data.articles[j].id) 
							$('#message').append(message_entry(data.articles[j]));
					}
				}
			},
			error:function(xhr) {
				alert('發生錯誤');
			}
		});
	}
})

function message_entry (data) {
	var poser = "<span><a href=index.php?user=" + data.account + ">" + data.account + "</a> 提議: </span>";
	var content = "<div class='msg_content'>" + data.content + '<br></div>';
	var bar = "<div  class='opinion'> 同意: " + data.agree + " / 反對: " +  data.oppose + "</div>";
	var opnion_bar = "<span><input type='button' class='b' opi='1' value='同意' name='agree' mid=" + data.id + ">" + 
					"<input type='button' class='b' opi='0' value='反對' name='oppose' mid=" + data.id + "></span>";
	var reply_bar = "<div><input type='text' class='reply_input' style='width: 300px;'>" + 
					"<input type='button' class='reply_submit' value='回覆' name='reply' mid=" + data.id + "></div>";
	return '<div class="msg">' + poser + content + bar + "<div class='btn'>" + /*opnion_bar +*/ "</div>";
			 //+ '<div class="reply_block">' +  reply_bar + '</div></div>';
}
