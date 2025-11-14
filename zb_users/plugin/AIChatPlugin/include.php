<?php
RegisterPlugin("AIChatPlugin","ActivePlugin_AIChat");
$model=$zbp->Config('AIChatPlugin')->use_model;

function UpdatePlugin_AIChatPlugin()
{
    global $zbp;
	$model=$zbp->Config('AIChatPlugin')->use_model;
}

function InstallPlugin_AIChatPlugin() {
  
}


$btnText="AI聊天";
echo '<link href="'.$zbp->host.'zb_users/plugin/AIChatPlugin/default.css?v=1.0" rel="stylesheet">'."\r\n";
$htmlStr="<div class='AI-chat-btn' style='display:" . 
    ($zbp->Config('AIChatPlugin')->show_enable == '1' ? "block" : "none") . 
"'>
<div class='AI-chat-panel_g'>
    <h3>聊天室</h3>
    <div class='panel-messages'>
        <div class='message title-message'>欢迎使用AI聊天功能！</div>
    </div>
    <div class='panel-footer'>
        <input class='footer-ipt' type='text' placeholder='请输入内容...'/>
        <button class='footer-send prm-btn' onclick='sendMsg()'>发送</button>
    </div>
</div>
<button class='ai-plugin-prm-btn toggle-btn' onclick='onclickChatBtn()'>"
. $btnText .
"</button>
</div>";

echo $htmlStr;
echo "
<script>
    function onclickChatBtn() {
        $('.AI-chat-panel_g').toggleClass('active');
    }

    function sendMsg() {
        var userInput = document.querySelector('.footer-ipt').value;
        if (userInput.trim() === '') {
            alert('请输入内容');
            return;
        }

        appendMessage(userInput, 'user'); 
        document.querySelector('.footer-ipt').value = '';
        toggleSendBtn(true);

        fetch('".$zbp->host."zb_users/plugin/AIChatPlugin/chat_plugin.php', {   
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'msg=' + encodeURIComponent(userInput)+'&model=".$model."'
        })
        .then(response => response.json())
        .then(data => {
            appendMessage(data.reply ?? 'AI未返回内容', 'ai');
        })
        .catch(err => {
            appendMessage('请求失败，请稍后再试。', 'ai');
        })
        .finally(() => {
            toggleSendBtn(false);
        });
    }

    function toggleSendBtn(flag) {
        const btn = document.querySelector('.footer-send');
        btn.disabled = flag;
        btn.textContent = flag ? '思考中...' : '发送';
    }

    function appendMessage(message, sender) {
        var messageBox = document.createElement('div');
        Object.assign(messageBox.style, {display: 'flex', alignItems: 'center', marginBottom: '10px'}); //
        let img=document.createElement('img');
        img.width=30;
        img.height=30;
        img.className='avatar-icon';
        img.src='".$zbp->host."zb_users/plugin/AIChatPlugin/' + (sender === 'user' ? 'user-icon.png' : 'ai-icon.png');

        var messageDiv = document.createElement('div');
        messageDiv.className = sender === 'user' ? 'message user-message' : 'message ai-message';
        messageDiv.textContent = message;
        if(sender === 'user'){
            messageBox.appendChild(messageDiv);
            messageBox.appendChild(img);
        } else {
            messageBox.appendChild(img);
            messageBox.appendChild(messageDiv);
        }
      
        document.querySelector('.panel-messages').appendChild(messageBox);
    }
</script>
";