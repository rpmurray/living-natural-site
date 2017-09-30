<!DOCTYPE html>
<!--[if IE 9]><html class="no-js ie9"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js"><!--<![endif]-->
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Living Natural Calendar</title>
        <meta name="description" content="Living Natural Calendar"/>
        <meta name="keywords" content="responsive, calendar, jquery, plugin, full page, flexible, javascript, css3, media queries"/>
        <meta name="author" content="masterfrog"/>
        <link rel="shortcut icon" href="{$_resources}/images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="{$_css}/content.css"/>
        <link rel="stylesheet" type="text/css" href="{$_css}/calendar.css"/>
        <link rel="stylesheet" type="text/css" href="{$_css}/page.css"/>
        <!--<script src="{$_js}/modernizr.custom.63321.js"></script>-->
    </head>
    <body>
        <div class="container">
            <div class="custom-calendar-wrap custom-calendar-full">
                <div class="custom-header clearfix">
                    <h2>
                        <span id="custom-month" class="custom-month"></span>
                        <span id="custom-year" class="custom-year"></span>
                    </h2>
                    <h3 class="custom-month-year">
                        <nav>
                            <span id="custom-prev" class="custom-prev"></span>
                            <span id="custom-next" class="custom-next"></span>
                            <span id="custom-current" class="custom-current" title="Go to current date"></span>
                        </nav>
                    </h3>
                </div>
                <div id="calendar" class="fc-calendar-container"></div>
            </div>
        </div><!-- /container -->
        <div><!-- php debug -->
            {$phpdebug}
        </div>
        <script type="text/javascript" src="{$_js}/jquery.min.js"></script>
        <script type="text/javascript" src="{$_js}/jquery.calendario.js"></script>
        <script type="text/javascript" src="{$_js}/data.js"></script>
        <script type="text/javascript">
            $(function() {
                var cal = $( '#calendar' ).calendario( {
                        onDayClick : function( $el, $contentEl, dateProperties ) {

                            for( var key in dateProperties ) {
                                console.log( key + ' = ' + dateProperties[ key ] );
                            }

                            var caldatakey = dateProperties['month'] + '-' + dateProperties['day']  + '-' + dateProperties['year'];
                            console.log("caldata = " + "'" + cal.getCalData(caldatakey) + "'");

                        },
                        caldata : codropsEvents
                    } ),
                    $month = $( '#custom-month' ).html( cal.getMonthName() ),
                    $year = $( '#custom-year' ).html( cal.getYear() );

                $( '#custom-next' ).on( 'click', function() {
                    cal.gotoNextMonth( updateMonthYear );
                } );
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
        </script>
    </body>
</html>
