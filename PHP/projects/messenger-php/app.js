const msginput = document.getElementById('msginput');
const msgarea = document.getElementById('msg-area');
function checkcookie() {
  if (document.cookie.indexOf('messengerUname') === -1) {
    document.getElementById('whitebg').style.display = 'inline-block';
    document.getElementById('loginbox').style.display = 'inline-block';
    return;
  }
  document.getElementById('whitebg').style.display = 'none';
  document.getElementById('loginbox').style.display = 'none';
}

function chooseusername() {
  const user = document.getElementById('cusername').value;
  // assign the cookiname its cookievalue
  document.cookie = `messengerUname=${user}`;
  checkcookie();
}
function getCookie(cname) {
  const allck = document.cookie.split(';');
  let match = '';
  let data = '';
  for (const i in allck) {
    match = allck[i].trim();
    if (allck[i].indexOf(cname) !== -1) {
      data = match.substr(cname.length + 1);
    }
  }
  return data;
}

// send a msg through ajax the old xmlhttp way
/* AJAX
   we get the http request then if its ready (meaning the readystate === 4 )
     and the satuts is 200 (http refers to ok) we do what we want
     then we send the request to our URL by opening the url
     and telling it what http method to use
     xmlhttp = new XMLHttpRequest()
     xmlhtp.onreadystatechange = () => {
             if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
               const response = xmlHttp.responseText;
                your code
             }
     }
      xmlHttp.open( "GET", `URL`,true);
      xmlHttp.send();
*/
function sendmsg() {
  const message = msginput.value;
  if (message !== '') {
    const username = getCookie('messengerUname');
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = () => {
      if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
        msgarea.innerHTML += `<div class="msgc" style="margin-bottom: 30px;">
        <div class="msg msgfrom">${message}</div>
        <div class="msgarr msgarrfrom"></div>
        <div class="msgsentby msgsentbyfrom">Sent by ${username}</div>
        </div>`;
        msginput.value = '';
      }
    };
    xmlHttp.open(
      'GET',
      `update.php?username=${username}&message=${message}`,
      true
    );
    xmlHttp.send();
  }
}

function update() {
  let item = '';
  const username = getCookie('messengerUname');
  const xmlHttp = new XMLHttpRequest();
  xmlHttp.onreadystatechange = () => {
    if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
      // we get every cookie by its own by spliting with the /n
      const response = xmlHttp.responseText.split('\n');
      for (let i = 0; i < response.length; i++) {
        // and then we get the username and message by spliting with \\
        // so basicly item[0] is the username and item[1] is the msg
        item = response[i].split('\\');
        // an extra check if ta msg exisits in the database then show it
        if (item[1] !== undefined) {
          // we check if the cookie is the main username we have so that we show our blue msg
          // else its anothers username so we show the gray msg
          if (item[0] === username) {
            msgarea.innerHTML += `<div class="msgc" style="margin-bottom: 30px;">
            <div class="msg msgfrom">${item[1]}</div>
            <div class="msgarr msgarrfrom"></div>
            <div class="msgsentby msgsentbyfrom">Sent by ${item[0]}</div>
            </div>`;
          } else {
            msgarea.innerHTML += `<div class="msgc"> <div class="msg">${
              item[1]
              }</div>
            <div class="msgarr"></div>
            <div class="msgsentby">Sent by ${item[0]}</div> </div>`;
          }
        }
      }
      // we fix the scrolling
      msgarea.scrollTop = msgarea.scrollHeight;
    }
  };
  /*
   the param username in here is to get the same username from our database
   so we send an ajax to the php file whick he verifs the user in the database
   and then spliting it in 2 items one which contains the user n msg n the other contains the cookie
   so that our javascript can compare and use the username from that trick we made
  */
  xmlHttp.open('GET', `get.php?username=${username}`, true);
  xmlHttp.send();
}
// to update the screen after 2 seconds so that when we use 2 browsers to send msgs it shows in paralell
setInterval(() => update(), 2500);
