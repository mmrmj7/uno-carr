<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>UNO Car | One Way Cab & Taxi Service in Rajasthan</title>
  <link rel="stylesheet" href="index.css">
  <meta name="description" content="Book one way and outstation cabs from Jodhpur, Jaipur, Jaisalmer, Udaipur and other Rajasthan cities. Contact UNO Car on WhatsApp for availability and fare.">
  <meta name="robots" content="index, follow">
  <meta name="theme-color" content="#f5b400">

  <meta property="og:title" content="UNO Car | Rajasthan Cab Service">
  <meta property="og:description" content="One way, airport and outstation cab bookings across Rajasthan.">
  <meta property="og:type" content="website">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Manrope:wght@600;700;800&display=swap" rel="stylesheet">
<!-- Font Awesome Icons -->
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


<style>


	/* B2B */
    .partner{
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap:25px;
      padding:42px;
      border-radius:20px;
      background:var(--dark);
      color:#fff;
    }
    .partner h2{
      margin:0 0 6px;
      font-family:Manrope,sans-serif;
      font-size:30px;
    }
    .partner p{margin:0;color:#cbd3d8;font-size:13px}

    /* Branches */
    .branches{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:18px;
    }
    .branch{
      padding:23px;
      border:1px solid var(--border);
      border-radius:15px;
      background:#fff;
    }
    .branch-icon{
      width:40px;
      height:40px;
      display:grid;
      place-items:center;
      margin-bottom:13px;
      border-radius:50%;
      background:#fff3c4;
    }
    .branch h3{margin:0 0 9px;font-size:18px}
    .branch-address{
      min-height:70px;
      margin:0 0 12px;
      color:var(--muted);
      font-size:12px;
    }
    .branch-phone{
      display:block;
      margin-bottom:12px;
      font-size:13px;
      font-weight:700;
    }
    .branch-services{
      margin:0;
      color:#777;
      font-size:11px;
      line-height:1.6;
    }
    .branch .whatsapp{
      margin-top:15px;
      padding:9px 14px;
      border-radius:8px;
      background:var(--yellow);
      display:inline-block;
      font-size:12px;
      font-weight:700;
    }

    /* Reviews */
    .reviews{
      display:grid;
      grid-template-columns:repeat(3,1fr);
      gap:15px;
    }
    .review{
      padding:20px;
      border:1px solid var(--border);
      border-radius:14px;
      background:#fff;
    }
    .stars{letter-spacing:2px;color:#c99100}
    .review p{margin:10px 0 0;color:#59646d;font-size:13px;line-height:1.6}

    /* FAQ */
    .faq{
      display:grid;
      grid-template-columns:1fr 1fr;
      gap:10px 15px;
    }
    details{
      padding:15px 17px;
      border:1px solid var(--border);
      border-radius:11px;
      background:#fff;
    }
	
	/* =========================================================
   FOOTER
   ========================================================= */

.site-footer {
  background: #101920;
  color: #c6ced4;
  padding: 55px 0 25px;
}


/* FOOTER GRID */

.site-footer .footer-grid {
  display: grid;
  grid-template-columns: 1.7fr 1fr 1fr 1fr;
  gap: 45px;
}


/* LOGO */

.site-footer .logo {
  display: flex;
  align-items: center;
  gap: 9px;

  color: #ffffff;

  font-size: 24px;
  font-weight: 800;

  margin-bottom: 17px;
}

.site-footer .logo span:last-child {
  color: #f5b400;
}

.site-footer .logo-mark {
  width: 40px;
  height: 40px;

  display: flex;
  align-items: center;
  justify-content: center;

  background: #f5b400;
  color: #111;

  border-radius: 10px;

  font-size: 20px;
}


/* ABOUT */

.site-footer .footer-about {
  max-width: 390px;

  margin: 0;

  color: #aeb8bf;

  font-size: 13px;
  line-height: 1.75;
}


/* =========================================================
   SOCIAL MEDIA
   ========================================================= */

.footer-social {
  display: flex;
  flex-wrap: wrap;

  gap: 10px;

  margin-top: 22px;
}


.social {
  width: 38px;
  height: 38px;

  display: flex;
  align-items: center;
  justify-content: center;

  border: 1px solid rgba(255,255,255,.14);

  border-radius: 9px;

  color: #ffffff;

  font-size: 16px;

  transition: all .25s ease;
}


.social:hover {
  transform: translateY(-4px);

  background: #f5b400;

  border-color: #f5b400;

  color: #111;

  box-shadow: 0 8px 20px rgba(0,0,0,.25);
}


/* Individual hover colors */

.social.youtube:hover {
  background: #ff0000;
  border-color: #ff0000;
  color: #fff;
}

.social.twitter:hover {
  background: #000;
  border-color: #555;
  color: #fff;
}

.social.google:hover {
  background: #4285f4;
  border-color: #4285f4;
  color: #fff;
}

.social.pinterest:hover {
  background: #e60023;
  border-color: #e60023;
  color: #fff;
}

.social.facebook:hover {
  background: #1877f2;
  border-color: #1877f2;
  color: #fff;
}

.social.linkedin:hover {
  background: #0a66c2;
  border-color: #0a66c2;
  color: #fff;
}

.social.instagram:hover {
  background: #e1306c;
  border-color: #e1306c;
  color: #fff;
}


/* =========================================================
   FOOTER HEADINGS
   ========================================================= */

.site-footer h4 {
  margin: 4px 0 17px;

  color: #ffffff;

  font-size: 14px;
  font-weight: 700;
}


/* FOOTER LINKS */

.site-footer .footer-grid > div:not(.footer-brand) a {
  display: block;

  width: fit-content;

  margin: 10px 0;

  color: #aeb8bf;

  font-size: 12px;

  transition: all .2s ease;
}

.site-footer .footer-grid > div:not(.footer-brand) a:hover {
  color: #f5b400;

  transform: translateX(4px);
}


/* =========================================================
   FOOTER BOTTOM
   ========================================================= */

.footer-bottom {
  display: flex;

  align-items: center;
  justify-content: space-between;

  gap: 20px;

  margin-top: 42px;

  padding-top: 20px;

  border-top: 1px solid rgba(255,255,255,.09);
}


.copyright {
  color: #7f8a91;

  font-size: 11px;
}


.admin-link a {
  color: #7f8a91;

  font-size: 11px;

  transition: .2s ease;
}

.admin-link a:hover {
  color: #f5b400;
}


/* =========================================================
   TABLET
   ========================================================= */

@media (max-width: 900px) {

  .site-footer .footer-grid {
    grid-template-columns: 1.5fr 1fr 1fr;
    gap: 30px;
  }

  .footer-brand {
    grid-column: 1 / -1;
  }

}
    summary{cursor:pointer;font-size:13px;font-weight:700}
    details p{margin:10px 0 0;color:var(--muted);font-size:12px}

   

    .mobile-menu-btn{display:none;width:42px;height:42px;border:1px solid var(--border);border-radius:10px;background:#fff;font-size:23px;cursor:pointer}
    .mobile-menu{display:none}

    /* Mobile bar */
    .mobile-bar{display:none}

    @media(max-width:980px){
      .main-nav{display:none}
      .mobile-menu-btn{display:block}
      .hero-inner{grid-template-columns:1fr;gap:30px}
      .booking-box{max-width:600px}
      .routes,.places{grid-template-columns:1fr 1fr}
      .why{grid-template-columns:1fr}
      .fleet,.reviews,.branches{grid-template-columns:1fr 1fr}
      .footer-grid{grid-template-columns:1fr 1fr}
    }

    @media(max-width:640px){
      .top-strip{display:none}
      .container{width:min(100% - 24px,1160px)}
      .header-inner{min-height:62px}
      .header-actions .btn-dark{display:none}
      .mobile-menu-btn{display:block}
      .mobile-menu{position:absolute;left:12px;right:12px;top:calc(100% + 5px);display:none;flex-direction:column;padding:10px;background:#fff;border:1px solid var(--border);border-radius:14px;box-shadow:0 14px 35px rgba(0,0,0,.14)}
      .mobile-menu.open{display:flex}
      .mobile-menu a{padding:12px 13px;border-bottom:1px solid #eef0f2;font-size:13px;font-weight:700}
      .mobile-menu a:last-child{border-bottom:0}
      .mobile-menu-book{margin-top:6px;background:var(--yellow);border-radius:9px;text-align:center}
      .logo{font-size:19px}
      .logo-mark{width:34px;height:34px}
      .hero{min-height:auto}
      .hero-inner{padding:48px 0 70px}
      .hero h1{font-size:38px}
      .hero-text{font-size:14px}
      .hero-list{font-size:11px;gap:8px 14px}
      .booking-box{padding:16px;border-radius:15px}
      .trip-tabs{gap:7px}
      .trip-tab{min-height:70px;font-size:11px}
      .trip-icon{font-size:22px}
      .booking-form-grid{grid-template-columns:1fr;gap:13px}
      .full-field,.stops-wrap{grid-column:auto}
      .rating-strip{font-size:10px;gap:8px}
      .rating-strip span+span{padding-left:8px}
      .section{padding:60px 0}
      .section-heading h2{font-size:28px}
      .routes,.places,.fleet,.reviews,.branches,.benefits,.faq{grid-template-columns:1fr}
      .place{height:220px}
      .why-photo{min-height:330px}
      .partner{display:block;padding:28px 23px}
      .partner h2{font-size:25px}
      .partner .btn{margin-top:18px}
      .footer-grid{grid-template-columns:1fr 1fr}
      footer{padding-bottom:100px}
      .mobile-bar{
        position:fixed;
        left:9px;
        right:9px;
        bottom:9px;
        z-index:1500;
        display:grid;
        grid-template-columns:1fr 1fr 1.15fr;
        gap:6px;
        padding:7px;
        border-radius:14px;
        background:#fff;
        box-shadow:0 8px 30px rgba(0,0,0,.2);
      }
      .mobile-bar a{
        padding:10px 5px;
        text-align:center;
        border-radius:8px;
        background:#f1f3f4;
        font-size:11px;
        font-weight:700;
      }
      .mobile-bar .book{background:var(--yellow)}
    }

    /* =========================================================
       UNO CAR LOGO - FIXED
       ========================================================= */
   .site-header {
    position: relative;
    z-index: 100;
    background: #ffffff;
}

.site-header .header-inner {
    min-height: 92px;
    display: flex;
    align-items: center;
}

/* Logo section */
.site-header .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    height: 92px;
    min-width: 210px;

    padding: 10px 0;
    margin: 0;

    box-sizing: border-box;
    text-decoration: none;
}

/* UNO logo image wrapper */
.site-header .logo-image-wrap {
    width: 155px;
    height: 70px;

    display: flex;
    align-items: center;
    justify-content: center;

    overflow: hidden;
}

/* Actual logo */
.site-header .site-logo-img {
    display: block;
    width: 155px;
    height: auto;

    max-width: none;
    margin: 0;
    padding: 0;
}

/* Car text - logo ke right side */
.site-header .logo-car-text {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 40px;
    font-weight: 700;
    line-height: 1;

    color: #172331;

    white-space: nowrap;
    margin: 0;
    padding: 0;
}
/* ================================
   POPULAR ROUTES
================================ */

.routes {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    margin-top: 35px;
}

.route {
    position: relative;
    min-height: 175px;

    padding: 30px 32px;

    background: #ffffff;
    border: 1px solid #eeeeee;
    border-radius: 18px;

    box-shadow: 0 8px 25px rgba(23, 33, 43, 0.08);

    display: flex;
    flex-direction: column;
    justify-content: center;

    overflow: hidden;

    transition:
        transform 0.3s ease,
        box-shadow 0.3s ease,
        border-color 0.3s ease;
}


/* Yellow design element */

.route::before {
    content: "";
    position: absolute;

    left: 0;
    top: 0;

    width: 6px;
    height: 100%;

    background: #f5b400;
}


/* Small decorative circle */

.route::after {
    content: "→";

    position: absolute;

    right: 24px;
    top: 24px;

    width: 42px;
    height: 42px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #fff6d8;
    color: #17212b;

    font-size: 20px;
    font-weight: 700;

    transition: 0.3s ease;
}


/* Route Name */

.route-name {
    font-size: 23px;
    font-weight: 800;

    color: #17212b;

    line-height: 1.3;

    padding-right: 55px;

    margin-bottom: 12px;
}


/* Price */

.route-price {
    display: inline-block;

    width: fit-content;

    background: #fff7dc;
    color: #c58a00;

    padding: 7px 13px;

    border-radius: 6px;

    font-size: 14px;
    font-weight: 700;

    margin-bottom: 12px;
}


/* Route Info */

.route-info {
    font-size: 14px;
    color: #777777;

    line-height: 1.5;
}


/* Hover */

.route:hover {
    transform: translateY(-7px);

    border-color: #f5b400;

    box-shadow:
        0 15px 35px rgba(23, 33, 43, 0.13);
}

.route:hover::after {
    background: #f5b400;
    transform: rotate(-45deg);
}


/* ================================
   TABLET
================================ */

@media (max-width: 800px) {

    .routes {
        grid-template-columns: 1fr;
        gap: 20px;
    }

    .route {
        min-height: 160px;
    }

}


/* ================================
   MOBILE
================================ */

@media (max-width: 600px) {

    .routes {
        grid-template-columns: 1fr;
        gap: 16px;

        margin-top: 25px;
    }

    .route {
        min-height: 155px;

        padding: 26px 24px;

        border-radius: 15px;
    }

    .route-name {
        font-size: 20px;
        padding-right: 50px;
    }

    .route-price {
        font-size: 13px;
        padding: 6px 11px;
    }

    .route-info {
        font-size: 13px;
    }

    .route::after {
        right: 18px;
        top: 18px;

        width: 38px;
        height: 38px;

        font-size: 18px;
    }

}
  </style>

  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"TaxiService",
    "name":"UNO Car",
    "areaServed":"Rajasthan, India",
    "description":"One way and outstation cab service across Rajasthan.",
    "telephone":"+919462661966"
  }
  </script>
</head>

<!-- UNO CAR LOGO: keep the provided file at uploads/blogs/UNO_Car_Logo.jpg -->
<body>

  <div class="top-strip">
    <div class="container">
      <span>UNO Car · Rajasthan</span>
      <span>Cab booking support available 24×7</span>
    </div>
  </div>

  <header class="site-header">
  <div class="container header-inner">

    <a class="logo" href="index.php" aria-label="UNO Car">

      <span class="logo-image-wrap">
        <img
          class="site-logo-img"
          src="uploads/blogs/logo.png"
          alt="UNO Car - unocar.in"
        >
      </span>

     

    </a>


      <nav class="main-nav">
        <a href="Route.php">Routes</a>
        <a href="#fleet">Cars</a>
        <a href="#destinations">Destinations</a>
        <a href="#branches">Branches</a>
        <a href="blog.php">Blog</a>
        <a href="#faq">FAQ</a>
      </nav>

      <div class="header-actions">
        <a class="btn btn-dark" href="tel:+919462661966">Call</a>
        <a class="btn btn-yellow" href="#booking">Book Cab</a>
      </div>

      <button class="mobile-menu-btn" id="mobileMenuBtn" type="button" aria-label="Open menu" aria-expanded="false">☰</button>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="Route.php">Routes</a>
      <a href="#fleet">Cars</a>
      <a href="#destinations">Destinations</a>
      <a href="#branches">Branches</a>
      <a href="blog.php">Blog</a>
      <a href="#faq">FAQ</a>
      <a class="mobile-menu-book" href="#booking">Book Cab</a>
    </div>
  </header>

  <main>

    <section class="hero">
      <div class="container hero-inner">

       <div>
          
		<center>
          <h1>Best Taxi & Cab Service in Rajasthan - Book Uno Cab</h1>

          <p class="hero-text">
            India's Leading Inter-City Cab Service .
          </p>
		</center>
	
        <div class="booking-box" id="booking">
          <div class="trip-tabs" role="tablist" aria-label="Cab booking type">
            <button type="button" class="trip-tab active" data-trip="oneway" aria-selected="true">
              <span class="trip-icon">➡️</span>One Way 
            </button>
            <button type="button" class="trip-tab" data-trip="local" aria-selected="false">
              <span class="trip-icon">◷</span>Local
            </button>
            <button type="button" class="trip-tab" data-trip="round" aria-selected="false">
              <span class="trip-icon">⇆</span>Round Trip
            </button>
          </div>

          <form id="oneWayForm" class="booking-panel active" data-form="oneway">
            <div class="booking-grid">
              <div class="booking-field">
                <label for="onePickup">Pickup</label>
                <select id="onePickup" required>
                  <option value="">Enter Pick-up City</option>
                </select>
              </div>
              <div class="booking-field">
                <label for="oneDrop">Drop</label>
                <select id="oneDrop" required>
                  <option value="">Enter Drop City</option>
                </select>
              </div>
            </div>
            <button class="fare-btn" type="submit">⌕&nbsp; Check Fare</button>
            <div class="rating-strip"><span>⭐ 4.9 Rating</span><span>♙ 5,00,000+ Trips Completed</span></div>
          </form>

          <form id="localForm" class="booking-panel" data-form="local">
            <div class="booking-grid">
              <div class="booking-field">
                <label for="localCity">⌖ City</label>
                <select id="localCity" required>
                  <option value="">Enter City</option>
                </select>
              </div>
              <div class="booking-field">
                <label for="localPackage">▣ Package</label>
                <select id="localPackage" required disabled>
                  <option value="">Select city first</option>
                </select>
              </div>
            </div>
            <button class="fare-btn" type="submit">⌕&nbsp; Check Fare</button>
            <div class="rating-strip"><span>⭐ 4.9 Rating</span><span>♙ 3 Lakh+ Happy Customers</span></div>
          </form>

          <form id="roundForm" class="booking-panel" data-form="round">
            <div class="booking-grid">
              <div class="booking-field">
                <label for="roundPickup">⌖ Pickup City</label>
                <select id="roundPickup" required>
                  <option value="">Select Pickup City</option>
                </select>
              </div>
              <div class="booking-field">
                <label for="pickupDate">▣ Pickup Date</label>
                <input id="pickupDate" type="date" required>
              </div>
              <div class="booking-field">
                <label for="pickupTime">◷ Pickup Time</label>
                <input id="pickupTime" type="time" required>
              </div>
              <div class="booking-field">
                <label for="journeyDays"># Journey Days</label>
                <select id="journeyDays" required>
                  <option value="">Select Journey Days</option>
                  <option>1 Day</option><option>2 Days</option><option>3 Days</option>
                  <option>4 Days</option><option>5 Days</option><option>6 Days</option>
                  <option>7 Days</option><option>8 Days</option><option>9 Days</option><option>10 Days</option>
                </select>
              </div>
            </div>

            <div class="round-extra">
              <label for="stopsContainer">⌖ Travel Cities</label>
              <div id="stopsContainer"></div>
              <button type="button" class="add-stop" id="addStop">＋ Add another stop <span id="stopCount">(1/7)</span></button>
            </div>

            <button class="fare-btn" type="submit">⌕&nbsp; Check Fare</button>
            <div class="rating-strip"><span>⭐ 4.9 Rating</span><span>♙ 3 Lakh+ Happy Customers</span></div>
          </form>
        </div>
		
      </div>
    </section>

    <section class="section" id="routes">
      <div class="container">
        <div class="section-heading">
          <h2>Popular Rajasthan routes</h2>
          <p>Some of the routes frequently requested by UNO Car customers.</p>
        </div>
		
        <div class="routes">
          <div class="route">
		  
            <div class="route-name">Jodhpur → Jaisalmer</div>
            <div class="route-price">Get fare on WhatsApp</div>
            <div class="route-info">One way · Approx. 4.5–5 hours</div>
          </div>

          <div class="route">
            <div class="route-name">Jodhpur → Jaipur</div>
            <div class="route-price">Get fare on WhatsApp</div>
            <div class="route-info">One way · Approx. 5.5–6 hours</div>
          </div>

          <div class="route">
            <div class="route-name">Jodhpur → Udaipur</div>
            <div class="route-price">Get fare on WhatsApp</div>
            <div class="route-info">One way · Approx. 5 hours</div>
          </div>

          <div class="route">
            <div class="route-name">Jaisalmer → Jodhpur</div>
            <div class="route-price">Get fare on WhatsApp</div>
            <div class="route-info">One way · Approx. 4.5–5 hours</div>
          </div>
        </div>
      </div>
    </section>

    <section class="section grey" id="why">
      <div class="container why">

        <div class="why-photo">
        <img src="uploads/blogs/jodhpur.jpg" alt="Rajasthan travel">
          <div class="support-badge">
            <strong>24×7</strong>
            <span>Booking support</span>
          </div>
        </div>

        <div>
          <div class="section-heading">
            <h2>A straight forward way to book a cab</h2>
            <p>Tell us where you are going. We help with the cab and trip coordination.</p>
          </div>

          <div class="benefits">
            <div class="benefit">
              <div class="benefit-icon">❄️</div>
              <h3>Clean AC Cars</h3>
              <p>Vehicle options suitable for city and Rajasthan highway travel.</p>
            </div>

            <div class="benefit">
              <div class="benefit-icon"><i class="fa-solid fa-car-side"></i></div>
              <h3>Experienced Drivers</h3>
              <p>Drivers familiar with common Rajasthan routes and destinations.</p>
            </div>

            <div class="benefit">
              <div class="benefit-icon"><i class="fa-solid fa-location-dot"></i></div>
              <h3>Trip Coordination</h3>
              <p>Pickup details can be shared directly with our team.</p>
            </div>

            <div class="benefit">
              <div class="benefit-icon">₹</div>
              <h3>Fare Before Booking</h3>
              <p>Confirm the fare and trip details before you travel.</p>
            </div>

            <div class="benefit">
              <div class="benefit-icon">⏱</div>
              <h3>Planned Pickup</h3>
              <p>Share the pickup point clearly so the driver can coordinate with you.</p>
            </div>

            <div class="benefit">
              <div class="benefit-icon">💬</div>
              <h3>WhatsApp Booking</h3>
              <p>Continue your enquiry with the UNO Car team on WhatsApp.</p>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="section" id="fleet">
      <div class="container">
        <div class="section-heading">
          <h2>Cars available for your trip</h2>
          <p>Choose a category according to the number of passengers and luggage.</p>
        </div>

        <div class="fleet">
          <article class="car-card">
           <img src="uploads\blogs\sedan.jpg" alt="Sedan taxi">
            <div class="car-content">
              <div class="car-top">
                <h3>Sedan</h3>
                <span class="car-tag">Popular</span>
              </div>
              <div class="car-meta">
                <span>4 passengers</span>
                <span>2 bags</span>
              </div>
              <a class="btn btn-yellow" href="#booking">Ask for Sedan</a>
            </div>
          </article>

          <article class="car-card">
             <img src="uploads\blogs\ertiga.jpg" alt="SUV taxi">
            <div class="car-content">
              <div class="car-top">
                <h3> Ertiga</h3>
                <span class="car-tag">Family</span>
              </div>
              <div class="car-meta">
                <span>6 passengers</span>
                <span>3 bags</span>
              </div>
              <a class="btn btn-yellow" href="#booking">Ask for Ertiga</a>
            </div>
          </article>

          <article class="car-card">
            <img src="uploads\blogs\innova.png" alt="Innova Crysta taxi">
            <div class="car-content">
              <div class="car-top">
                <h3>Innova Crysta</h3>
                <span class="car-tag">Premium</span>
              </div>
              <div class="car-meta">
                <span>6–7 passengers</span>
                <span>3–4 bags</span>
              </div>
              <a class="btn btn-yellow" href="#booking">Ask for Crysta</a>
            </div>
          </article>
        </div>
      </div>
    </section>

    <section class="section grey" id="destinations">
      <div class="container">
        <div class="section-heading">
          <h2>Popular destinations</h2>
          <p>Book point-to-point travel and outstation trips around Rajasthan.</p>
        </div>

        <div class="places">
          <a class="place" href="#booking">
            <img src="uploads\blogs\jaipur.jpg"alt="Jaipur">
            <strong>Jaipur</strong>
          </a>

          <a class="place" href="#booking">
            <img src="uploads\blogs\jodhpur.jpg" alt="Jodhpur">
            <strong>Jodhpur</strong>
          </a>

          <a class="place" href="#booking">
            <img src="uploads\blogs\JAISALMER.jpg" alt="Jaisalmer">
            <strong>Jaisalmer</strong>
          </a>

          <a class="place" href="#booking">
            <img src="uploads\blogs\udaipur.jpg" alt="Udaipur">
            <strong>Udaipur</strong>
          </a>
		  
		    <a class="place" href="#booking">
            <img src="uploads\blogs\pushkar.jpg" alt="Pushkar">
            <strong>Pushkar</strong>
          </a>
        </div>
      </div>
    </section>

    <section class="section">
      <div class="container">
        <div class="partner">
          <div>
            <h2>Hotels & travel agents</h2>
            <p>Need regular guest transfers or outstation cabs? Talk to UNO Car about a B2B arrangement.</p>
          </div>
          <a class="btn btn-yellow" href="https://wa.me/919462661966" target="_blank" rel="noopener">Talk on WhatsApp</a>
        </div>
      </div>
    </section>

    <section class="section grey" id="branches">
      <div class="container">
        <div class="section-heading">
          <h2>UNO Car locations</h2>
          <p>Contact the UNO Car team for cab and self-drive enquiries in these cities.</p>
        </div>

        <div class="branches">

          <div class="branch">
            <div class="branch-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>UNO Car Jodhpur</h3>
            <p class="branch-address">
              Jato Ka Niyoti Nohra, Main Market, Shiv Mandir Road, Ratanada, Jodhpur, Rajasthan – 342001
            </p>
            <a class="branch-phone" href="tel:+919462661966">📞 94626 61966</a>
            <p class="branch-services">Jodhpur Cab Service • Jodhpur Taxi Service • Jodhpur One Way Cab</p>
            <a class="whatsapp" href="https://wa.me/919462661966" target="_blank" rel="noopener">WhatsApp</a>
          </div>

          <div class="branch">
            <div class="branch-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>UNO Car Jaipur</h3>
            <p class="branch-address">
              Plot No. 239, Dr. Rajendra Prasad Nagar-A, Rani Sati Nagar, Nirman Nagar, Mansarovar, Jaipur, Rajasthan – 302020
            </p>
            <a class="branch-phone" href="tel:+919462661966">📞 94626 61966</a>
            <p class="branch-services">Jaipur Cab Service • Jaipur Taxi Service • Jaipur One Way Cab</p>
            <a class="whatsapp" href="https://wa.me/919462661966" target="_blank" rel="noopener">WhatsApp</a>
          </div>

          <div class="branch">
            <div class="branch-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>UNO Car Jaisalmer</h3>
            <p class="branch-address">
               Fort Parking Road, Dhibba Para, Manak Chowk, Amar Sagar Pol, Jaisalmer – 345001, Rajasthan
            </p>
            <a class="branch-phone" href="tel:+919462661966">📞 94626 61966</a>
            <p class="branch-services">Jaisalmer Cab Service • Jaisalmer Taxi Service • Jaisalmer One Way Cab</p>
            <a class="whatsapp" href="https://wa.me/919462661966" target="_blank" rel="noopener">WhatsApp</a>
          </div>

          <div class="branch">
            <div class="branch-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>UNO Car Pushkar</h3>
            <p class="branch-address">
              Varah Ghat, Main Chowk, Pushkar, Ajmer, Rajasthan – 305022
            </p>
            <a class="branch-phone" href="tel:+919462661966">📞 94626 61966</a>
            <p class="branch-services">Pushkar Cab Service • Pushkar Taxi Service • Pushkar One Way Cab</p>
            <a class="whatsapp" href="https://wa.me/919462661966" target="_blank" rel="noopener">WhatsApp</a>
          </div>

          <div class="branch">
            <div class="branch-icon"><i class="fa-solid fa-location-dot"></i></div>
            <h3>UNO Car Udaipur</h3>
            <p class="branch-address">
              First Floor, Salumber House, 88, Gangaur Ghat Marg, Old City, Udaipur, Rajasthan – 313004
            </p>
            <a class="branch-phone" href="tel:+919462661966">📞 94626 61966</a>
            <p class="branch-services">Udaipur Cab Service • Udaipur Taxi Service • Udaipur One Way Cab</p>
            <a class="whatsapp" href="https://wa.me/919462661966" target="_blank" rel="noopener">WhatsApp</a>
          </div>

        </div>
      </div>
    </section>

   

    <section class="section grey" id="faq">
      <div class="container">
        <div class="section-heading">
          <h2>Questions before booking?</h2>
          <p>Some common questions about an UNO Car booking.</p>
        </div>

        <div class="faq">
          <details>
            <summary>How can I book a one way cab?</summary>
            <p>Enter your pickup and drop location in the booking form. Your enquiry will open in WhatsApp for confirmation.</p>
          </details>

          <details>
            <summary>Will I know the fare before booking?</summary>
            <p>UNO Car can confirm the applicable fare and trip details before you finalize the booking.</p>
          </details>

          <details>
            <summary>Can I book an airport transfer?</summary>
            <p>Yes. Select the Airport option and send your pickup and drop details to the UNO Car team.</p>
          </details>

          <details>
            <summary>Which cars can I request?</summary>
            <p>Sedan, SUV/Ertiga and Innova Crysta categories can be requested subject to availability.</p>
          </details>

          <details>
            <summary>Can hotels and travel agents contact UNO Car?</summary>
            <p>Yes. Hotels and travel agents can contact the team regarding regular guest transfers and B2B requirements.</p>
          </details>

          <details>
            <summary>Are tolls and parking included?</summary>
            <p>This can vary by route and booking. Confirm toll, parking, taxes and driver charges with UNO Car before the trip.</p>
          </details>
        </div>
      </div>
    </section>

  </main>

  <!-- ================= FOOTER ================= -->
<footer class="site-footer">

  <div class="container">

    <div class="footer-grid">

      <!-- BRAND -->
      <div class="footer-brand">

        <div class="logo">
          <img class="footer-logo-img" src="uploads/blogs/uno.png" alt="UNO Car - unocar.in" >

        </div>

        <p class="footer-about">
          One way, airport and outstation cab bookings across Rajasthan.
          Share your trip details with UNO Car and confirm the available
          vehicle and fare.
        </p>

        <!-- SOCIAL MEDIA -->
        <div class="footer-social">

          <!-- YouTube -->
          <a href="https://www.youtube.com/@UNOCAR.INCABTAXISERVICE"
             target="_blank"
             rel="noopener noreferrer"
             class="social youtube"
             aria-label="UNO Car YouTube">
            <i class="fa-brands fa-youtube"></i>
          </a>

          <!-- X / Twitter -->
          <a href="https://x.com/unocarjodhpur"
             target="_blank"
             rel="noopener noreferrer"
             class="social twitter"
             aria-label="UNO Car X">
            <i class="fa-brands fa-x-twitter"></i>
          </a>

          <!-- Google -->
          <a href="https://share.google/DYvXdyNI8trg4tcJ9"
             target="_blank"
             rel="noopener noreferrer"
             class="social google"
             aria-label="UNO Car Google">
            <i class="fa-brands fa-google"></i>
          </a>

          <!-- Pinterest -->
          <a href="https://in.pinterest.com/unocarjodhpur/"
             target="_blank"
             rel="noopener noreferrer"
             class="social pinterest"
             aria-label="UNO Car Pinterest">
            <i class="fa-brands fa-pinterest-p"></i>
          </a>

          <!-- Facebook -->
          <a href="https://www.facebook.com/unocar.in"
             target="_blank"
             rel="noopener noreferrer"
             class="social facebook"
             aria-label="UNO Car Facebook">
            <i class="fa-brands fa-facebook-f"></i>
          </a>

          <!-- LinkedIn -->
          <a href="https://www.linkedin.com/company/uno-car-jodhpur-self-driven-car-rental-jodhpur/?viewAsMember=true"
             target="_blank"
             rel="noopener noreferrer"
             class="social linkedin"
             aria-label="UNO Car LinkedIn">
            <i class="fa-brands fa-linkedin-in"></i>
          </a>

          <!-- Instagram -->
          <a href="https://www.instagram.com/unocar.in_cab_taxi_rajasthan/?hl=en"
             target="_blank"
             rel="noopener noreferrer"
             class="social instagram"
             aria-label="UNO Car Instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>

        </div>

      </div>


      <!-- SERVICES -->
      <div>

        <h4>Services</h4>

        <a href="#booking">One Way Cab</a>
        <a href="#booking">Round Trip</a>
        <a href="#booking">Airport Transfer</a>
        <a href="#booking">Sightseeing</a>

      </div>


      <!-- CITIES -->
      <div>

        <h4>Cities</h4>

        <a href="#branches">Jodhpur</a>
        <a href="#branches">Jaisalmer</a>
        <a href="#branches">Jaipur</a>
        <a href="#branches">Udaipur</a>

      </div>


      <!-- COMPANY -->
      <div>

        <h4>Company</h4>

        <a href="blog.php">Blog</a>
        <a href="#branches">Branches</a>
        <a href="#booking">Contact</a>
        <a href="#destinations">Terms</a>

      </div>

    </div>


    <!-- BOTTOM -->
    <div class="footer-bottom">

      <div class="copyright">
        © 2026 UNO Car. All rights reserved.
      </div>

      <div class="admin-link">
        <a href="admins/login.php">Admin Login</a>
      </div>

    </div>

  </div>

</footer>




 
  <script>
    const whatsappNumber = "919462661966";

    /* Locations from the UNO Car pickup/drop list */
    const locations = [
      "Jodhpur", "Jaisalmer", "Jaipur", "Pushkar", "Udaipur",
      "Delhi", "Bikaner", "Balotra", "Nakoda Ji", "Osian"
    ];

    const localPackages = {
      "Jodhpur": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Full Day Sightseeing"],
      "Jaisalmer": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Sightseeing"],
      "Jaipur": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Full Day Sightseeing"],
      "Udaipur": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Sightseeing"],
      "Pushkar": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Sightseeing"],
      "Bikaner": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Sightseeing"],
      "Delhi": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Use"],
      "Balotra": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Use"],
      "Nakoda Ji": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Use"],
      "Osian": ["8 Hours / 80 KM", "12 Hours / 120 KM", "Local Sightseeing"]
    };

    function fillLocations(select, placeholder, exclude) {
      select.innerHTML = `<option value="">${placeholder}</option>`;
      locations.forEach(function(city){
        if(city === exclude) return;
        const option = document.createElement("option");
        option.value = city;
        option.textContent = city;
        select.appendChild(option);
      });
    }

    const onePickup = document.getElementById("onePickup");
    const oneDrop = document.getElementById("oneDrop");
    const roundPickup = document.getElementById("roundPickup");
    const localCity = document.getElementById("localCity");
    const localPackage = document.getElementById("localPackage");

    fillLocations(onePickup, "Enter Pick-up City", "");
    fillLocations(oneDrop, "Enter Drop City", "");
    fillLocations(roundPickup, "Select Pickup City", "");
    fillLocations(localCity, "Enter City", "");

    onePickup.addEventListener("change", function(){
      fillLocations(oneDrop, "Enter Drop City", onePickup.value);
    });

    localCity.addEventListener("change", function(){
      const city = localCity.value;
      localPackage.innerHTML = "";
      if(!city){
        localPackage.disabled = true;
        localPackage.innerHTML = '<option value="">Select city first</option>';
        return;
      }
      localPackage.disabled = false;
      localPackage.innerHTML = '<option value="">Select Package</option>';
      (localPackages[city] || ["8 Hours / 80 KM", "12 Hours / 120 KM"]).forEach(function(pkg){
        const option = document.createElement("option");
        option.value = pkg;
        option.textContent = pkg;
        localPackage.appendChild(option);
      });
    });

    /* Three genuinely separate forms: switching a tab only shows that form. */
    const tabs = document.querySelectorAll(".trip-tab");
    const panels = document.querySelectorAll(".booking-panel");

    tabs.forEach(function(tab){
      tab.addEventListener("click", function(){
        const mode = tab.dataset.trip;
        tabs.forEach(function(item){
          const active = item === tab;
          item.classList.toggle("active", active);
          item.setAttribute("aria-selected", active ? "true" : "false");
        });
        panels.forEach(function(panel){
          panel.classList.toggle("active", panel.dataset.form === mode);
        });
      });
    });

    /* Round-trip date cannot be before today. */
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth()+1).padStart(2,"0");
    const dd = String(today.getDate()).padStart(2,"0");
    document.getElementById("pickupDate").min = `${yyyy}-${mm}-${dd}`;

    /* Round-trip travel cities: 1 to 7 stops */
    const stopsContainer = document.getElementById("stopsContainer");
    const addStopBtn = document.getElementById("addStop");
    const stopCount = document.getElementById("stopCount");
    let stopNumber = 0;

    function updateStopCount(){
      stopCount.textContent = `(${stopNumber}/7)`;
      addStopBtn.style.display = stopNumber >= 7 ? "none" : "inline-flex";
    }

    function addStop(){
      if(stopNumber >= 7) return;
      stopNumber++;
      const row = document.createElement("div");
      row.className = "stop-row";

      const select = document.createElement("select");
      select.className = "travel-stop";
      select.required = stopNumber === 1;
      select.innerHTML = '<option value="">Select Travel City</option>';
      locations.forEach(function(city){
        const option = document.createElement("option");
        option.value = city;
        option.textContent = city;
        select.appendChild(option);
      });
      row.appendChild(select);

      if(stopNumber > 1){
        const remove = document.createElement("button");
        remove.type = "button";
        remove.className = "remove-stop";
        remove.textContent = "×";
        remove.setAttribute("aria-label", "Remove stop");
        remove.addEventListener("click", function(){
          row.remove();
          stopNumber--;
          updateStopCount();
        });
        row.appendChild(remove);
      }
      stopsContainer.appendChild(row);
      updateStopCount();
    }

    addStop();
    addStopBtn.addEventListener("click", addStop);

    function openWhatsApp(message){
      const url = "https://wa.me/" + whatsappNumber + "?text=" + encodeURIComponent(message);
      window.open(url, "_blank", "noopener");
    }

    document.getElementById("oneWayForm").addEventListener("submit", function(e){
  e.preventDefault();

  if(!onePickup.value || !oneDrop.value){
    alert("Please select Pickup and Drop City.");
    return;
  }

  if(onePickup.value === oneDrop.value){
    alert("Pickup and Drop City cannot be the same.");
    return;
  }

  const pickup = encodeURIComponent(onePickup.value);
  const drop = encodeURIComponent(oneDrop.value);

 window.location.href = "one%20way%20cab.php?pickup=" + pickup + "&drop=" + drop;
});

    document.getElementById("localForm").addEventListener("submit", function(e){
      e.preventDefault();
      if(!localCity.value || !localPackage.value){
        alert("Please select City and Package.");
        return;
      }
      openWhatsApp(`Hello UNO Car,\n\nI want to book a Local Cab.\n\nCity: ${localCity.value}\nPackage: ${localPackage.value}\n\nPlease share availability and best fare.`);
    });

    document.getElementById("roundForm").addEventListener("submit", function(e){
      e.preventDefault();
      const stops = Array.from(document.querySelectorAll(".travel-stop"))
        .map(function(item){ return item.value; }).filter(Boolean);

      if(!roundPickup.value || !document.getElementById("pickupDate").value || !document.getElementById("pickupTime").value || !document.getElementById("journeyDays").value || stops.length === 0){
        alert("Please complete all Round Trip details and select at least one Travel City.");
        return;
      }

      openWhatsApp(`Hello UNO Car,\n\nI want to book a Round Trip.\n\nPickup City: ${roundPickup.value}\nPickup Date: ${document.getElementById("pickupDate").value}\nPickup Time: ${document.getElementById("pickupTime").value}\nJourney Days: ${document.getElementById("journeyDays").value}\nTravel Cities: ${stops.join(", ")}\n\nPlease share availability and best fare.`);
    });

    /* Mobile hamburger */
    const mobileMenuBtn = document.getElementById("mobileMenuBtn");
    const mobileMenu = document.getElementById("mobileMenu");
    if(mobileMenuBtn && mobileMenu){
      mobileMenuBtn.addEventListener("click", function(){
        const open = mobileMenu.classList.toggle("open");
        mobileMenuBtn.textContent = open ? "✕" : "☰";
        mobileMenuBtn.setAttribute("aria-expanded", open ? "true" : "false");
      });
      mobileMenu.querySelectorAll("a").forEach(function(link){
        link.addEventListener("click", function(){
          mobileMenu.classList.remove("open");
          mobileMenuBtn.textContent = "☰";
          mobileMenuBtn.setAttribute("aria-expanded", "false");
        });
      });
    }
	
  </script>

</body>
</html>