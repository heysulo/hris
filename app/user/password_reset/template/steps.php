<div id="step1" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 01</p>
        <p class="welcome_step_description">Enter your email address</p>
    </div>
</div>
<div id="step2" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 02</p>
        <p class="welcome_step_description">Account Confirmation</p>
    </div>
</div>
<div id="step3" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 03</p>
        <p class="welcome_step_description">Verification code check</p>
    </div>
</div>
<div id="step4" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 04</p>
        <p class="welcome_step_description">Enter new password</p>
    </div>
</div>

<script>
    switch (step){
        case 1:

            document.getElementById("step1").className += " welcome_step_active";
            break;
        case 2:
            document.getElementById("step1").className += " welcome_step_done";
            document.getElementById("step2").className += " welcome_step_active";
            break;
        case 3:
            document.getElementById("step1").className += " welcome_step_done";
            document.getElementById("step2").className += " welcome_step_done";
            document.getElementById("step3").className += " welcome_step_active";
            break;
        case 4:
            document.getElementById("step1").className += " welcome_step_done";
            document.getElementById("step2").className += " welcome_step_done";
            document.getElementById("step3").className += " welcome_step_done";
            document.getElementById("step4").className += " welcome_step_active";
            break;
    }
</script>