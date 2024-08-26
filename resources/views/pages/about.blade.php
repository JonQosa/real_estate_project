@extends('layouts.app')

@section('content')


<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('assets/images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">About Homeland</h1>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <img src="{{ asset('assets/images/about.jpg') }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
          <div class="site-section-title">
            <h2>Our Company</h2>
          </div>
          <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio./p>
          <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem voluptate ea? Sunt laudantium fugiat, mollitia voluptate? Modi blanditiis veniam nesciunt architecto odit voluptatum tempore impedit magnam itaque natus!</p>
          <p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">Read More</a></p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
  <div class="container">
    <div class="row mb-5 justify-content-center"  data-aos="fade-up" >
      <div class="col-md-7">
        <div class="site-section-title text-center">
          <h2>Leadership</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima quibusdam, laboriosam.</p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="200">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Megan Smith</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi dolorem totam non quis facere blanditiis praesentium est. Totam atque corporis nisi, veniam non. Tempore cupiditate, vitae minus obcaecati provident beatae!</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="300">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis, cumque vitae voluptates culpa earum similique corrupti itaque veniam doloribus amet perspiciatis recusandae sequi nihil tenetur ad, modi quos id magni!</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5"  data-aos="fade-up" data-aos-delay="400">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Philip Martin</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores illo iusto, inventore, iure dolorum officiis modi repellat nobis, praesentium perspiciatis, explicabo. Atque cupiditate, voluptates pariatur odit officia libero veniam quo.</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>



      </div>
  </div>
  </div>


  <div class="site-section bg-light">
    <div class="container" data-aos="fade">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-7">
          <div class="site-section-title text-center">
            <h2>Our Agents</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero magnam officiis ipsa eum pariatur labore fugit amet eaque iure vitae, repellendus laborum in modi reiciendis quis! Optio minima quibusdam, laboriosam.</p>
          </div>
        </div>
      </div>
      <div class="row">
          
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_4.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Steven Ericson</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates sed qui at harum ipsum earum voluptas a unde error sapiente, sint perspiciatis, fugiat neque iure rerum repellendus tempora odio doloribus.</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_5.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Nathan Dumlao</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo nobis commodi rerum dicta, nulla. Delectus neque hic deserunt consequuntur esse facere, necessitatibus corrupti! Blanditiis ratione consequuntur beatae adipisci, voluptatum consequatur.</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
          <div class="team-member">

            <img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded mb-4">

            <div class="text">

              <h2 class="mb-2 font-weight-light text-black h4">Brooke Cagle</h2>
              <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nam tenetur molestiae maiores officiis consectetur, distinctio aperiam in illum praesentium corrupti, harum porro reiciendis magnam non enim dolorem aut explicabo.</p>
              <p>
                <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
              </p>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

  @endsection