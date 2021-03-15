<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <!-- page start-->
        <section class="col-md-6 row">
            <header class="panel-heading">
                <?php
                if (!empty($expense->id))
                    echo lang('pharmacy') . ' ' . lang('edit_expense');
                else
                    echo lang('pharmacy') . ' ' . lang('add_expense');
                ?>
            </header>
            <div class="panel-body">
                <div class="adv-table editable-table ">
                    <div class="clearfix">
                        <?php echo validation_errors(); ?>
                        <form role="form" action="finance/pharmacy/addExpense" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('medicine'); ?> </label>
                                <select class="form-control m-bot15" name="category" value=''>
                                    <?php foreach ($medicines as $medicine) { ?>
                                        <option value="<?php echo $medicine->name; ?>" <?php
                                        if (!empty($expense->category)) {
                                            if ($medicine->name == $expense->category) {
                                                echo 'selected';
                                            }
                                        }
                                        ?> > <?php echo $medicine->name; ?> </option>
                                            <?php } ?> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('no_purchase_invoice'); ?> </label>
                                <input type="text" class="form-control" name="no_purchase" id="exampleInputEmail1" value='<?php
                                if (!empty($expense->no_purchase)) {
                                    echo $expense->no_purchase;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('quantity'); ?> </label>
                                <input type="text" class="form-control" name="  quantity" id="exampleInputEmail1" value='<?php
                                if (!empty($expense->quantity)) {
                                    echo $expense->quantity;
                                }
                                ?>' placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('amount'); ?> </label>
                                <input type="text" class="form-control" name="amount" id="exampleInputEmail1" value='<?php
                                if (!empty($expense->amount)) {
                                    echo $expense->amount;
                                }
                                ?>' placeholder="<?php echo $settings->currency; ?>">
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1"> <?php echo lang('po_company'); ?> </label>
                                <input type="text" class="form-control" name="note" id="exampleInputEmail1" value='<?php
                                if (!empty($expense->note)) {
                                    echo $expense->note;
                                }
                                ?>' placeholder="">
                            </div>
                            <input type="hidden" name="id" value='<?php
                            if (!empty($expense->id)) {
                                echo $expense->id;
                            }
                            ?>'>
                            <button type="submit" name="submit" class="btn btn-info"> <?php echo lang('submit'); ?> </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--footer start-->
