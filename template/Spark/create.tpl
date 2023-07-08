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
      {* <label for="memo" class="form-label d-block">Memo(Token Name)</label> *}
      <input type="text" placeholder="Memo(Token Name)" class="form-control w-75 d-inline-block" name="memo" />

      {* <label for="memo" class="form-label d-block">Count</label> *}
      <input type="number" value="1" placeholder="Count" class="form-control w-25 d-inline-block" name="count" />

      <select name="appid" id="appid" class="form-control w-25 d-inline-block form-select-lg m-sm-2">
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