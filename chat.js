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
