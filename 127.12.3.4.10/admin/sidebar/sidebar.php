<div id="sidebar" class="sidebar">
		    <!-- begin sidebar scrollbar -->
		    <div data-scrollbar="true" data-height="100%">

		        <!-- begin sidebar nav -->
		        <ul class="nav">
		            <li class="nav-header">เครื่องมือ</li>
		            <li class="has-sub">
		                <a href="index">
		                    <b class="caret"></b>
		                    <i class="fas fa-home"></i>
		                    <span>หน้าแรก</span>
		                </a>
		            </li>
		            <?php
                    if ($_SESSION['role'] == "admin") {
                    ?>
		                <li class="has-sub">
		                    <a href="manage">
		                        <b class="caret"></b>
		                        <i class="fas fa-edit"></i>
		                        <span>จัดการผู้ป่วย</span>
		                    </a>
		                </li>
		            <?php } ?>
		            <li class="has-sub">
		                <a href="#">
		                    <b class="caret"></b>
		                    <i class="fas fa-sticky-note"></i>
		                    <span>รายการRequest</span>
		                    <ul class="sub-menu">
		                        <li><a href="request">รายการRequestทั้งหมด <i class="fa fa-paper-plane text-theme-white m-l-5"></i></a></li>
		                        <li><a href="request_filter">Request-แยกตามวันที่ <i class="fa fa-paper-plane text-theme-white m-l-5"></i></a></li>
								<li><a href="request_patient">Request-แยกตามผู้ป่วย <i class="fa fa-paper-plane text-theme-white m-l-5"></i></a></li>
		                    </ul>
		                </a>
		            </li>
		            <li class="has-sub">
		                <a href="javascript:;">
		                    <b class="caret"></b>
		                    <i class="fas fa-copy"></i>
		                    <span>Export-Excel</span>
		                </a>
		                <ul class="sub-menu">
		                    <li><a href="export">Export-ทั้งหมด <i class="fas fa-file-excel text-theme-white m-l-5"></i></a></li>
							<li><a href="exportpatients">Export-แยกตามผู้ป่วย <i class="fas fa-file-excel text-theme-white m-l-5"></i></a></li>
		                </ul>
		            </li>
		            <?php
                    if ($_SESSION['role'] == "admin") {
                    ?>
		                <li class="has-sub">
		                    <a href="#">
		                        <b class="caret"></b>
		                        <i class="fas fa-wrench"></i>
		                        <span>เครื่องมือจัดการ</span>
		                        <ul class="sub-menu">
		                            <li><a href="questionmanage">จัดการคำถามอาการเหนื่อย </a></li>
		                            <li><a href="triedmanage">จัดการอาการเหนื่อย</a></li>
		                            <li><a href="swellmanage">จัดการอาการบวม </a></li>
		                            <li><a href="masdrugtype">จัดการชนิดยา </a></li>
		                            <li><a href="addArticle">เพิ่มรูปภาพและคำอธิบายประกอบหน้า Home </a></li>
		                            <li><a href="userreq">จัดการผู้ดูแลระบบ </a></li>
		                        </ul>
		                    </a>
		                </li>
		            <?php } ?>
		            <!-- begin sidebar minify button -->
		            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
		            <!-- end sidebar minify button -->
		        </ul>
		        <!-- end sidebar nav -->
		    </div>
		    <!-- end sidebar scrollbar -->
		</div>