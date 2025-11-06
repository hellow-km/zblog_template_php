


<div id="content">
    <div class="page-left">
<div v-show="type=='text'" class='AI-chat-panel'>
    <h3>聊天室</h3>
    <div id="panel-messages_-" class='panel-messages'>
        <div class='message title-message'>欢迎使用AI聊天功能！</div>
    </div>
    <div class='panel-footer'>
        <input v-model="sendStr" class='footer-ipt' type='text' placeholder='请输入内容...'/>
        <el-button :disabled="sendBtnDisbled" type="primary" class='footer-send prm-btn' @click='sendMsg'>{{sendBtnText}}</el-button>
    </div>
</div>
<div class="chat-content chat-document" v-show="type=='document'">
    <div style="margin: 10px 0;">
        <span>关键词：</span> <el-input v-model="sendStrDocument" type="textarea"  type='text' placeholder='请输入内容...'/>
    </div>
       
        <div>
            <el-button :disabled="sendBtnDisbledDocument" type="primary" class='footer-send prm-btn' @click='sendMsgDocument'>{{sendBtnTextDocument}}</el-button>
        </div>
        <div>
          <span>预览</span> <pre id="chat-document-preview_--_"></pre>
        </div>
</div>
      <div class="chat-content chat-video" v-show="type=='video'">
        video
      </div>
    </div>
</div>

<script>

</script>

<style>
.page-left{
    width:200px;
    float:left;
    border-right:1px solid #eee;
    height:100vh;
    padding:10px;
    box-sizing:border-box;
}
.chat-content{
    padding: 10px;
}
.page-panel-footer{
  display: flex;
}
#chat-document-preview_--_{
    white-space: break-spaces;
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 10px;
    min-height: 300px;
    max-height: 600px;
    overflow-y: auto;
    width: 800px;
}
.AI-chat-panel_g{
    display: none;
    position: absolute;
    right: 60px;
    bottom:  90px;
    width: 600px;
    height: 800px;
    background-color: white;
    border: 1px solid black;
    display: none;

}

.AI-chat-panel_g h3{
    text-align: center;
    margin: 0;
    padding: 10px;
    background-color: #f2f2f2;
    border-bottom: 1px solid #ccc;
}

.AI-chat-panel_g .panel-footer{
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    display: flex;
    padding: 10px;
}

.AI-chat-panel_g .panel-footer .footer-ipt{
    width: 80%;
    height: 30px;
    margin: 2px;
    flex: 1;
    padding: 10px 14px;
    border: 1px solid #d0d7e0;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    background: #ffffffcc;
    transition: all 0.25s ease;
}

.AI-chat-panel_g .panel-footer .footer-ipt:focus{
    border-color: #4A90E2;
    background: #fff;
    box-shadow: 0 0 0 3px rgba(74,144,226,0.25);
}

.prm-btn{
   height: 34px;
    margin: 0 6px;
    background: #4A90E2;
    color: #fff;
    border: none;
    padding: 12px 18px;
    border-radius: 50px;
    cursor: pointer;
    font-size: 14px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.15);
    transition: 0.3s;
    line-height: 11px;
    text-align: center;
}

.prm-btn:hover{
    background: #357ABD;
}

.AI-chat-panel_g .panel-footer .footer-send{
 
}

.AI-chat-panel_g .panel-messages{
    padding: 10px;
    overflow: hidden;
    overflow-y: auto;
}

.AI-chat-panel_g .panel-messages .user-message{
    text-align: right;
    margin-left: auto;
    background-color: #23adcf;
    color: #fff;
}

.user-message .avatar-icon{
    margin-left: 10px;
}

.AI-chat-panel_g .panel-messages .ai-message{
    text-align: left;
}

.AI-chat-panel_g .panel-messages .user-message,.AI-chat-panel_g .panel-messages .ai-message{
    padding: 8px;
    border: 1px solid #eee;
    border-radius: 6px;
    max-width: 75%;
}
.AI-chat-panel_g .title-message{
    text-align: center;
    color: gray;
    margin-bottom: 10px;
}

.avatar-icon{
    border-radius: 50%;
    margin: 0 8px;
}

</style>