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

// Send message

document.addEventListener("click", () => {
  const messageInput = document.getElementById("messageInput");
  const messageButton = document.getElementById("sendMessageButton");
  const receiverId = messageButton.getAttribute("data-receiver");
  const senderId = messageButton.getAttribute("data-sender");

  messageButton.addEventListener("click", () => {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "/akademi/index.php/chats/conversation/send", true);
    const data = {
      message: messageInput.value,
      receiver_id: receiverId,
      sender_id: senderId,
    };
    const formData = new URLSearchParams();
    for (const key in data) {
      formData.append(key, data[key]);
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onload = () => {
      if (xhr.status === 200) {
        console.log(xhr.response);
        if (JSON.parse(xhr.response).status === "success") {
          const xhr = new XMLHttpRequest();
          xhr.open("POST", "/akademi/index.php/chats/conversation", true);
          xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
          );
          xhr.onload = () => {
            if (xhr.status === 200) {
              const data = xhr.response;
              conversationBox.innerHTML = data;
            }
          };
          xhr.send(`id=${receiverId}`);
        }
        messageInput.value = "";
      }
    };
    xhr.send(formData);
  });
});
