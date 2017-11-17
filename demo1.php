<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Index</title>
<link rel="stylesheet" href="lib/css/table.css">
<link rel="stylesheet" href="css/index.css">

<body>
    <div id="app">
        <div id="model">
        </div>
        <div id="tooltip">
            <div class="close_box">
                <p>请输入版本号：</p>
                <a href="javascript:;;" class="close">X
                </a>
            </div>
            <div class="input_box">
                <div>
                    <input type="text" name="" id="Version" style="width:150px;height:30px;padding: 2px">
                </div>
                <div style="margin-top: 10px;">
                    <input type="button" name="button" value="Submit" style="width:150px;height:30px;padding: 2px" v-on:click="submit()" />
                </div>
            </div>
        </div>
        <div id="tooltip2">
            <div class="close_box">
                <p>RESULT：</p>
                <a href="javascript:;;" class="close">X
                </a>
            </div>
            <div class="content_box">
                 <div v-for="(item, index) in countDatas" style="margin-top: 20px;">
                    <p>{{item.Type}}</p>
                    <v-table :columns="columns2" :table-data="item.tableData" :show-vertical-border="true" is-horizontal-resize style="width:98%;margin: 0 auto;"></v-table>
                </div>
                <form action="Export.php" method="post">
                 <!-- <input type="button" name="button" value="EXPORT" style="width:150px;height:30px;padding: 2px;margin-top:10px;" v-on:click="EXPORT()" /> -->
                 <input type="submit" name="button" value="EXPORT" style="width:150px;height:30px;padding: 2px;margin-top:10px;" />
                 </form>
            </div>
        </div>
        <div id="container">
            <font size="4"><b>请选择需要修改的版本号:</b></font>
            <select id="Version_choose">
                <?php 
                    include "Connect-info.php";
                    $conn = mysqli_connect($Server,$User,$Pwd);
                    $result = mysqli_query($conn,"Select Distinct `Status` from `ecom`.`ecom_budgeting` order by `Status` asc");
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<option>'.$row[Status].'</option>';
                    }
                ?>
            </select>
            <font size="4"><b>及Platform:</b></font>
            <select id="Choose">
                <?php 
                    include "Connect-info.php";
                    $conn = mysqli_connect($Server,$User,$Pwd);
                    $result = mysqli_query($conn,"Select Distinct `Platform` from `ecom`.`ecom_budgeting` order by `Platform` asc");
                    while($row = mysqli_fetch_array($result))
                    {
                        echo '<option>'.$row[Platform].'</option>';
                    }
                ?>
            </select>
            <input type="button" name="button" value="Select" style="width:80px;height:20px; " v-on:click="validation()" />
            <div id="table_box">
                <div v-for="(item, index) in Datas" style="margin-top: 20px;">
                    <p>{{item.Type}}</p>
                    <v-table :columns="columns" :table-data="item.tableData" :show-vertical-border="true" :cell-edit-done="cellEditDone" is-horizontal-resize style="width:100%;"></v-table>
                </div>

            </div>
            <input type="button" name="button" value="保存该版本默认值" style="width:200px;height:30px; " id="open" />
            <input type="button" name="button_jisuan" value="计算" style="width:200px;height:30px;" id="jisuan" v-on:click="count" />   
        </div>
    </div>
    <script src="lib/js/jquery.min.js"></script>
    <script src="lib/js/vue.js"></script>
    <script src="lib/js/vue-resource.min.js"></script>
    <script src="lib/js/table.js"></script>
    <script src="js/index.js"></script>
</body>

</html>