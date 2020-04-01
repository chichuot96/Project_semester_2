Hello {{ $demo->receiver }},
You booked a tour from AmazingTour

Thông tin tour:

Tên tour:{{ $demo->tour_name }}
Thời gian:&nbsp;{{ $demo->time_start }}
Địa điểm:{{ $demo->destination }}
Xuất phát:&nbsp;{{ $demo->start_at }}
Người book:&nbsp;{{ $demo->full_name }}

Thank You,
{{ $demo->sender }}
