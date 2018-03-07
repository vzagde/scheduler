<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once( 'includes/head.php'); ?>
</head>

<body>

    <section id="container">
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="javascript:void(0);" class="logo"></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">

                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=base_url()?>auth/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <?php include_once( 'includes/sidebar.php'); ?>
        </aside>
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h1 class="page-header">dashboard</h1>
                <hr>
                <div class="row mt">
                    <div class="col-md-6">
                    
                    </div>
                </div>
            </section>
            <!-- /wrapper -->
        </section>
        <!-- /MAIN CONTENT -->

        <!--main content end-->
    </section>

    <?php include_once( 'includes/site_bottom_scripts.php'); ?>
    
    <script>
        function j2s(json) {
            return JSON.stringify(json);
        }
        $( document ).ready(function() {
            msg_example
            $('#msg_example').change(function(){
                $('#msg').val(this.value);
            });
            $('#enable_button').click(function(){
                if ($('#enable_button').text() == 'Enable') {
                    $('#send_button').removeAttr("disabled");
                    $('#enable_button').text('Disabled');
                } else {
                    $('#send_button').attr('disabled', true);
                    $('#enable_button').text('Enable');  
                }
                 
            });
            $('#send_button').click(function(){
                var msg = $('#msg').val();
                if (msg == '') {
                    alert('Textarea for SMS can not be empty');
                    return false;
                } else {
                    console.log(msg);
                    $.ajax({
                        url:'http://fab-inn.com/sms_system/admin/send_msg',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            "msg" : msg,
                        },
                    })
                    .done(function(res) {
                        // console.log('done: ' + j2s(res));
                        // console.log(res.msg);
                        if (res.status == 'success') {
                            alert(res.msg);
                            $('#send_button').attr('disabled', true);
                            $('#msg').val('');
                        } else {
                            alert(res.msg);
                        }
                    })
                    .fail(function(err) {
                        alert('Some error occurred on connecting.');
                    })
                    .always(function() {
                    });
                }
            });
        });
    </script>

</body>

</html>