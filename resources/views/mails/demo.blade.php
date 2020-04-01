Hello <i>{{ $demo->receiver }}</i>,
<p>You booked a tour from AmazingTour</p>

<p><u>Thông tin tour</u></p>

<div>
    <p><b>Tên tour:</b>&nbsp;{{ $demo->tour_name }}</p>
    <p><b>Thời gian khởi hành:</b>&nbsp;{{ $demo->time_start }}</p>
    <p><b>Địa điểm:</b>&nbsp;{{ $demo->destination }}</p>
    <p><b>Xuất phát tại:</b>&nbsp;{{ $demo->start_at }}</p>
    <p><b>Người book:</b>&nbsp;{{ $demo->full_name }}</p>
</div>

Thank You,
<br/>
<i>{{ $demo->sender }}</i>
