function hover(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background = element.children[1], styleSpan = background.style;
	styleImg.opacity = 0.3;
	styleSpan.opacity = 0.8;
}

function unhover(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background = element.children[1], styleSpan = background.style;
	styleImg.opacity = 1;
	styleSpan.opacity = 0;
}

function showDetails(id) {
	window.location.pathname = "/photos/" + id;
}

function replaceQuots(param) {
    var withoutQuots = param.replace(/"|'/g, function(match){
        return (match=="'") ? "&apos;" : "&quot;";
    });

    return withoutQuots;
}

function  stripTags(str, allowed_tags) { 
    var key = '', allowed = false; 
    var matches = []; 
    var allowed_array = []; 
    var allowed_tag = ''; 
    var i = 0; 
    var k = ''; 
    var html = ''; 

    var replacer = function(search, replace, str) { 
        return str.split(search).join(replace); 
    }; 
    
    if (allowed_tags) { 
        allowed_array = allowed_tags.match(/([a-zA-Z]+)/gi); 
    } 
    str += ''; 
    matches = str.match(/(<\/?[\S][^>]*>)/gi); 
    for (key in matches) { 
        if (isNaN(key)) {
            continue; 
        } 
        html = matches[key].toString(); 
        allowed = false; 
        for (k in allowed_array) {
            allowed_tag = allowed_array[k]; 
            i = -1; 

            if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+'>');} 
            if (i != 0) { i = html.toLowerCase().indexOf('<'+allowed_tag+' ');} 
            if (i != 0) { i = html.toLowerCase().indexOf('</'+allowed_tag)   ;} 

            if (i == 0) { 
                allowed = true; 
                break; 
            } 
        } 
        if (!allowed) { 
            str = replacer(html, "", str);
        } 
    } 
    return str; 
}

function likePhoto(element, imageId, userId, notif) {
	if (element.classList.contains('heart-liked')) {
		var like = 0;
	} else {
		var like = 1;
	}
	var email = document.getElementById('owner-mail').value;
	var xhr = new XMLHttpRequest();
	var body = 'user_id=' + encodeURIComponent(userId) + '&image_id=' + encodeURIComponent(imageId) + '&like_type=' + encodeURIComponent(like) + '&notif=' + encodeURIComponent(notif) + '&email=' + encodeURIComponent(email);
	
	xhr.open("POST", "/likeImage", true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	xhr.send(body);
	
	xhr.onload = function() {
		if (like == 0) {
			element.classList.remove("heart-liked");
		} else {
			element.className += " heart-liked";
		}
	}
}

if (input = document.getElementById('comment-input')) {
	input.addEventListener("keyup", function(e) {
		if (e.keyCode == 13) {
	        if (e.ctrlKey) {
	            var val = this.value;
	            if (typeof this.selectionStart == "number" && typeof this.selectionEnd == "number") {
	                var start = this.selectionStart;
	                this.value = val.slice(0, start) + "\n" + val.slice(this.selectionEnd);
	                this.selectionStart = this.selectionEnd = start + 1;
	            } else if (document.selection && document.selection.createRange) {
	                this.focus();
	                var range = document.selection.createRange();
	                range.text = "\r\n";
	                range.collapse(false);
	                range.select();
	            }
	        }
	        else {
	            var message = this.value;
	            message = stripTags(replaceQuots(message.trim())).trim();
	            if (message.length) {
		            this.value = "";
		            
		            var xhr = new XMLHttpRequest();
					var body = 'user_id=' + encodeURIComponent(document.getElementById('user-id').value) + '&image_id=' + encodeURIComponent(document.getElementById('photo-id').value) + '&message=' + encodeURIComponent(message) + '&notif=' + encodeURIComponent(document.getElementById('owner-notif').value) + '&email=' + encodeURIComponent(document.getElementById('owner-mail').value);
					
					xhr.open("POST", "/postComment", true);
					xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
					xhr.send(body);
					
					xhr.onload = function() {
						var div = document.createElement('div');
						var newComment = "<div>" +
								            "<div class='avatar'>" +
								            	"<a href='/user/info/" + document.getElementById('user-name').value + "'>" +
								                	"<img alt='avatar' src='" + document.getElementById('user-pic').value + "' />" +
							                	"</a>" +
								            "</div>" +
								            "<div class='msg'>" +
								                "<div class='tri'></div>" +
								                "<div class='msg_inner'>" + message + "</div>" +
								            "</div>" +
								        "</div>";
						div.innerHTML = newComment;
						document.getElementsByClassName('messages')[0].appendChild(div);
	/*
						var scrollBottom = Math.max(document.getElementsByClassName('messages')[0].offsetHeight - document.getElementsByClassName('test')[0].offsetHeight, 0);
				        document.getElementsByClassName('messages')[0].scrollTop(scrollBottom);
	*/
					}
	            }
	        }
	    }
	});
}