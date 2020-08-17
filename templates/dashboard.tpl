{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          
    </head>
	
    <body>
        <div>
            <header>Here will go the header</header>
            <nav>TODO CREATE NAVBAR</nav>
            <div>{$firstDay}</div>
            <main>
                {include file="calendar.tpl"}
                {include file="calendarTest.tpl"}
               
                
          
                {$month}
                {$daysInMonth}
                {$year}
                {$firstMonthDay}
                
            </main>
        </div>
    </body>

</html>
