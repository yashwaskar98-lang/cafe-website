<!DOCTYPE html>
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DRINCUP CAFE - Our City, Our Cafe</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&family=Caveat:wght@700&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;scroll-behavior:smooth}
body{background:#fffaf0;overflow-x:hidden}
:root{--gold:#c9a86a;--black:#0a0a0a}
a{text-decoration:none;color:inherit}button{cursor:pointer;border:0}
#splash{position:fixed;inset:0;z-index:100;background:#000;display:grid;place-items:center;transition:.8s}
.s-logo{width:100px;height:100px;border-radius:16px;border:2px solid var(--gold);animation:zoom 1s infinite alternate;object-fit:cover}
@keyframes zoom{to{transform:scale(1.15);box-shadow:0 0 30px var(--gold)}}
#loginWrap{position:fixed;inset:0;z-index:90;background:rgba(0,0,0,.88);display:none;place-items:center;backdrop-filter:blur(8px)}
#loginWrap.show{display:grid}
.login-card{position:relative;width:680px;max-width:96vw;height:500px;background:#fff;border-radius:22px;overflow:hidden;border:8px solid #fff;display:flex;animation:pop.6s ease}
@keyframes pop{from{transform:scale(.7);opacity:0}to{transform:scale(1);opacity:1}}
.toggle{display:none}
.card-bg{position:absolute;z-index:2;top:0;left:0;bottom:0;width:50%;background:url('hero.jpg') center/cover,linear-gradient(45deg,#000,var(--gold));border-radius:14px;translate:100% 0;transition:.7s}
.toggle:checked ~.card-bg{translate:0 0}
.hero-b,.form-b{position:absolute;width:50%;height:100%;display:flex;flex-direction:column;align-items:center;justify-content:center;transition:.6s;opacity:0;visibility:hidden;padding:20px;text-align:center}
.hero-b.login,.form-b.login{opacity:1;visibility:visible}
.toggle:checked ~.hero-b.login{opacity:0;visibility:hidden}
.toggle:checked ~.form-b.login{opacity:0;visibility:hidden}
.toggle:checked ~.hero-b.register{opacity:1;visibility:visible}
.toggle:checked ~.form-b.register{opacity:1;visibility:visible}
.hero-b.login{left:50%;translate:0;color:#fff;z-index:3}
.hero-b.register{translate:-100% 0;color:#fff;z-index:3}
.form-b.login{left:0}.form-b.register{left:50%;translate:-100% 0}
.toggle:checked ~.hero-b.login{translate:100% 0}
.toggle:checked ~.hero-b.register{translate:0}
.toggle:checked ~.form-b.login{translate:100% 0}
.toggle:checked ~.form-b.register{translate:0}
.hero-b label{margin-top:12px;padding:8px 22px;border-radius:20px;border:1px solid #fff;cursor:pointer}
.form-b input{width:85%;padding:10px;margin:5px;border:1px solid #ddd;border-radius:8px}
.form-b button{background:var(--black);color:var(--gold);padding:10px 26px;border-radius:20px;margin-top:8px;font-weight:700}
.header{position:fixed;top:0;left:0;right:0;z-index:50;background:rgba(10,10,10,.92);backdrop-filter:blur(10px);display:flex;justify-content:space-between;align-items:center;padding:10px 16px;color:#fff;transition:.3s}
.header.scrolled{padding:6px 16px;background:#000}
.logo{display:flex;align-items:center;gap:8px;font-weight:800;font-size:15px}
.logo img{width:36px;height:36px;border-radius:8px;object-fit:cover;border:1px solid var(--gold)}
.logo span{color:var(--gold)}
.nav-scroll{display:flex;gap:6px;overflow:auto;scrollbar-width:none;max-width:70%}
.nav-scroll::-webkit-scrollbar{display:none}
.nav-scroll a{white-space:nowrap;font-size:9px;padding:6px 10px;border-radius:20px;border:1px solid #ffffff20;opacity:.8;transition:.3s;cursor:pointer}
.nav-scroll a:hover,.nav-scroll a.active{background:var(--gold);color:#000;opacity:1;transform:translateY(-2px)}
.hero{position:relative;min-height:100vh;display:flex;align-items:center;padding:80px 20px 30px;overflow:hidden;background:radial-gradient(circle at 20% 30%, #1a1a1a 0%, #000 60%)}
.hero::before{content:'';position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1445116572660-236099ec97a0?w=1200') center/cover;opacity:.25}
.float{position:absolute;font-size:20px;animation:float 4s ease-in-out infinite}
@keyframes float{0%,100%{transform:translateY(0) rotate(0)}50%{transform:translateY(-20px) rotate(10deg)}}
.hero-content{position:relative;z-index:2;color:#fff;max-width:600px}
.badge{display:inline-block;background:var(--gold);color:#000;font-size:10px;font-weight:700;padding:4px 10px;border-radius:20px;margin-bottom:10px}
.hero h1{font-size:48px;line-height:.9;font-weight:800}
.hero h1 span{color:var(--gold);display:block;font-family:'Caveat';font-size:52px;transform:rotate(-2deg)}
.hero p{font-size:12px;opacity:.7;margin:12px 0;line-height:1.6}
.btns{display:flex;gap:10px;margin-top:14px}
.btn-gold{background:var(--gold);color:#000;padding:10px 22px;border-radius:30px;font-weight:700;font-size:12px}
.btn-outline{border:1px solid #fff5;color:#fff;padding:10px 22px;border-radius:30px;font-size:12px;background:transparent}
.hero-img{position:absolute;right:5%;top:55%;transform:translateY(-50%);width:320px;height:320px;border-radius:50%;overflow:hidden;border:4px solid var(--gold);box-shadow:0 20px 60px #000}
.hero-img img{width:100%;height:100%;object-fit:cover}
.stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin:-30px 16px 0;position:relative;z-index:3}
.stat{background:#fff;padding:14px;border-radius:14px;text-align:center;box-shadow:0 8px 20px #0001;border:1px solid #eee}
.sec{padding:22px 16px}
.sec h2{font-size:18px}
.sec h2 span{font-family:'Caveat';color:var(--gold);font-size:22px}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(160px,1fr));gap:12px;margin-top:12px}
.card{background:#fff;border-radius:14px;overflow:hidden;border:1px solid #eee;box-shadow:0 4px 12px #0001}
.card img{width:100%;height:100px;object-fit:cover}
.card-body{padding:8px}
.card-body h4{font-size:11px;min-height:28px}
.card-body p{font-size:10px;color:#b45309;font-weight:700}
.add{width:100%;margin-top:6px;background:var(--black);color:var(--gold);padding:6px;border-radius:8px;font-size:10px}
.cta{background:var(--black);color:#fff;border-radius:20px;padding:20px;text-align:center;margin:16px;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:radial-gradient(circle at 30% 20%, var(--gold) 0%, transparent 60%);opacity:.15}
.page{display:none;padding:70px 12px}
.page.active{display:block}
.cart{position:fixed;right:8px;top:60px;width:310px;max-height:80vh;overflow:auto;background:#fff;border-radius:14px;box-shadow:0 10px 30px #0004;z-index:60;transform:translateX(120%);transition:.35s}
.cart.open{transform:translateX(0)}
.track{display:flex;gap:6px;margin:10px 0}
.step{flex:1;text-align:center;padding:8px;background:#eee;border-radius:10px;font-size:9px}
.step.active{background:var(--black);color:var(--gold)}
.qr-box{background:#fff;padding:16px;border-radius:16px;border:2px solid var(--gold);text-align:center;max-width:360px;margin:auto}
.qr-box img{width:100%;border-radius:12px}
input,textarea,select{width:100%;padding:9px;border:1px solid #ddd;border-radius:8px;margin-top:6px;font-size:12px}
.cat-filter{display:flex;gap:8px;overflow:auto;padding:10px 0;scrollbar-width:none;position:sticky;top:58px;z-index:5;background:#fffaf0}
.cat-filter button{white-space:nowrap;padding:6px 12px;border-radius:20px;font-size:10px;border:1px solid #ddd;background:#fff}
.cat-filter button.active{background:var(--black);color:var(--gold)}
.slider{position:relative;overflow:hidden;border-radius:14px;margin-top:12px}
.slides{display:flex;transition:.6s}
.slide{flex:0 0 100%;padding:18px;background:linear-gradient(135deg,#0a0a0a,#2a1a0a);color:#fff;display:flex;justify-content:space-between;align-items:center}
.slide b{color:var(--gold)}
@media(max-width:700px){.hero h1{font-size:36px}.hero h1 span{font-size:40px}.hero-img{display:none}}
</style>
</head>
<body>

<div id="splash"><div style="text-align:center"><img src="hero.jpg" class="s-logo" onerror="this.src='https://images.unsplash.com/photo-1445116572660-236099ec97a0?w=200'"><div style="color:var(--gold);font-family:Caveat;margin-top:12px;font-size:20px">DRINCUP CAFE ☕ Loading...</div></div></div>
<div id="loginWrap"><div class="login-card"><input type="checkbox" id="tog" class="toggle"><div class="card-bg"></div><div class="hero-b register"><h2>Welcome Back!</h2><p>Login</p><label for="tog">LOGIN</label></div><div class="form-b register"><h2>Sign Up</h2><input placeholder="Name"><input placeholder="Email"><input type="password" placeholder="Password"><button onclick="doLogin()">SIGN UP</button></div><div class="hero-b login"><h2>Hello Yash! ☕</h2><p>Our City, Our Cafe</p><label for="tog">SIGN UP</label></div><div class="form-b login"><h2>Login</h2><input placeholder="Email" value="yash@drincup.com"><input type="password" value="123"><button onclick="doLogin()">LOGIN</button></div></div></div>

<div class="header" id="header">
  <div class="logo"><img src="hero.jpg" onerror="this.src='https://images.unsplash.com/photo-1445116572660-236099ec97a0?w=100'"> DRINCUP <span>CAFE</span></div>
  <div class="nav-scroll">
    <a onclick="showPage('home')" class="active">🏠 Home</a>
    <a onclick="showPage('menu')">📋 Menu & Order</a>
    <a onclick="showPage('offers')">🎁 Offers</a>
    <a onclick="showPage('booking')">🪑 Booking</a>
    <a onclick="showPage('contact')">📞 Contact</a>
    <a onclick="showPage('myorders')">🧾 MyOrders</a>
    <a onclick="showPage('payment')">💳 Payment</a>
    <a onclick="showPage('location')">📍 Location</a>
    <a onclick="showPage('faq')">❓ FAQ</a>
    <a onclick="showPage('about')">👨‍🍳 About Us</a>
  </div>
  <div onclick="toggleCart()" style="background:#fff1;padding:5px 10px;border-radius:20px;cursor:pointer">🛒 <b id="c1">0</b></div>
</div>

<!-- HOME - WITH LAST WHATSAPP SENTENCE -->
<div id="Home" class="page active" style="padding:0">
<section class="hero">
  <div class="float" style="top:18%;left:8%">☕</div><div class="float" style="top:30%;left:60%">🍔</div>
  <div class="hero-content">
    <div class="badge">🔥 Fresh Food • Our City, Our Cafe</div>
    <h1>GOOD FOOD<br>FRESH <span>Vibes ✨</span></h1>
    <p>Welcome to DRINCUP CAFE – Manager: Yash Waskar. Serving cafes foods, drinks & snacks all fresh! <br>📞 9322663642 • Kopargaon</p>
    <div class="btns">
      <button class="btn-gold" onclick="showPage('menu')">🍔 Order Now</button>
      <button class="btn-outline" onclick="showPage('offers')">🎁 Offers</button>
    </div>
  </div>
  <div class="hero-img"><img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600"></div>
</section>
<div class="stats"><div class="stat"><b>80+</b><small>Menu Items</small></div><div class="stat"><b>4.8★</b><small>200+ Reviews</small></div><div class="stat"><b>30min</b><small>Fast Delivery</small></div></div>
<section class="sec"><h2>🔥 Featured <span>Delights</span></h2><div class="grid" id="featGrid"></div></section>
<section class="sec"><h2>🎁 Today’s <span>Special Offers</span></h2><div class="slider"><div class="slides" id="slides"><div class="slide"><div><b>DC Party Combo @ ₹499</b><br><small>Burger + Fries + Cold Coffee + Nachos</small></div><button class="btn-gold" onclick="addDirect('DC Party Combo',499)">Order</button></div><div class="slide" style="background:linear-gradient(135deg,#1a1a1a,#3a2a1a)"><div><b>20% OFF on Milkshakes</b></div><button class="btn-gold">Grab</button></div><div class="slide" style="background:linear-gradient(135deg,#0a0a0a,#1a2a1a)"><div><b>Wrap + Mojito @ ₹200</b></div><button class="btn-gold" onclick="addDirect('Wrap+Mojito',200)">Order</button></div></div></div></section>

<!-- LAST WHATSAPP SENTENCE AS YOU SAID -->
<div class="cta">
  <h2 style="font-family:'Caveat';font-size:28px">Good Food, Better Mood ♡</h2>
  <p style="font-size:11px;opacity:.7;margin:8px 0">🚚 DELIVERY AVAILABLE - Order on WhatsApp Now!</p>
  <button class="btn-gold" onclick="window.open('https://wa.me/919322663642?text=Hi%20Yash%20Drincup%20Cafe%20Order','_blank')">💬 WhatsApp Order - 9322663642</button>
</div>
<div style="text-align:center;padding:14px;font-size:10px;opacity:.5">© 2026 DRINCUP CAFE - Our City, Our Cafe ❤️☕ | Fresh Food • Quality • Great Taste</div>
</div>


<!-- MENU + ORDER ONE PAGE -->
<div id="menu" class="page">
  <h2>📋 Menu + 🛒 Order - All in One</h2>
  <div class="cat-filter" id="catFilter"></div>
  <div id="menuAll"></div>
  <div style="background:#fff;padding:14px;border-radius:14px;border:2px solid var(--gold);margin-top:20px">
    <h3>🛒 Delivery Details + Order Tracking</h3>
    <input id="custName" placeholder="Your Name"><input id="custPhone" placeholder="Phone 9322663642"><input id="custAddr" placeholder="Delivery Address">
    <div class="track"><div class="step active" id="s1">🛒<br>Placed</div><div class="step" id="s2">👨‍🍳<br>Preparing</div><div class="step" id="s3">🛵<br>On Way - Zomato</div><div class="step" id="s4">✅<br>Delivered</div></div>
    <div style="display:flex;gap:8px;margin-top:10px"><button class="add" style="background:var(--gold);color:#000;padding:12px;flex:1" onclick="placeOrder()">Place Order - <span id="orderTotal">₹0</span></button><button class="add" style="background:#CB202D;color:#fff;padding:12px;flex:1" onclick="window.open('https://www.zomato.com/','_blank')">🔴 Zomato</button></div>
  </div>
</div>

<div id="offers" class="page"><h2>🎁 Offers</h2><div class="grid"><div class="card"><div class="card-body"><h4>DC Party Combo @ ₹499</h4><p>Save ₹100</p><button class="add" onclick="addDirect('Party Combo',499)">Add</button></div></div><div class="card"><div class="card-body"><h4>Wrap + Mojito @ ₹200</h4><p>Best Evening</p><button class="add" onclick="addDirect('Wrap+Mojito',200)">Add</button></div></div></div></div>
<div id="booking" class="page"><h2>🪑 Table Booking</h2><div style="background:#fff;padding:14px;border-radius:12px;border:1px solid #eee;max-width:400px"><input type="date"><input type="time" style="margin-top:6px"><select style="margin-top:6px"><option>2 People</option><option>4 People</option><option>6+ People</option></select><input placeholder="Name"><input placeholder="Phone"><button class="add" style="background:var(--gold);color:#000;padding:12px;margin-top:8px" onclick="alert('Table Booked! ☕')">Book Table</button></div></div>

<!-- CONTACT DIRECT -->
<div id="contact" class="page">
  <h2>📞 Contact Me Direct</h2>
  <div style="background:#fff;padding:16px;border-radius:14px;border:1px solid #eee;text-align:center">
    <h3 style="color:var(--gold)">Yash Waskar - Manager</h3>
    <p style="font-size:12px;margin:8px 0">📍 Drincup Cafe, Kopargaon<br>UPI: yashwaskar98-1@okhdfcbank</p>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:12px">
      <a href="tel:9322663642" style="background:#000;color:var(--gold);padding:14px;border-radius:12px;font-weight:700;display:block">📞 CALL NOW<br><small>9322663642</small></a>
      <a href="https://wa.me/919322663642?text=Hi%20Yash%20Order%20Karaycha%20Aahe" style="background:#25D366;color:#fff;padding:14px;border-radius:12px;font-weight:700;display:block">💬 WHATSAPP<br><small>Direct</small></a>
    </div>
    <iframe style="width:100%;height:180px;border:0;border-radius:10px;margin-top:12px" src="https://maps.google.com/maps?q=Kopargaon&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
  </div>
</div>

<div id="myorders" class="page"><h2>🧾 My Orders</h2><div id="myOrdersList"></div></div>
<div id="payment" class="page"><h2>💳 Payment</h2><div class="qr-box"><img src="qr.jpg" onerror="this.src='https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=upi://pay?pa=yashwaskar98-1@okhdfcbank'"><p style="font-size:11px;margin-top:8px"><b>UPI:</b> yashwaskar98-1@okhdfcbank</p><div style="background:#fffbe6;padding:8px;border-radius:8px;margin-top:8px">Total: <b id="payTotal">₹0</b></div><a id="upiLink" href="upi://pay?pa=yashwaskar98-1@okhdfcbank&pn=Yash" style="display:block;background:#000;color:var(--gold);padding:12px;border-radius:20px;margin-top:10px;font-weight:700;text-align:center">Pay via UPI App</a></div></div>
<div id="location" class="page"><h2>📍 Location</h2><iframe style="width:100%;height:300px;border:0;border-radius:12px" src="https://maps.google.com/maps?q=Kopargaon&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe></div>
<div id="faq" class="page"><h2>❓ FAQ</h2><div style="background:#fff;padding:10px;border-radius:10px;border:1px solid #eee;margin:6px 0"><b>Delivery?</b><br><small>Yes Kopargaon - Call 9322663642</small></div><div style="background:#fff;padding:10px;border-radius:10px;border:1px solid #eee;margin:6px 0"><b>Timing?</b><br><small>8AM-11PM Daily</small></div></div>

<!-- ABOUT US LAST - THANK YOU -->
<div id="about" class="page">
  <div style="background:linear-gradient(135deg,#000,#2a1a0a);color:#fff;padding:30px 20px;border-radius:20px;text-align:center;border:2px solid var(--gold)">
    <div style="font-size:50px">🙏</div>
    <h1 style="font-family:'Caveat';font-size:36px;color:var(--gold)">Thank You! ❤️</h1>
    <p style="font-size:14px;margin-top:12px;line-height:1.7">
      Thank you for visiting DRINCUP CAFE website.<br>
      Our City, Our Cafe - Fresh Food, Great Taste & Friendly Service.
    </p>
    <div style="margin-top:20px;background:#fff1;padding:12px;border-radius:12px">
      <b>Yash Waskar</b><br><small>📞 9322663642 • Manager, Drincup Cafe ☕</small>
    </div>
    <button class="btn-gold" style="margin-top:16px" onclick="showPage('home')">🏠 Back to Home</button>
  </div>
</div>

<div class="cart" id="cartBox"><div style="display:flex;justify-content:space-between;padding:12px;border-bottom:1px solid #eee;font-weight:700;font-size:12px"><span>🛒 Cart <b id="c2" style="background:var(--gold);padding:2px 6px;border-radius:10px;color:#000;font-size:10px">0</b></span><span onclick="toggleCart()" style="cursor:pointer">✕</span></div><div id="cartItems"></div><div style="padding:12px;border-top:1px solid #eee"><div style="display:flex;justify-content:space-between;font-weight:700;font-size:13px;margin-bottom:8px"><span>Total</span><span id="total">₹0</span></div><button class="add" style="background:var(--gold);color:#000;padding:10px" onclick="showPage('payment')">Pay Now 💳</button><button class="add" style="background:#25D366;color:#fff;padding:10px;margin-top:6px" onclick="orderWA()">WhatsApp Order</button></div></div>

<script>
window.addEventListener('scroll',()=>{document.getElementById('header').classList.toggle('scrolled', window.scrollY>40)});
const fullData=[
{ id:'sandwich', title:'🍞 GRILLED SANDWICH', items:[{n:'Bombay Grilled',p:120},{n:'Mix Veg',p:130},{n:'Tandoori Paneer',p:150},{n:'Crispy Chipotle',p:160},{n:'Roasted Paneer Club',p:180},{n:'Spicy Cheese Corn',p:140},{n:'Hazelnut Chocolate',p:170},{n:'Veg Cheese Grilled',p:130},{n:'Soya Kheema',p:160}]},
{ id:'wraps', title:'🌯 WRAPS', items:[{n:'Paneer Cheese Melt',p:140},{n:'Paneer Tikka',p:150},{n:'Mix Veggies',p:120},{n:'Paneer Makhani',p:160},{n:'Soya Kheema Wrap',p:150}]},
{ id:'bites', title:'🍟 QUICK BITES', items:[{n:'Classic Fries',p:80},{n:'Peri-Peri Fries',p:100},{n:'Cheesy Masala Fries',p:130},{n:'Cheese Ball',p:110},{n:'White Pasta',p:150},{n:'Red Pasta',p:140},{n:'Loaded Nachos',p:160}]},
{ id:'burgers', title:'🍔 BURGERS', items:[{n:'DC Veg Burger',p:90},{n:'Tandoori Paneer Burger',p:130},{n:'Spicy BBQ',p:140},{n:'Mexican Veg',p:130},{n:'Chipotle Paneer',p:150},{n:'Schezwan',p:120}]},
{ id:'pizza', title:'🍕 PIZZA TOAST', items:[{n:'Margherita',p:120},{n:'Roasted Paneer',p:150},{n:'All Veggies',p:130},{n:'BBQ Paneer',p:160},{n:'Corn Cheese',p:130}]},
{ id:'shakes', title:'🥤 MILKSHAKES', items:[{n:'Oreo',p:120},{n:'Vanilla',p:100},{n:'Nutella',p:150},{n:'Brownie',p:140},{n:'Choco Strawberry',p:130},{n:'Chocolate',p:110},{n:'Blueberry',p:130},{n:'Strawberry',p:120}]},
{ id:'coffee', title:'☕ COFFEE', items:[{n:'Espresso',p:80},{n:'Cappuccino',p:110},{n:'Latte',p:120},{n:'Hazelnut',p:130},{n:'Caramel',p:130},{n:'Irish',p:140},{n:'Chocolate Latte',p:130}]},
{ id:'mojito', title:'🍹 MOJITO', items:[{n:'Blue Curacao',p:100},{n:'Peach',p:100},{n:'Green Mint',p:90},{n:'Blueberry',p:110},{n:'Watermelon',p:100},{n:'Litchi',p:110}]},
{ id:'combos', title:'🎉 COMBOS', items:[{n:'Burger+Fries',p:160},{n:'Wrap+Mojito',p:200},{n:'Frappe+Fries',p:190},{n:'Sandwich+Shake',p:200},{n:'Party Combo',p:499}]}
];
const imgMap={sandwich:'https://images.unsplash.com/photo-1521390188846-e2a3a97453a0?w=300',wraps:'https://images.unsplash.com/photo-1626700051175-6818013e1d4f?w=300',bites:'https://images.unsplash.com/photo-1573080496219-bb080dd4f877?w=300',burgers:'https://images.unsplash.com/photo-1568909344668-6f14a07b56a0?w=300',pizza:'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=300',shakes:'https://images.unsplash.com/photo-1579954115545-a95591f28bfc?w=300',coffee:'https://images.unsplash.com/photo-1509042239860-f550ce710b93?w=300',mojito:'https://images.unsplash.com/photo-1523677011781-c91d1bbe2f9e?w=300',combos:'https://images.unsplash.com/photo-1568909344668-6f14a07b56a0?w=300'};
function render(filter='all'){
  let html='', catBtns='<button class="'+(filter==='all'?'active':'')+'" onclick="filterMenu(\'all\')">All</button>';
  fullData.forEach(sec=>{
    catBtns+=`<button class="${filter===sec.id?'active':''}" onclick="filterMenu('${sec.id}')">${sec.title}</button>`;
    if(filter!=='all' && filter!==sec.id) return;
    html+=`<div style="margin-top:12px"><div style="background:#000;color:var(--gold);display:inline-block;padding:4px 10px;border-radius:20px;font-size:11px;margin:8px 0">${sec.title}</div><div class="grid">`+sec.items.map(it=>`<div class="card"><img src="${imgMap[sec.id]}"><div class="card-body"><h4>${it.n}</h4><p>₹${it.p}</p><button class="add" onclick="addDirect('${it.n}',${it.p},'${sec.id}')">Add</button></div></div>`).join('')+`</div></div>`;
  });
  document.getElementById('catFilter').innerHTML=catBtns;
  document.getElementById('menuAll').innerHTML=html;
  document.getElementById('featGrid').innerHTML=fullData[3].items.slice(0,4).map(it=>`<div class="card"><img src="${imgMap['burgers']}"><div class="card-body"><h4>${it.n}</h4><p>₹${it.p}</p><button class="add" onclick="addDirect('${it.n}',${it.p},'burgers')">Add</button></div></div>`).join('');
}
function filterMenu(cat){render(cat);document.getElementById('menuAll').scrollIntoView({behavior:'smooth'});}
let cart=JSON.parse(localStorage.getItem('drincupCart')||'[]'), orders=JSON.parse(localStorage.getItem('drincupOrders')||'[]');
function addDirect(n,p,cat){let f=cart.find(c=>c.n===n);if(f)f.qty++;else cart.push({n,p,qty:1,img:imgMap[cat]||imgMap['combos']});save();upd();cartBox.classList.add('open');}
function upd(){let c=cart.reduce((a,b)=>a+b.qty,0),t=cart.reduce((a,b)=>a+b.p*b.qty,0);c1.innerText=c;c2.innerText=c;total.innerText='₹'+t;orderTotal.innerText='₹'+t;payTotal.innerText='₹'+t;document.getElementById('upiLink').href=`upi://pay?pa=yashwaskar98-1@okhdfcbank&pn=Yash&am=${t}&cu=INR`;cartItems.innerHTML=cart.map((x,i)=>`<div style="display:flex;gap:8px;padding:8px;border-bottom:1px solid #eee"><img src="${x.img}" style="width:34px;height:34px;border-radius:6px;object-fit:cover"><div style="flex:1"><div style="font-size:11px;font-weight:600">${x.n}<br><span style="color:#b45309">₹${x.p}</span></div><div style="display:flex;gap:5px;margin-top:3px"><button onclick="chg(${i},-1)" style="width:18px;height:18px;background:#eee;border:0;border-radius:4px">-</button><span style="font-size:11px">${x.qty}</span><button onclick="chg(${i},1)" style="width:18px;height:18px;background:#eee;border:0;border-radius:4px">+</button></div></div><span onclick="rem(${i})" style="cursor:pointer">🗑️</span></div>`).join('')||'<p style="text-align:center;padding:14px;font-size:11px;opacity:.5">Cart empty</p>';}
function chg(i,d){cart[i].qty+=d;if(cart[i].qty<=0)cart.splice(i,1);save();upd()}
function rem(i){cart.splice(i,1);save();upd()}
function save(){localStorage.setItem('drincupCart',JSON.stringify(cart))}
function toggleCart(){cartBox.classList.toggle('open')}
function showPage(id){document.querySelectorAll('.page').forEach(p=>p.classList.remove('active'));document.getElementById(id).classList.add('active');window.scrollTo(0,0);if(id==='myorders')renderOrders();}
function placeOrder(){if(cart.length==0){alert('Cart empty');return;}orders.push({id:Date.now(),items:[...cart],total:document.getElementById('total').innerText,date:new Date().toLocaleString()});localStorage.setItem('drincupOrders',JSON.stringify(orders));document.getElementById('s1').classList.add('active');setTimeout(()=>document.getElementById('s2').classList.add('active'),1000);setTimeout(()=>document.getElementById('s3').classList.add('active'),2000);setTimeout(()=>{document.getElementById('s4').classList.add('active');alert('Order Ready! 🛵');showPage('payment');},3000);cart=[];save();upd();}
function renderOrders(){let el=document.getElementById('myOrdersList');if(orders.length==0){el.innerHTML='<p style="opacity:.5">No orders yet</p>';return;}el.innerHTML=orders.slice().reverse().map(o=>`<div style="background:#fff;padding:10px;border-radius:10px;border:1px solid #eee;margin:6px 0"><b>Order #${o.id.toString().slice(-5)} - ${o.total}</b><br><small>${o.date}</small><br><small>${o.items.map(i=>i.n+' x'+i.qty).join(', ')}</small></div>`).join('');}
function orderWA(){if(cart.length==0){alert('Cart empty');return;}let msg='Hi Drincup Cafe! Order:%0A';cart.forEach(c=>{msg+=`- ${c.n} x${c.qty}=₹${c.p*c.qty}%0A`});msg+=`Total ${total.innerText}%0APay: yashwaskar98-1@okhdfcbank`;window.open('https://wa.me/919322663642?text='+msg,'_blank');}
setTimeout(()=>{document.getElementById('splash').style.opacity='0';setTimeout(()=>{document.getElementById('splash').style.display='none';document.getElementById('loginWrap').classList.add('show');},600);},1400);
function doLogin(){document.getElementById('loginWrap').style.display='none';render();upd();}
let idx=0;setInterval(()=>{idx=(idx+1)%3;const s=document.getElementById('slides');if(s)s.style.transform=`translateX(-${idx*100}%)`;},3000);
render();upd();
</script>
</body>
</html>