<form action="options.php" method="POST">
    <?php
    settings_fields( 'WWWKalipsoMainSettings' );     // скрытые защитные поля
    do_settings_sections( 'www-kalipso-plugin' ); // секции с настройками (опциями). У нас она всего одна 'section_id'
    submit_button();
    ?>
</form>
<div id="content">

    <form action='admin.php?page=wwwkalipso_control_sub_menu&action=update_option' method="post">

        <label for="fullname">Full Name</label>

        <input type="text" name="fullname" id="fullname" required>

        <label for="email">Email Address</label>

        <input type="email" name="email" id="email" required>

        <label for="message">Your Message</label>

        <textarea name="message" id="message"></textarea>



        <input type="submit" value="Send My Message">

    </form>

</div>