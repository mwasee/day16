
        <?php
        $hostname="localhost";
        $username="root";
        $password="";
        $databasename="school";
        
        $conn=new mysqli ($hostname,$username,$password,$databasename);
        $q="select * from principal";
        $result=$conn->query($q);
        ?>
<table border="20">
    <tr>
    <th>Name</th>
    <th>Class</th>
    <th>City</th>
     <th>Photo</th>
    </tr>
    

<?php
        while ($row = mysqli_fetch_assoc($result)){
     ?>      
<tr>
    
    <td><?php echo $row ['name'];  ?></td>
    <td><?php echo $row ['class'];  ?></td>
    <td><?php echo $row ['city'];  ?></td>
    <td><img src="<?php echo $row ['image'];  ?>" height="100" width="100" alt="NA"/></td>
    
</tr>
    
    
    
<?php
}
        ?>
</table>