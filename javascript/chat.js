const form = document.querySelector(".typing-area"),
      incoming_id = form.querySelector(".incoming_id").value,
      project_id = form.querySelector(".project_id").value,
      inputField = form.querySelector(".input-field"),
      chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
};

form.querySelector("button").onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/send-message.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            inputField.value = "";
            scrollToBottom();
        }
    };
    let formData = new FormData(form);
    formData.append("project_id", project_id);
    xhr.send(formData);
};

setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200){
            chatBox.innerHTML = xhr.response;
            scrollToBottom();
        }
    };
    let formData = new FormData(form);
    formData.append("project_id", project_id);
    xhr.send(formData);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}
