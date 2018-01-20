<form action="admin.php?page=wwwkalipso_control_sub_menu&action=update_data" method="post">
    <label>Restoraunt</label>  <label>"<?php echo $data['place_name'] ?>"</label><br>
    <label>Address</label> : <label><?php echo $data['formatted_address'] ?></label><br>
    <label>Rating</label>  <label><?php echo $data['rating'] ?></label><br>
    <label>My rating</label>
    <input type="text" name="my_rating" value="<?php echo $data['my_rating'] ?>">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <input type="submit" name="<?php _e('Edit', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>">
</form>