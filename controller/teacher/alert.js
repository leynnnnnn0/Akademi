const deleteConfirmationAlert = (event, studentId, image) => {
    event.preventDefault();
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
      xhr.open("POST", "/akademi/index.php/teachers/destroy", true);
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
