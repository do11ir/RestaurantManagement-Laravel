//FULL CALENDAR

document.addEventListener('DOMContentLoaded', function() {
    var containerEl = document.getElementById('external-events');
    new FullCalendar.Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
            return {
                title: eventEl.innerText.trim(),
                title: eventEl.innerText,
                className: eventEl.className + ' overflow-hidden '
            }
        }
    });
    var calendarEl = document.getElementById('calendar2');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        // defaultView: 'month',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        selectMirror: true,
        droppable: true, // this allows things to be dropped onto the calendar
        select: function(arg) {
            var title = prompt('عنوان رخداد:');
            if (title) {
                calendar.addEvent({
                    title: title,
                    start: arg.start,
                    end: arg.end,
                    allDay: arg.allDay
                })
            }
            calendar.unselect()
        },
        eventClick: function(arg) {
            if (confirm('آیا شما مطمئن هستید که میخواهید این رویداد را حذف کنید؟')) {
                arg.event.remove()
            }
        },
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: [{
                title: 'ناهار کاری',
                start: '1401-03-03T13:00:00',
                constraint: 'businessHours'
            }, {
                title: 'قرار ملاقات',
                start: '1401-03-13T11:00:00',
                constraint: 'availableForMeeting', // defined below
                color: '#f35e90'
            }, {
                title: 'کنفرانس',
                start: '1401-07-18',
                end: '1401-07-20',
                color: '#e67e22'
            }, {
                title: 'مهمانی',
                start: '1401-07-29T20:00:00',
                color: '#22c865'
            },
            // areas where "Meeting" must be dropped
            {
                id: 'availableForMeeting',
                start: '1401-03-11T10:00:00',
                end: '1401-03-11T16:00:00',
                rendering: 'background',
                color: '#5e72e4'
            }, {
                id: 'availableForMeeting',
                start: '1401-03-13T10:00:00',
                end: '1401-03-13T16:00:00',
                rendering: 'background'
            },
            // red areas where no events can be dropped
            {
                start: '1401-03-24',
                end: '1401-03-28',
                overlap: false,
                rendering: 'background',
                color: 'rgba(0,0,0,0.1)'
            }, {
                start: '1401-03-06',
                end: '1401-03-11',
                overlap: false,
                rendering: 'background',
                color: 'rgba(0,0,0,0.1)'
            }
        ]
    });
    calendar.setOption('locale', 'fa');
    calendar.render();
});

//LIST FULLCALENDAR
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        height: 'auto',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'listDay,listWeek'
        },

        // customize the button names,
        // otherwise they'd all just say "list"
        views: {
            listDay: { buttonText: 'لیست روزانه' },
            listWeek: { buttonText: 'لیست هفتگی' }
        },
        initialView: 'listWeek',
        initialDate: '1401-07-12',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        // eventLimit: true, // allow "more" link when too many events
        dayMaxEvents: true, // allow "more" link when too many events
        events: [{
            title: 'رخداد های روز',
            start: '1401-11-01'
        }, {
            title: 'رخداد طولانی',
            start: '1401-11-07',
            end: '1401-03-10'
        }, {
            id: 999,
            title:'تکرار رخداد',
            start: '1401-11-09T16:00:00'
        }, {
            id: 999,
            title: 'تکرار رخداد',
            start: '1401-11-16T16:00:00'
        }, {
            title: 'کنفرانس',
            start: '1401-11-11',
            end: '1401-11-13'
        }, {
            title: 'ملاقات',
            start: '1401-11-12T10:30:00',
            end: '1401-11-12T12:30:00'
        }, {
            title: 'ناهار',
            start: '1401-11-12T12:00:00'
        }, {
            title: 'ملاقات',
            start: '1401-11-12T14:30:00'
        }, {
            title: 'ساعت خوشی',
            start: '1401-11-12T17:30:00'
        }, {
            title: 'شام',
            start: '1401-11-12T20:00:00'
        }, {
            title: 'مهمانی تولد',
            start: '1401-11-13T07:00:00'
        }, {
            title: 'کلیک برای نمایش گوگل',
            url: 'http://google.com/',
            start: '1401-11-28'
        }]
    });
    calendar.setOption('locale', 'fa');
    calendar.render();
});