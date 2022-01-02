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
                            <li class="page-item"><a class="page-link" data-value="{{$number}}">{{$number}}</a></li>
                            @endfor

                        </ul>
                    </nav>
                </div>