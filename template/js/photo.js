document.addEventListener("DOMContentLoaded", function(event) {
	var collapse = document.getElementById('collapse');
	if (collapse) {
		var header = document.getElementById('navbar-collapse');
		
		collapse.addEventListener("click", function() {
			if (header.dataset.collapse == 0) {
				header.style.display = "block";
				header.dataset.collapse = 1;
			} else {
				header.style.display = "none";
				header.dataset.collapse = 0;
			}
			
		});
	}
});

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

function hover3(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background1 = element.children[1], styleSpan1 = background1.style;
	var background2 = element.children[2], styleSpan2 = background2.style;
	styleImg.opacity = 0.3;
	styleSpan1.opacity = 0.8;
	styleSpan2.opacity = 0.8;
}

function unhover3(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background1 = element.children[1], styleSpan1 = background1.style;
	var background2 = element.children[2], styleSpan2 = background2.style;
	styleImg.opacity = 1;
	styleSpan1.opacity = 0;
	styleSpan2.opacity = 0;
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
			var likes = document.getElementById('number-likes'); 
			var text = document.getElementById('number-likes').innerHTML;
			var childs = text.split(" ");
			var count = parseInt(childs[3]);
			if (count > 0) {
				count -= 1;
			}
			likes.innerHTML = childs[0] + " " + childs[1] + " " + childs[2] + " " + count;
		} else {
			element.className += " heart-liked";
			var likes = document.getElementById('number-likes'); 
			var text = document.getElementById('number-likes').innerHTML;
			var childs = text.split(" ");
			var count = parseInt(childs[3]);
			count += 1;
			likes.innerHTML = childs[0] + " " + childs[1] + " " + childs[2] + " " + count;
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

function delClass(e) {
	for (i = 0; i < e.childNodes.length; i++) {
		if (e.children[i] && (e.children[i].classList.contains('has-error') || e.children[i].classList.contains('has-success'))) {
			e.children[i].classList.remove("has-error");
			e.children[i].classList.remove("has-success");
		}
	}
	var helpBlocks = document.getElementsByClassName('help-block');
	if (helpBlocks) {
		for (i = 0; i < helpBlocks.length; i++) {
			helpBlocks[i].style.display = "none";
		}
	}
}

var searchUser = document.getElementById('search-user');
if (searchUser) {
	searchUser.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var searchLogin = document.getElementById('user-login');
		var helpBlock = document.getElementById('user-found');
		var login = searchLogin.value;
		
		var body = 'login=' + encodeURIComponent(login);
		
		xhr.open("POST", "/user/searchUser", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			switch (this.responseText) {
				case "exist":
					var close = document.getElementsByClassName('closes');
					if (close) {
						for (i = 0; i < close.length; i++) {
							document.getElementsByClassName('closes')[i].click();
						}
					}
					window.location.pathname = "/user/info/" + login;
					break;
				default:
					helpBlock.style.display = "block";
					helpBlock.textContent = "User not found";
					searchLogin.parentNode.className += " has-error";
			}
		}
	});
}