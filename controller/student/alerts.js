const deleteAlert = (studentId) => {
  const xhr = new XMLHttpRequest();
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
          Swal.fire({
            title: "Deleted!",
            text: "Student has been deleted.",
            icon: "success",
          }).then(() => {
            window.location.reload();
          });
        }
      };
      xhr.send(`id=${studentId}`);
    }
  });
};


