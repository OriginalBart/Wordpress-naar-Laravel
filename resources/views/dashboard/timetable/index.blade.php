@extends('layouts.dashboard')


@section('content')
    <section class="timetable">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="" title="Create a band"> <svg class="svg-inline--fa fa-plus-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="plus-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm144 276c0 6.6-5.4 12-12 12h-92v92c0 6.6-5.4 12-12 12h-56c-6.6 0-12-5.4-12-12v-92h-92c-6.6 0-12-5.4-12-12v-56c0-6.6 5.4-12 12-12h92v-92c0-6.6 5.4-12 12-12h56c6.6 0 12 5.4 12 12v92h92c6.6 0 12 5.4 12 12v56z"></path></svg><!-- <i class="fas fa-plus-circle"></i> -->
                        </a>
                    </div>
                </div>
            </div>
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Time
                        </th>
                        <th class="text-uppercase">Monday</th>
                        <th class="text-uppercase">Tuesday</th>
                        <th class="text-uppercase">Wednesday</th>
                        <th class="text-uppercase">Thursday</th>
                        <th class="text-uppercase">Friday</th>
                        <th class="text-uppercase">Saturday</th>
                        <th class="text-uppercase">Sunday</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <td class="align-middle">09:00am</td>
                        {{--                    MONDAY--}}
                        <td>
                            <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                            <div class="margin-10px-top font-size14">9:00-10:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        {{--                    TUESDAY--}}
                        <td class="bg-light-gray">

                        </td>
                        {{--                    WEDNESDAY--}}
                        <td class="bg-light-gray">

                        </td>
                        {{--                    THURSDAY--}}
                        <td class="bg-light-gray">

                        </td>
                        {{--                    FRIDAY--}}
                        <td class="bg-light-gray">

                        </td>
                        {{--                    SATURDAY--}}

                        <td class="bg-light-gray">

                        </td>
                        {{--                    SUNDAY--}}
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">10:00am</td>
                        <td>
                            <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                            <div class="margin-10px-top font-size14">10:00-11:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">11:00am</td>
                        <td>
                            <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                            <div class="margin-10px-top font-size14">11:00-12:00</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">12:00pm</td>
                        <td>
                            <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                            <div class="margin-10px-top font-size14">12:00-1:00</div>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>

                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>

                    <tr>
                        <td class="align-middle">01:00pm</td>
                        <td>
                            <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
