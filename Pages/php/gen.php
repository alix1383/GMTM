<?php
$json = file_get_contents(DATA . 'linux_compact.json');
$data = json_decode($json, true);
?>
<form class="text-center display-6" method="GET">
    <div class="mb-3">
        <label for="memo" class="form-label d-block">Memo(Token Name)</label>
        <input type="password" class="form-control w-75 d-inline-block" name="memo" />
        <select name="appid" id="appid" class="form-control w-50 d-inline-block form-select-lg m-sm-2">
            <option value="">-- Select Game --</option>
          <?php  foreach ($data as $ar) { ?>
            <option name="appid" value="<?= $ar['APPiD'] ?>"><?= $ar['SERVER_NAME'] ?></option>
          <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>