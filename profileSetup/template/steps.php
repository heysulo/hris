<div id="step1" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 01</p>
        <p class="welcome_step_description">Create a new password</p>
    </div>
</div>
<div id="step2" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 02</p>
        <p class="welcome_step_description">Enter your contact details</p>
    </div>
</div>
<div id="step3" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 03</p>
        <p class="welcome_step_description">Join the clubs and associations</p>
    </div>
</div>
<div id="step4" class="welcome_step_div">
    <div class="welcome_step_content">
        <p class="welcome_step_number">Step 04</p>
        <p class="welcome_step_description">Go to your new dashboard</p>
    </div>
</div>

<script>
    switch (step){
        case 1:
            document.getElementById("step1").className += " welcome_step_active";
            break;
        case 2:
            document.getElementById("step2").className += " welcome_step_active";
            break;
        case 3:
            document.getElementById("step3").className += " welcome_step_active";
            break;
        case 4:
            document.getElementById("step4").className += " welcome_step_active";
            break;
    }
</script>