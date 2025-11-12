<div id="content" style="wdith:100%">
    <div class="page-left">
        <div v-show="type=='text'" class="AI-chat-panel">
            <h3>聊天室</h3>
            <div id="panel-messages_-" class="panel-messages">
                <div class="message title-message">欢迎使用AI聊天功能！</div>
            </div>
            <div class="panel-footer">
                <input v-model="sendStr" class="footer-ipt" type="text" placeholder="请输入内容..." />
                <el-button :disabled="sendBtnDisbled" type="primary" class="footer-send prm-btn" @click="sendMsg">
                    {{ sendBtnText }}</el-button>
            </div>
        </div>
        <div class="chat-content chat-document" v-show="type=='document'">
            <div style="margin: 10px 0">
                <span>关键词：</span>
                <el-input v-model="sendStrDocument" type="textarea" type="text" placeholder="请输入内容..." />
            </div>

            <div>
                <el-button :disabled="sendBtnDisbledDocument" type="primary" class="footer-send prm-btn"
                    @click="sendMsgDocument">{{ sendBtnTextDocument }}</el-button>
            </div>
            <div>
                <span>预览</span>
                <pre class="chat-document-preview" id="chat-document-preview_--_"></pre>
            </div>
        </div>
        <div class="chat-content chat-video" v-show="type=='video'">video</div>
    </div>
</div>

<script></script>