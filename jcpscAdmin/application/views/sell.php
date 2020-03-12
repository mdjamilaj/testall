<form  action="<?php echo base_url(); ?>sell/sell_data_insert" method="post">
<ul class="form-style-1">
    <li><input type="text" name="name" class="field-divided" placeholder="Product Name" /> <input type="number" name="price" class="field-divided" placeholder="price" /></li>
	<li> <input type="number" name="id" class="field-divided" placeholder="ID" /><input type="submit" value="Submit" /></li>
</ul>
</form>





<div class="table-responsive">
    <table id="data" class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Pro-Name</th>
                <th>Pro-Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php

                $total = 0;
            foreach ($sell_product as $s_product) {
                
                // print_r($s_product);
                
                ?>
                <tr>
                    <td><?php echo ucwords($s_product->name); ?></td>
                    <td><?php echo $s_product->price ?></td>
                    <td>
                        	<?php echo anchor('sell/sell_data_delete?id='.$s_product->id, '<i class="fas fa-trash-alt text-danger"></i>', 'id="$s_product->id"'); ?>                   
                    </td>
                </tr>

            <?php

                // $total = $total + ($s_product->qty * $s_product->price);
                $total = $total +  $s_product->price;


             } ?>

             <tr>
                 <td colspan="1" align="right">Total</td>
                 <td colspan="2">$ <?php echo number_format($total, 2); ?></td>
             </tr>

        </tbody>
    </table>
</div>

