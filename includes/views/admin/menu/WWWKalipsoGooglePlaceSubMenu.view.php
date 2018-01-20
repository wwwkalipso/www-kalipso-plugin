<!-- Ссылка ссылаеться на страницу гостевой книги только у нее добавлен $_GET['action'] параметр &action=add_data
    По этому параметру мы будем в методе render определять что делать
 -->

<table  class="simple-little-table" cellspacing='0'>
    <thead>
    <tr>
        <td>
            <?php _e('Name', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Address', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Rating', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('My rating', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
        </td>
        <td>
            <?php _e('Actions', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
        </td>
    </tr>
    </thead>
    <tbody>
    <!-- Проверка данных на пустоту чтобы цыкл не вернул ошибку -->
    <?php if(count($data) > 0 && $data !== false){  ?>
        <?php foreach($data as $value): ?>
            <tr >

                <td>
                    <?php echo $value['place_name']; ?>
                </td>
                <td>
                    <?php echo $value['formatted_address']; ?>
                </td>
                <td>
                    <?php echo  $value['rating']; ?>
                </td>
                <td>
                    <?php echo  $value['my_rating']; ?>
                </td>

                <td>
                    <!-- Ссылки  ссылаються на страницу гостевой книги только у них добавлен $_GET['action'] параметр
                     для редактирования &action=edit_data для удаления &action=delete_data и в этих ссылок еще добавлен
                     один $_GET['id'] параметр это &id=(id записи) записи гостевой книги по котором мы будем выполнять
                     действия -->
                    <a href="admin.php?page=wwwkalipso_control_sub_menu&action=edit_data&id=<?php echo $value['id'];?>">
                        <?php _e('Edit', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
                    </a>
                    <a href="admin.php?page=wwwkalipso_control_sub_menu&action=delete_data&id=<?php echo $value['id'];?>">
                        <?php _e('Delete', WWWKALIPSO_PlUGIN_TEXTDOMAIN ); ?>
                    </a>


                </td>

            </tr>
        <?php endforeach ?>
    <?php }else{ ?>
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>