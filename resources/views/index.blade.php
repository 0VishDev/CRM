@extends('layouts.app-fast')
@section('content')
<style>
  #tt {
   font-size: 20px;
   font-family: "Raleway";
}

.display-date {
  text-align: center;
  margin-bottom: 10px;
  font-size: .6rem;
  font-weight: 600;
}

.display-time {
  display: flex;
  font-size: 2rem;
  font-weight: bold;
  border: 2px solid #ffd868;
  padding: 10px 20px;
  border-radius: 5px;
  transition: ease-in-out 0.1s;
  transition-property: background, box-shadow, color;
  -webkit-box-reflect: below 2px
    linear-gradient(transparent, rgba(255, 255, 255, 0.05));
}

.display-time:hover {
  background: #ffd868;
  box-shadow: 0 0 30px#ffd868;
  color: #272727;
  cursor: pointer;
}
 
</style>

<!-- Home Page -->
<header>
  <div class="cover bg-light">
    <div class="container px-2">
      <div class="row">
        <div class="col-lg-6">
          <div class="mt-5 pt-lg-5">
            <h1 class="intro-title marker" data-aos="fade-left" data-aos-delay="50">Business World Trade CRM  </h1>
            <p class="lead fw-normal mt-4" data-aos="fade-up" data-aos-delay="100">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking.</p>
            <h2 id="tt"></h2>
            <div class="container">
                <div class="display-date">
                  <span id="day">day</span>,
                  <span id="daynum">00</span>
                  <span id="month">month</span>
                  <span id="year">0000</span>
                </div>
                <div class="display-time"></div>
            </div>
<!--            <div class="mt-3" data-aos="fade-up" data-aos-delay="200"><a class="btn btn-primary shadow-sm mt-1 me-2" href="#contact">Get Sarted <i class="fas fa-arrow-right ms-1"></i></a><a class="btn btn-outline-secondary mt-1" data-bigpicture="{&quot;ytSrc&quot;: &quot;aqz-KE-bpKQ&quot;}" href="#"><i class="fas fa-play-circle me-1"></i> Watch Video</a></div>
-->       </div>
          
        </div>
        <div class="col-lg-6 p-3 pe-lg-0" data-aos="fade-left" data-aos-delay="100"><img class="pt-2 img-fluid" src="images/illustrations/building_websites.svg" alt="hello"/></div>
      </div>
    </div>
  </div>
  <div class="wave-bg"></div>
</header>
 


@endsection