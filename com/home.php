<?php

$homePageURL = WORDPRESS_URL;
$helper->findLinksToHomePage($homePageURL);
$helper->crawl_page(WORDPRESS_URL,2);

?>
<div id="page-wrapper">
    <div class="row">
        <div class="gap gap-mini"></div>
        <div class="col-lg-12">
            <ol class="breadcrumb">
              <li><a href="<?php echo INDEX_PAGE; ?>">Crawls</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="gap gap-mini"></div>
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div>
                          <table id="web_table" class="display2 table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Web pages linked home page</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Display crawl results from sitemap.html
                                $sitemap = file_get_contents('../crawl-results.html');
                                echo $sitemap;
                            ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="gap gap-mini"></div>
        <div class="col-lg-12">
            <div class="panel">
                <div class="panel-body">
                    <div>
                          <table class="display2 table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Previous Crawls</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $sql =  "SELECT * FROM tbl_crawl";
                                $result_list    =   $db->get_results($sql);
                                if(!empty($result_list)):   
                                    foreach($result_list as $result_list_val){
                                        $timestamp = $helper->readable_datetime($result_list_val->timestamp);
                                        ?>
                                        <tr class="odd gradeX">
                                            <td style="overflow-wrap: break-word;"><?= $result_list_val->crawl; ?></td>
                                            <td style="overflow-wrap: break-word;"><?= $timestamp; ?></td>

                                        </tr>
                                        <?php
                                    }
                                endif;
                                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<?php
require(PATH_TEMPLATES . 'require_js.php');
?>
<script>
$(document).ready(function () {
    $('table.display2').DataTable();

    $(document).ready(function(){
        setInterval(function(){ reload_page(); },60*60000);
    });

    function reload_page(){
        window.location.reload(true);
    }
});
</script>