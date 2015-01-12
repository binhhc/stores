<?php
    echo $this->Html->css(array('bootstrap.min', 'item', 'item_management'));
?>
<?php echo $this->element('header') ?>



<div class="wrapper ng-scope">
    <div class="heading_box clearfix">
        <h2 class="heading fl_l">アイテム一覧</h2>
        <ul id="select_item">
            <li class="hide margin_right_10" ng-show="download_item_list" style="display: none;">
                <p class="btn_high"><a ng-href="/items_download" href="/items_download">CSVダウンロード</a></p>
            </li>
            <li sp-show="digital" style="display: none;"><p class="btn_high"><a ng-href="" href="">アイテムを追加</a></p>
                <ul class="hide">
                    <li><a href="" ng-click="selectTemplate()">物販アイテム</a></li>
                    <li><a href="" ng-click="selectTemplate('digital')">デジタルアイテム</a></li>
                </ul>
            </li>
            <li sp-hide="digital" class="">
                <p class="btn_high">
                    <a ng-href="" ng-click="selectTemplate()" href="">アイテムを追加</a>
                </p>
            </li>
        </ul>
    </div>
    <span ng-show="items.length" style="display: none;">
        <dl class="list_items">
            <dd class="title">
                <dl>
                    <dd class="sz_xs tc">並び順</dd>
                    <dd class="sz_i"></dd>
                    <dd class="sz_l">アイテム名</dd>
                    <dd class="sz_s tr">価格</dd>
                    <dd class="sz_xs tc">在庫</dd>
                    <dd class="sz_s tc publish">公開</dd>
                </dl>
            </dd>
        </dl>
        <dl id="list_public" class="list_items ng-pristine ng-valid ui-sortable" ui-sortable="items_sortable_options" ng-model="items_shown">
            <!-- ngRepeat: item in items_shown -->
        </dl>
        <dl id="list_private" class="list_items ng-pristine ng-valid" ng-model="items_hidden">
            <!-- ngRepeat: item in items_hidden -->
        </dl>
    </span>
    <span ng-hide="items.length">
        <div id="nodata" ng-hide="orders.length">
            <p>
                <?php echo $this->Html->image('items/icon_nodata.png', array('alt'=>'icon_nodata', 'width'=>'301', 'height'=>'297')) ?>
            </p>
            <h3>表示できるアイテム情報がありません</h3>
        </div>
    </span>
</div>




<?php echo $this->element('footer') ?>