<?php  /* Template Name:首页及列表页 */  ?>
<!DOCTYPE html>
<html lang="<?php  echo $lang['lang_bcp47'];  ?>">
  <head>
    <?php  include $this->GetTemplate('header');  ?>
  </head>

  <style>
    .page {
      width: 100%;
      height: 100%;
      padding: 0;
      margin: 0;
    }
    .page-header {
      width: 100%;
      height: 40px;
      margin: 0;
      padding: 0;
      border-bottom: 1px solid #eee;
    }
    .page-main {
      display: flex;
      width: 100%;
      height: calc(100vh - 120px);
    }
    .page-side {
      width: 200px;
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .page-content {
      position: relative;
      flex: 1;
      height: 100%;
      margin: 0;
      padding: 0;
    }
    .page-footer {
      font-size: 14px;
      text-align: center;
      border-top: 1px solid #eee;
      height: 80px;
      padding-top: 5px;
    }
  </style>

  <body>
    <div id="app">
      <div class="page">
        <div class="page-header"><?php  include $this->GetTemplate('header2');  ?></div>
        <div class="page-main">
          <div class="page-side" style="width: 200px"><?php  include $this->GetTemplate('side');  ?></div>
          <div class="page-content"><?php  include $this->GetTemplate('content');  ?></div>
        </div>

        <div class="page-footer"><?php  include $this->GetTemplate('footer');  ?></div>
      </div>
    </div>
  </body>

  <script>
    var app = new Vue({
      el: "#app",
      data: {
        leftBarData: [
          { name: "文本对话", type: "text", icon: "el-icon-document" },
          { name: "文章生成", type: "document", icon: "el-icon-document" },
          { name: "视频生成", type: "video", icon: "el-icon-video-camera" },
        ],
        type: "text",
        sendStr: "",
        sendStrDocument: "",
        sendBtnText: "发送",
        sendBtnTextDocument: "生成",
        sendBtnDisbled: false,
        sendBtnDisbledDocument: false,
        messageList: [],
      },
      created() {},
      methods: {
        changeMode(type) {
          this.type = type;
        },
        sendMsg() {
          var userInput = this.sendStr;
          if (userInput.trim() === "") {
            alert("请输入内容");
            return;
          }
          this.sendBtnText = "正在思考中...";
          this.sendBtnDisbled = true;
          this.appendMessage(userInput, "user");
          this.sendStr = "";

          fetch("zb_system/admin/chat.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "msg=" + encodeURIComponent(userInput),
          })
            .then((response) => response.json())
            .then((data) => {
              this.appendMessage(data.reply ?? "AI未返回内容", "ai");
            })
            .catch((err) => {
              this.appendMessage("请求失败，请稍后再试。", "ai");
            })
            .finally(() => {
              this.sendBtnText = "发送";
              this.sendBtnDisbled = false;
            });
        },
        appendMessage(message, sender) {
          var messageBox = document.createElement("div");
          Object.assign(messageBox.style, {
            display: "flex",
            alignItems: "center",
            marginBottom: "10px",
          });

          let img = document.createElement("img");
          img.width = 30;
          img.height = 30;
          img.className = "avatar-icon";
          img.src =
            "zb_users/theme/AIChat/" +
            (sender === "user" ? "user-icon.png" : "ai-icon.png");

          var messageDiv = document.createElement("div");
          messageDiv.className =
            sender === "user" ? "message user-message" : "message ai-message";
          messageDiv.textContent = message;

          if (sender === "user") {
            messageBox.appendChild(messageDiv);
            messageBox.appendChild(img);
          } else {
            messageBox.appendChild(img);
            messageBox.appendChild(messageDiv);
          }

          document.querySelector("#panel-messages_-").appendChild(messageBox);
        },
        sendMsgDocument() {
          var userInput = this.sendStrDocument;
          if (userInput.trim() === "") {
            alert("请输入内容");
            return;
          }
          this.sendBtnTextDocument = "正在思考中...";
          this.sendBtnDisbledDocument = true;
          this.appendMessage(userInput, "user");
          //this.sendStrDocument = '';

          fetch("zb_system/admin/chat_document.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "msg=" + encodeURIComponent(userInput),
          })
            .then((response) => response.json())
            .then((data) => {
              document.querySelector("#chat-document-preview_--_").textContent =
                data.reply ?? "AI未返回内容";
            })
            .catch((err) => {
              document.querySelector("#chat-document-preview_--_").textContent =
                "请求失败，请稍后再试。";
            })
            .finally(() => {
              this.sendBtnTextDocument = "生成";
              this.sendBtnDisbledDocument = false;
            });
        },
      },
    });
  </script>
</html>
