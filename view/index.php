<?php if (isset($_SESSION['role_id']) ) {
if($_SESSION['role_id'] == 4)
{
  header('location:index.php?controller=admin');
}

else
{
  header('location:index.php?controller=sinhvien');

}

} ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login page - Thang Long University</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/vendor/bootstrap/css/bootstrap.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/fonts/iconic/css/material-design-iconic-font.min.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./view/vendor/animate/animate.css" />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/vendor/css-hamburgers/hamburgers.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/vendor/animsition/css/animsition.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/vendor/select2/select2.min.css"
    />
    <!--===============================================================================================-->
    <link
      rel="stylesheet"
      type="text/css"
      href="./view/vendor/daterangepicker/daterangepicker.css"
    />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./view/css/util.css" />
    <link rel="stylesheet" type="text/css" href="./view/css/main.css" />
    <!--===============================================================================================-->
    <link href="css-1?family=Roboto" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    
  </head>
  <body>
    <div class="limiter">
      <div
        class="container-login100"
        style="background-image: url('images/bg-01.jpg')"
      >
        <div class="wrap-login100">
          <form
            method="post"
            
            id="ctl00"
            class=""
          >
          
            <span class="login100-form-logo">
              <img
                id="profile-img"
                class="profile-img-card"
                src="./view/images/logotlu.jpg"
              />
            </span>

            <span class="login100-form-title p-b-34 p-t-27">Đăng nhập </span>

            <div
              class="wrap-input100 validate-input"
              data-validate="Điền tên đăng nhập"
            >
              <input
                name="taikhoan"
                type="text"
                id="taikhoan"
                class="input100"
                placeholder="Tên đăng nhập"
              />
              <span class="focus-input100" data-placeholder="&#xf207;"></span>
            </div>

            <div
              class="wrap-input100 validate-input"
              data-validate="Điền mật khẩu"
            >
              <input
                name="password"
                type="password"
                id="password"
                class="input100"
                placeholder="Mật khẩu"
              />
              <span class="focus-input100" data-placeholder="&#xf191;"></span>
            </div>

            <div class="contact100-form-checkbox">
              <input
                name="ckb1"
                type="checkbox"
                id="ckb1"
                class="input-checkbox100"
                checked="checked"
              />
              
            </div>
            <div class="d-flex justify-content-center" id="alert"></div>
            <div class="container-login100-form-btn">
              <button   class="login100-form-btn">Đăng Nhập</button>
            </div>
            <br />
            <div>
              <a href="?controller=login&action=quenmk" class="text-white"
                >Quên mật khẩu nhấn vào dòng này</a
              >
            </div>
            <br />
           
            <div class="text-center p-t-90">
              <span id="lbResult"></span>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>
    <script type="text/javascript">
	$("#ctl00").submit(function(e){
			e.preventDefault();
		
		
			let taikhoan = $("input[name='taikhoan']").val();
			
			let password = $("input[name='password']").val();
			let check = taikhoan[0];
      let check1 = taikhoan[0]+taikhoan[1];
      let count = 0;
			if(taikhoan == null || taikhoan == "")
			{
				$("#alert").html('<strong class="text-danger">Mã đăng nhập không được để trống</strong>'); 
				$("input[name='taikhoan']").focus();
				return;
			}
		
			else if(password == null || password == "")
			{
				$("#alert").html('<strong class="text-danger">Mật khẩu không được để trống</strong>'); 
				$("input[name='password']").focus();
				return;
				
			}
			else if(password.length  < 6)
			{
				$("#alert").html('<strong class="text-danger">Mật khẩu tối thiểu là 6 kí tự</strong>'); 
				$("input[name='password']").focus();
				return;
			}
      else if(check1 == 'AD')
      {
          <?php 
            
            foreach ($ADMIN as $sl)
            {
                
                
                ?>if((taikhoan == "<?=$sl['maadmin']?>" && password == "<?=$sl['password']?>"))
                          {
                            
                            count++;
                          }<?php
            }
        ?>
        if(count ==0)
        {
                $("#alert").html('<strong class="text-danger">Mật khẩu hoặc tài khoản không hợp lệ</strong>'); 
                      $("input[name='password']").focus();
                return;
        }
        else
			{
				const url = "index.php?controller=login&action=login";
			    		$.ajax({		        
    				        url   ,
    				        method: "POST",
    				        data: {
                                taikhoan : taikhoan,
                                password : password
                                
                            },
                            
                            success: function (data) {
                            <?php
                               
                               if(!isset($_SESSION['msv']) || isset($_SESSION['mgv']) )
                              {
                                
                                echo 'window.location="index.php?controller=sinhvien";';
                              }
                              else
                              {?>
                                $("#alert").html('<strong class="text-danger">Tài khoản hoặc mật khẩu không chính xác</strong>'); 
                                $("input[name='password']").focus();
                                
                              <?php }
                            ?>

				        },
				   		});		   		  
				
			}}	
      else if(check == 'A')
      {
          <?php 
            
            foreach ($listStudent as $sl)
            {
                
                
                ?>if((taikhoan == "<?=$sl['masinhvien']?>" && password == "<?=$sl['password']?>"))
                          {
                            
                            count++;
                          }<?php
            }
        ?>
        if(count ==0)
        {
                $("#alert").html('<strong class="text-danger">Mật khẩu hoặc tài khoản không hợp lệ</strong>'); 
                      $("input[name='password']").focus();
                return;
        }
        else
			{
				const url = "index.php?controller=login&action=login";
			    		$.ajax({		        
    				        url   ,
    				        method: "POST",
    				        data: {
                                taikhoan : taikhoan,
                                password : password
                                
                            },
                            
                            success: function (data) {
                            <?php
                               
                               if(!isset($_SESSION['msv']) || isset($_SESSION['mgv']) )
                              {
                                
                                echo 'window.location="index.php?controller=sinhvien";';
                              }
                              else
                              {?>
                                $("#alert").html('<strong class="text-danger">Tài khoản hoặc mật khẩu không chính xác</strong>'); 
                                $("input[name='password']").focus();
                                
                              <?php }
                            ?>

				        },
				   		});		   		  
				
			}}
      else if(check == 'G' )
      {
          <?php 
            
            foreach ($listGiangVien as $sl)
            {
                
                
                ?>if((taikhoan == "<?=$sl['magiangvien']?>" && password == "<?=$sl['password']?>"))
                          {
                            
                            count++;
                          }<?php
            }
        ?>
        if(count ==0)
        {
                $("#alert").html('<strong class="text-danger">Mật khẩu hoặc tài khoản không hợp lệ</strong>'); 
                      $("input[name='password']").focus();
                return;
        }
        else
			{
				const url = "index.php?controller=login&action=login";
			    		$.ajax({		        
    				        url   ,
    				        method: "POST",
    				        data: {
                                taikhoan : taikhoan,
                                password : password
                                
                            },
                            
                            success: function (data) {
                            <?php
                               
                               if(!isset($_SESSION['msv']) || isset($_SESSION['mgv']) )
                              {
                                
                                echo 'window.location="index.php?controller=sinhvien";';
                              }
                              else
                              {?>
                                $("#alert").html('<strong class="text-danger">Mật khẩu hoặc tài khoản không hợp lệ</strong>'); 
                      $("input[name='password']").focus();
                return;
                                
                              <?php }
                            ?>

				        },
				   		});		   		  
				
			}
      }
      else
      {
        $("#alert").html('<strong class="text-danger">Mật khẩu hoặc tài khoản không hợp lệ</strong>'); 
                      $("input[name='password']").focus();
                return;
      }
			
						  
		});
	
</script>
  </body>
</html>
