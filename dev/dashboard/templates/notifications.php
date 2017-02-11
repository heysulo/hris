<div class="dbox notification_box">
    <div class="dboxheader">
        <div class="dboxtitle">
            Requests
        </div>
        <div class="notification_content">
            <div class="request-tabs">
                <ul class="tab-links">
                    <li class="active"><a href="#all_request">All Request</a></li>
                    <li><a href="#meeting">Meeting</a></li>
                    <li><a href="#information">Information</a></li>
                </ul>

                <div class="tab-content">
                    <div id="all_request" class="tab active">
                        <p>All Requests listed in here.</p>
                        <p>Fusce accumsan in est non sodales. Donec faucibus urna sed ex pulvinar, sed vulputate odio porttitor. Ut accumsan eu nunc in aliquet. Quisque at nisi et mauris pharetra rhoncus sit amet vitae leo. Nulla nec bibendum turpis, in mollis felis.</p>
                    </div>
                    <div id="meeting" class="tab">
                        <p>All meeting schedules shows here.</p>
                    </div>
                    <div id="information" class="tab">
                        <p>Some information shows here.</p>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('.request-tabs .tab-links a').on('click',function (e) {
            var currentAttributeValue = $(this).attr('href');

            $('.tabs '+currentAttributeValue).show().siblings().hide();

            $('this').parent('li').addClass('active').siblings().removeClass('active');

            e.preventDefault();
        })
    });

</script>