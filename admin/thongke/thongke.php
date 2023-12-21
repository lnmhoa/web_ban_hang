<?php
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['month'])){
        $_SESSION['month'] = $_POST['month'];
    }if(isset($_POST['month1'])){
      $_SESSION['month1'] = $_POST['month1'];
    }if(isset($_POST['month2'])){
      $_SESSION['month2'] = $_POST['month2'];
    }if(isset($_POST['month3'])){
      $_SESSION['month3'] = $_POST['month3'];
    }if(isset($_POST['year'])){
      $_SESSION['year'] = $_POST['year'];
    }if(isset($_POST['year1'])){
      $_SESSION['year1'] = $_POST['year1'];
    }if(isset($_POST['year2'])){
      $_SESSION['year2'] = $_POST['year2'];
    }if(isset($_POST['year3'])){
      $_SESSION['year3'] = $_POST['year3'];
    }if(isset($_POST['year4'])){
      $_SESSION['year4'] = $_POST['year4'];
    }if(isset($_POST['year5'])){
      $_SESSION['year5'] = $_POST['year5'];
    }if(isset($_POST['year6'])){
      $_SESSION['year6'] = $_POST['year6'];
    }if(isset($_POST['year7'])){
      $_SESSION['year7'] = $_POST['year7'];
    }
} 
if(!empty($check)){
$_SESSION['month'] = (isset($_SESSION['month'])) ? $_SESSION['month'] : $month[0][0];
$_SESSION['month1'] = (isset($_SESSION['month1'])) ? $_SESSION['month1'] : $month1[0][0];
$_SESSION['month2'] = (isset($_SESSION['month2'])) ? $_SESSION['month2'] : $month[0][0];
$_SESSION['month3'] = (isset($_SESSION['month3'])) ? $_SESSION['month3'] : $month[0][0];
$_SESSION['year'] = (isset($_SESSION['year'])) ? $_SESSION['year'] : $year[0][0];
$_SESSION['year4'] = (isset($_SESSION['year4'])) ? $_SESSION['year4'] : $year[0][0];
$_SESSION['year5'] = (isset($_SESSION['year5'])) ? $_SESSION['year5'] : $year[0][0];
$_SESSION['year6'] = (isset($_SESSION['year6'])) ? $_SESSION['year6'] : $year[0][0];
$_SESSION['year7'] = (isset($_SESSION['year7'])) ? $_SESSION['year7'] : $year[0][0];}
$_SESSION['year1'] = (isset($_SESSION['year1'])) ? $_SESSION['year1'] : $year1[0][0];
$_SESSION['year2'] = (isset($_SESSION['year2'])) ? $_SESSION['year2'] : $year1[0][0];
$_SESSION['year3'] = (isset($_SESSION['year3'])) ? $_SESSION['year3'] : $year1[0][0];

?>
<div class="admin-box-tk">
        <div class="admin-box-tk-item">
            <div><label>Tổng số danh mục:</label></div>
            <div class="admin-box-tk-item2"><?php echo $sodm[0][0]; ?></div>
        </div>
        <div class="admin-box-tk-item">
            <div><label>Tổng số sản phẩm còn lại:</label></div>
            <div class="admin-box-tk-item2"><?php echo $sosp[0][0]; ?></div>
        </div>
        <div class="admin-box-tk-item">
            <div><label>Lượt truy cập vào web:</label></div>
            <div class="admin-box-tk-item2"><?php echo $view[0][0]; ?></div>
        </div>
        <div class="admin-box-tk-item">
            <div><label>Tổng số đánh giá:</label></div>
            <div class="admin-box-tk-item2"><?php echo $danhgia[0][0]; ?></div>
        </div>
    </div>
    <h1 class="mgt2 mgl1">1. Thống kê danh thu</h1>

    <div style="display: grid; grid-template-columns: repeat(2,1fr);"  >
      <div class="mgl3">
        <div><label>a. Thống kê danh thu theo ngày trong tháng</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="month" id="month" style="font-size: 20px">
          <?php foreach ($allmonth as $month1) {
            extract($month1); 
          ?>
          <option value="<?=$month1[0]?>" <?php if($_SESSION['month']==$month1[0]){ echo "selected";}?>>Tháng <?=$month1[0]?></option>
          <?php }?>
          </select>
          <select name="year" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year1) {
            extract($year1); 
          ?>
          <option value="<?=$year1[0]?>" <?php if($_SESSION['year']==$year1[0]){ echo "selected";}?>>Năm <?=$year1[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <div class="mgl3">
        <div><label>b. Thống kê danh thu theo tháng trong năm</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="year1" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year1) {
            extract($year1); 
          ?>
          <option value="<?=$year1[0]?>" <?php if($_SESSION['year1']==$year1[0]){ echo "selected";}?>>Năm <?=$year1[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart1"></canvas>
        </div>
      </div>
    </div>
    <!-- --------------------------------------thong ke tk--------------------------------------- -->
    <h1 class="mgt2 mgl1">2. Thống kê tài khoản</h1>
    <div style="display: grid; grid-template-columns: repeat(2,1fr);"  class="mgt1">
      <div class="mgl3">
        <div><label>a. Thống kê số tài khoản được tạo mới theo ngày trong tháng</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="month1" id="month" style="font-size: 20px">
          <?php foreach ($allmonth1 as $month1) {
            extract($month1); 
          ?>
          <option value="<?=$month1[0]?>" <?php if($_SESSION['month1']==$month1[0]){ echo "selected";}?>>Tháng <?=$month1[0]?></option>
          <?php }?>
          </select>
          <select name="year2" id="year" style="font-size: 20px">
          <?php foreach ($allyear1 as $year1) {
            extract($year1); 
          ?>
          <option value="<?=$year1[0]?>" <?php if($_SESSION['year1']==$year1[0]){ echo "selected";}?>>Năm <?=$year1[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart2"></canvas>
        </div>
      </div>
      <div class="mgl3">
        <div><label>b. Thống kê số tài khoản được tạo mới theo tháng trong năm</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="year3" id="year" style="font-size: 20px">
          <?php foreach ($allyear1 as $year1) {
            extract($year1); 
          ?>
          <option value="<?=$year1[0]?>" <?php if($_SESSION['year1']==$year1[0]){ echo "selected";}?>>Năm <?=$year1[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart3"></canvas>
        </div>
      </div>
    </div>
    <div class="mgl1 mgt2"><label>c. Số tài khoản còn hoạt động / bị khóa</label></div>
    <div class="chartBox mgt1" style="width: 400px;margin-left: 1%;">
          <canvas id="myChart4"></canvas>
    </div>
    <!-- ---------------------------tk don hang-------------------------------------- -->
    <h1 class="mgt2 mgl1">3. Thống kê đơn hàng</h1>
    <div style="display: grid; grid-template-columns: repeat(2,1fr);"  class="mgt1">
      <div class="mgl3">
        <div><label>a. Thống kê số đơn hàng thành công theo ngày trong tháng</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="month2" id="month" style="font-size: 20px">
          <?php foreach ($allmonth as $month) {
            extract($month); 
          ?>
          <option value="<?=$month[0]?>" <?php if($_SESSION['month2']==$month[0]){ echo "selected";}?>>Tháng <?=$month[0]?></option>
          <?php }?>
          </select>
          <select name="year4" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year) {
            extract($year); 
          ?>
          <option value="<?=$year[0]?>" <?php if($_SESSION['year4']==$year[0]){ echo "selected";}?>>Năm <?=$year[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart5"></canvas>
        </div>
      </div>
      <div class="mgl3">
        <div><label>b. Thống kê số đơn hàng theo tháng trong năm</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="year5" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year) {
            extract($year); 
          ?>
          <option value="<?=$year[0]?>" <?php if($_SESSION['year5']==$year[0]){ echo "selected";}?>>Năm <?=$year[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart6"></canvas>
        </div>
      </div>
    </div>
    <div style="display: grid; grid-template-columns: repeat(2,1fr);"  class="mgt1">
      <div class="mgl3">
        <div><label>c. Thống kê số đơn hàng không thành công theo ngày trong tháng</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="month3" id="month" style="font-size: 20px">
          <?php foreach ($allmonth as $month) {
            extract($month); 
          ?>
          <option value="<?=$month[0]?>" <?php if($_SESSION['month3']==$month[0]){ echo "selected";}?>>Tháng <?=$month[0]?></option>
          <?php }?>
          </select>
          <select name="year6" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year) {
            extract($year); 
          ?>
          <option value="<?=$year[0]?>" <?php if($_SESSION['year6']==$year[0]){ echo "selected";}?>>Năm <?=$year[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart7"></canvas>
        </div>
      </div>
      <div class="mgl3">
        <div><label>d. Thống kê số đơn hàng không thành công theo tháng trong năm</label></div>
        <form action="index.php?act=thongke" method="post" class="mgt1 mgb1">
          <select name="year7" id="year" style="font-size: 20px">
          <?php foreach ($allyear as $year) {
            extract($year); 
          ?>
          <option value="<?=$year[0]?>" <?php if($_SESSION['year7']==$year[0]){ echo "selected";}?>>Năm <?=$year[0]?></option>
          <?php }?>
          </select>
          <button name="ok" type="submit" style="font-size: 20px; padding: 0 5px;">OK</button>
        </form>
        <div class="chartBox">
          <canvas id="myChart8"></canvas>
        </div>
      </div>
      <!-- ------------------------------tk sp theo dm----------------------------------------- -->
    <div>
    <div class="mgl1 mgt2"><h1>4. Số lượng sản phẩm còn lại ở mỗi danh mục</h1></div>
    <div class="chartBox mgt1">
          <canvas id="myChart9"></canvas>
    </div></div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
<script>
      const data = {
      labels: [<?php
      $tong = count($list);
      $i = 1;
      foreach ($list as $l) {
        extract($l);
        if ($i == $tong) {
          echo "'".$l[0]."'";
        } else {
          echo "'".$l[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số tiền',
        data: [<?php
      $tong = count($list);
      $i = 1;
      foreach ($list as $l) {
        extract($l);
        if ($i == $tong){
          echo "'".$l[1]."'";
        } else {
          echo "'".$l[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config = {
        type: 'bar',
        data,
        options: {
            scales: {
              x: {
                stacked: true,
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
            y: {
              stacked: true,
                title: {
                    display: true,
                    text: 'VNĐ'
                },
                beginAtZero: true
            }
            }
        }
    };
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
    const data1 = {
      labels: [<?php
      $tong = count($list1);
      $i = 1;
      foreach ($list1 as $l1) {
        extract($l1);
        if ($i == $tong) {
          echo "'".$l1[0]."'";
        } else {
          echo "'".$l1[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số tiền(VNĐ)',
        data: [<?php
      $tong = count($list1);
      $i = 1;
      foreach ($list1 as $l1) {
        extract($l1);
        if ($i == $tong) {
          echo "'".$l1[1]."'";
        } else {
          echo "'".$l1[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config1 = {
        type: 'bar',
        data : data1,
        options: {
            scales: {
              x: {
                title: {
                    display: true,
                    text: 'Tháng'
                }
            },
                y: {
                    beginAtZero: true,
                    title: {
                    display: true,
                    text: 'VNĐ'
                }
                }
            }
        }
    };
    const myChart1 = new Chart(
        document.getElementById('myChart1'),
        config1
    );
    const data2 = {
      labels: [<?php
      $tong = count($list2);
      $i = 1;
      foreach ($list2 as $l2) {
        extract($l2);
        if ($i == $tong) {
          echo "'".$l2[0]."'";
        } else {
          echo "'".$l2[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số tài khoản mới',
        data: [<?php
      $tong = count($list2);
      $i = 1;
      foreach ($list2 as $l2) {
        extract($l2);
        if ($i == $tong) {
          echo "'".$l2[1]."'";
        } else {
          echo "'".$l2[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config2 = {
        type: 'bar',
        data : data2,
        options: {
            scales: {
              x: {
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
                y: {
                    beginAtZero: true,
                    title: {
                    display: true,
                    text: 'Tài khoản'
                }
                }
            }
        }
    };
    const myChart2 = new Chart(
        document.getElementById('myChart2'),
        config2
    );
    const data3 = {
      labels: [<?php
      $tong = count($list3);
      $i = 1;
      foreach ($list3 as $l3) {
        extract($l3);
        if ($i == $tong) {
          echo "'".$l3[0]."'";
        } else {
          echo "'".$l3[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số tài khoản mới',
        data: [<?php
      $tong = count($list3);
      $i = 1;
      foreach ($list3 as $l3) {
        extract($l3);
        if ($i == $tong) {
          echo "'".$l3[1]."'";
        } else {
          echo "'".$l3[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config3 = {
        type: 'bar',
        data : data3,
        options: {
            scales: {
              x: {
                title: {
                    display: true,
                    text: 'Tháng'
                }
            },
                y: {
                    beginAtZero: true,
                    title: {
                    display: true,
                    text: 'Tài khoản'
                }
                }
            }
        }
    };
    const myChart3 = new Chart(
        document.getElementById('myChart3'),
        config3
    );
    const data4 = {
      labels: ['Còn hoạt dộng', 'Bị khóa'],
      datasets: [{
        label: 'Số lượng',
        data: [<?php echo $tkhd[0][0] ?>,<?php echo $tkkhoa[0][0] ?>],
        backgroundColor: [    
          'rgb(0, 74, 175 )',
          'rgb(229, 35, 0)'
        ],
        borderColor: [      
          'rgba(0,0,0)'
        ],
        borderWidth: 1
      }]
    };
    const config4 = {
      type: 'pie',
      data :data4,
      options: {
      }
    };
    const myChart4 = new Chart(
      document.getElementById('myChart4'),
      config4
    );
    const data5 = {
      labels: [<?php
      $tong = count($list4);
      $i = 1;
      foreach ($list4 as $l4) {
        extract($l4);
        if ($i == $tong) {
          echo "'".$l4[0]."'";
        } else {
          echo "'".$l4[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số đơn hàng',
        data: [<?php
      $tong = count($list4);
      $i = 1;
      foreach ($list4 as $l4) {
        extract($l4);
        if ($i == $tong){
          echo "'".$l4[1]."'";
        } else {
          echo "'".$l4[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config5 = {
        type: 'bar',
        data :data5,
        options: {
            scales: {
              x: {         
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Số lượng'
                },
                beginAtZero: true
            }
            }
        }
    };
    const myChart5 = new Chart(
        document.getElementById('myChart5'),
        config5
    );
    const data6 = {
      labels: [<?php
      $tong = count($list5);
      $i = 1;
      foreach ($list5 as $l5) {
        extract($l5);
        if ($i == $tong) {
          echo "'".$l5[0]."'";
        } else {
          echo "'".$l5[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số đơn hàng',
        data: [<?php
      $tong = count($list5);
      $i = 1;
      foreach ($list5 as $l5) {
        extract($l5);
        if ($i == $tong){
          echo "'".$l5[1]."'";
        } else {
          echo "'".$l5[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config6 = {
        type: 'bar',
        data :data6,
        options: {
            scales: {
              x: {
                stacked: true,
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
            y: {
              stacked: true,
                title: {
                    display: true,
                    text: 'Số lượng'
                },
                beginAtZero: true
            }
            }
        }
    };
    const myChart6 = new Chart(
        document.getElementById('myChart6'),
        config6
    );
    const data7 = {
      labels: [<?php
      $tong = count($list6);
      $i = 1;
      foreach ($list6 as $l6) {
        extract($l6);
        if ($i == $tong) {
          echo "'".$l6[0]."'";
        } else {
          echo "'".$l6[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số đơn hàng',
        data: [<?php
      $tong = count($list6);
      $i = 1;
      foreach ($list6 as $l6) {
        extract($l6);
        if ($i == $tong){
          echo "'".$l6[1]."'";
        } else {
          echo "'".$l6[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config7 = {
        type: 'bar',
        data :data7,
        options: {
            scales: {
              x: {         
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Số lượng'
                },
                beginAtZero: true
            }
            }
        }
    };
    const myChart7 = new Chart(
        document.getElementById('myChart7'),
        config7
    );
    const data8 = {
      labels: [<?php
      $tong = count($list7);
      $i = 1;
      foreach ($list7 as $l7) {
        extract($l7);
        if ($i == $tong) {
          echo "'".$l7[0]."'";
        } else {
          echo "'".$l7[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số đơn hàng',
        data: [<?php
      $tong = count($list7);
      $i = 1;
      foreach ($list7 as $l7) {
        extract($l7);
        if ($i == $tong){
          echo "'".$l7[1]."'";
        } else {
          echo "'".$l7[1]."',";
        }
        $i += 1;
      }
    ?>],
        backgroundColor: ['rgb(0,0,0)'],
        borderColor: ['rgb(0,0,0)'],
        borderWidth: 1
      }]
    };
    const config8 = {
        type: 'bar',
        data :data8,
        options: {
            scales: {
              x: {
                stacked: true,
                title: {
                    display: true,
                    text: 'Ngày'
                }
            },
            y: {
              stacked: true,
                title: {
                    display: true,
                    text: 'Số lượng'
                },
                beginAtZero: true
            }
            }
        }
    };
    const myChart8 = new Chart(
        document.getElementById('myChart8'),
        config8
    );
    const data9 = {
      labels: [<?php
      $tong = count($iddm);
      $i = 1;
      foreach ($iddm as $dm) {
        extract($dm);
        if ($i == $tong){
          echo "'".$dm[0]."'";
        } else {
          echo "'".$dm[0]."',";
        }
        $i += 1;
      }
    ?>],
      datasets: [{
        label: 'Số lượng',
        data: [<?php
        $tong = count($iddm1);
        $i = 1;
        foreach ($iddm1 as $dm) {
          extract($dm);
          $sp = slsp($dm[1]);
          foreach ($sp as $sp) {
            extract($sp);
            if ($i == $tong){
              echo "'".$sp[0]."'";
            } else {
              echo "'".$sp[0]."',";
            }
            $i += 1;
          }

        }
        ?>],
        backgroundColor: [    
          'rgb(255, 99, 71)'
        ],
        borderColor: [      
          'rgba(0,0,0)'
        ],
        borderWidth: 1
      }]
    };
    const config9 = {
      type: 'pie',
      data :data9,
      options: {
      }
    };
    const myChart9 = new Chart(
      document.getElementById('myChart9'),
      config9
    );
</script>
