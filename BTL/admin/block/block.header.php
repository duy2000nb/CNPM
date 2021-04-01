<?php session_start();?>
<nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
				<a  class="navbar-brand">
					<img height="40px" src="http://localhost/BTL/img/id.png">
				</a>
          </div>

          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-cog" aria-hidden="true"></i><?=$_SESSION['login']?> <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="http://localhost/BTL/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
				  <li><a href="http://localhost/BTL/"><i class="fa fa-sign-out" aria-hidden="true"></i> Về trang ngoài</a></li>
                </ul>
              </li>
            </ul>

          </div>
        </div>
      </nav>