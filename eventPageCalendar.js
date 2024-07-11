const schoolEvents = [];
var calendar;

async function getData(calendar) {
  schoolEvents.length = 0;
  await fetch("/akademi/index.php/events/getAll")
    .then((response) => response.json())
    .then((data) => {
      data.map((item) => {
        schoolEvents.push({
          id: item.id,
          title: item.title,
          start: item.start_date,
          end: item.end_date,
        });
      });
    })
    .catch((err) => console.log(err));
  calendar.removeAllEvents();
  calendar.addEventSource(schoolEvents);
}

async function deleteEvent(id) {
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
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "/akademi/index.php/events/delete", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onload = () => {
        if (xhr.status == 200) {
          if (JSON.parse(xhr.responseText).success) {
            Swal.fire({
              title: "Deleted!",
              text: "Your file has been deleted.",
              icon: "success",
            }).then(() => getData(calendar));
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Something went wrong!",
              footer: '<a href="#">Why do I have this issue?</a>',
            });
          }
        }
      };
      xhr.send(`id=${id}`);
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  var calendarEl = document.getElementById("events_calendar");
  calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: schoolEvents,
    selectable: true,
    dateClick: (info) => {
      addNewEvent(calendar, info.dateStr);
    },
    eventClick: (info) => {
      deleteEvent(info.event.id);
    },
  });
  calendar.render();
  getData(calendar);
});

const addNewEvent = (calendar, start) => {
  Swal.fire({
    title: "Enter the name of the event",
    input: "text",
    inputAttributes: {
      autocapitalize: "off",
    },
    showCancelButton: true,
    confirmButtonText: "Add Event",
    showLoaderOnConfirm: true,
    preConfirm: async (eventName) => {
      return { eventName, start };
    },
  }).then((result) => {
    if (result.isConfirmed) {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "/akademi/index.php/events/add", true);
      xhr.onload = () => {
        if (xhr.status === 200 && result.value) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            Swal.fire({
              title: "Event Added!",
              text: "Your event has been added to the calendar.",
              icon: "success",
            }).then(() => getData(calendar));
          } else {
            Swal.fire({
              title: "Error!",
              text: "There was an issue adding your event. Please try again.",
              icon: "error",
            });
          }
        }
      };
      const data = {
        title: result.value.eventName,
        start: result.value.start,
        end: result.value.start,
      };

      const formData = new URLSearchParams();
      for (const key in data) {
        formData.append(key, data[key]);
      }
      xhr.send(formData);
    }
  });
};
