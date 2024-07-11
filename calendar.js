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
  var calendarEl = document.getElementById("dashboard_calendar");
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: "dayGridMonth",
    events: schoolEvents,
  });
  calendar.render();
  getData(calendar);
});
