const events = [];
events.push({ id: "b", title: "Sandwich Day", start: "2024-07-16" });
events.push({ id: "b", title: "Jash Day", start: "2024-07-15" });
document.addEventListener("DOMContentLoaded", function () {
  var calendarEl = document.getElementById("events_calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: events,
    selectable: true,
    dateClick: (info) => {
      console.log(info);
    },
  });
  calendar.render();
});
