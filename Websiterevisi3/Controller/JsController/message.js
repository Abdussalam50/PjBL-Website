const MenuChat = document.querySelector("#chat-block");

const currPageUrl = window.location.href;
var urlParams = new URLSearchParams(new URL(currPageUrl).search);
const valParams = (typeof userClass !== 'undefined') ? urlParams.get("kelas") : classuser;
const valParams2 = typeof urlParams.get("group")!=='undefined'?urlParams.get("group") : urlParams.get('kelas');
console.log(valParams2);
const chatContainer = document.getElementById("chat-block");
const inputMsg = document.querySelector("#promptMsg");

    
    if (valParams2) {   
        function sendMessage(){
        const msgs = inputMsg.value;
        const datagrpMsg={
            username:userId,
            msg:msgs,
            kelas:valParams,
            grp:valParams2
        }

        if(msgs===""){
            alert('Please enter the message!');
        }else{
            const xhrGroupMsg=new XMLHttpRequest();
            xhrGroupMsg.onload=function(){
                console.log(this.responseText);
            }
            xhrGroupMsg.open('POST','Controller/notifHandler.php');
            xhrGroupMsg.setRequestHeader('Content-Type', 'application/json');
            xhrGroupMsg.send(JSON.stringify(datagrpMsg));
            const groupMsgNotif=new XMLHttpRequest();
            groupMsgNotif.onload=function(){}
            groupMsgNotif.open('POST','Controller/sendNotifForDiscuss.php');
            groupMsgNotif.setRequestHeader('Content-Type','application/json');
            groupMsgNotif.send(JSON.stringify(datagrpMsg));
            const dateTime= new Date();
            const timeLocal=dateTime.toLocaleString();
            const groupMember=document.createElement('div');
            groupMember.setAttribute('class','container-fluid d-flex justify-content-end mt-5 mb-3');
            const blockMsg=document.createElement('div');
            blockMsg.setAttribute('class','bg-secondary rounded-3');
            blockMsg.setAttribute('id','personal-chat');
            const userElement=document.createElement('span');
            userElement.innerHTML=userId;
            userElement.setAttribute("class", "lead text-white fs-6 mb-0 py-3 px-3 fw-3");
            const userMsgs=document.createElement('p');
            userMsgs.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3");
            userMsgs.innerHTML=msgs;
            userMsgs.setAttribute('id','usersMsg');
            const timeCurrent=document.createElement('span');
            timeCurrent.innerHTML=timeLocal;
            timeCurrent.setAttribute('class','text-muted small text-secondary mb-0 py-0 px-3')
            blockMsg.appendChild(userElement);
            blockMsg.appendChild(userMsgs);
            blockMsg.appendChild(timeCurrent);
            groupMember.appendChild(blockMsg);
            const lengContent=MenuChat.querySelectorAll('div');
            var countLength=lengContent.length-1;
            MenuChat.insertBefore(groupMember,lengContent[countLength]);

        }

        if(inputMsg.value=''){
            acceptMessage;
        }
        }
     } else {
        function sendMessage(){
        const msg = inputMsg.value;
        const dataMsg = {
            username: userId,
            msg:msg,
            kelas: valParams,
        }
        if (msg === "") {
            alert('Please enter the message!');
        } else {

            const xhrMessaging = new XMLHttpRequest();
            xhrMessaging.onload = function () {
                console.log(this.responseText);
            }
            xhrMessaging.open("POST", "Controller/notifHandler.php");
            xhrMessaging.setRequestHeader("Content-Type", "application/json");
            xhrMessaging.send(JSON.stringify(dataMsg));

            const xhrMessageNotif = new XMLHttpRequest();
            xhrMessageNotif.onload = function () {
                console.log(this.responseText);
            }
            xhrMessageNotif.open("POST", "Controller/sendNotifForDiscuss.php");
            xhrMessageNotif.setRequestHeader("Content-Type", "application/json");
            xhrMessageNotif.send(JSON.stringify(dataMsg));
            const datetime = new Date();
            const time = datetime.toLocaleString();
            const sendMessage = document.createElement("div");
            sendMessage.setAttribute("class", "container-fluid d-flex justify-content-end mt-5 mb-3");
            const blockSend = document.createElement("div");
            blockSend.setAttribute("class", "bg-secondary rounded-3");
            blockSend.setAttribute("id", "personal-chat");
            const userSend = document.createElement("span");
            userSend.innerHTML = userId;
            userSend.setAttribute("class", "lead text-white fs-6 mb-0 py-3 px-3 fw-3")
            const userMsg = document.createElement("p");
            userMsg.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3");
            userMsg.innerHTML = msg;
            userMsg.setAttribute("id", "usersMsg");
            const userTime = document.createElement("span");
            userTime.setAttribute("class", "text-muted small text-secondary mb-0 py-0 px-3");
            userTime.innerHTML = time;
            blockSend.appendChild(userSend);
            blockSend.appendChild(userMsg);
            blockSend.appendChild(userTime);
            sendMessage.appendChild(blockSend);
            const leng = MenuChat.querySelectorAll("div");
            const cout = leng.length - 1;
            MenuChat.insertBefore(sendMessage, leng[cout]);

            if (inputMsg.value = '') {
                acceptMessage;
            }
        }
    }
    }




waitEvent(function (data) {
    const parsing = JSON.parse(data);

    const user = parsing.username;
    const messageBody = parsing.message;
    const timeMsg = parsing.date;

    if (userId == user) {
        return "";
    } else {
        const Message = document.createElement("div");
        Message.setAttribute("class", "container-fluid d-flex justify-content-start mt-5");

        const blockChat = document.createElement("div");
        blockChat.setAttribute("class", "bg-light rounded-3");
        blockChat.setAttribute("id", "personal-chat");
        const username = document.createElement("span");
        username.setAttribute("class", "lead text-secondary fs-6 mb-0 py-3 px-3");
        const message = document.createElement("p");
        message.setAttribute("class", "lead text-secondary fs-6 mb-0 pt-3 px-3");
        const times = document.createElement("span");
        times.setAttribute("class", "text-muted small text-secondary mb-0 py-0 px-3");
        message.innerHTML = messageBody;
        username.innerHTML = user;
        times.innerHTML = timeMsg;
        blockChat.appendChild(username);
        blockChat.appendChild(message);
        blockChat.appendChild(times);
        Message.appendChild(blockChat);
        const elemen = MenuChat.querySelectorAll("div");
        const count = elemen.length - 1;
        MenuChat.insertBefore(Message, elemen[count]);
    }
})
// getRaw().then(updateRaw=>{
//     const user=updateRaw.user;
//     const messageBody=updateRaw.message;
//     const timeMsg=updateRaw.date;
//     console.log(updateRaw);
//     const Message = document.createElement("div");
//     Message.setAttribute("class", "container-fluid d-flex justify-content-start mt-5");

//     const blockChat = document.createElement("div");
//     blockChat.setAttribute("class", "bg-light rounded-3");
//     blockChat.setAttribute("id", "personal-chat");
//     const username=document.createElement("p");
//     const message = document.createElement("p");
//     const times=document.createElement("span");
//     times.setAttribute("class","text-muted small text-secondary mb-0 py-0 px-3");
//     message.innerHTML = "<p class='lead text-secondary fs-6 mb-0 pt-3 px-3'>"+messageBody+"</p>";
//     username.innerHTML= "<span class='lead text-secondary fs-6 mb-0 py-3 px-3'>"+user+"</span>";
//     times.innerHTML=timeMsg;
//     blockChat.appendChild(username);
//     blockChat.appendChild(message);
//     blockChat.appendChild(times);
//     Message.appendChild(blockChat);
//     const elemen=MenuChat.querySelectorAll("div");
//     const count=elemen.length-1;
//     MenuChat.insertBefore(Message,elemen[count]);
// })
// .catch(error=>console.log(error));



//  const chatSocket=new WebSocket('ws://127.0.0.1:8080');
//  const MenuChat = document.querySelector("#chat-block");


// chatSocket.onmessage=function(e){
//     const data=e.data;
//     const JSONfORM=JSON.parse(data);
//     const user=JSONfORM.users;
//     const msges=JSONfORM.messages;
//     const time=JSONfORM.time;
//     console.log(data);
//     const Message = document.createElement("div");
//     Message.setAttribute("class", "container-fluid d-flex justify-content-start mt-5");

//     const blockChat = document.createElement("div");
//     blockChat.setAttribute("class", "bg-light rounded-3");
//     blockChat.setAttribute("id", "personal-chat");
//     const username=document.createElement("p");
//     const message = document.createElement("p");
//     const times=document.createElement("span");
//     times.setAttribute("class","text-muted small text-secondary mb-0 py-0 px-3");
//     message.innerHTML = "<p class='lead text-secondary fs-6 mb-0 pt-3 px-3'>"+msges+"</p>";
//     username.innerHTML= "<span class='lead text-secondary fs-6 mb-0 py-3 px-3'>"+user+"</span>";
//     times.innerHTML=time;
//     blockChat.appendChild(username);
//     blockChat.appendChild(message);
//     blockChat.appendChild(times);
//     Message.appendChild(blockChat);
//     const elemen=MenuChat.querySelectorAll("div");
//     const count=elemen.length-1;
//     MenuChat.insertBefore(Message,elemen[count]);
//     }


// const xhr3=new XMLHttpRequest();
// const dataClient=[];
// xhr3.onload=function(){
//     var data=this.responseText;
//     var parsing=JSON.parse(data);
//     parsing.forEach((dt)=>{
//         dataClient.push(dt);
//     })
//     console.log(data);

// }
// // console.log(dataClient
// xhr3.open("POST",`Controller/getTokenFcm.php`);
// xhr3.setRequestHeader("Content-Type","application/json");
// xhr3.send(JSON.stringify({
//     users:userId,
//     role:role
// }));

//  function sendMessage(){

//     const inputMsg=document.querySelector("#promptMsg");
//     const msg=inputMsg.value;

//     const infoMsg={
//         'username':userId,
//         'msg':msg,
//         'tokens':dataClient
//     };
//     if(msg==""){
//         alert("Please enter a message!");
//     }else{
//     //requesting message from database
//     chatSocket.send(JSON.stringify(infoMsg));
//     const datetime=new Date();
//     const time=datetime.toLocaleString();
//     const sendMessage= document.createElement("div");
//     const MenuChat = document.querySelector("#chat-block");
//     sendMessage.setAttribute("class","container-fluid d-flex justify-content-end mt-5 mb-3");
//     const blockSend=document.createElement("div");
//     blockSend.setAttribute("class","bg-secondary rounded-3");
//     blockSend.setAttribute("id","personal-chat");
//     const userSend=document.createElement("span");
//     userSend.innerHTML=userId;
//     userSend.setAttribute("class","lead text-white fs-6 mb-0 py-3 px-3 fw-3")
//     const userMsg=document.createElement("p");
//     userMsg.setAttribute("class","lead text-white fs-6 mb-0 pt-3 px-3");
//     userMsg.innerHTML=msg;
//     userMsg.setAttribute("id","usersMsg");
//     const userTime=document.createElement("span");
//     userTime.setAttribute("class","text-muted small text-secondary mb-0 py-0 px-3");
//     userTime.innerHTML=time;
//     blockSend.appendChild(userSend);
//     blockSend.appendChild(userMsg);
//     blockSend.appendChild(userTime);
//     sendMessage.appendChild(blockSend);
//     const leng=MenuChat.querySelectorAll("div");
//     const cout= leng.length-1;
//     MenuChat.insertBefore(sendMessage,leng[cout]);

//     inputMsg.value='';

//     }

// }
if(valParams2){
    const xhttpGrpReq=new XMLHttpRequest();
    xhttpGrpReq.onload=function(){
        const dataGet=this.responseText;
        if(dataGet=='none'){
            return "";
        }else{
        const dataParse=JSON.parse(dataGet);
        dataParse.forEach(function(chtgrp){
            const user=chtgrp.user;
            const msgs=chtgrp.chat;
            const time=chtgrp.date;
            if(user!==userId){
                const userMessage = document.createElement("div");
                userMessage.setAttribute("class", "container-fluid d-flex justify-content-start mt-5 mb-2");
                
                const blockUser = document.createElement("div");
                blockUser.setAttribute("class", "bg-light rounded-3");
                blockUser.setAttribute("id", "personal-chat");
                
                const userTitle = document.createElement("span");
                userTitle.innerHTML = user;
                userTitle.setAttribute("class", "lead text-secondary fs-6 mb-0 py-3 px-3 fw-3");
                
                const userMsgs = document.createElement("p");
                userMsgs.setAttribute("class", "lead text-secondary fs-6 mb-0 pt-3 px-3");
                userMsgs.innerHTML = msgs;
                
                const timeStampCurr = document.createElement("span");
                timeStampCurr.setAttribute("class", "text-muted small text-secondary mb-0 py-0 px-3");
                timeStampCurr.innerHTML = time;
                
                // Tambahkan elemen ke dalam blockUser
                blockUser.appendChild(userTitle);
                blockUser.appendChild(userMsgs); // Mengganti userTitle dengan userMsgs
                blockUser.appendChild(timeStampCurr);
                
                // Tambahkan blockUser ke dalam userMessage
                userMessage.appendChild(blockUser);
                
                // Menyisipkan userMessage ke MenuChat sebelum elemen terakhir
                const lengPos = MenuChat.querySelectorAll("div");
                const couts = lengPos.length - 1;
                
                // Memastikan bahwa userMessage dan elemen referensi valid
                if (userMessage instanceof Node && lengPos[couts] instanceof Node) {
                    MenuChat.insertBefore(userMessage, lengPos[couts]);
                } else {
                    console.error("Elemen yang disisipkan atau referensi tidak valid.");
                }
                
            }else{
                const clientMessage = document.createElement("div");
                    const MenuChat = document.querySelector("#chat-block");
                    clientMessage.setAttribute("class", "container-fluid d-flex justify-content-end mt-5 mb-2");
                    const blockClient = document.createElement("div");
                    blockClient.setAttribute("class", "bg-secondary rounded-3");
                    blockClient.setAttribute("id", "personal-chat");
                    const userSend = document.createElement("span");
                    const timeStamp = document.createElement("span");
                    timeStamp.setAttribute("class", "text-muted small mb-0 py-0 px-3");
                    timeStamp.innerHTML = time;
                    userSend.innerHTML = user;
                    userSend.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3 fw-3")
                    const userMsg = document.createElement("p");
                    userMsg.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3");
                    userMsg.setAttribute("id", "usersMsg")
                    userMsg.innerHTML = msgs;
                    blockClient.appendChild(userSend);
                    blockClient.appendChild(userMsg);
                    blockClient.appendChild(timeStamp);
                    clientMessage.appendChild(blockClient);
                    const leng = MenuChat.querySelectorAll("div");
                    const cout = leng.length - 1;
                    MenuChat.insertBefore(clientMessage, leng[cout]);
            }
        })
    }
    }
    xhttpGrpReq.open('POST','Controller/showGroupDiscussion.php');
    xhttpGrpReq.setRequestHeader('Content-Type', 'application/json');
    xhttpGrpReq.send(JSON.stringify(valParams2));
}else{
const xhttp = new XMLHttpRequest();
xhttp.onload = function () {
    if (!valParams) {
        let containerEmpty = '<div class="container-fluid d-flex justify-content-center"><p class="text-dark fs-4">Silahkan pilih kelas anda</p></div>';
        chatContainer.innerHTML = containerEmpty;
    } else {
        const data = this.responseText;
        const parseData = JSON.parse(data);
        parseData.forEach(function (cht) {
            const username = cht.user;
            const chats = cht.chat;
            const time = cht.time;
            const userClass = cht.class;
            if (userClass == valParams) {
                if (username !== userId) {
                    const sendMessage = document.createElement("div");
                    sendMessage.setAttribute("class", "container-fluid d-flex justify-content-start mt-5 mb-2");
                    const blockSend = document.createElement("div");
                    blockSend.setAttribute("class", "bg-light rounded-3");
                    blockSend.setAttribute("id", "personal-chat");
                    const userSend = document.createElement("span");
                    userSend.innerHTML = username;
                    userSend.setAttribute("class", "lead text-secondary fs-6 mb-0 py-3 px-3 fw-3")
                    const userMsg = document.createElement("p");
                    userMsg.setAttribute("class", "lead text-secondary fs-6 mb-0 pt-3 px-3")
                    userMsg.innerHTML = chats;
                    const timeStamp = document.createElement("span");
                    timeStamp.setAttribute("class", " text-muted small text-secondary mb-0 py-0 px-3");
                    timeStamp.innerHTML = time;
                    blockSend.appendChild(userSend);
                    blockSend.appendChild(userMsg);
                    blockSend.appendChild(timeStamp);
                    sendMessage.appendChild(blockSend);
                    const leng = MenuChat.querySelectorAll("div");
                    const cout = leng.length - 1;
                    MenuChat.insertBefore(sendMessage, leng[cout]);
                } else {
                    const sendMessage = document.createElement("div");
                    const MenuChat = document.querySelector("#chat-block");
                    sendMessage.setAttribute("class", "container-fluid d-flex justify-content-end mt-5 mb-2");
                    const blockSend = document.createElement("div");
                    blockSend.setAttribute("class", "bg-secondary rounded-3");
                    blockSend.setAttribute("id", "personal-chat");
                    const userSend = document.createElement("span");
                    const timeStamp = document.createElement("span");
                    timeStamp.setAttribute("class", "text-muted small mb-0 py-0 px-3");
                    timeStamp.innerHTML = time;
                    userSend.innerHTML = username;
                    userSend.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3 fw-3")
                    const userMsg = document.createElement("p");
                    userMsg.setAttribute("class", "lead text-white fs-6 mb-0 pt-3 px-3");
                    userMsg.setAttribute("id", "usersMsg")
                    userMsg.innerHTML = chats;
                    blockSend.appendChild(userSend);
                    blockSend.appendChild(userMsg);
                    blockSend.appendChild(timeStamp);
                    sendMessage.appendChild(blockSend);
                    const leng = MenuChat.querySelectorAll("div");
                    const cout = leng.length - 1;
                    MenuChat.insertBefore(sendMessage, leng[cout]);
                }

            } else {
                return "";
            }
        });
    }


}
xhttp.open("GET", `Controller/ResponseChatDb.php?getData=${valParams}`, true);
xhttp.send();

}








