<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wave Cafe HTML Template by Tooplate</title>
    <link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
    <link rel="stylesheet" href="{{ asset('assets/css/tooplate-wave-cafe.css') }}">
    <style>
      .hidden {
          display: none;
      }
    </style>
<!--
Tooplate 2121 Wave Cafe
https://www.tooplate.com/view/2121-wave-cafe
-->
</head>
<body>
  <div class="tm-container">
  @if(session('success'))
    <div style="color: red;font:bolder">
        {{ session('success') }}
    </div>
  @endif
    <div class="tm-row">
      <!-- Site Header -->
      <div class="tm-left">
        <div class="tm-left-inner">
          <div class="tm-site-header">
            <i class="fas fa-coffee fa-3x tm-site-logo"></i>
            <h1 class="tm-site-name">Wave Cafe</h1>
          </div>
          <nav class="tm-site-nav">
            <ul class="tm-site-nav-ul">
              <li class="tm-page-nav-item">
                <a href="#drink" class="tm-page-link active">
                  <i class="fas fa-mug-hot tm-page-link-icon"></i>
                  <span>Drink Menu</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#about" class="tm-page-link">
                  <i class="fas fa-users tm-page-link-icon"></i>
                  <span>About Us</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#special" class="tm-page-link">
                  <i class="fas fa-glass-martini tm-page-link-icon"></i>
                  <span>Special Items</span>
                </a>
              </li>
              <li class="tm-page-nav-item">
                <a href="#contact" class="tm-page-link">
                  <i class="fas fa-comments tm-page-link-icon"></i>
                  <span>Contact</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>        
      </div>
      <div class="tm-right">
        <main class="tm-main">
          <div id="drink" class="tm-page-content">
            <!-- Drink Menu Page -->
            <nav class="tm-black-bg tm-drinks-nav">
              <ul>
              @foreach ($categories as $category)
                <li>
                  <a href="#" class="tm-tab-link {{ $loop->first ? 'active' : '' }}" data-id="{{ Str::slug($category->category_name) }}">{{$category->category_name}}</a>
                </li>
              @endforeach
              </ul>
            </nav>
            @foreach ($categories as $category)
            <div id="{{ Str::slug($category->category_name) }}" class="tm-tab-content {{ $loop->first ? '' : 'hidden' }}">
              <div class="tm-list">
                @foreach ($beverages->where('category_id', $category->id) as $beverage)
                  <div class="tm-list-item">          
                    <img src="{{ asset('assets/admin/images/'. $beverage->image) }}" alt="Image" class="tm-list-item-img">
                    <div class="tm-black-bg tm-list-item-text">
                      <h3 class="tm-list-item-name">{{ $beverage->title }}<span class="tm-list-item-price">{{ $beverage->price }}</span></h3>
                      <p class="tm-list-item-description">{{ $beverage->content }}</p>
                    </div>
                  </div>
                @endforeach           
              </div>
            </div> 
            @endforeach
          </div>

          <!-- About Us Page -->
          <div id="about" class="tm-page-content">
            <div class="tm-black-bg tm-mb-20 tm-about-box-1">              
              <h2 class="tm-text-primary tm-about-header">About Wave Cafe</h2>
              <div class="tm-list-item tm-list-item-2">                
                <img src="{{ asset('assets/img/about-1.png') }}" alt="Image" class="tm-list-item-img tm-list-item-img-big">
                <div class="tm-list-item-text-2">
                  <p>Wave Cafe is a one-page video background HTML CSS template from Tooplate. You can use this for your business websites.</p>
                  <p>You can also use this for your client websites which you get paid for your website services. Please tell your friends about us.</p>
                </div>                
              </div>
            </div>
            <div class="tm-black-bg tm-mb-20 tm-about-box-2">              
              <div class="tm-list-item tm-list-item-2">                
                <div class="tm-list-item-text-2">
                  <h2 class="tm-text-primary">How we began</h2>
                  <p>If you wish to support us, please contact Tooplate. Thank you. Duis bibendum erat nec ipsum consectetur sodales.</p>                  
                </div>                
                <img src="{{ asset('assets/img/about-2.png') }}" alt="Image" class="tm-list-item-img tm-list-item-img-big tm-img-right">                
              </div>
              <p>Donec non urna elit. Quisque ut magna in dui mattis iaculis eu finibus metus. Suspendisse vel mi a lacus finibus vehicula vel ut diam. Nam pellentesque, mi quis ullamcorper.</p>
            </div>
          </div>
          <!-- end About Us Page -->

          <!-- Special Items Page -->
          <div id="special" class="tm-page-content">
            <div class="tm-special-items">
              @foreach ($beverages as $beverage)
                <div class="tm-black-bg tm-special-item">
                  <img src="{{ asset('assets/admin/images/'.$beverage->image) }}" alt="Image">
                  <div class="tm-special-item-description">
                    <h2 class="tm-text-primary tm-special-item-title">{{$beverage->title}}</h2>
                    <p class="tm-special-item-text">{{$beverage->content}}</p>  
                  </div>
                </div>
              @endforeach
            </div>            
          </div>
          <!-- end Special Items Page -->

          <!-- Contact Page -->
          <div id="contact" class="tm-page-content">
            <div class="tm-black-bg tm-contact-text-container">
              <h2 class="tm-text-primary">Contact Wave</h2>
              <p>Wave Cafe Template has a video background. You can use this layout for your websites. Please contact Tooplate's Facebook page. Tell your friends about our website.</p>
            </div>
            <div class="tm-black-bg tm-contact-form-container tm-align-right">
              <form action="{{ route('sendMessage') }}" method="POST" id="contact-form">
                @csrf
                <div class="tm-form-group">
                  <input type="text" name="name" class="tm-form-control" placeholder="Name" value="{{ old('name') }}" required="" />
                  <p style="color: red">
                    @error('name')
                      {{ $message }}
                    @enderror
                  </p>
                </div>
                <div class="tm-form-group">
                  <input type="email" name="email" class="tm-form-control" value="{{ old('email') }}" placeholder="Email" required="" />
                  <p style="color: red">
                    @error('email')
                      {{ $message }}
                    @enderror
									</p>
                </div>        
                <div class="tm-form-group tm-mb-30">
                  <textarea rows="6" name="message" class="tm-form-control" placeholder="Message" value="{{ old('message') }}" required=""></textarea>
                  <p style="color: red">
                    @error('message')
                      {{ $message }}
                    @enderror
									</p>
                </div>        
                <div>
                  <button type="submit" class="tm-btn-primary tm-align-right">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
          <!-- end Contact Page -->
        </main>
      </div>    
    </div>
    <footer class="tm-site-footer">
      <p class="tm-black-bg tm-footer-text">Copyright 2020 Wave Cafe
      
      | Design: <a href="https://www.tooplate.com" class="tm-footer-link" rel="sponsored" target="_parent">Tooplate</a></p>
    </footer>
  </div>
    
  <!-- Background video -->
  <div class="tm-video-wrapper">
      <i id="tm-video-control-button" class="fas fa-pause"></i>
      <video autoplay muted loop id="tm-video">
          <source src="{{ asset('assets/video/wave-cafe-video-bg.mp4') }}" type="video/mp4">
      </video>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.tm-tab-link');
        const contents = document.querySelectorAll('.tm-tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function (e) {
                e.preventDefault();

                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                contents.forEach(content => content.classList.add('hidden'));
                document.getElementById(this.dataset.id).classList.remove('hidden');
            });
        });
    });
</script>
  <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>    
  <script>

    function setVideoSize() {
      const vidWidth = 1920;
      const vidHeight = 1080;
      const windowWidth = window.innerWidth;
      const windowHeight = window.innerHeight;
      const tempVidWidth = windowHeight * vidWidth / vidHeight;
      const tempVidHeight = windowWidth * vidHeight / vidWidth;
      const newVidWidth = tempVidWidth > windowWidth ? tempVidWidth : windowWidth;
      const newVidHeight = tempVidHeight > windowHeight ? tempVidHeight : windowHeight;
      const tmVideo = $('#tm-video');

      tmVideo.css('width', newVidWidth);
      tmVideo.css('height', newVidHeight);
    }

    function openTab(evt, id) {
      $('.tm-tab-content').hide();
      $('#' + id).show();
      $('.tm-tab-link').removeClass('active');
      $(evt.currentTarget).addClass('active');
    }    

    function initPage() {
      let pageId = location.hash;

      if(pageId) {
        highlightMenu($(`.tm-page-link[href^="${pageId}"]`)); 
        showPage($(pageId));
      }
      else {
        pageId = $('.tm-page-link.active').attr('href');
        showPage($(pageId));
      }
    }

    function highlightMenu(menuItem) {
      $('.tm-page-link').removeClass('active');
      menuItem.addClass('active');
    }

    function showPage(page) {
      $('.tm-page-content').hide();
      page.show();
    }

    $(document).ready(function(){

      /***************** Pages *****************/

      initPage();

      $('.tm-page-link').click(function(event) {
        
        if(window.innerWidth > 991) {
          event.preventDefault();
        }

        highlightMenu($(event.currentTarget));
        showPage($(event.currentTarget.hash));
      });

      
      /***************** Tabs *******************/

      $('.tm-tab-link').on('click', e => {
        e.preventDefault(); 
        openTab(e, $(e.target).data('id'));
      });

      $('.tm-tab-link.active').click(); // Open default tab


      /************** Video background *********/

      setVideoSize();

      // Set video background size based on window size
      let timeout;
      window.onresize = function(){
        clearTimeout(timeout);
        timeout = setTimeout(setVideoSize, 100);
      };

      // Play/Pause button for video background      
      const btn = $("#tm-video-control-button");

      btn.on("click", function(e) {
        const video = document.getElementById("tm-video");
        $(this).removeClass();

        if (video.paused) {
          video.play();
          $(this).addClass("fas fa-pause");
        } else {
          video.pause();
          $(this).addClass("fas fa-play");
        }
      });
    });
      
  </script>
</body>
</html>