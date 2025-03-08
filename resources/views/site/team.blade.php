<div class="container-fluid py-5 mb-5 team" dir="ltr">
    <div class="container">
        <div class="text-center mx-auto pb-5 wow fadeIn" data-wow-delay=".3s" style="max-width: 600px;">
            <h2 style="font-family: 'cairo';color:#FFAB00;">فريق العمل</h2>
        </div>
        <div class="owl-carousel team-carousel wow fadeIn" data-wow-delay=".5s">
            @foreach($employees as $employee)
            <div class="rounded team-item">
                    <div class="team-content">
                        <div class="team-img-icon">
                            <div class="team-img rounded-circle">
                                <img src="{{ asset('images/Employee/' . $employee->image) }}" class="img-fluid w-100 rounded-circle" alt="">
                            </div>
                            <div class="team-name text-center py-3">
                                <h4 class="">{{ $employee->name }}</h4>
                                <p class="m-0">{{ $employee->position }}</p>
                            </div>
                            <div class="team-icon d-flex justify-content-center pb-4">
                                <a class="btn btn-square btn-primary text-white rounded-circle m-1" href="{{ $employee->facebook }}"><i class="fab fa-facebook-f text-white"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle m-1" href="{{ $employee->twitter }}"><i class="fab fa-twitter text-white"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle m-1" href="{{ $employee->insta }}"><i class="fab fa-instagram text-white"></i></a>
                                <a class="btn btn-square btn-primary text-white rounded-circle m-1" href="{{ $employee->linkedin }}"><i class="fab fa-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
       
    </div>
</div>
<!-- Team End -->
