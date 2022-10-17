<?php
global $wpdb;

// Add record
if (isset($_POST['but_submit'])) {

    $currency = $_POST['txt_currency'];
    $unit = $_POST['txt_unit'];
    $mainTitle = $_POST['txt_main_title'];
    $subTitle = $_POST['txt_sub_title'];
    $tablename = $wpdb->prefix . "kpower_configs";

    if ($currency != '' && $unit != '') {
        $insert_sql_2 = "UPDATE " . $tablename . " SET `unitChargers`='" . $unit . "',`currencyType`='" . $currency . "', `mainTitle`='" . $mainTitle . "', `subTitle`='" . $subTitle . "' WHERE `id`=1";
        $wpdb->query($insert_sql_2);
        echo "Save sucessfully.";
    }
}
$tablename = $wpdb->prefix . "kpower_configs";
$entriesList = $wpdb->get_results("SELECT * FROM " . $tablename );
$entry=$entriesList[0];
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<h1>Add Configuration</h1>
<form method='post' action='' style=" width: 50%">
    <div class="form-group">
        <label>Currency Code</label>
        <select name="txt_currency" id="txt_currency" class="form-control">
            <option value="Rs" <?php if($entry->currencyType =='Rs'){ echo 'selected' ; } ?> >Rs</option>
            <option value="USD" <?php if($entry->currencyType =='USD'){ echo 'selected' ; } ?> >USD</option>
            <option value="GBP" <?php if($entry->currencyType =='GBP'){ echo 'selected' ; } ?> >GBP</option>
        </select>       
    </div>

    <div class="form-group">
        <label>Unit Price</label>
        <input type='text' name='txt_unit' id='txt_unit' class="form-control" value="<?php echo $entry->unitChargers; ?>">
    </div>

    <div class="form-group">
        <label>Main Title</label>
        <input type='text' name='txt_main_title' id='txt_main_title' class="form-control" value="<?php echo $entry->mainTitle; ?>">
    </div>

    <div class="form-group">
        <label>Sub Title</label>
        <input type='text' name='txt_sub_title' id='txt_sub_title' class="form-control" value="<?php echo $entry->subTitle; ?>">
    </div>


    <button type="submit" name='but_submit' class="btn btn-default" onclick="javascript:return validateForm();" >Submit</button>
</form>
