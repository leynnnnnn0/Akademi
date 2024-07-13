document.addEventListener("DOMContentLoaded", () => {
  // Containers
  const inputBar = document.getElementById("userSearchBar");
  const teachersList = document.getElementById("teachersList");

  // Search
  inputBar.addEventListener("keydown", () => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/akademi/index.php/chats");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
      if (xhr.status === 200) {
        // // students = JSON.parse(xhr.responseText);
        let data = xhr.response;
        teachersList.innerHTML = data;
        // console.log("HELLO");
      }
    };
    xhr.send(`query=${inputBar.value}`);
  });
});

// Get conversation
const conversationBox = document.getElementById("conversationBox");
// Conversation
const getConversation = (id) => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/akademi/index.php/chats/conversation", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = () => {
    if (xhr.status === 200) {
      const data = xhr.response;
      conversationBox.innerHTML = data;
    }
  };
  xhr.send(`id=${id}`);
};
//Update conversation every 0.5 seconds
setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "/akademi/index.php/chats/conversation", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onload = () => {
    if (xhr.status === 200) {
      const data = xhr.response;
      conversationBox.innerHTML = data;
    }
  };
  xhr.send();
}, 500);

// Send message

document.addEventListener("DOMContentLoaded", () => {
  // const messageInput = document.getElementById("messageInput");
  const messageButton = document.getElementById("sendMessageButton");
  // const receiverId = messageButton.getAttribute("data-receiver");
  // const senderId = messageButton.getAttribute("data-sender");
  const form = document.getElementById("messageForm");
  form.addEventListener("submit", (event) => {
    event.preventDefault();
    console.log("SUBMITTED");
    const xhr = new XMLHttpRequest();
    const formData = new FormData(form);
    xhr.open("POST", "/akademi/index.php/chats/conversation/send", true);
    xhr.onload = () => {
      if (xhr.status === 200) {
        console.log(xhr.response);
        messageInput.value = "";
      }
    };
    xhr.send(formData);
  });
});
