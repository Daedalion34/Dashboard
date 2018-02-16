<!-- BEGIN PAGE CONTENT-->
<div class="tab-pane" id="medias">

    <div class="portlet box red-thunderbird">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-camera"></i><?php echo $this->i18n->ucfirst('mediaWork')?>
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse">
                </a>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Resalys</th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                        <th><?php echo $this->i18n->ucfirst('####').' 360'?></th>
                        <th><?php echo $this->i18n->ucfirst('####')?></th>
                    </tr>
                    </thead>
                    <?php foreach ($this->allBadBad as $key => $value ){  ?>
                        <tbody>
                        <tr>
                            <td><?php echo $value['####'] ?> </td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                            <td><?php echo $value['####'] ?></td>
                        </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <?php
    $this->ajaxUrl      = $this->tableAjaxUrl->media;
    $this->tableColumns = $this->tableMedia;
    include($this->template('list/datatable.tpl'));
    ?>

</div>
