const schoolEvents = [];

async function getData(calendar) {
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

document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("events_calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: schoolEvents,
    selectable: true,
    dateClick: (info) => {
      addNewEvent(calendar, info.dateStr);
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
          console.log(xhr.responseText);
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            Swal.fire({
              title: "Event Added!",
              text: "Your event has been added to the calendar.",
              icon: "success",
            });
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
