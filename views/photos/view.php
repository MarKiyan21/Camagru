<body>
<?php include (ROOT.'/views/layouts/header.php');?>

<style>
#main {
	flex-grow: 1;
	height: 100%;
	min-width: 300px;
	background-color: #E7EDED;
	width: 600px;
	display: flex;
	flex-direction: column;
	justify-content: space-between;
}

.avatar img{
	width: 40px;
	height: 40px;
	border-radius: 100%;
}

#main footer{
	background-color: #fff;
	padding: 10px;
	display: flex;
	justify-content: space-between;
}

#main footer textarea{
	flex-grow: 2;
	margin: 0 10px;
	resize: none;
	border: none;
	padding-top: 5px;
	height: 20px;
}

#main footer textarea:focus{
	outline: none;	
}

#main footer i{
	color: #c0c0c0;
	cursor: pointer;
}

#messages{
	overflow: auto;
	flex-grow: 2;
	padding: 10px;
}

#messages article{
	display: flex;
	justify-content: flex-start;
	margin-bottom: 20px;
}

#messages article .avatar{
	margin-right: 10px;
}

.msg {
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

.msg_inner {
	background-color: #fff;
	width: 100%;
	min-width: 30%;
	padding: 15px 10px;
	border-radius: 0 4px 4px 4px;
	box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
	text-align: left;
}

</style>

<section id="main">
    <section id="messages">

        <article>
            <div class="avatar">
                <img alt="avatar" src="https://goo.gl/1D6wCQ" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Hi sweetie</div>
            </div>
        </article>

        <article>
            <div class="avatar">
                <img alt="avatar" src="https://goo.gl/1D6wCQ" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!Yaaaay! Bring me some chocolate!</div>
            </div>
        </article>

        <article>
            <div class="avatar">
                <img alt="avatar" src="https://goo.gl/1D6wCQ" />
            </div>
            <div class="msg">
                <div class="tri"></div>
                <div class="msg_inner">Ok. Bye!</div>
            </div>
        </article>

    </section>
    <footer>
        <i class="material-icons">attach_file</i>
        <textarea placeholder="Say something..."></textarea><i class="material-icons">send</i>
    </footer>
</section>

<?php include (ROOT.'/views/layouts/footer.php');?>
</body>
</html>