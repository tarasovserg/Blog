<form action="?page=realization&action=add" method="post">
    <table >
        <tbody>
            
            <tr>
                <td>Название товара:</td>
                <td>
                    <select name="id_good">
                        <?php foreach ($goods as $key => $value) :                         
                        ?>
                        <option <?php 
                        if($value['id_good']==$realization['id_good']){
                            echo "selected";
                        }
                        ?> value="<?php echo $value['id_good']?>"><?php echo $value['good_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Дата:</td>
                <td><input id="datePicker" type="text" name="date" ></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value ="Добавить"></td>
            </tr>
        <script type="text/javascript">
            
            
            
            $(function(){
                $('#datePicker').datepicker('setDate', '<?php echo $realization['date'] ?>' );
            });
            
        </script>
        </tbody>
        
    </table>
    
</form>
