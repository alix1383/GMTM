{* Smarty *}
<!DOCTYPE html>
<html lang="en">

<head>
  {include 'head.tpl'}
</head>

<body>
  {include 'header.tpl'}
  <form class="text-center display-6" action="create" method="GET">
    <div class="mb-3">
      <label for="memo" class="form-label d-block">Memo(Token Name)</label>
      <input type="text" class="form-control w-75 d-inline-block" name="memo" />
      <select name="appid" id="appid" class="form-control w-50 d-inline-block form-select-lg m-sm-2">
        <option value="">-- Select Game --</option>
        {foreach dataToArray() as $itemvar}
          <option name="appid" value="{$itemvar['APPiD']}">
            {$itemvar['SERVER_NAME']} ({$itemvar['APPiD']})
          </option>
        {/foreach}
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>