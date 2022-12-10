 <div class="page-section bg-light">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Latest news</h1>
      <div class="row mt-5">
        @foreach($news as $news)
        <div class="col-lg-4 py-2 wow zoomIn">
          
          <div class="card-blog">
            <div class="header">
              <div class="post-category">
                <a href="#">Hospital news</a>
              </div>

              <a href="blog-details.html" class="post-thumb">

                <img src="newsimage/{{$news->nimage}}" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="blog-details.html">{{$news->heading}}</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                  <div class="avatar-img">
                    
                    <img src="doctorimage/{{$doctor->image}}" alt="">
                  </div>
                  <span>{{$news->doctor}}</span>
                </div>
                <span class="mai-time"></span> {{$news->updated_at}}
              </div>
            </div>
          </div>
        @endforeach    
        </div>
      

        <div class="col-12 text-center mt-4 wow zoomIn">
          <a href="blog.html" class="btn btn-primary">Read More</a>
        </div>

      </div>
    </div>
  </div> <!-- .page-section -->