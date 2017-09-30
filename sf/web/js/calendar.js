$(function() {
    $.ajax({
            url: '/calendar/events',
            method: "GET",
            data: {},
            dataType: "json",
            success: eventsFetchSuccess
        });

    var cal, $month, $year, calEventDetails = {};

    $('#custom-next').on('click', function () {
        cal.gotoNextMonth(updateMonthYear);
    });
    $( '#custom-prev' ).on( 'click', function() {
        cal.gotoPreviousMonth( updateMonthYear );
    } );
    $( '#custom-current' ).on( 'click', function() {
        cal.gotoNow( updateMonthYear );
    } );

    function updateMonthYear() {
        $month.html( cal.getMonthName() );
        $year.html( cal.getYear() );
    }

    function dayClick($el, $contentEl, dateProperties) {
        var propStr;

        // debug
        propStr = "";
        for (var key in dateProperties) {
            propStr += key + ' = ' + dateProperties[key] + "\n";
        }
        console.log("Day click:\n" + propStr);

        var calEvents = calEventDetails[dateProperties.date];

        // debug
        propStr = "";
        for (var uid in calEvents) {
            propStr += 'Event[' + uid + "]\n";
            for (var key in calEvents[uid]) {
                propStr += key + ' = ' + calEvents[uid][key] + "\n";
            }
        }
        console.log("Day events:\n" + propStr);
    }

    function eventsFetchSuccess(data, status, jqXHR) {
        var events = {};
        for (var i in data) {
            // setup
            var row = data[i];

            // debug
            var propStr = "";
            for (var key in row) {
                propStr += key + ' = ' + row[key] + "\n";
            }
            console.log('Event:\n' + propStr);

            // save calendar event details
            if (calEventDetails[row.dateJs] === undefined) {
                calEventDetails[row.dateJs] = {};
            }
            calEventDetails[row.dateJs][data.uid] = row;

            // set event for calendar display
            events[row.dateJs] = row.htmlLabel;
        }

        cal = $('#calendar').calendario({
            onDayClick: dayClick,
            caldata: events
        });

        cal.setData();

        $month = $('#custom-month').html(cal.getMonthName());
        $year = $('#custom-year').html(cal.getYear());
    }

    // you can also add more data later on. As an example:
    /*
    someElement.on( 'click', function() {

        cal.setData( {
            '03-01-2013' : '<a href="#">testing</a>',
            '03-10-2013' : '<a href="#">testing</a>',
            '03-12-2013' : '<a href="#">testing</a>'
        } );
        // goes to a specific month/year
        cal.goto( 3, 2013, updateMonthYear );

    } );
    */
});

var calendarEvents = {
    '11-21-2017' : '<a href="http://www.wincalendar.com/Great-American-Smokeout">Great American Smokeout</a>',
    '11-13-2017' : '<span>Ashura [An example of an complete date event (11-13-2017)]</span>',
    '11-11-2017' : '<a href="http://www.wincalendar.com/Remembrance-Day">Remembrance Day (Canada)</a>',
    '11-04-2017' : '<span>Islamic New Year</span>',
    '11-03-2017' : '<a href="http://www.wincalendar.com/Daylight-Saving-Time-Ends">Daylight Saving Time Ends</a>',
    '11-01-2017' : '<span>All Saints Day</span>',
    '12-25-YYYY' : '<span>Christmas Day [Date : 12-25-YYYY]</span>',
    '01-01-YYYY' : '<span>New Year\'s Eve (Event repeats every YEAR)</span>',
    'MM-02-2017' : '<span>Yeah, Monthly [MM-02-2017]</span>',
    'MM-07-YYYY' : '<span>[MM-07-YYYY], Monthly and Yearly</span>',
    '11-DD-2017' : {content : '<span>Ex: {\'11-DD-2017\' : {content : \'Something\', endDate : 20}}</span>', endDate : 20},
    '02-DD-2017' : {content : '<span>Ex: {\'02-DD-2017\' : {content : \'Something\', startDate : 10, endDate : 20}}</span>', startDate : 10, endDate : 20},
    '12-DD-YYYY' : '<span>[12-DD-YYYY] Whole month and Year</span>',
    'TODAY' : '<span>Today, [Date : \'TODAY\']</span>',
    '10-16-2018': ['<a href="">event one</a>', '<span>event two</span>'],
    '10-DD-YYYY' : [
        {content : '<span>Ex: {\'10-DD-2017\' : {content : \'Something\', startDate : 10, endDate : 20}}</span>', startDate : 10, endDate : 20},
        {content : '<span>Ex: {\'10-DD-2017\' : {content : \'Something\', endDate : 20}}</span>', endDate: 20},
    ]
};