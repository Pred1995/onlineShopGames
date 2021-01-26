<?php foreach($this->groups as $group_id => $group_item): ?>
    <section  class="cd-filter-block">
        <h4><?=$group_item;?></h4>
        <div class="row1 scroll-pane">
            <div class="col col-4">
                <ul class="cd-filter-content cd-filters list">
                <?php if(isset($this->attrs[$group_id])): ?>
                    <?php foreach($this->attrs[$group_id] as $attr_id => $value): ?>
                        <?php
                        if(!empty($filter) && in_array($attr_id, $filter)){
                            $checked = ' checked';
                        }else{
                            $checked = null;
                        }
                        ?>
                            <li>
                                <input class="filter" data-filter=".check1" type="checkbox" id="<?=$attr_id;?>" value="<?=$attr_id;?>">
                                <label class="checkbox-label" for="<?=$attr_id;?>"><?=$value;?></label>
                            </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endforeach; ?>
