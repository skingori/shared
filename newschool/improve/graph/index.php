
<?php
mysql_select_db('vision',mysql_connect('localhost','root',''))or die(mysql_error());
?>
  

            <div class="container">

                <div class="row-fluid">
                   
                    <div class="span12">

                        <div class="hero-unit-table">   


                            <div class="charts_container">
                                <div class="chart_container">
                                     <div class="alert alert-info"><br><br><center><u>GRAPH SHOWING PERFORMANCE IN TESTS AND EXAMS</u></center>
									
									 </div>  
                                    <canvas id="chartCanvas1" width="700" height="400">
                                        Your web-browser does not support the HTML 5 canvas element.
                                    </canvas>

                                </div>
                            </div>

                             </div>
                           FIRST=TEST, SECOND=EXAM
                            <script type="application/javascript">

                                var chart1 = new AwesomeChart('chartCanvas1');

									
                                chart1.data = [
                                <?php
                                $query = mysql_query("select TEST ,EXAM from studentmark where STUDENT_ID='$name' AND YEAR='$ya' AND TERM='$term'") or die(mysql_error());
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <?php echo $row['TEST'] . ','; ?>	
									<?php echo $row['EXAM'] . ','; ?>
                                <?php }; ?>
                                 ];
                               
                                chart1.labels = [
                                <?php
								
                                $query = mysql_query("select CODE from studentmark where STUDENT_ID='$name' AND YEAR='$ya' AND TERM='$term'") or die(mysql_error());
                                while ($row = mysql_fetch_array($query)) {
                                    ?>
                                    <?php echo "'" . $row['CODE'] . "'" . ','; ?>
								       <?php echo "'" . $row['CODE'] . "'" . ','; ?>

                                <?php }; ?>
                                ];
								
                                chart1.colors = ['#006CFF', '#FF6600', '#34A038', '#945D59', '#93BBF4', '#F493B8'];
                                chart1.randomColors = true;
                                chart1.animate = true;
                                chart1.animationFrames =80;
                                chart1.draw();
								

                               
                            </script>
							
                               
                        </div>

                    </div>
                </div>

