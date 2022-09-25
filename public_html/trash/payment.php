<html>
    <head>
        <style>
        #tabs {
              overflow: auto;
              width: 100%;
              list-style: none;
              margin: 0;
              padding: 0;
            }
             
            #tabs li {
                margin: 0;
                padding: 0;
                float: left;
            }
             
            #tabs a {
                box-shadow: -4px 0 0 rgba(0, 0, 0, .2);
                background: #000;
                background: linear-gradient(220deg, transparent 10px, #000 10px);
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                color: #fff;
                float: left;
                font: bold 12px/35px 'Lucida sans', Arial, Helvetica;
                height: 35px;
                padding: 0 30px;
                text-decoration: none;
            }
             
            #tabs a:hover {
                background: #c93434;
                background: linear-gradient(220deg, transparent 10px, #c93434 10px);
            }
             
            #tabs a:focus {
                outline: 0;
            }
             
            #tabs #current a {
                background: #fff;
                background: linear-gradient(220deg, transparent 10px, #fff 10px);
                text-shadow: none;
                color: #333;
            }
             
            #content {
                background-color: #fff;
                background-image:         linear-gradient(top, #fff, #ddd);
                border-radius: 0 2px 2px 2px;
                box-shadow: 0 2px 2px #000, 0 -1px 0 #fff inset;
                padding: 30px;
            }
             
            /* Remove the rule below if you want the content to be "organic" */
            #content div {
                height: 220px;
            }
            #ThanhToan input{
                background-color: #fff;
                border-radius: 0 2px 2px 2px;
                box-shadow: 0 2px 2px #000, 0 -1px 0 #262829 inset;
                padding: 4px 12px;
                margin 0px 0px 0px 2px;
            }
        </style>
    </head>
<body>
<ul id="tabs">
    <li><a href="#" title="card">Card</a></li>
    <li><a href="#" title="bank">Ngân hàng</a></li>
    <li><a href="#" title="momo">MOMO</a></li>
    <li><a href="#" title="vtc365">VTC 365</a></li>
</ul>
 
<div id="content">
    <div id="card">
        
    </div>
    <div id="bank">
      <form id="Thanhtoan" action="#" method="post">
          Số tiền: <input type="text" name="SoTien" placeholder="Tối thiểu 50.000 vnd"></br>
          Số tài khoản: <input type="text" name="SoTaiKhoan" placeholder="123ab12345"></br>
          Họ tên người nhận: <input type="text" name="HoTen" placeholder="Lee Min Hoo"></br>
          Ngân hàng: <input type="text" name="NganHang" placeholder="Vietcombank"></br>
          Tỉnh/Thành phố: <input type="text" name="ThanhPho" placeholder="Huế"></br>
          Chi nhánh: <input type="text" name="ChiNhanh" placeholder="Vietcombank Huế"></br>
          <button type="submit" value="Yêu cầu">Yêu cầu</buttuon>
         </form>
        <!-- Thanh toán card-->
    </div>
    <div id="momo">Three - content</div>
    <div id="vtc365">Four - content</div>
</div>

<script type="text/javascript" src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $("#content div").hide(); // Initially hide all content
    $("#tabs li:first").attr("id","current"); // Activate first tab
    $("#content div:first").fadeIn(); // Show first tab content
 
    $('#tabs a').click(function(e) {
        e.preventDefault();
        $("#content div").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('title')).fadeIn(); // Show content for current tab
    });
})();
</script>
</body>
</html>