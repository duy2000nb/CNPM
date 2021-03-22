 <?php
 
 echo phpversion();
 
	 session_start();
	 //unset($_SESSION['orderCart']);
	 //print_r($_SESSION['orderCart']);die;
	$id_dm = isset($_REQUEST['id']) ? $_REQUEST['id'] : 0;
	
	$sql = "select * from danhmuc";
	$categories = select_list($sql);
	
	$sl = 0;
	$tong=0;
	$products= array();
	// get product
	if(isset($_SESSION['orderCart'])){
		$id = implode(',',array_keys($_SESSION['orderCart']));
		//unset($_SESSION['orderCart']);
		$products = array();
		if(count($_SESSION['orderCart'])>0){
		$sql = "select * from sanpham where id in ({$id})";
		$products = select_list($sql);
		}
		
		foreach($_SESSION['orderCart'] as $key){
			$sl  += $key['sl'];
			$tong += $sl*$key['price'];
		}
	}
 ?>
 
 <header >
        <div class="container" >
            <div class="row menu-main" >
                <div class="logo col-sm-2 col-xs-12 ">
					<a href="home.php">
						<img src="img/id.png">
					</a>
                </div>     
                <div class="menu col-sm-7 hidden-xs text-center" style="  text-transform: uppercase;">
                    <div class="navbar" style="margin-top: 19px;">
                        <?php foreach($categories as $menu){
							if($menu['parent'] == 0){?>
								<div class="dropdown ">
									<button class="dropbtn <?php if($id_dm == $menu['id'])echo "active";?>">
										<b><a href="categories.php?id=<?=$menu['id']?>" style="  text-transform: uppercase;"><?=$menu['ten']?></a></b>
									</button>
									<div class="dropdown-content">
									<?php foreach($categories as $submenu){
										if($submenu['parent'] == $menu['id']){ ?>
											<a href="categories.php?id=<?=$submenu['id']?>"><b><?=$submenu['ten']?></b></a>
											
										<?php }
										}?>
									</div>
								</div> 
							<?php }
							}?>
						</div>
                </div>
                <div class="icon col-sm-3 col-xs-12">
				<?php if(isset($_REQUEST['key'])) $key = $_REQUEST['key']; else {$key ="";} ?>
                    <div class="row ">
                        <form method="POST" action='categories.php' class="form col-sm-8 col-xs-8">
                            <div class="row ">                               
                                <input name="key" value="<?php echo $key ?>" class="col-sm-9 col-xs-10"  placeholder="Sản phẩm..." style="border: none; padding-left:2px;padding-top:2px;">
                                <button class="search col-sm-3 col-xs-2 text-center" style="padding: 1px 0;border-left: 3px solid;">Tìm</button>
                            </div>
                        </form>
						<div class="col-sm-2 col-xs-1 text-right mini-cart" id="mini-cart">
							<a href="cart.php">
								<i class="glyphicon glyphicon-shopping-cart" style="font-size:24px"><p class="number_cart"><?= $sl ?></p></i>
								
								<div class="btn_hover1" >
									
										<div class="mini-cart-header"  style="padding: 5% 3% 0 3%; background-color: #9d9f9d;">
											<div class="row">
												<p class="col-md-6" style="text-align:left;"> <?= count($products)?> sản phẩm</p>
												
												<?php if($tong>0){?>
													<p  class="col-md-6" style="color:red;"> <?= number_format($tong,0,"",".")?>Đ</p>
												<?php }?>
												<input type="hidden" id="total_cart" value="<?= $tong?>">
											</div>
										</div>
										<?php if(count($products)>0){?>
										<div class="mini-cart-body">
											<ul style="text-align: left;list-style:none;padding:0 3%;">
											<?php foreach($products as $key ){?>
												<li class="row" style="margin-top: 5px;border-bottom: 1px dotted #dfe0e1;">
													<img class="col-md-3" src="<?= $key['image']?>" >
													<p class="col-md-7">
														<b><?= $key['ten_sp']?></b> - <?=$_SESSION['orderCart'][$key['id']]['color']?>/<?=$_SESSION['orderCart'][$key['id']]['size']?>
														</br><?=$_SESSION['orderCart'][$key['id']]['sl']?>x<span style="color:red;"><?= number_format($key['gia_ban'],0,"",".")?>Đ</span>
													</p>
													<a onclick="deletecart(<?= $key['id']?>)" class="col-md-2 btn" style="float:right;color:red"><b>X</b></a>
												</li>
											<?php }?>
												
											</ul>
										</div>
										<a href="cart.php" class="btn btn-success  col-md-12" style="margin: 0;padding: 5px;"> Xem giỏ hàng </a>
										<?php }?>
								</div>
							</a>
                        </div>
                        <a href="login.php" class="col-sm-2 col-xs-1 text-right"><i class="glyphicon glyphicon-user" style="font-size:24px"></i></a>
                       
					</div>
                </div> 
            </div>
        </div>
    </header>
