<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="Vistas/plugins/fontawesome-free/css/all.min.css">
  <!-- fullCalendar -->
  <link rel="stylesheet" href="Vistas/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="Vistas/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                  <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                  <div class="fc-toolbar-chunk"><div class="btn-group"><button type="button" title="Previous day" aria-pressed="false" class="fc-prev-button btn btn-primary"><span class="fa fa-chevron-left"></span></button><button type="button" title="Next day" aria-pressed="false" class="fc-next-button btn btn-primary"><span class="fa fa-chevron-right"></span></button></div><button type="button" title="Today" aria-pressed="false" class="fc-today-button btn btn-primary" disabled="">today</button></div>
                <div class="fc-toolbar-chunk"><h2 class="fc-toolbar-title" id="fc-dom-1">December 2023</h2></div>
                <div class="fc-toolbar-chunk"><div class="btn-group">
                <button type="button" title="month view" aria-pressed="true" class="fc-dayGridMonth-button btn btn-primary active">month</button>
                <button type="button" title="week view" aria-pressed="false" class="fc-timeGridWeek-button btn btn-primary">week</button>
                <button type="button" title="day view" aria-pressed="false" class="fc-timeGridDay-button btn btn-primary">day</button>
                </div>
                </div>
                </div>
                <div aria-labelledby="fc-dom-1" class="fc-view-harness fc-view-harness-active" style="height: 467.407px;">
                <div class="fc-daygrid fc-dayGridMonth-view fc-view"><table role="grid" class="fc-scrollgrid table-bordered fc-scrollgrid-liquid"><thead role="rowgroup">
                <tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                <th role="presentation"><div class="fc-scroller-harness"><div class="fc-scroller" style="overflow: hidden;">
                <table role="presentation" class="fc-col-header " style="width: 629px;">
                <colgroup></colgroup><thead role="presentation">
                <tr role="row"><th role="columnheader" class="fc-col-header-cell fc-day fc-day-sun">
                <div class="fc-scrollgrid-sync-inner"><a aria-label="Sunday" class="fc-col-header-cell-cushion ">Sun</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-mon"><div class="fc-scrollgrid-sync-inner"><a aria-label="Monday" class="fc-col-header-cell-cushion ">Mon</a>
                </div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-tue"><div class="fc-scrollgrid-sync-inner"><a aria-label="Tuesday" class="fc-col-header-cell-cushion ">Tue</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-wed"><div class="fc-scrollgrid-sync-inner"><a aria-label="Wednesday" class="fc-col-header-cell-cushion ">Wed</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-thu"><div class="fc-scrollgrid-sync-inner"><a aria-label="Thursday" class="fc-col-header-cell-cushion ">Thu</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-fri"><div class="fc-scrollgrid-sync-inner"><a aria-label="Friday" class="fc-col-header-cell-cushion ">Fri</a></div></th><th role="columnheader" class="fc-col-header-cell fc-day fc-day-sat"><div class="fc-scrollgrid-sync-inner"><a aria-label="Saturday" class="fc-col-header-cell-cushion ">Sat</a></div></th></tr></thead></table></div></div></th></tr></thead><tbody role="rowgroup"><tr role="presentation" class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid"><td role="presentation"><div class="fc-scroller-harness fc-scroller-harness-liquid"><div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;"><div class="fc-daygrid-body fc-daygrid-body-unbalanced " style="width: 629px;"><table role="presentation" class="fc-scrollgrid-sync-table" style="width: 629px; height: 436px;"><colgroup></colgroup><tbody role="presentation"><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2023-11-26" aria-labelledby="fc-dom-2"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-2" class="fc-daygrid-day-number" aria-label="November 26, 2023">26</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past fc-day-other" data-date="2023-11-27" aria-labelledby="fc-dom-4"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-4" class="fc-daygrid-day-number" aria-label="November 27, 2023">27</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past fc-day-other" data-date="2023-11-28" aria-labelledby="fc-dom-6"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-6" class="fc-daygrid-day-number" aria-label="November 28, 2023">28</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past fc-day-other" data-date="2023-11-29" aria-labelledby="fc-dom-8"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-8" class="fc-daygrid-day-number" aria-label="November 29, 2023">29</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-past fc-day-other" data-date="2023-11-30" aria-labelledby="fc-dom-10"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-10" class="fc-daygrid-day-number" aria-label="November 30, 2023">30</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2023-12-01" aria-labelledby="fc-dom-12"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-12" class="fc-daygrid-day-number" aria-label="December 1, 2023">1</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past" style="border-color: rgb(245, 105, 84); background-color: rgb(245, 105, 84);"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">All Day Event</div></div></div></div><div class="fc-event-resizer fc-event-resizer-end"></div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2023-12-02" aria-labelledby="fc-dom-14"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-14" class="fc-daygrid-day-number" aria-label="December 2, 2023">2</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-past" style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-time">12a</div><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">Long Event</div></div></div></div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2023-12-03" aria-labelledby="fc-dom-16"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-16" class="fc-daygrid-day-number" aria-label="December 3, 2023">3</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs" style="top: 0px; left: 0px; right: -89.8542px;"><a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-end fc-event-past" style="border-color: rgb(243, 156, 18); background-color: rgb(243, 156, 18);"><div class="fc-event-main"><div class="fc-event-main-frame"><div class="fc-event-time">12a</div><div class="fc-event-title-container"><div class="fc-event-title fc-sticky">Long Event</div></div></div></div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2023-12-04" aria-labelledby="fc-dom-18"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-18" class="fc-daygrid-day-number" aria-label="December 4, 2023">4</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 25px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2023-12-05" aria-labelledby="fc-dom-20"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-20" class="fc-daygrid-day-number" aria-label="December 5, 2023">5</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2023-12-06" aria-labelledby="fc-dom-22"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-22" class="fc-daygrid-day-number" aria-label="December 6, 2023">6</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-today " data-date="2023-12-07" aria-labelledby="fc-dom-24"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-24" class="fc-daygrid-day-number" aria-label="December 7, 2023">7</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today"><div class="fc-daygrid-event-dot" style="border-color: rgb(0, 115, 183);"></div><div class="fc-event-time">10:30a</div><div class="fc-event-title">Meeting</div></a></div><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-today"><div class="fc-daygrid-event-dot" style="border-color: rgb(0, 192, 239);"></div><div class="fc-event-time">12p</div><div class="fc-event-title">Lunch</div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-08" aria-labelledby="fc-dom-26"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-26" class="fc-daygrid-day-number" aria-label="December 8, 2023">8</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future"><div class="fc-daygrid-event-dot" style="border-color: rgb(0, 166, 90);"></div><div class="fc-event-time">7p</div><div class="fc-event-title">Birthday Party</div></a></div><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-09" aria-labelledby="fc-dom-28"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-28" class="fc-daygrid-day-number" aria-label="December 9, 2023">9</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-10" aria-labelledby="fc-dom-30"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-30" class="fc-daygrid-day-number" aria-label="December 10, 2023">10</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-11" aria-labelledby="fc-dom-32"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-32" class="fc-daygrid-day-number" aria-label="December 11, 2023">11</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-12" aria-labelledby="fc-dom-34"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-34" class="fc-daygrid-day-number" aria-label="December 12, 2023">12</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-13" aria-labelledby="fc-dom-36"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-36" class="fc-daygrid-day-number" aria-label="December 13, 2023">13</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-14" aria-labelledby="fc-dom-38"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-38" class="fc-daygrid-day-number" aria-label="December 14, 2023">14</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-15" aria-labelledby="fc-dom-40"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-40" class="fc-daygrid-day-number" aria-label="December 15, 2023">15</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-16" aria-labelledby="fc-dom-42"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-42" class="fc-daygrid-day-number" aria-label="December 16, 2023">16</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-17" aria-labelledby="fc-dom-44"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-44" class="fc-daygrid-day-number" aria-label="December 17, 2023">17</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-18" aria-labelledby="fc-dom-46"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-46" class="fc-daygrid-day-number" aria-label="December 18, 2023">18</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-19" aria-labelledby="fc-dom-48"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-48" class="fc-daygrid-day-number" aria-label="December 19, 2023">19</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-20" aria-labelledby="fc-dom-50"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-50" class="fc-daygrid-day-number" aria-label="December 20, 2023">20</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-21" aria-labelledby="fc-dom-52"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-52" class="fc-daygrid-day-number" aria-label="December 21, 2023">21</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-22" aria-labelledby="fc-dom-54"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-54" class="fc-daygrid-day-number" aria-label="December 22, 2023">22</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-23" aria-labelledby="fc-dom-56"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-56" class="fc-daygrid-day-number" aria-label="December 23, 2023">23</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-24" aria-labelledby="fc-dom-58"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-58" class="fc-daygrid-day-number" aria-label="December 24, 2023">24</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2023-12-25" aria-labelledby="fc-dom-60"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-60" class="fc-daygrid-day-number" aria-label="December 25, 2023">25</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2023-12-26" aria-labelledby="fc-dom-62"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-62" class="fc-daygrid-day-number" aria-label="December 26, 2023">26</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2023-12-27" aria-labelledby="fc-dom-64"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-64" class="fc-daygrid-day-number" aria-label="December 27, 2023">27</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2023-12-28" aria-labelledby="fc-dom-66"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-66" class="fc-daygrid-day-number" aria-label="December 28, 2023">28</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-event-harness" style="margin-top: 0px;"><a class="fc-daygrid-event fc-daygrid-dot-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-future" href="https://www.google.com/"><div class="fc-daygrid-event-dot" style="border-color: rgb(60, 141, 188);"></div><div class="fc-event-time">12a</div><div class="fc-event-title">Click for Google</div></a></div>
                <div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2023-12-29" aria-labelledby="fc-dom-68"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-68" class="fc-daygrid-day-number" aria-label="December 29, 2023">29</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2023-12-30" aria-labelledby="fc-dom-70">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-70" class="fc-daygrid-day-number" aria-label="December 30, 2023">30</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr role="row"><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2023-12-31" aria-labelledby="fc-dom-72"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-72" class="fc-daygrid-day-number" aria-label="December 31, 2023">31</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2024-01-01" aria-labelledby="fc-dom-74"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-74" class="fc-daygrid-day-number" aria-label="January 1, 2024">1</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2024-01-02" aria-labelledby="fc-dom-76"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-76" class="fc-daygrid-day-number" aria-label="January 2, 2024">2</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2024-01-03" aria-labelledby="fc-dom-78"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-78" class="fc-daygrid-day-number" aria-label="January 3, 2024">3</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2024-01-04" aria-labelledby="fc-dom-80"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-80" class="fc-daygrid-day-number" aria-label="January 4, 2024">4</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2024-01-05" aria-labelledby="fc-dom-82"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-82" class="fc-daygrid-day-number" aria-label="January 5, 2024">5</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;"></div></div><div class="fc-daygrid-day-bg"></div></div></td><td role="gridcell" class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2024-01-06" aria-labelledby="fc-dom-84"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a id="fc-dom-84" class="fc-daygrid-day-number" aria-label="January 6, 2024">6</a></div><div class="fc-daygrid-day-events"><div class="fc-daygrid-day-bottom" style="margin-top: 0px;">
                </div></div><div class="fc-daygrid-day-bg"></div></div></td></tr></tbody></table></div></div></div></td></tr></tbody></table></div></div></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="Vistas/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="Vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="Vistas/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="Vistas/dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="Vistas/plugins/moment/moment.min.js"></script>
<script src="Vistas/plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="Vistas/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      headerToolbar: {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',
      //Random default events
      events: [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'https://www.google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

</body>
</html>
