<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <base href="{{url('/')}}" target="_blank">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="{{url('assets/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/stylesheets/general.css')}}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="{{url('assets/js/jquery-3.2.1.min.js')}}"></script>
    </head>
    <body>
        <div class="header w-100">

            <nav class="navbar navbar-expand-lg ">
                <div class="w-100">
                    <div class="st-menu">
                        <div class="row">
                            <div class="col-md-1">
                                <a class="navbar-brand d-lg-block re-header" >
                                    <img src="{{url('logo.jpg')}}" alt="">
                                </a></div>
                            <div class="col-md-1">
                                <ul class="navbar-nav ">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link " href="#" id="navbarDropdown"  >
                                            Explore <i class="fas fa-angle-down"></i>
                                        </a><ul class="dropdown-menu">
                                            <li class="nav-item"> <a class="nav-link " href="#" id="navbarDropdown"  >test</a></li>
                                            <li class="nav-item"> <a class="nav-link " href="#" id="navbarDropdown"  >test</a></li>
                                            <li class="nav-item"> <a class="nav-link " href="#" id="navbarDropdown"  >test</a></li>
                                            <li class="nav-item"> <a class="nav-link " href="#" id="navbarDropdown"  >test</a></li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            <div class="col-md-7">
                                <form class="form-inline ml-3 mr-4 " action="" >
                                    <label class="w-100"> <input class="form-control mr-sm-2" id="search"  name="search" type="text" placeholder="Search" aria-label="Search">
                                    </label>
                                </form></div>
                            <div class="col-md-3">
                                <ul class="navbar-nav ml-3 float-right pl-15 ">
                                    <li class="nav-item ml-3"><a >Join as Istractor</a></li>
                                    <li class="nav-item ml-3"><a >Login</a></li>
                                    <li class="nav-item ml-4"><a class="btn btn-success">Sign up</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h6>Display 2301 of results</h3>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav result">
                    <li class="nav-item">
                        <a class="nav-link green" href="#">Courses</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="row col-md-12 mt-4">

            <div class="col-md-3">
                <form id="form">
                    <h6 class="result ">Category</h6>

                    <ul class=" mt-2 category_ul">
                        @foreach($categories as $category)
                        <li class="nav-item mt-1"><a href="" id="category" data_id="{{$category->id}}" class="selectcategory grey">{{$category->name}}</a></li>
                        @endforeach
                        <li class="nav-item ">     <a href="" class="show-less">show less<i class="fas fa-minus-square"></i></a></li>

                    </ul>

                    <a href="" class="load-more">Load More<i class="fas fa-plus-square"></i></a>
                    <h6 class="result mt-4 ">Course Rating</h6>
                    @for($rate=5;$rate>0;$rate--)
                    <label><input type="radio" name="rating" class="rate_radio" value="{{$rate}}">@for($i=0;$i<5;$i++)<i class=" @if($i<=$rate) fas fa-star @else fa fa-star-o @endif"></i>@endfor</label><br/>
                    @endfor
                    <h6 class="result mt-4 ">
                        Level
                    </h6>
                    @foreach(levels as $level)
                    <label><input type="checkbox" class="levels" value="{{$level}}"> {{$level}}</label><br/>
                    @endforeach
                    <h6  class="result mt-4 ">Time</h6>
                    <label><input type="radio" name="time" class="time" value="0">Less than 4 hours</label><br/>
                    <label><input type="radio" name="time" class="time" value="1">Less than 8 hours</label><br/>
                    <label><input type="radio" name="time" class="time" value="2">More than 8 hours</label><br/>
                </form>
            </div>
            <div class="col-md-9 courses_container">
                <h6>Courses</h6>
                <div class="row col-md-12">
                    @foreach($courses as $one)
                    <div class="col-md-4">
                        <div class="card">
                            <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="Card image">
                            <h4 class="text-white  mt-0 mb-0"><span class="category background_blue">{{$one->category->name}}</span></h4>
                            <div class="card-body">
                                <div class="course_title">
                                    <h7 class="green ">{{$one->name}}</h7>
                                </div><br>
                                <span><i class="fas fa-user"></i>writer</span>
                                <p class="grey course_desc">{{$one->description}}</p>
                                <div class="action">
                                    <label>@for($i=0;$i<5;$i++)<i class=" @if($i<=$one->rate) fas fa-star @else fa fa-star-o @endif"></i>@endfor ($one->views)</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <hr>
                <div class="row col-md-12">
                    <nav aria-label="Page navigation example ">
                        <ul class="pagination">
                            @for($number=1;$number<=$courses->lastPage();$number++)
                            <li class="page-item"><a class="page-link pagination_link" data-value="{{$number}}">{{$number}}</a></li>
                            @endfor

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <script>
$(document).ready(function () {
    $('.pagination_link').on('click', function (e) {
        $(this).addClass('active');

        getdata('page', $(this).attr('data-value'));
    });
    $('.load-more').click(function (e) {
        e.preventDefault();
        $('.category_ul').height('auto');
        $(this).hide();
    });
    $('.show-less').click(function (e) {
        e.preventDefault();
        $('.category_ul').height('120');
        $('.load-more').show();
    });
    $('.selectcategory').click(function (e) {
        e.preventDefault();

        getdata('category_id', $(this).attr('data_id'));


//        alert($(this).attr('data_id'));
    });
    $('.rate_radio').click(function () {
        getdata('rating', $('.rate_radio:checked').val());


//        alert($('.rate_radio:checked').val());
    });
    $('.time').click(function () {
      getdata('time', $('.time:checked').val());  
    });
    $('#search').keyup(function(){
        if($(this).val().length>2){
           getdata('search',$(this).val());
        }
    });
    $('.levels').click(function (e) {
        var val = [];
        $('.levels:checked').each(function (i) {
            val[i] = $(this).val();
        });
        getdata('levels', val);



    });
    function getdata(name, value) {
//        alert(value);
        $.ajax({
            url: "{{url('render')}}" + '?' + name + '=' + value,

            beforeSend: function () {
                $(".courses_container").html($('#loading').html());
            },

            success: function (data) {
                $(".courses_container").html(data);
            }

        });

    }
});

    </script>
    <div id="loading" style="display: none;">
        <img src="{{url('Ajux_loader.gif')}}">
    </div>
</body>

</html>
