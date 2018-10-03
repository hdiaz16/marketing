
  /* Chatbro Widget Embed Code Start*/
  function ChatbroLoader(chats, async) {
    async = async || true;  
    var params = {  
      embedChatsParameters: chats instanceof Array ? chats : [chats],
      needLoadCode: typeof Chatbro === "undefined"
    };
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;
    xhr.onload = function() {
      eval(xhr.responseText);
    };
    xhr.onerror = function() {
      console.error("Chatbro loading error");
    };
    xhr.open("POST", "//www.chatbro.com/embed_chats", async);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("parameters=" + encodeURIComponent(JSON.stringify(params)));
  }
  /* Chatbro Widget Embed Code End*/
  
  // suddenly if u read this remove next line. Debug only
  localStorage.clear(); 





    // Static chat
ChatbroLoader({
  chatPath: 'tg/208397015/MK',
  containerDivId: 'staticChat',
  chatLanguage: 'es',
  // important for static chat  
  isStatic: true, 
    
  allowMinimizeChat: false,
  // custom colors
  chatHeaderBackgroundColor: '#0015d3',
  chatHeaderTextColor: '#fff',
  chatBodyBackgroundColor: '#a3a3a3',
  chatBodyTextColor: '#fff',
  chatInputBackgroundColor: '#0015d3',
  chatInputTextColor: '#fff',
  chatHeight: '400',
  chatWidth: '400', 
  chatLeft: '400px'
});


