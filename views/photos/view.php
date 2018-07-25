<?php include (ROOT.'/views/layouts/header.php');?>

<style>

.comment-area {
	width: 80%;
	margin: 0 auto;
	background-color: #E7EDED;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}

#messages .avatar img{
	width: 40px;
	height: 40px;
	border-radius: 100%;
	border: 1px solid #007bb6;
}

.comment-area .input{
	background-color: #fff;
	padding: 10px;
	display: flex;
	justify-content: space-between;
}

.comment-area textarea{
	flex-grow: 2;
	margin: 0 10px;
	resize: none;
	border: none;
	padding-top: 5px;
	height: 20px;
}

.comment-area textarea:focus{
	outline: none;	
}

.comment-area i{
	color: #c0c0c0;
	cursor: pointer;
}

#messages{
	overflow: auto;
	padding: 10px;
}

#messages div{
	display: flex;
	justify-content: flex-start;
	margin-bottom: 5px;
}

.msg{
	display: flex;
	justify-content: space-between;
}

.msg .tri{
	width: 0;
	height: 0;
	border-style: solid;
	border-width: 0 10px 15px 0;
	border-color: transparent #ffffff transparent transparent;
}

.msg_inner{
	background-color: #fff;
	padding: 15px 10px;
	border-radius: 3px;
	box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
	text-align: left;
}

</style>

<div class="comment-area">
    <div id="messages">

        <div>
            <div class="avatar">
                <img alt="avatar" src="/template/img/avatars/nopic.png" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Hi sweetie</div>
            </div>
        </div>

        <div>
            <div class="avatar">
                <img alt="avatar" src="/template/img/avatars/nopic.png" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Hello sweetheart. I'm coming home sooner today.</div>
            </div>
        </div>

        <div>
            <div class="avatar">
                <img alt="avatar" src="/template/img/avatars/nopic.png" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Yaaaay! Bring me some chocolate!</div>
            </div>
        </div>

        <div>
            <div class="avatar">
                <img alt="avatar" src="/template/img/avatars/nopic.png" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Sure.</div>
            </div>
        </div>

        <div>
            <div class="avatar">
                <img alt="avatar" src="/template/img/avatars/nopic.png" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Ok. Bye!</div>
            </div>
        </div>
        
        <div class="input">
	        <i class="material-icons">attach_file</i>
	        <textarea placeholder="Say something..."></textarea><i class="material-icons">send</i>
    	</div>

    </div>
    	
</div>

<?php include (ROOT.'/views/layouts/footer.php');?>
</body>
</html>