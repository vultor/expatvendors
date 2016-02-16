<nav class="navbar navbar-fixed-bottom">
  <div class="container">
    <ul class="nav nav-justified">
      <li><a href="/vendors/{!! Auth::user()->id !!}/edit"><i class="fa fa-btn fa-2x fa-user"></i><br>Profile</a></li>
      <li><a href="/products"><i class="fa fa-btn fa-2x fa-book"></i><br>Products</a></li>
      <li><a href="/orders/vendor"><i class="fa fa-btn fa-2x fa-list"></i><br>Sales</a></li>
      <li><a href="/"><i class="fa fa-btn fa-2x fa-refresh"></i><br>Buy/Sell</a></li>
    </ul>
  </div>
</nav>