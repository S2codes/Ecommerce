<?php
    require_once("../includes/auth.php");
    $DAO=new Database();
    $query="SELECT * FROM `categories` ORDER BY `name` ASC ";
    $data=$DAO->RetriveArray($query);
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
<style>
.dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5em;
    padding: 10px;
    width: 250px;
    border: 1px solid #b7b7b7;
}
.dataTables_wrapper .dataTable thead th {
    border-bottom-width: 0;
    border: 1px solid rgba(151, 151, 151, 0.18);
    padding: 10px;
    white-space: nowrap;
}
.dataTables_wrapper .dataTable tbody tr td {
    border: 1px solid rgba(151, 151, 151, 0.18);
    color: #08113b;
    white-space: nowrap;
    font-weight: 300;
    padding: 10px;
}
a:hover,a{
    text-decoration:none;
    color:#000000;
}
</style>
<table class='datatable'>
    <thead>
        <tr>
            <th>Name</th>
            <th>Top Menu</th>
            <th>Homepage Featured</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data as $row){
                $top_menu="Invisible";
                if((int)$row['top_menu']){
                    $top_menu="Visible";
                }

                $homepage="Invisible";
                if((int)$row['homepage_featured']){
                    $homepage="Visible";
                }

                $status="<label class='badge badge-danger'>Draft</label>";
                if((int)$row['status']){
                    $status="<label class='badge badge-success'>Published</label>";
                }

                echo "
                <tr>
                    <th><a href='category?edit=".$row['id']."'>".$row['name']."</a></th>
                    <td><a href='category?edit=".$row['id']."'>".$top_menu."</a></td>
                    <td><a href='category?edit=".$row['id']."'>".$homepage."</a></td>
                    <td><a href='category?edit=".$row['id']."'>".$status."</a></td>
                </tr>
                ";
            }
        ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Name</th>
            <th>Top Menu</th>
            <th>Homepage Featured</th>
            <th>Status</th>
        </tr>
    </tfoot>
</table>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function(){
    var table = $('.datatable').DataTable({'iDisplayLength': 100});
})   
</script>