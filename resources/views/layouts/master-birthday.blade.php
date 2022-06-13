<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Vendor | @yield('mytitle') </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      
      <!-- partial -->
     

      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            
            <div class="content">
              @yield('content')
            </div>
             <div class="d-xl-flex justify-content-between align-items-start">
               <div class="container">
             </div>
            </div>
           </div>
         <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="footer-inner-wraper">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="mdi mdi-heart text-danger"></i>Design and Development By Infobiz World Trade Pvt. Ltd.</span>
              </div>
            </div>
          </footer>
          <!-- partial 1-->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-circle-progress/js/circle-progress.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
    <script>
      function myFunction() {
          if(!confirm("Are You Sure to delete this"))
          event.preventDefault();
      }
     </script>

     <script>
       

var screenWidth = window.innerWidth;
var screenHeight = window.innerHeight;
var controller;

var minVx = -10;
var deltaVx = 20;
var minVy = 25
var deltaVy = 15;
var minParticleV = 5;
var deltaParticleV = 5;

var gravity = 1;

var explosionRadius = 500;
var bombRadius = 3;
var explodingDuration = 10;
var explosionDividerFactor = 5; // I couldn't find a better name. Got any?

var nBombs = 1; // initial
var percentChanceNewBomb = 2;

function Color(min) {
  this.style = 'hsla(' + (Math.random() * 255) + ', 100%, 50%, 1.0)';
};

function colorValue(min) {
  return Math.floor(Math.random() * (255 - min) + min);
}

function createColorStyle(r, g, b) {
  return 'rgba(' + r + ',' + g + ',' + b + ', 0.8)';
}

// A Bomb. Or firework.
function Bomb() {
  var self = this;
  self.radius = bombRadius;
  self.previousRadius = bombRadius;
  self.explodingDuration = explodingDuration;
  self.hasExploded = false;
  self.alive = true;
  self.color = new Color(160);

  self.px = (window.innerWidth / 4) + (Math.random() * window.innerWidth / 2);
  self.py = window.innerHeight;
  self.vx = minVx + Math.random() * deltaVx;
  self.vy = (minVy + Math.random() * deltaVy) * -1;

  self.duration = 
    self.update = function(particlesVector) {
    if (self.hasExploded) {
      var deltaRadius = explosionRadius - self.radius;
      self.previousRadius = self.radius;
      self.radius += deltaRadius / explosionDividerFactor;
      self.explodingDuration--;
      if (self.explodingDuration == 0) {
        self.alive = false;
      }
    } else {
      self.vx += 0;
      self.vy += gravity;
      if (self.vy >= 0) { // invertion point
        self.explode(particlesVector);
      }
      self.px += self.vx;
      self.py += self.vy;
    }
  };

  self.draw = function(ctx) {
    ctx.beginPath();
    ctx.arc(self.px, self.py, self.previousRadius, 0, Math.PI * 2, false);
    if (self.hasExploded) {
    } else {
      ctx.fillStyle = self.color.style;
      ctx.lineWidth = 1;
      ctx.fill();
    }
  };

  self.explode = function(particlesVector) {
    self.hasExploded = true;
    var e = 3 + Math.floor(Math.random() * 3);
    for(var j = 0; j < e; j++) {
      var n = 10 + Math.floor(Math.random() * 21); // 10 - 30
      var speed = minParticleV + Math.random() * deltaParticleV;
      var deltaAngle = 2 * Math.PI / n;
      var initialAngle = Math.random() * deltaAngle;
      for(var i = 0; i < n; i++) {
        particlesVector.push(new Particle(self,  i * deltaAngle + initialAngle, speed));
      }
    }
  };

}

function Particle(parent, angle, speed) {
  var self = this;
  self.px = parent.px;
  self.py = parent.py;
  self.vx = Math.cos(angle) * speed;
  self.vy = Math.sin(angle) * speed;
  self.color = parent.color;
  self.duration = 40 + Math.floor(Math.random() * 20);
  self.alive = true;

  self.update = function(){
    self.vx += 0;
    self.vy += gravity / 10;

    self.px += self.vx;
    self.py += self.vy;
    self.radius = 3;

    self.duration--;
    if(self.duration <= 0){
      self.alive = false;
    }
  };

  self.draw = function(ctx) {
    ctx.beginPath();
    ctx.arc(self.px, self.py, self.radius, 0, Math.PI * 2, false);
    ctx.fillStyle = self.color.style;
    ctx.lineWidth = 1;
    ctx.fill();
  };
}

function Controller() {
  var self = this;
  self.canvas = document.getElementById("screen");
  self.canvas.width = screenWidth;
  self.canvas.height = screenHeight;
  self.ctx = self.canvas.getContext('2d');
  
  function setSpeedParams() {
    var heightReached = 0;
    var vy = 0;
    while (heightReached < screenHeight && vy >= 0){
      vy += gravity;
      heightReached += vy;
    }
    minVy = vy / 2;
    deltaVy = vy - minVy;
    vx = (1 / 4) * screenWidth / (vy / 2);
    minVx = -vx;
    deltaVx = 2*vx;
  };
  
  self.resize = function() {
    screenWidth = window.innerWidth;
    screenHeight = window.innerHeight;
    self.canvas.width = screenWidth;
    self.canvas.height = screenHeight;
    setSpeedParams();
  };
  
  self.resize();
  window.onresize = self.resize;
  self.init = function(){
    self.readyBombs = [];
    self.explodedBombs = [];
    self.particles = [];
    for(var i = 0; i < nBombs; i++){
      self.readyBombs.push(new Bomb());
    }
  }
  
  self.update = function(){
    var aliveBombs = [];
    while(self.explodedBombs.length > 0){
      var bomb = self.explodedBombs.shift();
      bomb.update();
      if (bomb.alive) {
        aliveBombs.push(bomb);
      }
    }
    self.explodedBombs = aliveBombs;
    var notExplodedBombs = [];
    while (self.readyBombs.length > 0) {
      var bomb = self.readyBombs.shift();
      bomb.update(self.particles);
      if (bomb.hasExploded){
        self.explodedBombs.push(bomb);
      } else {
        notExplodedBombs.push(bomb);
      }
    }
    self.readyBombs = notExplodedBombs;
    var aliveParticles = [];
    while (self.particles.length > 0) {
      var particle = self.particles.shift();
      particle.update();
      if (particle.alive){
        aliveParticles.push(particle);
      }
    }
    self.particles = aliveParticles;
  }

  self.draw = function() {
    self.ctx.beginPath();
    self.ctx.fillStyle='rgba(0, 0, 0, 0.1)'; // Ghostly effect
    self.ctx.fillRect(0, 0, self.canvas.width, self.canvas.height);
    self.ctx.globalCompositeOperation = 'lighter';
    for (var i = 0; i < self.readyBombs.length; i++){
      self.readyBombs[i].draw(self.ctx);
    }
    for (var i = 0; i < self.explodedBombs.length; i++){
      self.explodedBombs[i].draw(self.ctx);
    }
    for (var i = 0; i < self.particles.length; i++){
      self.particles[i].draw(self.ctx);
    }
    self.ctx.globalCompositeOperation = 'source-over';
  }
  
  self.animation = function() {
    self.update();
    self.draw();
    if (Math.random() * 100 < percentChanceNewBomb) {
      self.readyBombs.push(new Bomb());
    }
    requestAnimationFrame(self.animation);
  }
}

var controller = new Controller();
controller.init();
requestAnimationFrame(controller.animation);


     </script>
    
  <script>
  

    var screenWidth = window.innerWidth;
    var screenHeight = window.innerHeight;
    var controller;

    var minVx = -10;
    var deltaVx = 20;
    var minVy = 25
    var deltaVy = 15;
    var minParticleV = 5;
    var deltaParticleV = 5;

    var gravity = 1;

    var explosionRadius = 500;
    var bombRadius = 3;
    var explodingDuration = 10;
    var explosionDividerFactor = 5; // I couldn't find a better name. Got any?

    var nBombs = 1; // initial
    var percentChanceNewBomb = 2;

    function Color(min) {
      this.style = 'hsla(' + (Math.random() * 255) + ', 100%, 50%, 1.0)';
    };

    function colorValue(min) {
      return Math.floor(Math.random() * (255 - min) + min);
    }

    function createColorStyle(r, g, b) {
      return 'rgba(' + r + ',' + g + ',' + b + ', 0.8)';
    }

    // A Bomb. Or firework.
    function Bomb() {
      var self = this;
      self.radius = bombRadius;
      self.previousRadius = bombRadius;
      self.explodingDuration = explodingDuration;
      self.hasExploded = false;
      self.alive = true;
      self.color = new Color(160);

      self.px = (window.innerWidth / 4) + (Math.random() * window.innerWidth / 2);
      self.py = window.innerHeight;
      self.vx = minVx + Math.random() * deltaVx;
      self.vy = (minVy + Math.random() * deltaVy) * -1;

      self.duration = 
        self.update = function(particlesVector) {
        if (self.hasExploded) {
          var deltaRadius = explosionRadius - self.radius;
          self.previousRadius = self.radius;
          self.radius += deltaRadius / explosionDividerFactor;
          self.explodingDuration--;
          if (self.explodingDuration == 0) {
            self.alive = false;
          }
        } else {
          self.vx += 0;
          self.vy += gravity;
          if (self.vy >= 0) { // invertion point
            self.explode(particlesVector);
          }
          self.px += self.vx;
          self.py += self.vy;
        }
      };

      self.draw = function(ctx) {
        ctx.beginPath();
        ctx.arc(self.px, self.py, self.previousRadius, 0, Math.PI * 2, false);
        if (self.hasExploded) {
        } else {
          ctx.fillStyle = self.color.style;
          ctx.lineWidth = 1;
          ctx.fill();
        }
      };

      self.explode = function(particlesVector) {
        self.hasExploded = true;
        var e = 3 + Math.floor(Math.random() * 3);
        for(var j = 0; j < e; j++) {
          var n = 10 + Math.floor(Math.random() * 21); // 10 - 30
          var speed = minParticleV + Math.random() * deltaParticleV;
          var deltaAngle = 2 * Math.PI / n;
          var initialAngle = Math.random() * deltaAngle;
          for(var i = 0; i < n; i++) {
            particlesVector.push(new Particle(self,  i * deltaAngle + initialAngle, speed));
          }
        }
      };

    }

    function Particle(parent, angle, speed) {
      var self = this;
      self.px = parent.px;
      self.py = parent.py;
      self.vx = Math.cos(angle) * speed;
      self.vy = Math.sin(angle) * speed;
      self.color = parent.color;
      self.duration = 40 + Math.floor(Math.random() * 20);
      self.alive = true;

      self.update = function(){
        self.vx += 0;
        self.vy += gravity / 10;

        self.px += self.vx;
        self.py += self.vy;
        self.radius = 3;

        self.duration--;
        if(self.duration <= 0){
          self.alive = false;
        }
      };

      self.draw = function(ctx) {
        ctx.beginPath();
        ctx.arc(self.px, self.py, self.radius, 0, Math.PI * 2, false);
        ctx.fillStyle = self.color.style;
        ctx.lineWidth = 1;
        ctx.fill();
      };
    }

    function Controller() {
      var self = this;
      self.canvas = document.getElementById("screen");
      self.canvas.width = screenWidth;
      self.canvas.height = screenHeight;
      self.ctx = self.canvas.getContext('2d');
      
      function setSpeedParams() {
        var heightReached = 0;
        var vy = 0;
        while (heightReached < screenHeight && vy >= 0){
          vy += gravity;
          heightReached += vy;
        }
        minVy = vy / 2;
        deltaVy = vy - minVy;
        vx = (1 / 4) * screenWidth / (vy / 2);
        minVx = -vx;
        deltaVx = 2*vx;
      };
      
      self.resize = function() {
        screenWidth = window.innerWidth;
        screenHeight = window.innerHeight;
        self.canvas.width = screenWidth;
        self.canvas.height = screenHeight;
        setSpeedParams();
      };
      
      self.resize();
      window.onresize = self.resize;
      self.init = function(){
        self.readyBombs = [];
        self.explodedBombs = [];
        self.particles = [];
        for(var i = 0; i < nBombs; i++){
          self.readyBombs.push(new Bomb());
        }
      }
      
      self.update = function(){
        var aliveBombs = [];
        while(self.explodedBombs.length > 0){
          var bomb = self.explodedBombs.shift();
          bomb.update();
          if (bomb.alive) {
            aliveBombs.push(bomb);
          }
        }
        self.explodedBombs = aliveBombs;
        var notExplodedBombs = [];
        while (self.readyBombs.length > 0) {
          var bomb = self.readyBombs.shift();
          bomb.update(self.particles);
          if (bomb.hasExploded){
            self.explodedBombs.push(bomb);
          } else {
            notExplodedBombs.push(bomb);
          }
        }
        self.readyBombs = notExplodedBombs;
        var aliveParticles = [];
        while (self.particles.length > 0) {
          var particle = self.particles.shift();
          particle.update();
          if (particle.alive){
            aliveParticles.push(particle);
          }
        }
        self.particles = aliveParticles;
      }

      self.draw = function() {
        self.ctx.beginPath();
        self.ctx.fillStyle='rgba(0, 0, 0, 0.1)'; // Ghostly effect
        self.ctx.fillRect(0, 0, self.canvas.width, self.canvas.height);
        self.ctx.globalCompositeOperation = 'lighter';
        for (var i = 0; i < self.readyBombs.length; i++){
          self.readyBombs[i].draw(self.ctx);
        }
        for (var i = 0; i < self.explodedBombs.length; i++){
          self.explodedBombs[i].draw(self.ctx);
        }
        for (var i = 0; i < self.particles.length; i++){
          self.particles[i].draw(self.ctx);
        }
        self.ctx.globalCompositeOperation = 'source-over';
      }
      
      self.animation = function() {
        self.update();
        self.draw();
        if (Math.random() * 100 < percentChanceNewBomb) {
          self.readyBombs.push(new Bomb());
        }
        requestAnimationFrame(self.animation);
      }
    }

    var controller = new Controller();
    controller.init();
    requestAnimationFrame(controller.animation);


  </script>
  </body>
</html>