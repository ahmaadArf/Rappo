<section id="work-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h1>We are trying to deliver 100% quality product and success their business to achieve ultimate goal.</h1>
                </div>
            </div>
            <div class="col-lg-6">
                <p class="lead">We are providing best service since 1990 to present , committed to best service deliveryNullam metus enim, placerat in lacus vel, porttitor egestas libero. Etiam ex risus, feugiat eget accumsan eu, sagittis eu urna. In eget ultrices metus. Nunc accumsan </p>
            </div>
        </div>
    </div>
</section>
<section id="work" class="section-bottom">
    <div class="container">
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-lg-4 col-md-6 p-0">
                <div class="work-block">
                    <img src="{{ asset('image/projects/'.$project->image )}}" alt="work-img" class="img-fluid">
                    <div class="overlay-content-block">
                        <h4>{{ $project->name }}</h4>
                        <p>{{ $project->About->title }}</p>
                        <a href="{{ route('site.single_project',$project->id) }}"><i class="fa fa-link"></i></a>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>
