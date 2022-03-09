
        <div class="list-monhoc">
            <p>Chọn môn học:</p>
            
            <ul>
              <?php $i=0; foreach($data_cn as $value){ ?>
                <li>
                    <input name="check[]" value="<?= $value['mamon']?>" type="checkbox">
                    <?= $value['tenmon']?>
                </li>
              <?php }?>
            </ul>
        </div>