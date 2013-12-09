<table>
    <caption>Users List</caption>
    <tr>
        <th>№</th>
        <th>login</th>
        <th>email</th>
        <th>rôle</th>
        <th>modifier</th> 
        <th>annuler</th>
         
    </tr>
           
<?php
    foreach($users as $key => $user ) {
?>
    <tr>
        <td><?php $number = $key+1;
        echo $number?></td>
        <td><?php echo $user['login']; ?></td>
        <td><?php echo $user['email']; ?></td>
         <td><?php echo $user['role']; ?></td>
        <td><a href="?page=list&action=edit_user&id=<?php echo $user['id'];?>">modifier</a></td>
        <td><a href="?page=list&action=delete&id=<?php echo $user['id'];?>">annuler</a></td>
    </tr>
<?php }?>
</table>