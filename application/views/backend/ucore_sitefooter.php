    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo $themes_url; ?>js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo $themes_url; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Data picker -->
    <script src="<?php echo $themes_url; ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- Flot -->
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="<?php echo $themes_url; ?>js/plugins/peity/jquery.peity.min.js"></script>
    <script src="<?php echo $themes_url; ?>js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo $themes_url; ?>js/inspinia.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo $themes_url; ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo $themes_url; ?>js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo $themes_url; ?>js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	
    <!-- Sparkline -->
    <script src="<?php echo $themes_url; ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo $themes_url; ?>js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="<?php echo $themes_url; ?>js/plugins/chartJs/Chart.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo $themes_url; ?>js/plugins/iCheck/icheck.min.js"></script>		
	<script>
		$(document).ready(function () {
			$('.i-checks').iCheck({
				checkboxClass: 'icheckbox_square-green',
				radioClass: 'iradio_square-green',
			});
		});
	</script>		<script>		$(document).ready(function () {			$("#group_id").on('change', function() {				$("#btn_select_group").click();			});								$('input').iCheck({			  checkboxClass: 'icheckbox_square-green',			  radioClass: 'iradio_square-green',			  increaseArea: '20%' // optional			});		});	</script>
    <script>
        $(document).ready(function() {

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});


        });

        $(document).ready(function () {
            $('#combo_paket select').change(function () {
                var test = $(this).val();
            console.log(test);  //menampilan pada log browser apa yang dibawa pada saat dipilih pada combo box
            $.ajax({
                url: "<?=site_url()?>jamaah/getpaketid/",       //memanggil function controller dari url
                async: false,
                type: "POST",     //jenis method yang dibawa ke function
                data: "listpaket="+test,   //data yang akan dibawa di url
                dataType: "html",
                success: function(data) {
                $('#tglberangkat').html(data);   //hasil ditampilkan pada combobox id=bank_id

                }
            })

            });
        });

        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        
        $('#data_2 .input-group.date').datepicker({
                startView: 1,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: "dd/mm/yyyy"
            });

        $('#data_3 .input-group.date').datepicker({
                startView: 2,
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

        $('#data_4 .input-group.date').datepicker({
                minViewMode: 1,
                keyboardNavigation: false,
                forceParse: false,
                forceParse: false,
                autoclose: true,
                todayHighlight: true
            });

        $('#data_5 .input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });

        $('.table-responsive').on('show.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "inherit" );
        });

        $('.table-responsive').on('hide.bs.dropdown', function () {
        $('.table-responsive').css( "overflow", "auto" );
        })
    </script>
</body>
</html>
