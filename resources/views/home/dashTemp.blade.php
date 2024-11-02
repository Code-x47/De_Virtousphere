<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin X User Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="asset/style2.css">
    <link rel="stylesheet" href="asset/regStyle2.css">
    <link rel="stylesheet" type="text/css" href="asset/table.css">
    <script src={{'asset/jquery.js'}}></script>
    {{--<script src="https://unpkg.com/vue@3.0.2"></script>--}}
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="title" style="margin-left:30px">De_Virtuosphere Project</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="main">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Departments</span>
                    </a>
                </li>

                <li>
                   
                    <a href="javascript::void(0)">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Opertaion Module</span>
                    </a>
                </li>

                <li>
                   
                    <a href="javascript::void(0)">

                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Partners</span>
                    </a>
                </li>

                <li>
                    <a href="javascript::void(0)">
                         <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Objectives</span>
                    </a>
                </li>

                <li>
                    <a href="javascript::void(0)">
                        <span class="icon">
                            <ion-icon name=""></ion-icon>
                        </span>
                        <span class="title">Events</span>
                    </a>
                </li>

                <li>
                    <a href="/logout">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->
    <section id="app">
        
          <div class="cardBox">
            
             <div class="card" v-on:click="" onclick="createFunction()">
                <div>
                    <div class="cardName" v-on:click="" onclick="createFunction()">Create Project</div>
                </div>        
             </div>
        
                <div class="card" onclick="viewProject()" >
                    <div>
                        <div class="cardName"  onclick="viewProject()">View Projects</div>
                    </div>

                    
                </div>

             <div class="card" onclick="sec3Btn()">
                <div>
                    <div class="cardName" onclick="sec3Btn()">Create_Extras</div>
                </div>

                    
             </div>

             <div class="card" onclick="sec4Btn()">
                <div>
                  <div class="cardName" onclick="sec4Btn()">Extras</div>
                </div>

             </div>     
        </div>   
        

            <!-- ================ Order Details List ================= -->
            
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>De_Virtuosphere Project Management Tool</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                 
                
                <section id="sec1">
                    @yield("content1")
                 </section>
                
                


                <section id="sec2">
                    @yield("content2")
                 </section>
                
                

                <section id="sec3">
                    @yield("content3")
                 </section>
                
                


                

                <section id="sec4">
                    @yield("content4")
                 </section>
                
                

                 <!-- ================= New Customers ================ -->
                
              </div>
            </div>
    
        </div>
     <section>
    </div>
  
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>
    <script src="asset/newjs.js"></script>
    <script src="asset/app.js"></script>


    

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
 function createFunction(){
  document.getElementById("sec1").style.display = "block";
  document.getElementById("sec2").style.display = "none";
}

 function viewProject(){
  document.getElementById("sec1").style.display = "none";
  document.getElementById("sec2").style.display = "block";
}
</script>
</body>

</html>
