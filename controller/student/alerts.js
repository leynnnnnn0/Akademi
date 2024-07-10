const deleteAlert = (studentId, image) => {
  const xhr = new XMLHttpRequest();
  // Create an object with data to send
  const data = {
    id: studentId,
    image: image,
  };

  // Convert the object to a URL-encoded query string
  const formData = new URLSearchParams();
  for (const key in data) {
    formData.append(key, data[key]);
  }
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      xhr.open("POST", "/akademi/index.php/students/destroy", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = () => {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
          Swal.fire({
            title: "Deleted!",
            text: "Student has been deleted.",
            icon: "success",
          }).then(() => {
            window.location.reload();
          });
        }
      };

      xhr.send(formData);
    }
  });
};

const createStudent = async (event) => {
  // Prevent tha page to reload
  // The problem with this method is that the errors from the $_SESSION can't be displayed because the page is not refreshed
  event.preventDefault();
  // To send the data to our php file
  var form = document.getElementById("studentForm");
  var formData = new FormData(form);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/akademi/index.php/students/add", true);
  xhr.onload = () => {
    if (xhr.status === 200) {
      console.log(xhr.response);
    }
  };
  xhr.send(formData);
  // After data validate the data
  // If it has an error, display errors
  // else fire this
  Swal.fire({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success",
  });
};
