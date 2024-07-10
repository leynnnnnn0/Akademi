</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="calendar.js"></script>
<script src="chart.js"></script>
<script src="/akademi/eventPageCalendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/akademi/controller/student/alerts.js"></script>
<script src="/akademi/controller/teacher/alert.js"></script>
<script src="/akademi/alert.js"></script>
<script>
    const result = <?php echo isset($_SESSION['success']) ? json_encode(true) : json_encode(false); ?>;
    if (result) {
        Swal.fire({
            title: "Success",
            text: <?php echo json_encode($_SESSION['success']) ?>,
            icon: "success",
        })
    }
</script>
</body>


</html>