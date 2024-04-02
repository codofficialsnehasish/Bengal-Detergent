const getUrl = window.location;
const base_url = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1]+"/";
! function(v) {
    "use strict";

    function e() {}
    e.prototype.init = function() {
        var a = v("#event-modal"),
            t = v("#modal-title"),
            n = v("#form-event"),
            l = null,
            i = null,
            r = document.getElementsByClassName("needs-validation"),
            l = null,
            i = null,
            e = new Date,
            s = e.getDate(),
            d = e.getMonth(),
            e = e.getFullYear();
        new FullCalendarInteraction.Draggable(document.getElementById("external-events"), {
            itemSelector: ".external-event",
            eventData: function(e) {
                return {
                    title: e.innerText,
                    className: v(e).data("class")
                }
            }
        });
        e = [];

        // $.ajax({
        //     url: base_url +'get-attendance-for-user',
        //     type: 'GET',
        //     dataType: 'json',
        //     success: function(data) {
        //         data.forEach(function(item) {
        //             item.start = new Date(item.start);
        //         });
        //         data.forEach(function(item) {
        //             e = e.push(item);
        //         });
        //     },
        // });

        // console.log(e);
        document.getElementById("external-events"), d = document.getElementById("calendar");

        function o(e) {
            a.modal("show"), n.removeClass("was-validated"), n[0].reset(), v("#event-title").val(), v("#event-category").val(), t.text("Add Event"), i = e
        }
        var c = new FullCalendar.Calendar(d, {
            plugins: ["bootstrap", "interaction", "dayGrid", "timeGrid"],
            editable: !0,
            droppable: !0,
            selectable: !0,
            defaultView: "dayGridMonth",
            themeSystem: "bootstrap",
            header: {
                // left: "prev,next today",
                left: "customPrev,customNext today",
                center: "title",
                right: "dayGridMonth,listMonth"
            },
            customButtons: {
                customPrev: {
                    text: 'prev',
                    click: function() {
                        // alert(document.querySelector('.fc-center h2').innerText);
                        // c.prev(); // Navigate to the previous month
                        var titleText = document.querySelector('.fc-center h2').innerText;
                        var date = new Date(titleText + " 1"); // Parse the title text
                        date.setMonth(date.getMonth() - 1); // Subtract one month
                        var formattedDate = date.toLocaleString('default', { month: 'long', year: 'numeric' });
                        alert(formattedDate);
                        c.prev();
                    }
                },
                customNext: {
                    text: 'next',
                    click: function() {
                        // alert('Navigating to next month!');
                        // c.next(); // Navigate to the next month
                        var titleText = document.querySelector('.fc-center h2').innerText;
                        var date = new Date(titleText + " 1"); // Parse the title text
                        date.setMonth(date.getMonth() + 1); // Add one month
                        var formattedDate = date.toLocaleString('default', { month: 'long', year: 'numeric' });
                        alert(formattedDate);
                        c.next(); // Navigate to the next month
                    }
                }
            },
            eventClick: function(e) {
                a.modal("show"), n[0].reset(), l = e.event, v("#event-title").val(l.title), v("#event-category").val(l.classNames[0]), i = null, t.text("Edit Event"), i = null
            },
            dateClick: function(e) {
                // o(e)
                var clickedDate = e.date;
                var today = new Date();
                if (clickedDate.getDate() === today.getDate() && clickedDate.getMonth() === today.getMonth() && clickedDate.getFullYear() === today.getFullYear()) {
                    o(e);
                }
            },
            events: e
        });
        c.render();
        $.ajax({
            url: base_url +'get-attendance-for-user',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                data.forEach(function(item) {
                    item.start = new Date(item.start);
                });
                data.forEach(function(item) {
                    c.addEvent(item);
                });
            },
        });
        v(n).on("submit", function(e) {
            e.preventDefault();
            v("#form-event :input");
            var t = v("#event-title").val(),
                e = v("#event-category").val();
            !1 === r[0].checkValidity() ? (event.preventDefault(), event.stopPropagation(), r[0].classList.add("was-validated")) : (l ? (l.setProp("title", t), l.setProp("classNames", [e])) : (e = {
                title: t,
                start: i.date,
                allDay: i.allDay,
                className: e
            },submit_attendance(e), c.addEvent(e)), a.modal("hide"))
        }), v("#btn-delete-event").on("click", function(e) {
            l && (l.remove(), l = null, a.modal("hide"))
        }), v("#btn-new-event").on("click", function(e) {
            o({
                date: new Date,
                allDay: !0
            })
        })
    }, v.CalendarPage = new e, v.CalendarPage.Constructor = e
}(window.jQuery),
function() {
    "use strict";
    window.jQuery.CalendarPage.init()
}();


function submit_attendance(eventData) {
    eventData.latitude = "";
    eventData.longitude = "";
    $.ajax({
        url: base_url + 'save-attendance',
        type: 'POST',
        data: eventData,
        success: function(response) {
        },
    });
}